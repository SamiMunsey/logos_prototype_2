<?php
    $root = $_SERVER['DOCUMENT_ROOT'];

include $root."/logos/controller/Dao.php";


    $dao = new Dao;

    $loans = $dao->readArray('loan');

    $loansInformation = array();


    foreach($loans as $loan) {

        //extract the resourceID and the borrowerID from the loan entry
        $resourceID = $loan['resource_id'];
        $borrowerID = $loan['borrower_id'];


        //Read the resource and borrower table entries on $resourceID and $borrowerID respectively
        $resource = $dao->read('resource', 'id', $resourceID);
        $borrower = $dao->read('borrower','id', $borrowerID);
        

        //extract the resource title
        $resourceTitle = $resource['title'];

        //extract borrower forename and surname
        $borrowerFName = $borrower['forename'];
        $borrowerSName = $borrower['surname'];

        //create a new entry for the loansInformation array, using the extracted information
        $infoEntry = ['resource_id'=>$resourceID, 'title'=>$resourceTitle, 'borrower_id'=>$borrowerID, 'forename'=>$borrowerFName, 'surname'=>$borrowerSName];

        //place the extracted information into the $loansInformation array
        $loansInformation[$resourceID] = $infoEntry;

    }

  

    $dao = NULL;

