<?php
    $root = $_SERVER['DOCUMENT_ROOT'];

$borrowerExists = 0;

    include $root."/logos/controller/DAO.php";

    $dao = new Dao;

    if (isset($_GET['id'])) {
    // Get the $id from the URL, if there is one.
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $borrowerExists = 5;
    try {

        $borrower = $dao->read('borrower', 'id', $id);
        $sname = isset($borrower['surname']) ? htmlentities($borrower['surname']) : '';

        $fname = isset($borrower['forename']) ? htmlentities($borrower['forename']) : '';

        $title = "$sname, $fname";

    } catch (Exception $e) {
            echo $e->getMessage();
        } 
        //if not, begin with a blank record.
    } else {
        $title = "New borrower";
        $resourceExists = 3;
    }



    $dao = NULL;