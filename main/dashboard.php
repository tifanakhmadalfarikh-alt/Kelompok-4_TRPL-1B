<?php
require_once '../OOP/mobil_konvensional.php';
require_once '../OOP/mobil_listrik.php';
require_once '../OOP/motor_besar.php';

// Memanggil fungsi penarik data
$dbKonvensional = new MobilKonvensional();
$dataMobilKonvensional = $dbKonvensional->tampilkanSemuaData();

$dbListrik = new MobilListrik();
$dataMobilListrik = $dbListrik->tampilkanSemuaData();

$dbMoge = new MotorBesar();
$dataMotorBesar = $dbMoge->tampilkanSemuaData();

// Menggabungkan semua data untuk Master Tabel
$semuaKendaraan = [];
foreach ($dataMobilKonvensional as $item) { $item['kategori'] = 'Mobil Konvensional'; $item['warna_badge'] = 'bg-primary'; $semuaKendaraan[] = $item; }
foreach ($dataMobilListrik as $item) { $item['kategori'] = 'Mobil Listrik'; $item['warna_badge'] = 'bg-success'; $semuaKendaraan[] = $item; }
foreach ($dataMotorBesar as $item) { $item['kategori'] = 'Motor Besar'; $item['warna_badge'] = 'bg-secondary'; $semuaKendaraan[] = $item; }
usort($semuaKendaraan, function($a, $b) { return $b['tahun'] <=> $a['tahun']; });

// Menghitung total data
$totalKonvensional = count($dataMobilKonvensional);
$totalListrik = count($dataMobilListrik);
$totalMoge = count($dataMotorBesar);
$totalKendaraan = count($semuaKendaraan);

