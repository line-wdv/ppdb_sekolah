<?php
include 'koneksi.php';

$query_stats = mysqli_query($conn, "SELECT COUNT(*) as total FROM siswa");
$stats = mysqli_fetch_assoc($query_stats);
$total_pendaftar = $stats['total'];
?>
<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SMK Negeri 4 Palembang | Unggul & IT Sentris</title>
    <style>
      :root {
        --primary-color: #004a99;
        --secondary-color: #ffd700;
        --text-dark: #2d3436;
        --text-light: #ffffff;
        --bg-light: #f9f9f9;
        --accent-color: #e67e22;
      }
      * { margin: 0; padding: 0; box-sizing: border-box; font-family: "Segoe UI", sans-serif; }
      body { line-height: 1.6; color: var(--text-dark); background-color: var(--bg-light); }
      nav { background: var(--primary-color); color: white; padding: 1rem 8%; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 1000; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
      .nav-links { display: flex; list-style: none; gap: 2rem; }
      .nav-links a { color: white; text-decoration: none; font-weight: 500; font-size: 0.95rem; }
      .hero { background: linear-gradient(rgba(0, 74, 153, 0.8), rgba(0, 74, 153, 0.8)), url('https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center; height: 80vh; display: flex; align-items: center; justify-content: center; text-align: center; color: white; padding: 0 20px; }
      .hero-content h1 { font-size: 3.5rem; margin-bottom: 1rem; line-height: 1.2; }
      .btn-cta { background: var(--accent-color); color: white; padding: 1rem 2.5rem; border: none; border-radius: 5px; font-size: 1.1rem; font-weight: 700; cursor: pointer; text-decoration: none; display: inline-block; transition: transform 0.3s; }
      .btn-cta:hover { transform: scale(1.05); background: #d35400; }
      .stats-section { padding: 4rem 8%; background: white; text-align: center; }
      .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; margin-top: 2rem; }
      .stat-card h2 { font-size: 2.5rem; color: var(--primary-color); }
      footer { background: #2d3436; color: white; padding: 4rem 8% 2rem; }
      .footer-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 3rem; margin-bottom: 3rem; }
    </style>
  </head>
  <body>
    <nav>
      <div class="logo">
        <h2 style="letter-spacing: 1px">SMKN 4 <span style="color: var(--secondary-color)">PLG</span></h2>
      </div>
      <ul class="nav-links">
        <li><a href="halamanberanda.php">Beranda</a></li>
        <li><a href="form.php">Pendaftaran</a></li>
        <li><a href="login.php">Login Siswa</a></li>
        <li><a href="dashboard.php">Dashboard</a></li>
      </ul>
    </nav>

    <header class="hero">
      <div class="hero-content">
        <h1>Masa Depan IT Dimulai di Sini</h1>
        <p style="font-size: 1.2rem; margin-bottom: 2.5rem; opacity: 0.9">Pendaftaran Peserta Didik Baru SMK Negeri 4 Palembang Tahun Ajaran 2026/2027 telah dibuka.</p>
        <a href="form.php" class="btn-cta">DAFTAR SEKARANG</a>
      </div>
    </header>

    <section class="stats-section">
      <div class="stats-grid">
        <div class="stat-card">
          <h2><?php echo $total_pendaftar; ?>+</h2>
          <p>Calon Siswa Terdaftar</p>
        </div>
        <div class="stat-card">
          <h2>4</h2>
          <p>Jurusan Unggulan</p>
        </div>
        <div class="stat-card">
          <h2>100%</h2>
          <p>Fasilitas IT Modern</p>
        </div>
      </div>
    </section>

    <footer>
      <div class="footer-grid">
        <div>
          <h3>SMKN 4 PLG</h3>
          <p style="color: #bdc3c7; margin-top: 1rem">Mencetak generasi IT unggulan untuk Indonesia.</p>
        </div>
        <div>
          <h4>Tautan Cepat</h4>
          <ul style="list-style: none; margin-top: 1rem">
            <li><a href="dashboard.php" style="color: #bdc3c7; text-decoration: none">Dashboard Siswa</a></li>
            <li><a href="form.php" style="color: #bdc3c7; text-decoration: none">Form Pendaftaran</a></li>
            <li><a href="login.php" style="color: #bdc3c7; text-decoration: none">Masuk Akun</a></li>
          </ul>
        </div>
      </div>
      <div style="text-align: center; padding-top: 2rem; border-top: 1px solid #444; font-size: 0.8rem; color: #888">
        &copy; 2026 SMK Negeri 4 Palembang. All rights reserved.
      </div>
    </footer>
  </body>
</html>