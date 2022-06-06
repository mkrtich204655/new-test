<?php

class DB
{
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;

    private $statement;
    private $dbHandler;
    private $error;

    public function __construct()
    {

        $connect = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPass);
        $sql = "CREATE DATABASE IF NOT EXISTS $this->dbName";
        mysqli_query($connect, $sql);

        $conn = 'mysql:host='.$this->dbHost.';dbname='.$this->dbName;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
        }catch (PDOException $e){
            $this->error = $e->getMessage();
//            echo $this->error;
        }
       require_once __DIR__ . '../../migration/BaseMigration.php';
    }

    public function query($sql){
        $this->statement = $this->dbHandler->prepare($sql);
    }

    public function execute(){
        return $this->statement->execute();
    }

    public function resultSet(){
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

}