// Routing PHP
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Showroom Kelompok 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { 
            background-color: #f8f9fa; /* Dikembalikan ke terang agar netral */
            font-family: 'Poppins', sans-serif; 
        }
        
        /* Sidebar */
        /* Sidebar Mewah & Terkunci (Sticky) */
        .sidebar { 
            background-color: #1e293b; 
            height: 100vh; /* Mutlak 100vh agar sticky bekerja */
            position: sticky; 
            top: 0; 
            border-right: 1px solid #334155;
            overflow-y: auto; /* Scroll mandiri */
        }
        
        /* Modifikasi Scrollbar */
        .sidebar::-webkit-scrollbar { width: 6px; }
        .sidebar::-webkit-scrollbar-thumb { background: #334155; border-radius: 10px; }
        
        .sidebar .brand { 
            background: linear-gradient(90deg, #3b82f6, #8b5cf6); 
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            padding: 20px 15px; font-weight: 700; text-align: center; font-size: 1.4rem; letter-spacing: 1px;
        }
        
        /* --- INI ADALAH KODE YANG TIDAK SENGAJA TERHAPUS TADI --- */
        .sidebar a { 
            color: #94a3b8; text-decoration: none; padding: 14px 20px; display: block; 
            border-left: 4px solid transparent; transition: all 0.3s ease; font-weight: 400;
        }
        .sidebar a:hover, .sidebar a.active { 
            background-color: #0f172a; color: #fff; border-left: 4px solid #3b82f6; 
        }
        .sidebar i { width: 30px; font-size: 1.1rem; }
        
        .main-content { padding: 30px; }
        .page-title { font-weight: 700; letter-spacing: 1px; color: #334155; }
        
        /* Kartu Ringkasan */
        .stat-card { 
            border-radius: 16px; border: none; overflow: hidden; position: relative; color: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .stat-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.15); }
        .stat-card .inner { padding: 25px; z-index: 2; position: relative; }
        .stat-card h3 { font-size: 3rem; font-weight: 700; margin: 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.2); }
        .stat-card p { font-size: 1rem; font-weight: 300; letter-spacing: 1px; margin-bottom: 0; opacity: 0.9; }
        .stat-card .icon { position: absolute; top: -10px; right: -10px; font-size: 7rem; opacity: 0.15; z-index: 1; transition: 0.5s ease; }
        .stat-card:hover .icon { transform: scale(1.1) rotate(-5deg); opacity: 0.25; }
        .stat-card .small-box-footer { 
            background: rgba(0,0,0,0.2); backdrop-filter: blur(5px);
            display: block; padding: 10px 0; text-align: center; color: rgba(255,255,255,0.8); text-decoration: none; 
            z-index: 2; position: relative; font-weight: 300; transition: background 0.3s;
        }
        .stat-card .small-box-footer:hover { color: white; background: rgba(0,0,0,0.4); }

        /* Custom Gradients */
        .grad-info { background: linear-gradient(135deg, #0ea5e9, #2563eb); }
        .grad-primary { background: linear-gradient(135deg, #8b5cf6, #4f46e5); }
        .grad-success { background: linear-gradient(135deg, #10b981, #059669); }
        .grad-dark { background: linear-gradient(135deg, #475569, #1e293b); }

        /* Tables */
        .table-card { 
            background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.05); overflow: hidden; 
        }
        .table-card .card-header { border-bottom: 1px solid #e2e8f0; padding: 15px 20px; background-color: #f8fafc; }
        .table th { background-color: #f1f5f9; color: #475569; font-weight: 600; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px; }
        .table td { vertical-align: middle; padding: 15px; border-bottom: 1px solid #e2e8f0; }
        
        .badge { padding: 8px 12px; font-weight: 400; border-radius: 6px; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-2 p-0 sidebar d-none d-md-block">
            <div class="brand">
                <i class="fas fa-car-side"></i> KELOMPOK 4
            </div>
            <nav class="mt-3">
                <a href="?page=home" class="<?= $page == 'home' ? 'active' : '' ?>"><i class="fas fa-border-all"></i> Dashboard</a>
                <a href="?page=semua" class="<?= $page == 'semua' ? 'active' : '' ?>"><i class="fas fa-layer-group"></i> Semua Data</a>
                <a href="?page=konvensional" class="<?= $page == 'konvensional' ? 'active' : '' ?>"><i class="fas fa-gas-pump"></i> Konvensional</a>
                <a href="?page=listrik" class="<?= $page == 'listrik' ? 'active' : '' ?>"><i class="fas fa-bolt"></i> Mobil Listrik</a>
                <a href="?page=moge" class="<?= $page == 'moge' ? 'active' : '' ?>"><i class="fas fa-motorcycle"></i> Motor Besar</a>
                <hr class="mx-3" style="border-color: #334155;">
                <a href="tambah_data.php" class="text-info"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                <a href="#" class="text-danger"><i class="fas fa-power-off"></i> Logout</a>
            </nav>
        </div>

        <div class="col-md-10 main-content">
            
            <?php if ($page == 'home'): ?>
                <div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 85vh;">
                    <div class="w-100">
                        <p class="text-center text-primary mb-1 fw-bold" style="letter-spacing: 3px; font-size: 0.9rem;">SISTEM MANAJEMEN INVENTARIS</p>
                        <h4 class="page-title text-center border-0 mb-5 fs-2">EXECUTIVE DASHBOARD</h4>

                        <div class="row justify-content-center mb-4 px-xl-5">
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card stat-card grad-info">
                                    <div class="inner"><h3><?= $totalKendaraan ?></h3><p>TOTAL INVENTARIS</p></div>
                                    <i class="fas fa-warehouse icon"></i>
                                    <a href="?page=semua" class="small-box-footer">Analisis Data <i class="fas fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card stat-card grad-primary">
                                    <div class="inner"><h3><?= $totalKonvensional ?></h3><p>KONVENSIONAL</p></div>
                                    <i class="fas fa-car icon"></i>
                                    <a href="?page=konvensional" class="small-box-footer">Analisis Data <i class="fas fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card stat-card grad-success">
                                    <div class="inner"><h3><?= $totalListrik ?></h3><p>UNIT LISTRIK (EV)</p></div>
                                    <i class="fas fa-leaf icon"></i>
                                    <a href="?page=listrik" class="small-box-footer">Analisis Data <i class="fas fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card stat-card grad-dark">
                                    <div class="inner"><h3><?= $totalMoge ?></h3><p>MOTOR BESAR</p></div>
                                    <i class="fas fa-motorcycle icon"></i>
                                    <a href="?page=moge" class="small-box-footer">Analisis Data <i class="fas fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php elseif ($page == 'semua'): ?>
                <h4 class="page-title mb-4"><i class="fas fa-layer-group text-info me-2"></i> MASTER DATA INVENTARIS</h4>
                <div class="card table-card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped text-center align-middle">
                                <thead>
                                    <tr><th>Kategori</th><th>ID</th><th>Brand & Model</th><th>Tahun</th><th>Harga Dasar</th></tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($semuaKendaraan as $row) : ?>
                                        <tr>
                                            <td><span class="badge <?= $row['warna_badge'] ?>"><?= $row['kategori'] ?></span></td>
                                            <td class="text-info fw-bold text-nowrap"><?= $row['id_kendaraan'] ?></td>
                                            <td class="fw-bold text-dark text-start"><?= $row['brand'] ?> <?= $row['model'] ?></td>
                                            <td><span class="badge bg-secondary"><?= $row['tahun'] ?></span></td>
                                            <td class="text-success fw-bold text-nowrap">Rp <?= number_format($row['harga_dasar'], 0, ',', '.') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            <?php elseif ($page == 'konvensional'): ?>
                <h4 class="page-title mb-4"><i class="fas fa-gas-pump text-primary me-2"></i> INVENTARIS MOBIL KONVENSIONAL</h4>
                <div class="card table-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="text-muted"><i class="fas fa-info-circle me-1"></i> Menampilkan unit berbahan bakar fosil</span>
                        <span class="badge bg-primary">Fiskal: 2% + (CC x 500)</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped text-center align-middle">
                                <thead><tr><th>ID</th><th>Brand & Model</th><th>Tahun</th><th>Harga Dasar</th><th>Spesifikasi</th><th>Beban Fiskal</th></tr></thead>
                                <tbody>
                                    <?php foreach ($dataMobilKonvensional as $row) : 
                                        $mobil = new MobilKonvensional($row['id_kendaraan'], $row['brand'], $row['model'], $row['tahun'], $row['harga_dasar'], $row['kapasitas_mesin'], $row['jenis_bahan_bakar']);
                                    ?>
                                        <tr>
                                            <td class="text-primary fw-bold text-nowrap"><?= $row['id_kendaraan'] ?></td>
                                            <td class="fw-bold text-dark text-start"><?= $row['brand'] ?> <?= $row['model'] ?></td>
                                            <td><?= $row['tahun'] ?></td>
                                            <td class="text-success fw-bold text-nowrap">Rp <?= number_format($row['harga_dasar'], 0, ',', '.') ?></td>
                                            <td class="text-start text-muted"><?= $mobil->tampilkanSpesifikasi() ?></td>
                                            <td class="text-danger fw-bold text-nowrap">Rp <?= number_format($mobil->hitungPajakTahunan(), 0, ',', '.') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            <?php elseif ($page == 'listrik'): ?>
                <h4 class="page-title mb-4"><i class="fas fa-bolt text-success me-2"></i> INVENTARIS MOBIL LISTRIK (EV)</h4>
                <div class="card table-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="text-muted"><i class="fas fa-info-circle me-1"></i> Menampilkan unit beremisi nol</span>
                        <span class="badge bg-success">Insentif Fiskal: 0.5%</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped text-center align-middle">
                                <thead><tr><th>ID</th><th>Brand & Model</th><th>Tahun</th><th>Harga Dasar</th><th>Spesifikasi</th><th>Beban Fiskal</th></tr></thead>
                                <tbody>
                                    <?php foreach ($dataMobilListrik as $row) : 
                                        $listrik = new MobilListrik($row['id_kendaraan'], $row['brand'], $row['model'], $row['tahun'], $row['harga_dasar'], $row['kapasitas_baterai'], $row['jarak_tempuh']);
                                    ?>
                                        <tr>
                                            <td class="text-success fw-bold text-nowrap"><?= $row['id_kendaraan'] ?></td>
                                            <td class="fw-bold text-dark text-start"><?= $row['brand'] ?> <?= $row['model'] ?></td>
                                            <td><?= $row['tahun'] ?></td>
                                            <td class="text-success fw-bold text-nowrap">Rp <?= number_format($row['harga_dasar'], 0, ',', '.') ?></td>
                                            <td class="text-start text-muted"><?= $listrik->tampilkanSpesifikasi() ?></td>
                                            <td class="text-danger fw-bold text-nowrap">Rp <?= number_format($listrik->hitungPajakTahunan(), 0, ',', '.') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            <?php elseif ($page == 'moge'): ?>
                <h4 class="page-title mb-4"><i class="fas fa-motorcycle text-secondary me-2"></i> INVENTARIS MOTOR BESAR</h4>
                <div class="card table-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="text-muted"><i class="fas fa-info-circle me-1"></i> Menampilkan unit roda dua > 250cc</span>
                        <span class="badge bg-secondary">Fiskal: 1.5%</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped text-center align-middle">
                                <thead><tr><th>ID</th><th>Brand & Model</th><th>Tahun</th><th>Harga Dasar</th><th>Spesifikasi</th><th>Beban Fiskal</th></tr></thead>
                                <tbody>
                                    <?php foreach ($dataMotorBesar as $row) : 
                                        $moge = new MotorBesar($row['id_kendaraan'], $row['brand'], $row['model'], $row['tahun'], $row['harga_dasar'], $row['tipe_rantai'], $row['mode_berkendara']);
                                    ?>
                                        <tr>
                                            <td class="text-secondary fw-bold text-nowrap"><?= $row['id_kendaraan'] ?></td>
                                            <td class="fw-bold text-dark text-start"><?= $row['brand'] ?> <?= $row['model'] ?></td>
                                            <td><?= $row['tahun'] ?></td>
                                            <td class="text-success fw-bold text-nowrap">Rp <?= number_format($row['harga_dasar'], 0, ',', '.') ?></td>
                                            <td class="text-start text-muted"><?= $moge->tampilkanSpesifikasi() ?></td>
                                            <td class="text-danger fw-bold text-nowrap">Rp <?= number_format($moge->hitungPajakTahunan(), 0, ',', '.') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>