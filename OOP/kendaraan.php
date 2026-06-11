<?php

abstract class Kendaraan {
    // Atribut dasar menggunakan visibility 'protected' 
    protected string $id_kendaraan;
    protected string $brand;
    protected string $model;
    protected int $tahun;
    protected float $hargaDasar;

    // Abstract method: Memaksa subclass untuk membuat logika perhitungan pajak
    abstract public function hitungPajakTahunan(): float;
    
    // Abstract method: Memaksa subclass untuk membuat format tampilan spesifikasinya sendiri
    abstract public function tampilkanSpesifikasi(): void;

    // --- TAMBAHAN: Fungsi GETTER (Agar data bisa dibaca di Dashboard) ---
    public function getIdKendaraan(): string { return $this->id_kendaraan; }
    public function getBrand(): string { return $this->brand; }
    public function getModel(): string { return $this->model; }
    public function getTahun(): int { return $this->tahun; }
    public function getHargaDasar(): float { return $this->hargaDasar; }

    // --- TAMBAHAN: Fungsi SETTER (Untuk mengisi data dari form tanpa constructor) ---
    public function setBaseValues(string $id, string $brand, string $model, int $tahun, float $harga): void {
        $this->id_kendaraan = $id;
        $this->brand = $brand;
        $this->model = $model;
        $this->tahun = $tahun;
        $this->hargaDasar = $harga;
    }
}

?>