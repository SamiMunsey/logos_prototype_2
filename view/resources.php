<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    include $root."/logos/model/resource/read.php"; 
    $title = "Manage Resources";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logos - Manage Resources</title>
    <link rel="stylesheet" href="/logos/view/includes/logos.css">
</head>
<body class="sidebar_body">


             <!-- Sidebar -->

    <?php include_once $root."/logos/view/includes/sidebar.php"; ?>

                <!-- Start of page content -->

            <!-- Header -->

    <?php include_once $root."/logos/view/includes/header.php"; ?>

            <!-- Create new Record button -->

<div class="new-button">
    <a href="/logos/view/forms/resource_record.php"><button id="new-resource-button">Create new resource record</button></a>
</div>

            <!-- Search the Catalogue -->

    <div class="searchcontainer">
        <form>
            <img src="/logos/view/media/mag.svg.png" id="homelogo"><input type="search" class="large-search-box" value="Search the catalogue">
        </form>
        <button>Filter search results</button>
        <button>Advanced search</button>
    </div>


            <!-- View Search Results -->

    <div class="searchresults">
        
        <table style="width: 100%">
            <tr>Resources</tr>
            <tr id="grey_row">
                <td id="ten">ID</td>
                <td id="thirty">Title</td>
                <td id="thirty">Author</td>
                <td id="ten">Classification</td>
                <td id="ten">Location</td>
                <td colspan="2">Actions</td>
            </tr>
            <?php foreach ($resources as $resource) : ?>
            <tr style="text-align: center">                    
                <td><?php echo htmlentities($resource['id']) ?></td>                  
                <td><?php echo htmlentities($resource['title']) ?></td>                    
                <td><?php echo htmlentities($resource['author']) ?></td>                    
                <td><?php echo htmlentities($resource['classification']) ?></td>                     
                <td><?php echo htmlentities($resource['location']) ?></td> 
                <td><a href="/logos/view/forms/resource_record.php?id=<?= htmlentities($resource['id']) ?>" role=button>Edit</a></td>
                <td><a href="/logos/model/resource/delete.php?id=<?= htmlentities($resource['id']) ?>" role=button>Delete</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br/>

    </div>
        
        <!-- Footer -->

<div id="bottom">
    <?php include $root."/logos/view/includes/footer.php"; ?>
</div>

        <!-- End of footer -->


</body>
</html>