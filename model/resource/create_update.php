<?php
    $root = $_SERVER['DOCUMENT_ROOT'];

include $root."/logos/controller/DAO.php";

//1. try insert into resource table
try {

    $dao = new Dao;

    $dao->create_update('resource', ['isbn', 'title', 'classification'], 'id', 'id');

    $dao->create_update('resource_info', ['series', 'author', 'illustrator', 'summary', 'publisher', 'publication_date', 'reading_age'], 'resource_id', 'id');
    
    $dao->create_update('library_info', ['genre', 'form', 'owner', 'location', 'date_added', 'cost', 'provenance'], 'resource_id', 'id');

    

    $dao = NULL;


} catch (Exception $e) {

    $message = 'Error: ' . $e->getMessage();
    $message = trim(preg_replace('/\s+/', ' ', $message));

}

 

    // Re-redirect back to main Resources page    

    header('location:' . '/logos/view/resources.php?type=&message=' . $message);