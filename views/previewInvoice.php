<?php session_start(); ?>
<html>
<head>
    <link href="../css/style.css">
</head>
<body>

<div class="container">
    <?php foreach ($_SESSION['listInvoice'] as $listInvoice) {
        echo "======================Dados Nota=================================================<br>"
            . "Nº nota: " . $listInvoice['nota'] . '<br>'
            . "data: " . date('d/m/Y', strtotime($listInvoice['date'])) . '<br>'
            . "Valor total: " . $listInvoice['total_value'] . '<br>'
            . "=============================Destinatário=======================================<br>";
        echo "Nome: " . $listInvoice['name'] . '<br>'
            . "Cpf/cnpj: " . $listInvoice['cpf_cnpj'] . '<br>'
            . "Longradouro: " . $listInvoice['place'] . '<br>'
            . "Nº: " . $listInvoice['number'] . '<br>'
            . "Município: " . $listInvoice['district'] . '<br>'
            . "UF: " . $listInvoice['state'] . '<br>'
            . "Cep: " . $listInvoice['zipCode'] . '<br>'
            . "Email: " . $listInvoice['email'] . '<br>';
    } ?>
</div>

</body>
</html>