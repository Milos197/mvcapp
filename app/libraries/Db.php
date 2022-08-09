<?php
class Db{
    private $host=DB_HOST;
    private $user=DB_USER;
    private $pass=DB_PASS;
    private $dbname=DB_NAME;
    private $pdo;
    private $stmt;
    private $error;
    public function __construct(){
        $dsn= 'mysql:host=database:3306;dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true, // keep connection open
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // throw exceptions
        );
    try{
        $this->pdo = new PDO($dsn, $this->user, $this->pass,$options);
        }
    catch(PDOException $exception){
        $this->error=$exception->getMessage();
        echo $this->error;
        }
    }
    public function query($sql){
        $this->stmt =$this->pdo->prepare($sql);
    }
    public function bind($param,$value,$type=null){
        if (is_null($type))
        {
        switch (true)
            {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
            }
        }

    $this->stmt->bindParam($param, $value, $type);
    }

    public function execute(){
        return $this->stmt->execute();
    } 

    public function collection(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    
    public function count(){
        return $this->stmt->rowCount();
    }
}