<?php
include 'koneksi.php';
session_start();

$sql = "SELECT * FROM siswa ORDER BY id_siswa DESC LIMIT 1";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);

if (!$data) {
    $data = [
        'nama' => 'Belum Ada Data',
        'nis' => '-',
        'asal_sekolah' => '-',
        'status_pendaftaran' => 'kosong'
    ];
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Siswa | PPDB Modern</title>
    <style>
        :root { --bg: #ffffff; --surface: #fafafa; --border: #eaeaea; --text-main: #1a1a1a; --text-muted: #666666; --accent: #2d3436; --success: #27ae60; --warning: #f39c12; --danger: #e74c3c; }
        body { font-family: sans-serif; background-color: var(--bg); color: var(--text-main); }
        .wrapper { display: grid; grid-template-columns: 240px 1fr; min-height: 100vh; }
        aside { background: var(--surface); border-right: 1px solid var(--border); padding: 2rem; }
        main { padding: 4rem; max-width: 900px; }
        .nav-list { list-style: none; margin-top: 2rem; }
        .nav-item { margin-bottom: 1rem; }
        .nav-item a { text-decoration: none; color: var(--text-muted); font-size: 0.9rem; font-weight: 500; }
        .nav-item a.active { color: var(--text-main); font-weight: 700; }
        .status-pill { padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; }
        .status-pending { background: #fff4e5; color: var(--warning); }
        .status-success { background: #e8f5e9; color: var(--success); }
        .data-card { border: 1px solid var(--border); padding: 2rem; margin-top: 2rem; }
        .data-group { margin-bottom: 1.5rem; }
        .data-label { display: block; font-size: 0.7rem; text-transform: uppercase; color: var(--text-muted); letter-spacing: 1px; }
        .data-value { font-size: 1.1rem; font-weight: 600; }
    </style>
</head>
<body>
    <div class="wrapper">
        <aside>
            <h2 style="font-size: 1.2rem; letter-spacing: -0.5px">PPDB v.2026</h2>
            <ul class="nav-list">
                <li class="nav-item"><a href="dashboard.php" class="active">Beranda</a></li>
                <li class="nav-item"><a href="form.php">Formulir Pendaftaran</a></li>
                <li class="nav-item"><a href="logout.php">Keluar</a></li>
            </ul>
        </aside>

        <main>
            <header style="margin-bottom: 3rem">
                <h1 style="font-size: 2.5rem; letter-spacing: -1px">Halo, <?php echo htmlspecialchars($data['nama']); ?>!</h1>
                <p style="color: var(--text-muted)">Berikut adalah ringkasan status pendaftaran Anda hari ini.</p>
            </header>

            <div class="data-card">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 2rem;">
                    <div>
                        <span class="data-label">Status Pendaftaran</span>
                        <span class="status-pill <?php echo ($data['status_pendaftaran'] == 'lulus') ? 'status-success' : 'status-pending'; ?>">
                            <?php echo strtoupper($data['status_pendaftaran']); ?>
                        </span>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem">
                    <div class="data-group">
                        <span class="data-label">Nomor Induk Siswa (NIS)</span>
                        <span class="data-value"><?php echo htmlspecialchars($data['nis']); ?></span>
                    </div>
                    <div class="data-group">
                        <span class="data-label">Asal Sekolah</span>
                        <span class="data-value"><?php echo htmlspecialchars($data['asal_sekolah']); ?></span>
                    </div>
                </div>
            </div>
            
            <p style="margin-top: 2rem; font-size: 0.8rem; color: var(--text-muted)">
                Data diperbarui otomatis dari sistem database pusat.
            </p>
        </main>
    </div>
</body>
</html>