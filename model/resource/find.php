<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include $root."/logos/controller/DAO.php";

    $searchResult = array();

    if(isset($_POST['search_term'])) {

        $search_term = $_POST['search_term'];
        $dao = new Dao;

        try {
            

            //$searchResult = $dao->read('resource', 'id',);
            
            echo $search_term;

            

        } catch (Exception $e) {

        $message = 'Error: ' . $e->getMessage();
        $message = trim(preg_replace('/\s+/', ' ', $message));

        }


        $dao = NULL;
    }

    // Re-redirect back to main Resources page    

    //header('location:' . '/logos/view/home.php? ' . $message);