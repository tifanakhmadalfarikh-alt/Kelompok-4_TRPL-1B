<?php
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
}
?>