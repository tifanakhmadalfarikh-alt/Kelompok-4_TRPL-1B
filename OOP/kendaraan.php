<?php

// Menggunakan keyword 'abstract' sesuai kriteria soal
abstract class Kendaraan {
    
    // Atribut dasar yang diwariskan ke semua subclass (menggunakan protected agar bisa diakses oleh subclass)
    protected $id_kendaraan;
    protected $brand;
    protected $model;
    protected $tahun;
    protected $hargaDasar;

    // Constructor untuk inisialisasi data saat objek kendaraan dibuat
    public function __construct($id_kendaraan, $brand, $model, $tahun, $hargaDasar) {
        $this->id_kendaraan = $id_kendaraan;
        $this->brand = $brand;
        $this->model = $model;
        $this->tahun = $tahun;
        $this->hargaDasar = $hargaDasar;
    }

    // Abstract method: Ini adalah "kontrak wajib" dari dosen. 
    // Subclass (MobilKonvensional, MobilListrik, dll) WAJIB membuat isi dari fungsi ini nanti.
    abstract public function hitungPajakTahunan();
    abstract public function tampilkanSpesifikasi();
}
?>