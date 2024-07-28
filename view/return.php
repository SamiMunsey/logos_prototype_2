<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    include $root."/logos/model/circulate/read.php"; 
    $title = "Return loans"; 
?>

<!DOCTYPE html>
<html>
    
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logos - Bulk return resources</title>
    <link rel="stylesheet" href="/logos/view/includes/logos.css">
</head>

<body class="sidebar_body">

            <!-- Header -->


    <?php include_once $root."/logos/view/includes/header.php" ?>

            <!-- Sidebar -->

    <?php include $root."/logos/view/includes/sidebar.php" ?>

                <!-- Start of page content -->


        <!--  Top Nav Bar -->

<!--
    <div class='bar-nav'>
        <div class='box2'>
        <a href="/logos/view/issue.php"><p id="bold">Go to issue resources</p></a>
        </div>
    </div>
-->

<div  class="find-borrower-div">
    <img src="/logos/view/media/mag.svg.png" id="homelogo">  <input type="search" value="Search barcode or title" class="small-search-box">
</div>

<div class="searchresults">
    
    <table style="width: 100%">
        <tr>Returns</tr>
        <tr id="grey_row">
            <td id="ten">Barcode</td>
            <td id="thirty">Title</td>              
            <td id="ten">Borrower code</td>
            <td colspan="2" id="thirty">Borrower name</td>              
            <td id="ten">Return</td>
        </tr>
        <?php foreach ($loansInformation as $loan) : ?>
            <tr style="text-align: center">
                <td><?= htmlentities($loan['resource_id']) ?></td>                    
                <td><?= htmlentities($loan['title']) ?></td>                      
                <td><?= htmlentities($loan['borrower_id']) ?></td>                      
                <td><?= htmlentities($loan['surname']) ?></td> 
                <td><?= htmlentities($loan['forename']) ?></td>                  
                <td><a href="/logos/model/circulate/delete.php?id=<?= htmlentities($loan['resource_id']) ?>" role=button>Return</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br/>
</div>

        <!-- Footer -->

<div id="bottom">
    <?php include $root."/logos/view/includes/footer.php" ?>
</div>

        <!-- End of footer -->

</body>

</html>