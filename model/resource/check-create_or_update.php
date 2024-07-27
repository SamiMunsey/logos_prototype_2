<?php
    $root = $_SERVER['DOCUMENT_ROOT'];

    $resourceExists = 0;

    include $root."/logos/controller/DAO.php";

    $dao = new Dao;
    
    if (isset($_GET['id'])) {
    // Get the $id from the URL, if there is one.
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $resourceExists = 5;
        try {

            $resource = $dao->read('resource', 'id');
            $resource_info = $dao->read('resource_info', 'resource_id');
            $library_info = $dao->read('library_info', 'resource_id');
            $title = isset($resource['title']) ? htmlentities($resource['title']) : '';
            $genres = $dao->read('genre', 'name');
            

        } catch (Exception $e) {
            echo $e->getMessage();
        } 
        //if not, begin with a blank record.
    } else {
        $title = "New resource";
        $resourceExists = 3;
    }


    $dao = NULL;