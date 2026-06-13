<?php

class Koneksi {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "showroom"; // Pastikan namanya sesuai dengan di phpMyAdmin

    protected $conn;

    public function __construct() {
        // Membuat koneksi menggunakan gaya OOP
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Mengecek apakah koneksi berhasil
        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }

    // Fungsi untuk memberikan akses koneksi ke file OOP lain
    public function getConnection() {
        return $this->conn;
    }
}

?>