<?php

abstract class Kendaraan {
    // Atribut dasar menggunakan visibility 'protected' 
    // agar bisa diakses langsung oleh subclass turunannya.
    protected string $id_kendaraan;
    protected string $brand;
    protected string $model;
    protected int $tahun;
    protected float $hargaDasar;

    // Constructor di PHP menggunakan magic method __construct
    public function __construct(string $id_kendaraan, string $brand, string $model, int $tahun, float $hargaDasar) {
        $this->id_kendaraan = $id_kendaraan;
        $this->brand = $brand;
        $this->model = $model;
        $this->tahun = $tahun;
        $this->hargaDasar = $hargaDasar;
    }

    // Abstract method: Memaksa subclass untuk membuat logika perhitungan pajak
    // Mengembalikan nilai float (desimal) untuk hasil perhitungan pajak
    abstract public function hitungPajakTahunan(): float;
    
    // Abstract method: Memaksa subclass untuk membuat format tampilan spesifikasinya sendiri
    // Menggunakan tipe kembalian void karena hanya menampilkan output
    abstract public function tampilkanSpesifikasi(): void;
}

?>