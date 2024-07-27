<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    

include $root."/logos/controller/DAO.php";


try {

    $dao = new Dao;



    $dao->delete('loan', 'resource_id', 'resource_id');

    $dao = NULL;

    $message = "Successful delete!";

} catch (Exception $e) {

    $message = 'Error: ' . $e->getMessage();
    $message = trim(preg_replace('/\s+/', ' ', $message));

}

// Re-redirect back to main Resources page    

    header('location:' . '/logos/view/return.php? ' . $message);

