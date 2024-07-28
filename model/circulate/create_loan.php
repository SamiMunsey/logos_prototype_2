<?php
    $root = $_SERVER['DOCUMENT_ROOT'];

    include $root."/logos/controller/Dao.php";


    try {
        $dao = new Dao;

        $dao->create('loan', ['resource_id', 'borrower_id', 'date_issued', 'date_due']);

        $dao = NULL;

        $message="success";

    } catch (Exception $e) {

        $message = 'Error: ' . $e->getMessage();
        $message = trim(preg_replace('/\s+/', ' ', $message));

    }

echo "<br><br>".$message;

 // Re-redirect back to main Resources page    

    header('location:' . '/logos/view/issue.php?type=&message=' . $message);


 