<?php
// 1. Panggil file class dari folder OOP
require_once '../OOP/mobil_konvensional.php';

// 2. Buat objek dari class tersebut
$objMobil = new MobilKonvensional();

// 3. Ambil datanya menggunakan fungsi yang sudah dibuat si A
$dataMobilKonvensional = $objMobil->tampilkanSemuaData();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Showroom Kelompok 4</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h1>Sistem Manajemen Showroom KELOMPOK 4</h1>

    <h2>Daftar Mobil Konvensional</h2>
    <table>
        <thead>
            <tr>
                <th>ID Kendaraan</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Tahun</th>
                <th>Harga Dasar</th>
                <th>Kapasitas Mesin</th>
                <th>Bahan Bakar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataMobilKonvensional as $mobil) : ?>
                <tr>
                    <td><?= $mobil['id_kendaraan'] ?></td>
                    <td><?= $mobil['brand'] ?></td>
                    <td><?= $mobil['model'] ?></td>
                    <td><?= $mobil['tahun'] ?></td>
                    <td>Rp <?= number_format($mobil['harga_dasar'], 0, ',', '.') ?></td>
                    <td><?= $mobil['kapasitas_mesin'] ?> cc</td>
                    <td><?= $mobil['jenis_bahan_bakar'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>