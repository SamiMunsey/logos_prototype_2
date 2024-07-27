<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include $root."/logos/model/resource/read.php";
    $title = "Search the library"

?>

<!DOCTYPE html>
<html>
    
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logos - <?= $title ?></title>
    <link rel="stylesheet" href="/logos/view/includes/logos.css">
</head>


<body class="sidebar_body">
    <header>
        <h1><?=$title ?></h1>
    </header>

            <!-- Sidebar -->

<div class="sidenav">
  <button class="dropdown-btn">Non-admin User <img src="/logos/view/media/profile-logo.png" id="homelogo"
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">View profile</a>
    <a href="#">Toggle dark mode</a>
    <a href="/logos/view/login.php">Switch user</a>
  </div>
  <hr>
  <a href="/logos/view/non-admin.php">Home</a>
  <hr>
  <h2 style="margin-left: 20px;">Browse</h2>

  <button class="dropdown-btn">Non-fiction <img src="/logos/view/media/Arrow-down.svg.png" id="downarrow">
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Computer science</a>
    <a href="#">Religious studies</a>
    <a href="#">Languages</a>
    <a href="#">Science</a>
    <a href="#">Technology</a>
    <a href="#">Art</a>
    <a href="#">Drama</a>
    <a href="#">Sport</a>
    <a href="#">Poetry</a>
    <a href="#">Plays</a>
    <a href="#">History</a>
    <a href="#">Geography</a>
  </div>
  <a href="#">Action and adventure</a>
    <a href="#">Classics</a>
    <a href="#">Fairy tales</a>
    <a href="#">Ghost stories</a>
    <a href="#">Graphic novels</a>
    <a href="#">Horror</a>
    <a href="#">Funny</a>
    <a href="#">LGBTQ+</a>
    <a href="#">Mystery and detective</a>
    <a href="#">Romance</a>
    <a href="#">Science fiction</a>
    <a href="#">Sports stories</a>
    <a href="#">Thrillers</a>

  <hr>
  <a href="#">Help</a>

  

</div>

<?php include $root."/logos/model/dropdown_script.php" ?>

            <!-- Search the Catalogue -->

    <div class="searchcontainer">
        <form>
            <img src="/logos/view/media/mag.svg.png" id="homelogo"><input type="search" class="large-search-box" value="Search the library">
        </form>
    </div>

            <!-- View Search Results -->

    <div class="searchresults">
        
        <table style="width: 100%">
            <tr>Search results</tr>
            <tr id="grey_row">
                <td id="thirty">Title</td>
                <td id="thirty">Author</td>
                <td id="five">In stock</td>
                <td id="ten">Date due</td>
                <td id="ten">Location</td>
            </tr>
            <?php foreach ($resources as $resource) : ?>
            <tr style="text-align: center">                                     
                <td><?= htmlentities($resource['title']) ?></td>                    
                <td><?php echo htmlentities($resource['author']) ?></td>                    
                <td>?</td>                         
                <td>?</td>                                   
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