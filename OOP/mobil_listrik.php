<?php
require_once 'Kendaraan.php';

class MobilListrik extends Kendaraan {
    protected float $kapasitasBaterai;
    protected int $jarakTempuh;

    public function setMobilListrikValues(float $kapasitasBaterai, int $jarakTempuh): void {
        $this->kapasitasBaterai = $kapasitasBaterai;
        $this->jarakTempuh = $jarakTempuh;
    }

    public function hitungPajakTahunan(): float {
        // Contoh: Pajak mobil listrik sangat murah, misal 0.1% dari harga dasar
        return 0.001 * $this->hargaDasar;
    }

    public function tampilkanSpesifikasi(): void {
        echo "Mobil Listrik: " . $this->brand . " " . $this->model . " (" . $this->tahun . ") - Baterai: " . $this->kapasitasBaterai . " kWh, Jarak Tempuh: " . $this->jarakTempuh . " km.";
    }

    // Getter tambahan untuk view
    public function getKapasitasBaterai(): float { return $this->kapasitasBaterai; }
    public function getJarakTempuh(): int { return $this->jarakTempuh; }
}
?>