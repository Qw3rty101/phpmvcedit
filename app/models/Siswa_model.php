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

    public function tambahSiswa()
    {
        $name = htmlspecialchars($_POST['name']);
        $nisn = htmlspecialchars($_POST['nisn']);
        $address = htmlspecialchars($_POST['address']);
        $nowa = htmlspecialchars($_POST['nowa']);
        $rombel = htmlspecialchars($_POST['rombel']);
        $jurusanValue = htmlspecialchars($_POST['jurusan']);
    
        // Periksa apakah nilai jurusan ada di tabel tbl_sas_jurusan
        $queryCheckJurusan = "SELECT id_jurusan, name_jurusan FROM tbl_sas_jurusan WHERE name_jurusan = :jurusan";
        $stmtCheckJurusan = $this->dbh->prepare($queryCheckJurusan);
        $stmtCheckJurusan->bindParam(':jurusan', $jurusanValue);
        $stmtCheckJurusan->execute();
        $resultJurusan = $stmtCheckJurusan->fetch(PDO::FETCH_ASSOC);
    
        if ($resultJurusan) {
            // Jika nilai jurusan ada di tbl_sas_jurusan
            $idJurusan = $resultJurusan['id_jurusan'];
            $nameJurusan = $resultJurusan['name_jurusan'];
    
            // Selanjutnya, masukkan data ke dalam tbl_sas_siswa
            $queryInsertSiswa = "INSERT INTO tbl_sas_siswa (name_siswa, nisn_siswa, address_siswa, noWA_siswa, id_jurusan, rombel_siswa, jurusan_siswa) 
                                 VALUES (:name, :nisn, :address, :noWA, :idJurusan, :rombel, :nameJurusan)";
            
            $this->stmt = $this->dbh->prepare($queryInsertSiswa);
            $this->stmt->bindParam(':name', $name);
            $this->stmt->bindParam(':nisn', $nisn);
            $this->stmt->bindParam(':address', $address);
            $this->stmt->bindParam(':noWA', $nowa);
            $this->stmt->bindParam(':idJurusan', $idJurusan);
            $this->stmt->bindParam(':rombel', $rombel);
            $this->stmt->bindParam(':nameJurusan', $nameJurusan);
    
            $this->stmt->execute();
    
            return $this->stmt->rowCount();
        } else {
            // Jika nilai jurusan tidak ditemukan di tbl_sas_jurusan
            return 0; // atau Anda dapat menangani kesalahan lain sesuai kebutuhan
        }
    }
    
    
}

?>