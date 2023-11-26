<?php

class Siswa_model {

    private $dbh;
    private $stmt;

    public function __construct() {
        $dsn = 'mysql:host=localhost;dbname=sas_db;';

        try {
            $this->dbh = new PDO($dsn, 'root', '');
        } catch(PDOexception $e) {
            die($e->getSiswa());
        }
    }

    public function getSiswa() {
        $this->stmt = $this->dbh->prepare('SELECT * FROM tbl_sas_siswa');
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>