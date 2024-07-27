<?php
    $root = $_SERVER['DOCUMENT_ROOT'];

    //instead of using premade read models (borrower/read.php and resource/read.php), we're going to access the dao directly, becuase importing two premade models will create a conflict due to two Dao objects being generated

    include $root."/logos/controller/dao.php";

        //establish the variables we're going to use for the resource and the borrower

        $r_id = "No record found";
        $r_title = "No record found";
        $r_author = "No record found";
        $r_reading_age = "No record found";

        $b_id = "No record found";
        $b_forename = "No record found";
        $b_surname = "No record found";
        $b_dob = "No record found";

        //check if the resource ID is set, and assign it to a variable

        if (isset($_POST['id'])) {
            $resource_id = $_POST['id'];
        }

        //check if the borrower ID is set, and assign it to a variable

        if (isset($_POST['borrower-id'])) {
            $borrower_id = $_POST['borrower-id'];
        }

        

        try {

                $dao = new Dao;

                //read the records associated with the resource_id from the resource and resource_info tables, using the Dao read() function

                $resource = $dao->read('resource', 'id', $resource_id);
                $resource_info = $dao->read('resource_info', 'resource_id', $resource_id);

            

                //read the records associated with the borrower_id from the borrower tables, using the Dao read() function
                
                $borrower = $dao->read('borrower', 'id', $borrower_id);

                $dao = NULL;

        } catch (Exception $e) {

            $message = 'Error: ' . $e->getMessage();
            $message = trim(preg_replace('/\s+/', ' ', $message));
            header('location:' . '/logos/view/issue.php?' . $message);

        }     



            $r_id = $resource['id'];
            $r_title = $resource['title'];
            $r_author = $resource_info['author'];
            $r_reading_age = $resource_info['reading_age'];


            $b_id = $borrower['id'];
            $b_forename = $borrower['forename'];
            $b_surname = $borrower['surname'];
            $b_dob = $borrower['dob'];



    header('location:' . '/logos/view/issue.php?$info='.$r_id.'%z4'.$r_title.'%z4'.$r_author.'%z4'.$r_reading_age.'%z4'.$b_id.'%z4'.$b_forename.'%z4'.$b_surname.'%z4'.$b_dob);
