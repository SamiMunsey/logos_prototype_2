<?php
    $root = $_SERVER['DOCUMENT_ROOT'];

include $root."/logos/controller/DAO.php";

if (isset($_GET['id'])) {

    // Get $id from the URL
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    try {

        $dao = new Dao;


        $dao->delete('borrower', 'id', $id);

        $dao = NULL;

    } catch (Exception $e) {

        $message = 'Error: ' . $e->getMessage();
        $message = trim(preg_replace('/\s+/', ' ', $message));

    }
}
// Re-redirect back to main Resources page    

    header('location:' . '/logos/view/borrowers.php? ' . $message);

