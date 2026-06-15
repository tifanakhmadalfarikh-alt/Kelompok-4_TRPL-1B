<?php
require_once '../koneksi/Koneksi.php'; 
require_once 'kendaraan.php';

class MotorBesar extends Kendaraan {
    
    public $tipeRantai;
    public $modeBerkendara;

    public function __construct($id_kendaraan = "", $brand = "", $model = "", $tahun = "", $hargaDasar = 0, $tipeRantai = "", $modeBerkendara = "") {
        if($id_kendaraan != "") {
            parent::__construct($id_kendaraan, $brand, $model, $tahun, $hargaDasar);
            $this->tipeRantai = $tipeRantai;
            $this->modeBerkendara = $modeBerkendara;
        }
    }

    public function hitungPajakTahunan() {
        return 0.015 * $this->hargaDasar;
    }

    public function tampilkanSpesifikasi() {
        return "Rantai: " . $this->tipeRantai . " | Mode: " . $this->modeBerkendara;
    }

    public function tampilkanSemuaData() {
        $database = new Koneksi();
        $conn = $database->getConnection(); 
        
        $query = "SELECT * FROM motor_besar";
        $result = $conn->query($query);
        $data = []; 
        
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data; 
    }
}
?>