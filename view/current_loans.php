<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    include $root."/logos/model/circulate/read.php"; 
    $title = "Current loans";
?>

<!DOCTYPE html>
<html>
    
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logos - <?=$title ?></title>
    <link rel="stylesheet" href="/logos/view/includes/logos.css">
</head>


<body class="sidebar_body">

            <!-- Header -->
        
    <?php include $root."/logos/view/includes/header.php" ?>


            <!-- Sidebar -->

    <?php include $root."/logos/view/includes/sidebar.php" ?>

          
            <!-- Test availablity of data -->


            <!-- View current loans table -->

<table style="width: 100%">
    <tr id="grey_row">
        <td id="ten">Resource ID</td>
        <td id="forty">Title</td>
        <td id="ten">Borrower ID</td>
        <td>Borrower surname</td>
        <td>Borrower forename</td>
    </tr>
    <?php foreach ($loansInformation as $loan) : ?>
        <tr style="text-align: center">
            <td><?= htmlentities($loan['resource_id']) ?></td>                    
            <td><?= htmlentities($loan['title']) ?></td>                      
            <td><?= htmlentities($loan['borrower_id']) ?></td>                      
            <td><?= htmlentities($loan['surname']) ?></td>                      
            <td><?= htmlentities($loan['forename']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>




        <!-- Footer -->

<div id="bottom">
    <?php include $root."/logos/view/includes/footer.php" ?>
</div>

        <!-- End of footer -->        

</body>



</html>