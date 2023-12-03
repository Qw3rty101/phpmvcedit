<?php

class pkl_model {

    private $table = 'tbl_sas_pkl';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPkl() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function addPkl($data) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once '../app/core/Database.php'; // Sesuaikan dengan nama file koneksi Anda
        
            $database = new Database(); // Perbaiki penulisan nama kelas
            $koneksi = $database->getConnection();
        
            // Pastikan sesi telah dimulai
            session_start();

            // Ambil data dari formulir
            $judul = htmlspecialchars($_POST['title']);
            $deskripsi = htmlspecialchars($_POST['deks']);
            $jumlah = htmlspecialchars($_POST['jml']);
        
            // Ambil ID pengguna dari sesi
            $email = $_SESSION['email']; // Gantilah dengan kunci sesi yang sesuai
        
            $query = "SELECT * FROM tbl_sas_admin WHERE email_admin = '$email'";
            $result = $koneksi->query($query);
            
            if ($result) {
                $row = $result->fetch(PDO::FETCH_ASSOC); // Menggunakan PDO::FETCH_ASSOC
                $sesi = $row['id_admin'];
        
                // Lakukan validasi atau proses lain yang diperlukan
        
                // Simpan data ke database
                $query = "INSERT INTO tbl_sas_pkl (
                    id_info, id_admin, title_info, deks_info, jml_pendaftar, created_by, created_at
                    ) VALUES (
                        '',
                        $sesi,
                        '$judul', 
                        '$deskripsi', 
                        '$jumlah', 
                        '$sesi', 
                        NOW()
                        )";
        
                if ($koneksi->exec($query) !== FALSE) {
                    // header('Refresh: 0');
                } else {
                    echo "Error: " . $query . "<br>" . implode(', ', $koneksi->errorInfo());
                }
            } else {
                echo "Error: " . $query . "<br>" . implode(', ', $koneksi->errorInfo());
            }
        
            $koneksi = null; // Tutup koneksi setelah digunakan
        }
    }

    public function delPkl($id)
    {
        // Hapus data dari tbl_sas_pkl
        $query1 = "DELETE FROM tbl_sas_pkl WHERE id_info = :id";
        $this->db->query($query1);
        $this->db->bind('id', $id);
        $this->db->execute();
    
        // Hapus data dari tbl_pkl_daftar
        $query2 = "DELETE FROM tbl_pkl_daftar WHERE id_info = :id";
        $this->db->query($query2);
        $this->db->bind('id', $id);
        $this->db->execute();
    
        return $this->db->rowCount();
    }

    public function countPendaftar($id)
    {
        $query = "SELECT COUNT(*) as total FROM `tbl_pkl_daftar` WHERE id_info = :id_info";
        $this->db->query($query);
        $this->db->bind('id_info', $id);
        $this->db->execute();
    
        return $this->db->single()['total'];
    }
    

    public function daftar($id)
    {
    
        // Check if id_siswa already exists
        $checkQuery = "SELECT COUNT(*) as total FROM `tbl_pkl_daftar` WHERE id_siswa = :id_siswa";
        $this->db->query($checkQuery);
        $this->db->bind('id_siswa', $_SESSION['siswa']);
        $result = $this->db->single();
    
        // If id_siswa already exists, don't proceed with the insert
        if ($result['total'] > 0) {
            return false; // or you can return an error message
        }
    
        // Get the total number of registrations for the specified id_info
        $countQuery = "SELECT COUNT(*) as total FROM `tbl_pkl_daftar` WHERE id_info = :id_info";
        $this->db->query($countQuery);
        $this->db->bind('id_info', $id);
        $result = $this->db->single();
        $jmlPendaftar = $result['total'];
    
        // Replace 'jml_pendaftar' with the actual limit from the database
        $limitQuery = "SELECT jml_pendaftar FROM `tbl_sas_pkl` WHERE id_info = :id_info";
        $this->db->query($limitQuery);
        $this->db->bind('id_info', $id);
        $result = $this->db->single();
        $limit = $result['jml_pendaftar'];
    
        if ($jmlPendaftar < $limit) {
            // If id_siswa doesn't exist and the limit is not reached, proceed with the insert
            $insertQuery = "INSERT INTO tbl_pkl_daftar (id_info, id_siswa) VALUES (:id_info, :id_siswa)";
            $this->db->query($insertQuery);
            $this->db->bind('id_info', $id);
            $this->db->bind('id_siswa', $_SESSION['siswa']);
    
            return $this->db->execute();
        } else {
            return false;
        }
    }

    public function delSis($id) 
    {
        $query = "DELETE FROM tbl_pkl_daftar WHERE id_daftar = $id";
        
        $this->db->query($query);
        // $this->db->bind('id_ann', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    
    
    public function downloadPkl()
    {
        $this->db->query('SELECT
        pkl_daftar.id_daftar,
        pkl_daftar.id_info,
        pkl_daftar.id_siswa,
        pkl.title_info,
        siswa.name_siswa,
        siswa.rombel_siswa,
        siswa.noWA_siswa
        FROM
            tbl_pkl_daftar AS pkl_daftar
        JOIN
            tbl_sas_pkl AS pkl ON pkl_daftar.id_info = pkl.id_info
        JOIN
            tbl_sas_siswa AS siswa ON pkl_daftar.id_siswa = siswa.id_siswa;
        ');
        return $this->db->resultSet();
    }
    
    
    
    
    
}
?>
