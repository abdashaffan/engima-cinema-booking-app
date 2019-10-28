<?php

/**
 * 
 * Database class
 * 
 */


class DB{

    private $db_username = "root";
    private $db_password = "root";
    private $db_name = "Engima";
    private $db_host = "localhost";
    private $db_connection_method = "mysql";
    private $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    private $connection;


    /**
     * Connect to database with PDO Connection
     *  */

    public function __construct(){

        $dsn = "$this->db_connection_method:host=$this->db_host;dbname=$this->db_name";
    
        try {

            $this->connection = new PDO($dsn,$this->db_username,$this->db_password,$this->options);

        } catch (Exception $e) {

            // do something
            print($e);
        }
    }


    public function connection(){

        return $this->connection;
        
    }

    // Execute query and return rows of array
    public function executeQuery($query){

        try {

            $statement = $this->connection->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll();

            return $result;

            
        } catch (Exception $e){

            // Handle how ?
            print($e);
        }

    }
}
