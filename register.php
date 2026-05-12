<?php
include 'koneksi.php';

$pesan = "";

if (isset($_POST['register'])) {
    // 1. Sesuaikan variabel dengan input 'name' di form
    // 2. Gunakan mysqli_real_escape_string untuk keamanan
    $nama     = mysqli_real_escape_string($conn, $_POST['username']); 
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
   
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "INSERT INTO user (nama, email, password, role) VALUES ('$nama', '$email', '$password', 'siswa')";

    if (mysqli_query($conn, $sql)) {
        $pesan = "<div style='color: green; text-align: center;'>Registrasi Berhasil!</div>";
    } else {
        $pesan = "<div style='color: red; text-align: center;'>Gagal: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Registrasi</title>
    <style>
            * { box-sizing: border-box; font-family: sans-serif; }
        body { background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .register-container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 400px; }
        .form-group { margin-bottom: 15px; }
        input { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        button { width: 100%; padding: 12px; background-color: #007bff; border: none; color: white; cursor: pointer; }
    </style>
</head>
<body>

<div class="register-container">
    <h2 style="text-align: center;">Daftar Akun</h2>
    
    <?php echo $pesan; ?>

    <form action="" method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="contoh@gmail.com" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Maksimal 16 karakter" required>
        </div>
        <button type="submit" name="register">Register</button>
    </form>
</div>

</body>
</html>