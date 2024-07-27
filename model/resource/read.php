<?php
    $root = $_SERVER['DOCUMENT_ROOT'];

    include $root."/logos/controller/DAO.php";

    $dao = new Dao;

    $resources = $dao->getResources();

    $dao = NULL;