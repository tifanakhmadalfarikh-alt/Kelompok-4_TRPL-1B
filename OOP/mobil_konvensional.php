<?php
<<<<<<< Updated upstream
require_once 'Kendaraan.php';

class MobilKonvensional extends Kendaraan {
    protected int $kapasitasMesin;
    protected string $jenisBahanBakar;

    public function setMobilKonvensionalValues(int $kapasitasMesin, string $jenisBahanBakar): void {
        $this->kapasitasMesin = $kapasitasMesin;
        $this->jenisBahanBakar = $jenisBahanBakar;
    }

    public function hitungPajakTahunan(): float {
        // Contoh: Pajak mobil konvensional bertarif 2% dari harga dasar
        return 0.02 * $this->hargaDasar;
    }

    public function tampilkanSpesifikasi(): void {
        echo "Mobil Konvensional: " . $this->brand . " " . $this->model . " (" . $this->tahun . ") - Mesin: " . $this->kapasitasMesin . " cc, Bahan Bakar: " . $this->jenisBahanBakar . ".";
    }

    // Getter tambahan untuk view
    public function getKapasitasMesin(): int { return $this->kapasitasMesin; }
    public function getJenisBahanBakar(): string { return $this->jenisBahanBakar; }
=======
// Memanggil file koneksi
require_once '../koneksi/Koneksi.php'; 

class MobilKonvensional {
    
    public function tampilkanSemuaData() {
        // 1. Membuat objek dari class Koneksi
        $database = new Koneksi();
        // 2. Mengambil jembatan koneksinya
        $conn = $database->getConnection(); 
        
        $query = "SELECT * FROM mobil_konvensional";
        // 3. Mengeksekusi query dengan gaya OOP murni
        $result = $conn->query($query);
        
        $data = []; 
        
        // 4. Memasukkan data ke wadah jika berhasil ditemukan
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        
        return $data; 
    }
>>>>>>> Stashed changes
}
?>