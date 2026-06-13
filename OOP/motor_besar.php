<?php
require_once 'Kendaraan.php';

class MotorBesar extends Kendaraan {
    protected string $tipeRantai;
    protected string $modeBerkendara;

    public function setMotorBesarValues(string $tipeRantai, string $modeBerkendara): void {
        $this->tipeRantai = $tipeRantai;
        $this->modeBerkendara = $modeBerkendara;
    }

    public function hitungPajakTahunan(): float {
        // Contoh: Pajak motor besar bertarif 1.5% dari harga dasar
        return 0.015 * $this->hargaDasar;
    }

    public function tampilkanSpesifikasi(): void {
        echo "Motor Besar: " . $this->brand . " " . $this->model . " (" . $this->tahun . ") - Rantai: " . $this->tipeRantai . ", Mode: " . $this->modeBerkendara . ".";
    }

    // Getter tambahan untuk view
    public function getTipeRantai(): string { return $this->tipeRantai; }
    public function getModeBerkendara(): string { return $this->modeBerkendara; }
}
?>