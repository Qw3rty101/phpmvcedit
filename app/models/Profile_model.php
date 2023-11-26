<?php

class Profile_model {
    private $dbh;
    private $stmt;

    public function __construct() {
        $dsn = 'mysql:host=localhost;dbname=sas_db;';

        try {
            $this->dbh = new PDO($dsn, 'root', '');
            // Atur PDO untuk melempar pengecualian jika ada kesalahan
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function siswaProfile($id)
    {
        $query = "SELECT * FROM tbl_sas_siswa WHERE id_siswa = :id";
        $this->stmt = $this->dbh->prepare($query);
        $this->stmt->bindParam(':id', $id);
        $this->stmt->execute();

        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editData($data) {

        function upload() {
    
            $namaFile = $_FILES['foto']['name'];
            $ukuranFile = $_FILES['foto']['size'];
            $error = $_FILES['foto']['error'];
            $tmpName = $_FILES['foto']['tmp_name'];
        
            // cek apakah tidak ada gambar yang diupload
            if( $error === 4 ) {
                echo "<script>
                        alert('pilih gambar terlebih dahulu!');
                      </script>";
                return false;
            }
        
            // cek apakah yang diupload adalah gambar
            $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));
            if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
                echo "<script>
                        alert('yang anda upload bukan gambar!');
                      </script>";
                return false;
            }
        
            // cek jika ukurannya terlalu besar
            if( $ukuranFile > 1000000 ) {
                echo "<script>
                        alert('ukuran gambar terlalu besar!');
                      </script>";
                return false;
            }
        
            // lolos pengecekan, gambar siap diupload
            // generate nama gambar baru
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;
        
            move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
        
            return $namaFileBaru;
        }
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once '../app/core/Database.php';
    
            $database = new Database();
            $koneksi = $database->getConnection();
    
            // Pastikan sesi telah dimulai
            session_start();
    
            // Ambil data dari formulir
            $sesiedit = $_SESSION['siswa']; 
            $nama = htmlspecialchars($_POST['name']);
            $nisn = htmlspecialchars($_POST['nisn']);
            $address = htmlspecialchars($_POST['address']);
            $nowa = htmlspecialchars($_POST['noWA']);
            $rombel = htmlspecialchars($_POST['rombel']);
            $jurusan = htmlspecialchars($_POST['jurusan']);
            $foto = upload();
    
            // Ambil ID pengguna dari sesi
            $query = "SELECT * FROM tbl_sas_siswa WHERE id_siswa = ?";
            $statement = $koneksi->prepare($query);
            $statement->execute([$sesiedit]);
    
            if ($statement) {
                $row = $statement->fetch(PDO::FETCH_ASSOC); 
                $sesi = $row['id_siswa'];
    
                // Lakukan validasi atau proses lain yang diperlukan
    
                // Edit data di database
                // Hanya jika ada gambar yang diupload, lakukan update pada kolom foto
                if ($foto !== false) {
                    $query = "UPDATE tbl_sas_siswa SET
                                name_siswa = ?, 
                                nisn_siswa = ?, 
                                address_siswa = ?, 
                                noWA_siswa = ?, 
                                rombel_siswa = ?, 
                                jurusan_siswa = ?, 
                                foto_siswa = ?, 
                                updated_at = NOW(),
                                updated_by = ? 
                                WHERE id_siswa = ?";
    
                    $statement = $koneksi->prepare($query);
                    
                    // Jumlah variabel terikat harus sesuai dengan jumlah parameter dalam execute
                    $exec_result = $statement->execute([$nama, $nisn, $address, $nowa, $rombel, $jurusan, $foto, $sesi, $sesiedit]);
    
                    if ($exec_result !== FALSE) {
                        // Data berhasil diubah
                    } else {
                        echo "Error: " . $query . "<br>" . implode(', ', $statement->errorInfo());
                    }
                } else {
                    $query = "UPDATE tbl_sas_siswa SET
                                name_siswa = ?, 
                                nisn_siswa = ?, 
                                address_siswa = ?, 
                                noWA_siswa = ?, 
                                rombel_siswa = ?, 
                                jurusan_siswa = ?, 
                                -- foto_siswa = ?, 
                                updated_at = NOW(),
                                updated_by = ? 
                                WHERE id_siswa = ?";
    
                    $statement = $koneksi->prepare($query);
                    
                    $exec_result = $statement->execute([$nama, $nisn, $address, $nowa, $rombel, $jurusan, $sesi, $sesiedit]);
    
                    if ($exec_result !== FALSE) {
                        // Data berhasil diubah
                    } else {
                        // Tidak berhasil mengubah data
                        echo "Error: " . $query . "<br>" . implode(', ', $statement->errorInfo());
                    }
                }
            } else {
                echo "Error: " . $query . "<br>" . implode(', ', $statement->errorInfo());
            }
    
            $koneksi = null;
        }
    }
    
}
