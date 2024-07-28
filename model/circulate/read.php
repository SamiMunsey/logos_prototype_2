<?php
    $root = $_SERVER['DOCUMENT_ROOT'];

include $root."/logos/controller/Dao.php";

try {

    $dao = new Dao;

    $loans = $dao->readArray('loan');

    $loansInformation = array();

        foreach($loans as $loan) {

        //extract the resourceID and the borrowerID from the loan entry
        $resourceID = $loan['resource_id'];
        $borrowerID = $loan['borrower_id'];
        $date_issued = $loan['date_issued'];
        $date_due = $loan['date_due'];


        //Read the resource and borrower table entries on $resourceID and $borrowerID respectively
        $resource = $dao->read('resource', 'id', $resourceID);
        $borrower = $dao->read('borrower','id', $borrowerID);
        

        //extract the resource title
        $resourceTitle = $resource['title'];

        //extract borrower forename and surname
        $borrowerFName = $borrower['forename'];
        $borrowerSName = $borrower['surname'];

        //create a new entry for the loansInformation array, using the extracted information
        $infoEntry = ['resource_id'=>$resourceID, 'title'=>$resourceTitle, 'borrower_id'=>$borrowerID, 'forename'=>$borrowerFName, 'surname'=>$borrowerSName, 'date_issued'=>$date_issued, 'date_due'=>$date_due];

        //place the extracted information into the $loansInformation array
        $loansInformation[$resourceID] = $infoEntry;

    }

    $dao = NULL;
    
} catch (Exception $e) {

    $message = 'Error: ' . $e->getMessage();
    $message = trim(preg_replace('/\s+/', ' ', $message));

}

//The Issue page also needs to know the settings so it can set return date

    try {

        $dao = new Dao;
        $current_settings = $dao->read('setting', 'id', 5377146);
        $dao = NULL;

    } catch (Exception $e) {

        $current_settings = ['loan_duration' => 0];

    }

  

    

