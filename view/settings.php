<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    $title = "Settings";
    $settingID = "5377146";

    include $root."/logos/model/setting/read.php";
    
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

<form method="post" action="/logos/model/setting/update.php">
    <!--The setting ID is in a hidden field, so that it always remains the same -->
    <input type="hidden" name="id" value="<?=$settingID ?>">
    <table>
        <tr>
            <td><label for="loan_duration">Loan duration (days):</label>
            <td><input type="number" step="1" name="loan_duration" value="<?= $current_settings['loan_duration'] ?>"></td>
        </tr>
    </table>
    <button type="submit" name="submit_settings_updates">Submit</button>
</form>