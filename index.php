<?php include "config.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link href="css/style.css" rel="stylesheet">

    <title>Upload Nota-Fiscal</title>
</head>
<body>
<div class="container">
    <div class="form-box">
        <form action="<?=PATH_PROJECT?>/Interface.php?control=InvoiceController&method=uploadInvoice" method="post" enctype="multipart/form-data">
            <h2>
                Importe a nota fiscal para o sistema
            </h2>
            <div>
                <input type="file" name="archive" class="form-input" required>
            </div>
            <div>
                <input type="submit" value="Upload" class="form-btn">
            </div>
        </form>
    </div>
</div>

</body>

</html>