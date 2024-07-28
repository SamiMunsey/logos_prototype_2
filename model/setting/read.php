<?php
    include $root."/logos/controller/DAO.php";
    
   
    try {

        $dao = new Dao;
        $current_settings = $dao->read('setting', 'id', 5377146);
        $dao = NULL;

    } catch (Exception $e) {

        $current_settings = ['loan_duration' => 0];

    }
