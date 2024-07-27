<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $title = "Manage Borrowers";
    include $root."/logos/model/borrower/read.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logos - Manage Borrowers</title>
    <link rel="stylesheet" href="/logos/view/includes/logos.css">
</head>
<body class="sidebar_body">

            
            <!-- Sidebar -->

    <?php include $root."/logos/view/includes/sidebar.php" ?>

                <!-- Start of page content -->

            <!-- Header -->

    <?php include_once $root."/logos/view/includes/header.php" ?>

            <!-- Create new Record button -->

<div class="new-button">
    <a href="/logos/view/forms/borrower_record.php"><button id="new-borrower-button">Create new borrower record</button></a>
</div>

            <!-- Search Borrower Database -->

    <div class="searchcontainer">
        <form>
            <img src="/logos/view/media/mag.svg.png" id="homelogo"><input type="search" class="large-search-box" value="Search for a borrower">       
        </form>
    </div>

            <!-- View Search Results -->

    <div class="searchresults">
        
        <table style="width: 100%">
            <tr id="grey_row">
                <td id="ten">ID</td>
                <td id="thirty">First name</td>
                <td id="thirty">Surname</td>
                <td colspan="2" id="ten">Actions</td>
            </tr>
            <?php for($i = 0; $i < count($borrowers); $i++) : ?>
                <tr style="text-align: center">
                    <td><?php echo htmlentities($borrowers[$i]['id']) ?></td>
                    <td><?php echo htmlentities($borrowers[$i]['forename']) ?></td>
                    <td><?php echo htmlentities($borrowers[$i]['surname']) ?></td>
                    <!--2 rows below require editing for correct action-->
                    <td><a href="/logos/view/forms/borrower_record.php?id=<?= htmlentities($borrowers[$i]['id']) ?>" role=button>Edit</a></td>
                    <td><a href="/logos/model/borrower/delete.php?id=<?= htmlentities($borrowers[$i]['id']) ?>" role=button>Delete</a></td>
                </tr>
            <?php endfor; ?>
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