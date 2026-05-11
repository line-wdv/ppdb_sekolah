<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pendaftaran PPDB | Sistem Informasi Siswa</title>
    <style>
      :root {
        --bg-body: #ececec;
        --bg-card: #f9f9f9;
        --text-main: #2e2e2e;
        --text-muted: #626262;
        --border: #d1d1d1;
        --accent: #4a4a4a;
        --input-bg: #ffffff;
      }
      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }
      body {
        font-family: "Inter", sans-serif;
        background-color: var(--bg-body);
        color: var(--text-main);
        line-height: 1.5;
        padding: 50px 20px;
      }
      .container {
        max-width: 850px;
        margin: 0 auto;
        background: var(--bg-card);
        border: 1px solid var(--border);
        padding: 60px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
      }
      header {
        text-align: center;
        margin-bottom: 50px;
        border-bottom: 1px solid var(--border);
        padding-bottom: 30px;
      }
      header h1 {
        font-size: 1.5rem;
        letter-spacing: 3px;
        text-transform: uppercase;
        font-weight: 700;
        color: var(--accent);
      }
      header p {
        color: var(--text-muted);
        font-size: 0.85rem;
        margin-top: 8px;
      }
      section {
        margin-bottom: 40px;
      }
      .section-header {
        font-size: 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: var(--text-muted);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
      }
      .section-header::after {
        content: "";
        flex: 1;
        height: 1px;
        background: var(--border);
        margin-left: 15px;
      }
      .grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
      }
      .full {
        grid-column: span 2;
      }
      .field {
        margin-bottom: 15px;
      }
      label {
        display: block;
        font-size: 0.8rem;
        font-weight: 600;
        margin-bottom: 6px;
        color: var(--accent);
      }
      input,
      select,
      textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid var(--border);
        background: var(--input-bg);
        font-family: inherit;
        font-size: 0.9rem;
        color: var(--text-main);
        transition: all 0.2s;
      }
      .btn-container {
        margin-top: 30px;
        text-align: right;
      }
      .btn-submit {
        padding: 15px 40px;
        background: var(--accent);
        color: white;
        border: none;
        text-transform: uppercase;
        font-weight: 700;
        font-size: 0.8rem;
        letter-spacing: 1px;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <header>
        <h1>Registrasi Calon Siswa</h1>
        <p>Penerimaan Peserta Didik Baru (PPDB) Periode 2026</p>
      </header>

      <form action="proses_pendaftaran.php" method="POST">
        <section>
          <div class="section-header">Data Pribadi Siswa</div>
          <div class="grid">
            <div class="field">
              <label>NIS</label>
              <input
                type="number"
                name="nis"
                required
                placeholder="Masukkan NIS"
              />
            </div>
            <div class="field">
              <label>Nama Lengkap</label>
              <input
                type="text"
                name="nama"
                required
                placeholder="Nama Sesuai Ijazah"
              />
            </div>
            <div class="field">
              <label>Jenis Kelamin</label>
              <select name="jenis_kelamin" required>
                <option value="">-- Pilih --</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
            </div>
            <div class="field">
              <label>Tempat Lahir</label>
              <input type="text" name="tempat_lahir" required />
            </div>
            <div class="field">
              <label>Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" required />
            </div>
            <div class="field full">
              <label>Alamat Lengkap</label>
              <textarea name="alamat" rows="3" required></textarea>
            </div>
          </div>
        </section>

        <section>
          <div class="section-header">Informasi Akademik</div>
          <div class="grid">
            <div class="field full">
              <label>Nama Sekolah Asal (SMP/MTS)</label>
              <input
                type="text"
                name="asal_sekolah"
                required
                placeholder="Contoh: SMP Negeri 4 Palembang"
              />
            </div>
            <div class="field">
              <label>Pilihan Jurusan 1</label>
              <select name="plh_jurusan1" required>
                <option value="rpl">RPL (Rekayasa Perangkat Lunak)</option>
              </select>
            </div>
            <div class="field">
              <label>Pilihan Jurusan 2</label>
              <select name="plh_jurusan2" required>
                <option value="tkj">TKJ (Teknik Komputer Jaringan)</option>
              </select>
            </div>
          </div>
        </section>

        <div class="btn-container">
          <button type="submit" name="daftar" class="btn-submit">
            Finalisasi & Kirim Data
          </button>
        </div>
      </form>
    </div>
  </body>
</html>
