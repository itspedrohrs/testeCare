<?php

include "model/Connection.php";

class Invoice extends Connection
{

    private $id;
    private $date;
    private $total;
    private $idRecipient;

    /**
     * @return mixed
     */
    public function getIdRecipient()
    {
        return $this->idRecipient;
    }

    /**
     * @param mixed $idRecipient
     */
    public function setIdRecipient($idRecipient): void
    {
        $this->idRecipient = $idRecipient;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function save(Invoice $invoice, $idRecipient)
    {
        try {
            $sql = "INSERT INTO invoice (
              id,
              date,
              id_recipient,
              total_value
              )
              VALUES (
              :id,
              :date,
              :id_recipient,
              :total_value)";

            $insert = Connection::getInstance()->prepare($sql);

            $insert->bindValue(":id", $invoice->getId());
            $insert->bindValue(":date", $invoice->getDate());
            $insert->bindValue(":id_recipient", $idRecipient);
            $insert->bindValue(":total_value", $invoice->getTotal());

            return $insert->execute();

        } catch (Exception $e) {
            print "Erro ao cadastrar a nota ! " . $e->getMessage();
        }
    }

    public function getListInvoice($id)
    {
        try {
            $sql = "select invoice.id as nota,invoice.date,invoice.total_value,recipient.* from invoice
            inner join recipient on recipient.id = invoice.id_recipient
            where invoice.id = :id ";
            $result = Connection::getInstance()->prepare($sql);
            $result->bindValue(":id", $id);
            $result->execute();

            return $listInvoice = $result->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação,
          foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
}