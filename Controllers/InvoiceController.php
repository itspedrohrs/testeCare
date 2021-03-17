<?php

include 'model/Invoice.php';
include 'model/Recipient.php';

class InvoiceController
{
    public function uploadInvoice($file)
    {
        $nameFile = $file['archive']['name'];
        $extensionFile = explode('.', $nameFile);

        if (!$this->verifyInvoiceExtension($extensionFile)) {
            echo 'O arquivo para upload deve ter extensão xml';
        } else if (!$this->verifyInvoiceCnpj(simplexml_load_file($file['archive']['tmp_name']))) {
            echo 'CNPJ não é válido';
        } else if (!$this->verifyAuthorization(simplexml_load_file($file['archive']['tmp_name']))) {
            echo 'Nota não possui protocolo de autorização';
        } else if (!$this->saveUploadInvoice($file['archive']['tmp_name'], $file['archive']['name'])) {
            echo 'Erro';
        } else {
            $this->saveInvoice($nameFile);
        }
    }

    public function verifyInvoiceExtension($extensionFile)
    {
        if ($extensionFile[sizeof($extensionFile) - 1] == 'xml') {
            return true;
        }
        return false;
    }

    public function verifyInvoiceCnpj($bodyInvoice)
    {
        (empty($bodyInvoice->protNFe)) ? $bodyInvoice = $bodyInvoice->infNFe : $bodyInvoice = $bodyInvoice->NFe->infNFe;

        if ($bodyInvoice->emit->CNPJ == '09066241000884') {
            return true;
        }
        return false;
    }

    public function verifyAuthorization($bodyInvoice)
    {
        if (!empty($bodyInvoice->protNFe)) {
            return true;
        }
        return false;
    }

    public function saveUploadInvoice($file, $nameFile)
    {
        try {
            move_uploaded_file($file, "./uploadsInvoice/$nameFile");
            $_SESSION['msg'] = 'Upload feito com sucesso !';
            return true;
        } catch (Exception $e) {
            echo "Erro ao salvar o arquivo no servidor " . $e->getMessage();
        }
    }

    public function saveInvoice($nameFile)
    {

        $invoice = new Invoice();
        $recipient = new Recipient();

        $bodyInvoice = simplexml_load_file("./uploadsInvoice/$nameFile");
        (empty($bodyInvoice->protNFe)) ? $bodyInvoice = $bodyInvoice->infNFe : $bodyInvoice = $bodyInvoice->NFe->infNFe;

        foreach ($bodyInvoice as $xmlInvoice) {
            $recipient->setName($xmlInvoice->dest->xNome);
            $recipient->setCpfCnpj($xmlInvoice->dest->CNPJ);
            $recipient->setEmail($xmlInvoice->dest->email);
            $recipient->setNumberRecipient($xmlInvoice->dest->indIEDest);

            $recipient->setCountry($xmlInvoice->dest->enderDest->cPais);
            $recipient->setZipCode($xmlInvoice->dest->enderDest->CEP);
            $recipient->setState($xmlInvoice->dest->enderDest->UF);
            $recipient->setIdCounty($xmlInvoice->dest->enderDest->cMun);
            $recipient->setDistrict($xmlInvoice->dest->enderDest->xBairro);
            $recipient->setNumber($xmlInvoice->dest->enderDest->nro);
            $recipient->setCounty($xmlInvoice->dest->xMun);
            $recipient->setPlace($xmlInvoice->dest->enderDest->xLgr);

            $invoice->setId($xmlInvoice['Id'][0]);
            $invoice->setDate(date('Y.m.d', strtotime($xmlInvoice->ide->dhEmi)));
            $invoice->setTotal($xmlInvoice->total->ICMSTot->vNF);
        }

        $id = $recipient->save($recipient);
        $invoice->save($invoice, $id);

        $_SESSION['listInvoice'] = $invoice->getListInvoice($invoice->getId());

        header('Location: http://localhost/testeCare/views/previewInvoice.php');
    }

}