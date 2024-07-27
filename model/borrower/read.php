<?php
    $root = $_SERVER['DOCUMENT_ROOT'];

    include $root."/logos/controller/DAO.php";

    $dao = new Dao;

    $borrowers = $dao->readArray('borrower');

    $dao = NULL;