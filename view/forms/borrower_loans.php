<?php

$root = $_SERVER['DOCUMENT_ROOT'];

$title = "Borrower's loans";

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logos - <?=$title ?></title>
    <link rel="stylesheet" href="/logos/view/includes/logos.css">
</head>

<body>

<!-- Header -->

<?php include $root."/logos/view/includes/header.php"; ?>



<!-- top nav bar -->

<div class="central-box">
    <div class='bar-nav'>
        <div class='box2'>
        <a href="/logos/view/forms/borrower_record.php"><p>Borrower information</p></a>
        </div>


    </div>
</div>
<br/><br/>

<!-- Page content -->

<h2 style="text-align: center"> Current loans </h2>

    <table class="drawn-table"  style="width:100%">
        <tr style="background-color: #ededeb;">
            <td style="width:10%">Barcode</td>
            <td  style="width:40%">Title</td>
            <td style="width:10%">Date due</td>
            <td style="width:10%">Days overdue</td>
        </tr>
    </table>

        


        



<button class="back-button" onclick="javascript:history.back()">Save and exit</button>

<!-- Footer -->

<div id="bottom">
    <?php include $root."/logos/view/includes/footer.php" ?>
</div>

<!-- End of Footer -->

</body>
</html>
