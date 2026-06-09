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
}

?>