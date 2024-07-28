<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    include $root."/logos/model/resource/read.php"; 
    $title = "Home";
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

            <!-- Search the Catalogue -->

<h3>Search the catalogue</h3>

    <div class="searchcontainer">
        <form method="post" action="/logos/model/resource/find.php">
            <img src="/logos/view/media/mag.svg.png" id="homelogo"><input type="text" name="search_term" class="large-search-box" value="Search id or title">
            <button type="submit" name="search_catalogue">Go</button>
        </form>
        <!-- Filter and advanced search options won't be available in the prototype
        <button>Filter search results</button>
        <button>Advanced search</button>
        -->
    </div> 

            <!-- View Search Results -->

     

    <div class="searchresults">
        
        <table style="width: 100%">
            <tr id="grey_row">
                <td id="ten">ID</td>
                <td id="thirty">Title</td>
                <td id="thirty">Author</td>
                <td id="ten">Location</td>
            </tr>
            <?php foreach ($resources as $resource) : ?>
                <tr style="text-align: center">
                    <td><?= htmlentities($resource['id']) ?></td>
                    <td><?= htmlentities($resource['title']) ?></td>                    
                    <td><?= htmlentities($resource['author']) ?></td>                      
                    <td><?= htmlentities($resource['location']) ?></td>
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