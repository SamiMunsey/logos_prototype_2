<?php

class Dao {

   function __construct() {

         $hostname = 'localhost';
         $dbname = 'logos';
         $username = 'postgres';
         $password = 'postgres';

        $dsn = "pgsql:host=$hostname;dbname=$dbname";  
        try {
            $this->db = new PDO($dsn, $username, $password);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    //--------------- 1: CREATE -----------------//


    function create($tableName, $columnNames) {

        $columnList = "";

        $table = $tableName;
        $columns = $columnNames;

        foreach($columns as $column) {
            $columnList .= "$column, ";
        }

        $columnList = substr($columnList, 0, -2);

        $queryStmt = "INSERT INTO $table ($columnList) VALUES ($columnList)";

        $query = $this->db->prepare($queryStmt);

        $bindArray = array();

        foreach ($columns as $column) {
            //assign each variable to the array using array_merge()
                //first must declare each variable or it throws an error
            ${$column} = $column;
            $bindArray = array_merge($bindArray, [${$column} => $_POST[$column] ?? '']);
        }

        ${$xPkColumn} = $xPkColumn;
        $bindArray = array_merge($bindArray, [${$xPkColumn} => $_POST[$xPkColumn] ?? '']);

        $query->execute($bindArray);

    }

    //--------- 1 & 3: CREATE or UPDATE ---------//

//pkColumn is for the primary key; xPkColumn is for the primary key of the
//main table with which the record is primarily associated with
    function create_update($tableName, $columnNames, $pkColumnName, $xPkColumnName) {


        //Step 1: Create the query statement and pass it to the query for preparation 

        $columnList = "";
        $valuesList = "";
        $updateList = "";
        

        $columns = $columnNames;
        $table = $tableName;
        $pkColumn = $pkColumnName;
        $xPkColumn = $xPkColumnName;

        foreach ($columns as $column) {
            $columnList .= "$column, ";
            $valuesList .= ":$column, ";
            $updateList .= "$column = :$column,";
        }
        
        $columnList .= "$pkColumn";
        $valuesList .= ":$xPkColumn";        
        $updateList = substr($updateList, 0, -1);

                
        $queryStmt = "INSERT INTO $table ($columnList) VALUES ($valuesList) ON CONFLICT ($pkColumn) DO UPDATE SET $updateList";
        $query = $this->db->prepare($queryStmt);


    //Step 2: Prepare the bind message and use it to execute the query

       

        $bindArray = array();

        foreach ($columns as $column) {
            //assign each variable to the array using array_merge()
                //first must declare each variable or it throws an error
            ${$column} = $column;
            $bindArray = array_merge($bindArray, [${$column} => $_POST[$column] ?? '']);
        }

        ${$xPkColumn} = $xPkColumn;
        $bindArray = array_merge($bindArray, [${$xPkColumn} => $_POST[$xPkColumn] ?? '']);

        $query->execute($bindArray);
        

    }



   //----------- 2: READ ----------//

   //Read a specific entry from a table

    function read($table, $pkColumn, $idSearchValue) {
     
        $queryStmt = "SELECT * FROM $table WHERE $pkColumn = $idSearchValue";
        $query = $this->db->query($queryStmt);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data; 

    }


    //Read everything from a table

    function readArray($table) {
        $queryStmt = "SELECT * FROM $table";
        $query = $this->db->query($queryStmt);         
        $data = $query -> fetchAll(PDO::FETCH_ASSOC);
        return $data;
  
      }

      //join the resource tables together and return as one entity

    function getResources() {
          $resourceQuery = $this->db->query('SELECT * FROM resource LEFT JOIN library_info ON resource.id = library_info.resource_id LEFT JOIN resource_info ON resource_info.resource_id = library_info.resource_id');

          return $resourceQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    

   //---------- 4: DELETE ---------//


    function delete($tableName, $pkColumnName, $xPkColumnName) {

        $table = $tableName;
        $pkColumn = $pkColumnName;
        $xPkColumn = $xPkColumnName;
        $id = $xPkColumnName;

       
            $query = "DELETE FROM $table WHERE $pkColumn = :$pkColumn";

            $deleteStmt = $this->db->prepare($query);
            // Execute it here
            $deleteStmt->execute([$pkColumn=>$xPkColumn]);

        
    }

} 
//----------End of Dao class---------------//