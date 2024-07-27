<?php
    $root = $_SERVER['DOCUMENT_ROOT'];

//include $root."/logos/controller/DAO.php";

function connect() {
    $hostname = 'localhost';
    $dbname = 'logos';
    $username = 'postgres';
    $password = 'postgres';
    $dsn = "pgsql:host=$hostname;dbname=$dbname";

    try {
      return new PDO($dsn, $username, $password);
    } catch(Exception $e) {
      echo $e->getmessage();
    }
}

try {

    $db = connect();

    $resource_id = $_POST['resource_id'];
    $borrower_id = $_POST['borrower_id'];
    

    $queryStmt = "INSERT INTO loan (resource_id, borrower_id) VALUES ($resource_id, $borrower_id)";

    echo $queryStmt;

    $db->query($queryStmt);


} catch (Exception $e) {

    $message = 'Error: ' . $e->getMessage();
    $message = trim(preg_replace('/\s+/', ' ', $message));

}


 // Re-redirect back to main Resources page    

    header('location:' . '/logos/view/issue.php?type=&message=' . $message);