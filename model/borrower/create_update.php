<?php
    $root = $_SERVER['DOCUMENT_ROOT'];

include $root."/logos/controller/DAO.php";

//1. try insert into resource table
try {

    $dao = new Dao;

    $dao->create_update('borrower', ['forename', 'surname', 'dob', 'gender'], 'id', 'id');

    $dao = NULL;

} catch (Exception $e) {

    $message = 'Error: ' . $e->getMessage();
    $message = trim(preg_replace('/\s+/', ' ', $message));

}

 // Re-redirect back to main Resources page    

    header('location:' . '/logos/view/borrowers.php?type=&message=' . $message);