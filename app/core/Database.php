<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh; //database handler
    private $stmt; //statement

    public function __construct()
    {
        // data source name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($str)
    {
        $this->stmt = $this->dbh->prepare($str);
    }

    public function bind($param, $value, $type = null)
    {
        // pertama kali function bind dipanggil, type langsung null
        if (is_null($type)) {
            // otomatis langsung masuk ke switch juga
            switch (true) {
                    // di switch ini, penentuan parameter type buat PDO
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
                    break;
            }
        }

        // Fungsi bindValue bawaan dari class PDO 
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
        // stmt adalah variabel yg diperoleh dari dbh->prepare()
        // dbh = new PDO()
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
