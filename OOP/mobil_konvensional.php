<?php
// 1. Panggil file koneksi dan file induk abstrak
require_once '../koneksi/Koneksi.php'; 
require_once 'kendaraan.php';

// 2. PILAR PEWARISAN
class MobilKonvensional extends Kendaraan {
    
    public $kapasitasMesin;
    public $jenisBahanBakar;

    public function __construct($id_kendaraan = "", $brand = "", $model = "", $tahun = "", $hargaDasar = 0, $kapasitasMesin = 0, $jenisBahanBakar = "") {
        if($id_kendaraan != "") {
            parent::__construct($id_kendaraan, $brand, $model, $tahun, $hargaDasar);
            $this->kapasitasMesin = $kapasitasMesin;
            $this->jenisBahanBakar = $jenisBahanBakar;
        }
    }

    // 3. POLIMORFISME: Perhitungan Pajak
    public function hitungPajakTahunan() {
        return (0.02 * $this->hargaDasar) + ($this->kapasitasMesin * 500);
    }

    public function tampilkanSpesifikasi() {
        return "Mesin: " . $this->kapasitasMesin . " cc | BBM: " . $this->jenisBahanBakar;
    }

    // 4. Tarikan Database
    public function tampilkanSemuaData() {
        $database = new Koneksi();
        $conn = $database->getConnection(); 
        
        $query = "SELECT * FROM mobil_konvensional";
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