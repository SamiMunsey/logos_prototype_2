<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $title = "Genres";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logos - <?=$title ?></title>
    <link rel="stylesheet" href="/logos/view/includes/logos.css">
</head>
<body class="sidebar_body">


             <!-- Sidebar -->

    <?php include $root."/logos/view/includes/sidebar.php" ?>

                <!-- Start of page content -->

            <!-- Header -->

        <?php include_once $root."/logos/view/includes/header.php" ?>


        
        <!-- Footer -->

<div id="bottom">
    <?php include $root."/logos/view/includes/footer.php" ?>
</div>

        <!-- End of footer -->


</body>
</html>