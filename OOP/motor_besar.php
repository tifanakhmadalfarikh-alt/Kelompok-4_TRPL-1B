<?php
require_once 'kendaraan.php';

class MotorBesar extends Kendaraan {
    // Atribut tambahan khusus Motor Besar
    protected string $tipeRantai;
    protected string $modeBerkendara;

    // Setter khusus untuk mengisi atribut subclass
    public function setMotorBesarValues(string $rantai, string $mode): void {
        $this->tipeRantai = $rantai;
        $this->modeBerkendara = $mode;
    }

    // OVERRIDING: Rumus pajak 1.5% * hargaDasar
    public function hitungPajakTahunan(): float {
        return 0.015 * $this->hargaDasar;
    }

    // OVERRIDING: Tampilkan spesifikasi
    public function tampilkanSpesifikasi(): void {
        echo "Motor Besar: " . $this->brand . " " . $this->model . " (" . $this->tahun . ") - Mode: " . $this->modeBerkendara;
    }

    // Getter tambahan untuk kebutuhan Dashboard
    public function getTipeRantai(): string { return $this->tipeRantai; }
    public function getModeBerkendara(): string { return $this->modeBerkendara; }
}
?>