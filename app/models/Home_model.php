<?php

// Home_model.php
class Home_model {

    private $dbh;
    private $stmt;

    public function __construct() {
        $dsn = 'mysql:host=localhost;dbname=sas_db;';

        try {
            $this->dbh = new PDO($dsn, 'root', '');
        } catch(PDOexception $e) {
            die($e->getMessage());
        }
    }

    public function getInfoDb() {
        $query = "
            SELECT (
                SELECT COUNT(*) FROM tbl_sas_siswa
            ) AS total_siswa,
            (
                SELECT COUNT(*) FROM tbl_sas_jurusan
            ) AS total_jurusan
        ";

        $this->stmt = $this->dbh->prepare($query);
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}


?>