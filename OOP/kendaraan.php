<?php
abstract class Kendaraan {
    protected string $idKendaraan;
    protected string $brand;
    protected string $model;
    protected int $tahun;
    protected float $hargaDasar;

    // Method untuk mengisi data dasar dari database
    public function setBaseValues(string $id, string $brand, string $model, int $tahun, float $hargaDasar): void {
        $this->idKendaraan = $id;
        $this->brand = $brand;
        $this->model = $model;
        $this->tahun = $tahun;
        $this->hargaDasar = $hargaDasar;
    }

    // Getter untuk digunakan di halaman view/dashboard
    public function getIdKendaraan(): string { return $this->idKendaraan; }
    public function getBrand(): string { return $this->brand; }
    public function getModel(): string { return $this->model; }
    public function getTahun(): int { return $this->tahun; }
    public function getHargaDasar(): float { return $this->hargaDasar; }

    // Method abstrak yang wajib diimplementasikan oleh semua subclass
    abstract public function hitungPajakTahunan(): float;
    abstract public function tampilkanSpesifikasi(): void;
}
?>