<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    include $root."/logos/model/borrower/check-create_or_update.php";
    
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

<?php include $root."/logos/view/includes/header.php" ?>


<!-- top nav bar -->

<div class="central-box">
       <div class='box2'>
        <a href="/logos/view/forms/borrower_loans.php"><p>Borrower's loans</p></a>
        </div>
</div>
<br/><br/>

<!-- Page content -->

<form method='post' action='/logos/model/borrower/create_update.php'>

 <table class="record-table">
        <tr style="background-color: #ededeb;">
            <td style="padding: 20px; width: 180px;"><label for="id">Borrower ID</label></td>
            <td><input type="number" name="id" style="padding: 15px; width: 100px;" value='<?= isset($borrower['id']) ? htmlentities($borrower['id']) : '' ?>'></td>
        </tr>
        <tr>
            <td><label for="forename">Forename</label></td>
            <td><input type="text" name="forename" class="medium-input" value='<?= isset($borrower['forename']) ? htmlentities($borrower['forename']) : '' ?>'></td>
        </tr>
        <tr>
            <td><label for="surname">Surname</label></td>
            <td><input type="text" name="surname" class="medium-input" value='<?= isset($borrower['surname']) ? htmlentities($borrower['surname']) : '' ?>'></td>
        </tr>
        <tr>
            <td><label for="gender">Gender</label></td>
            <td>
            <select name="gender" id="gender" class="medium-input">
                <option value="Female">Female</option>                
                <option value="Male">Male</option>
                <option value="Other">Other</option>
            </select>   
            </td>
        </tr>
        <tr>
            <td><label for="dob">Date of birth</label></td>
            <td><input type="date" name="dob"  value='<?= isset($borrower['dob']) ? htmlentities($borrower['dob']) : '' ?>'></td>
        </tr>
        <tr>
            <td><label for="age">Age</label></td>
            <td>
                <input name="age" type="number" min="0"  class="x-short-input">
            </td>
        </tr>
    
    </table>
    <button type="submit"  class="back-button" name="submit">Submit</button>

</form>
        


<!-- Footer -->

<div id="bottom">
    <?php include $root."/logos/view/includes/footer.php" ?>
</div>

<!-- End of Footer -->

</body>
</html>
