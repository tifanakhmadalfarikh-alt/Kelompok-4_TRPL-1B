<?php
require_once '../koneksi/Koneksi.php'; 
require_once 'kendaraan.php';

class MobilListrik extends Kendaraan {
    
    public $kapasitasBaterai;
    public $jarakTempuh;

    public function __construct($id_kendaraan = "", $brand = "", $model = "", $tahun = "", $hargaDasar = 0, $kapasitasBaterai = 0, $jarakTempuh = 0) {
        if($id_kendaraan != "") {
            parent::__construct($id_kendaraan, $brand, $model, $tahun, $hargaDasar);
            $this->kapasitasBaterai = $kapasitasBaterai;
            $this->jarakTempuh = $jarakTempuh;
        }
    }

    public function hitungPajakTahunan() {
        return 0.005 * $this->hargaDasar;
    }

    // INI FUNGSI YANG TADI MENGHILANG DAN BIKIN ERROR
    public function tampilkanSpesifikasi() {
        return "Baterai: " . $this->kapasitasBaterai . " kWh | Jarak: " . $this->jarakTempuh . " km";
    }

    public function tampilkanSemuaData() {
        $database = new Koneksi();
        $conn = $database->getConnection(); 
        
        $query = "SELECT * FROM mobil_listrik";
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