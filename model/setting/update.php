<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include $root."/logos/controller/DAO.php";

    try {
        $dao = new Dao;

        $dao->create_update('setting', ['loan_duration'], 'id', 'id');

        $dao = NULL;

        $message = "success";

    } catch (Exception $e) {

        $message = 'Error: ' . $e->getMessage();
        $message = trim(preg_replace('/\s+/', ' ', $message));

    }  


    header('location:' . '/logos/view/settings.php?type=&message=' . $message);
