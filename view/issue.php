<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    $title = "Issue loans";
    include_once $root."/logos/model/circulate/read.php";

    //--- SETTING DATES --//

     //get today's date and set it to an instance of the DateTime object, which can be modified as required
        date_default_timezone_set('GMT');
        $date = date('Y-m-d');
        $today_date = new DateTime($date);
    //get the loan duration set by the user in 'Settings'...
        $loan_duration = $current_settings['loan_duration'];
    //..and use it to set the due date  
        $due_dateStr = "+$loan_duration day";
        $due_date = $today_date->modify($due_dateStr);
    //Finally format the due date so it can be sent to the database
        $date_due = $due_date->format('Y-m-d');
    
?>


<!DOCTYPE html>
<html>
    
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logos - Issue resources</title>
    <link rel="stylesheet" href="/logos/view/includes/logos.css">
</head>


<body class="sidebar_body">

            <!-- Header -->

    <?php include $root."/logos/view/includes/header.php" ?>

           <!-- Sidebar -->

    <?php include $root."/logos/view/includes/sidebar.php" ?>

                <!-- Start of page content -->


        <!--  Top Nav Bar -->

<!---
    <div class='bar-nav'>

        <div class='box2'>
        <a href="/logos/view/return.php"><p id="bold">Go to bulk return</p></a>
        </div>

    </div>
-->

<form method='post' action='/logos/model/circulate/search-borrower.php'>
    <div  class="circulate-searchbar-div">
        <!--The search bar to look for the borrower: -->
        <img src="/logos/view/media/mag.svg.png" id="homelogo"> <input type="text" name= "id" value="Search borrower ID" class="small-search-box">
        <button type="submit" name="find-borrower-submit">Go</button>
    </div>
</form>

<!-- The borrower table -->

<?php

$info = filter_input(INPUT_GET, '$info');
 
$infoArray = explode("%z4",$info);

?>

<table class="record-table">
    <tr>
        <td colspan="4"><h3>Borrower found:</h3></td>
    </tr>
    <tr>
        <td style="width: 60px"><label for="print-id">ID:</label></td>
        <td colspan="3"><input type="text" name="print-id" class="medium-input" value="<?= isset($infoArray[4]) ? htmlentities($infoArray[4]) : '' ?>"></td>
    </tr>
    <tr>
        <td style="width: 120px"><label for="forename">Forename:</label></td>
        <td colspan="3"><input type="text" name="forename" class="medium-input" value="<?= isset($infoArray[5]) ? htmlentities($infoArray[5]) : '' ?>"></td>
    </tr>
    <tr>
        <td><label for="surname">Surname:</label></td>
        <td colspan="3"><input type="text" name="surname" class="medium-input" value="<?= isset($infoArray[6]) ? htmlentities($infoArray[6]) : '' ?>"></td>
    </tr>
    <tr>
        <td><label for="dob">Date of birth:</label></td>
        <td colspan="3"><input type="date" name="dob" class="medium-input" value="<?= isset($infoArray[7]) ? htmlentities($infoArray[7]) : '' ?>"></td>
    </tr>

    
    <tr>
        <td colspan="4"><hr></td>
    </tr>
</table>

<!-- The 'find resource' table -->

<?php

 //$resourceDetails = filter_input(INPUT_GET, '$resourceInfo');
 //$resourceArray = explode("%z4",$resourceDetails);

?>


<form method='post' action='/logos/model/circulate/search-resource.php'>
    <div class="circulate-searchbar-div">
        <!--The Hidden field to call on the borrower id: -->
        <input type="hidden" name="borrower-id" value="<?= isset($infoArray[4]) ? htmlentities($infoArray[4]) : '' ?>">
        <!--The search bar to look for the resource: -->
        <img src="/logos/view/media/mag.svg.png" id="homelogo"> <input type="text" name="id" value="Search resource ID" class="small-search-box">
        <button type="submit" name="find-resource-submit">Go</button>
    </div>
</form>

<table class="record-table">
    <tr>
        <td colspan="4"><h3>Resource found:</h3></td>
    </tr>
    <tr id="grey_row">
        <td id="ten">ID</id>
        <td id="forty">Title</td>
        <td id="forty">Author</td>
        <td id="ten">Reading age</td>
    </tr>
    <tr style="text-align: center;">
        <td><?=isset($infoArray[0]) ? htmlentities($infoArray[0]) : '' ?></td>
        <td><?=isset($infoArray[1]) ? htmlentities($infoArray[1]) : '' ?></td>
        <td><?=isset($infoArray[2]) ? htmlentities($infoArray[2]) : '' ?></td>
        <td><?=isset($infoArray[3]) ? htmlentities($infoArray[3]) : '' ?></td>
    </tr>
</table>

<br><br>

<?php
//need to set a separate variable to hold the resource_id to enable to check within an HTML tag that it is set
if($infoArray[0] != 0) {
    $set_r_id = $infoArray[0];
}
?>

<!-- Button to issue a new loan to the borrower -->

<form method="post" action="/logos/model/circulate/create_loan.php">
    <!--Hidden fields to call on the borrower and resource IDs: -->
    <input type="hidden" name="resource_id" value="<?= isset($set_r_id) ? htmlentities($set_r_id) : '' ?>">
    <input type="hidden" name="borrower_id" value="<?= isset($infoArray[4]) ? htmlentities($infoArray[4]) : '' ?>">
    <input type="hidden" name="date_issued" value="<?=$date?>">
    <input type="hidden" name="date_due" value="<?=$date_due?>">
    <button type="submit">Issue resource</button>
</form>


<hr>


<!--- table to display borrower's current loans ---->



<table>
    <tr>
        <td colspan="4">
            <h3>
            <?php
            if(isset($infoArray[5])){
                 if($infoArray[5] != 0) {
                    echo $infoArray[5]." ".$infoArray[6]."'s";
                } else {
                    echo "Borrower ";
                }
            }
            ?>
            
            Loans</h3>
        </td>
    </tr>
    <tr id="grey_row">
        <td id="ten">Resource ID</td>
        <td id="forty">Title</td>
        <td id="ten">Date issued</td>
        <td id="ten">Date due</td>
    </tr>
        <?php foreach ($loansInformation as $loan) : ?>
            <?php if(isset($infoArray[4])) : ?>
             <?php if ($loan['borrower_id'] == $infoArray[4]) : ?>
                <tr style="text-align: center">
                    <td><?= htmlentities($loan['resource_id']) ?></td>                    
                    <td><?= htmlentities($loan['title']) ?></td>                   
                    <td><?= htmlentities($loan['date_issued']) ?></td>                     
                    <td><?= htmlentities($loan['date_due']) ?></td>                         
                </tr>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
</table>

        <!-- Footer -->


    <?php include $root."/logos/view/includes/footer.php" ?>


        <!-- End of footer -->


</body>
</html>