<?php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $koneksi = mysqli_connect("localhost", "root", "", "ppdb_sekolah");

    if (!$koneksi) {
        $error = "Koneksi ke database gagal";
    } else {
        $username = mysqli_real_escape_string($koneksi, $username);
        $password = mysqli_real_escape_string($koneksi, $password);

        $query = "SELECT * FROM user WHERE email = '$username' OR nama = '$username'";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            
            if ($password == $user['password']) {
                $_SESSION['status_login'] = true;
                $_SESSION['user_nama'] = $user['nama'];
                header("Location: beranda.php");
                exit;
            } else {
                $error = "Password yang kamu masukkan salah!";
            }
        } else {
            $error = "Username atau Email belum terdaftar! Silakan registrasi terlebih dahulu.";
        }
        mysqli_close($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0d1741 0%, #0c3183 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
            padding: 40px;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
        }

        .logo {
            text-align: center;
            color: #667eea;
            margin-bottom: 25px;
        }

        .logo i {
            font-size: 3.5rem;
            color: #667eea;
            margin-bottom: 15px;
        }

        .logo h1 {
            color: #333;
            font-size: 1.9rem;
            font-weight: 700;
        }

        .logo p {
            color: #666;
            font-size: 0.95rem;
            margin-top: 5px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }
        
        .eye-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
            font-size: 1.1rem;
        }

        .Login-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #97bbd6 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            display: block;
            text-align: center;
            text-decoration: none;
        }

        .Login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .Login-btn:active {
            transform: translateY(0);
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
            font-size: 0.9rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .remember-me input {
            width: auto;
            margin: 0;
        }

        .forgot-password {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .divider {
            text-align: center;
            margin: 25px 0;
            color: #999;
            position: relative;
        }

        .divider::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e1e5e9;
        }

        .divider span {
            background: #fff;
            padding: 0 15px;
            position: relative;
            z-index: 1;
            font-size: 0.9rem;
        }

        .error-message {
            background: #fee;
            color: #c33;
            padding: 12px;
            border-radius: 8px;
            border-left: 4px solid #c33;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 30px 25px;
                margin: 10px;
            }

            .logo h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <i class="fas fa-graduation-cap"></i>
            <h1>Login PPDB</h1>
            <p>Penerimaan peserta didik baru</p>
        </div>

        <?php if (!empty($error)): ?>
            <div class="error-message">
                 <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form id="loginForm" method="POST" action="">
            <div class="form-group">
                <input type="text" id="username" name="username" required placeholder="Masukkan Nama atau Email">
            </div>

            <div class="form-group">
                <input type="password" id="password" name="password" required placeholder="Masukkan Password">
                <i class="fas fa-eye eye-icon" id="togglePassword"></i>
            </div>

            <div class="options">
              <label class="remember-me">
                <input type="checkbox" id="remember" name="remember"> Ingat saya
              </label>
              <a href="#" class="forgot-password">Lupa Password</a>
            </div>

            <button type="submit" class="Login-btn" id="Login-btn">
                 <span id="btnText">Masuk</span>
            </button>
        </form>

        <div class="divider">
          <span>Belum punya akun?</span>
        </div>

        <a href="register.php" class="Login-btn" style="background: #28a745; font-size: 1rem;">
            <i class="fas fa-user-plus"></i> Daftar Akun Baru
        </a>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>