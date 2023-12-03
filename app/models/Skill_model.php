<?php

class Skill_model {

    private $table = 'tbl_sas_skills';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getSkill() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function addSkill($data) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once '../app/core/Database.php'; // Sesuaikan dengan nama file koneksi Anda
        
            $database = new Database(); // Perbaiki penulisan nama kelas
            $koneksi = $database->getConnection();
        
            // Pastikan sesi telah dimulai
            // session_start();

            // Ambil data dari formulir
            $judul = htmlspecialchars($_POST['title']);
            $deskripsi = htmlspecialchars($_POST['deks']);
            $link = htmlspecialchars($_POST['link']);
        
            // Ambil ID pengguna dari sesi
            $email = $_SESSION['email']; // Gantilah dengan kunci sesi yang sesuai
        
            $query = "SELECT * FROM tbl_sas_admin WHERE email_admin = '$email'";
            $result = $koneksi->query($query);
            
            if ($result) {
                $row = $result->fetch(PDO::FETCH_ASSOC); // Menggunakan PDO::FETCH_ASSOC
                $sesi = $row['id_admin'];
        
                // Lakukan validasi atau proses lain yang diperlukan
        
                // Simpan data ke database
                $query = "INSERT INTO tbl_sas_skills (
                    id_skill, id_admin, title_skill, deks_skill, link_skill, created_by, created_at
                    ) VALUES (
                        '',
                        $sesi,
                        '$judul', 
                        '$deskripsi', 
                        '$link', 
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

    public function delSkill($id)
    {
        $query = "DELETE FROM tbl_sas_skills WHERE id_skill = $id";
        
        $this->db->query($query);
        // $this->db->bind('id_ann', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
?>
