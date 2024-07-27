<?php
    $root = $_SERVER['DOCUMENT_ROOT'];

    include $root."/logos/controller/DAO.php";


$b_id = "No record found";
$b_forename = "No record found";
$b_surname = "No record found";
$b_dob = "No record found";

//check if the ID is set 

if (isset($_POST['id'])) {
    $borrower_id = $_POST['id'];
}



$dao = new Dao;

$borrower = $dao->read('borrower', 'id', $borrower_id);

            $b_id = $borrower['id'];
            $b_forename = $borrower['forename'];
            $b_surname = $borrower['surname'];
            $b_dob = $borrower['dob'];

$dao = NULL;

$i = 0;


header('location:' . '/logos/view/issue.php?$info='.$i.'%z4'.$i.'%z4'.$i.'%z4'.$i.'%z4'.$b_id.'%z4'.$b_forename.'%z4'.$b_surname.'%z4'.$b_dob);
