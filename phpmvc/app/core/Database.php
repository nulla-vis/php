<?php

 class Database {
     private $host = DB_HOST,
             $user = DB_USER,
             $pass = DB_PASS,
             $db_name = DB_NAME,
             $dbh, //data base handler
             $stmt;

    public function __construct() { //letakkan konek ke data base di construck karena semua yang didalam construct akan dijalankan langsung terlebih dahulu
        // data source name
        $dsn = "mysql:host={$this->host};dbname={$this->db_name}";

        $option = [
            PDO::ATTR_PERSISTENT => true, //agar database koneksinya terjaga terus
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option); //('url_database', 'user_name', 'password', option). option untuk optimasi
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query) { //bikin jadi generic query
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null) {     //untuk binding data jika di dalam query ada WHERE, INSERT, UPDATE dsb
        if(is_null($type)) {
            switch(true) {
                case is_int($value) : 
                    $type = PDO::PARAM_INT; //parameter ini semua harus diisi manual, namu kita bikin agar otomatis diisi oleh script kita
                    break;
                case is_bool($value) : 
                    $type = PDO::PARAM_BOOL; //parameter ini semua harus diisi manual, namu kita bikin agar otomatis diisi oleh script kita
                    break;
                case is_null($value) : 
                    $type = PDO::PARAM_NULL; //parameter ini semua harus diisi manual, namu kita bikin agar otomatis diisi oleh script kita
                    break;
                default :
                    $type = PDO::PARAM_STR; //parameter ini semua harus diisi manual, namu kita bikin agar otomatis diisi oleh script kita
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute() {
        $this->stmt->execute();
    }

    public function execute2($data) {
        $this->stmt->execute($data);
    }

    public function resultSet() {
       $this->execute();
       return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single() {
        $this->execute();
       return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount() {
        return $this->stmt->rowCount();
    }
 }