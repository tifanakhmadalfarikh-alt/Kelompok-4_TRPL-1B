<?php
require_once 'kendaraan.php';

class MobilListrik extends Kendaraan {
    // Atribut tambahan khusus Mobil Listrik
    protected float $kapasitasBaterai;
    protected int $jarakTempuh;

    // Setter khusus untuk mengisi atribut subclass
    public function setMobilListrikValues(float $kwh, int $jarak): void {
        $this->kapasitasBaterai = $kwh;
        $this->jarakTempuh = $jarak;
    }

    // OVERRIDING: Rumus pajak 0.5% * hargaDasar
    public function hitungPajakTahunan(): float {
        return 0.005 * $this->hargaDasar;
    }

    // OVERRIDING: Tampilkan spesifikasi
    public function tampilkanSpesifikasi(): void {
        echo "Mobil Listrik: " . $this->brand . " " . $this->model . " (" . $this->tahun . ") - Baterai: " . $this->kapasitasBaterai . " kWh";
    }

    // Getter tambahan untuk kebutuhan Dashboard
    public function getKapasitasBaterai(): float { return $this->kapasitasBaterai; }
    public function getJarakTempuh(): int { return $this->jarakTempuh; }
}
?>