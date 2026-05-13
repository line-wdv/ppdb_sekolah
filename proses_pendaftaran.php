<?php
include 'koneksi.php';

if (isset($_POST['daftar'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jk = $_POST['jenis_kelamin'];
    $tmpt = $_POST['tempat_lahir'];
    $tgl = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $sekolah = $_POST['asal_sekolah'];
    $jur1 = $_POST['plh_jurusan1'];
    $jur2 = $_POST['plh_jurusan2'];
    $tgl_daftar = date('Y-m-d');

    $nama = $nis;
    $password = password_hash("12345", PASSWORD_DEFAULT);
    $role = 'siswa';

    $sql_user = "INSERT INTO user (nama, password, role) VALUES ('$nama', '$password', '$role')";
    
    if (mysqli_query($conn, $sql_user)) {
        $id_users_baru = mysqli_insert_id($conn);

        $sql_siswa = "INSERT INTO siswa (id_users, nis, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, asal_sekolah, plh_jurusan1, plh_jurusan2, tanggal_pendaftaran) 
                      VALUES ('$id_users_baru', '$nis', '$nama', '$jk', '$tmpt', '$tgl', '$alamat', '$sekolah', '$jur1', '$jur2', '$tgl_daftar')";

        if (mysqli_query($conn, $sql_siswa)) {
            header("Location: dashboard.php?status=sukses");
        } else {
            header("Location: form.php?status=gagal_siswa");
        }
    } else {
        header("Location: form.php?status=gagal_user");
    }
} else {
    die("Akses dilarang...");
}
?>