<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Imut</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: url('gambar/bgLogin.jpeg') no-repeat center center/cover;            
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        .login-card {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0px 8px 20px rgba(0,0,0,0.1);
            width: 320px;
            text-align: center;
        }
        .login-card h2 {
            margin-bottom: 20px;
            color: #ff66a3;
        }
        .login-card input {
            width: 91%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 12px;
            border: 1px solid #ddd;
            outline: none;
            transition: 0.3s;
        }
        .login-card input:focus {
            border-color: #ff99c8;
            box-shadow: 0px 0px 8px #ffccdd;
        }
        .login-card button {
            background: #ff99c8;
            border: none;
            color: white;
            padding: 12px;
            border-radius: 15px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
            transition: 0.3s;
        }
        .login-card button:hover {
            background: #ff66a3;
        }
        .error {
            color: red;
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>💄 Sign In 👄</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Masukkan Username Kamu" required>
            <input type="password" name="password" placeholder="Masukkan Password Kamu" required>
            <button type="submit" name="login">Login</button>
            <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
        </form>
    </div>
</body>
</html>

<?php
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $akun = [
        "admin" => ["password" => "admin123", "role" => "admin"],
        "pelanggan" => ["password" => "pelanggan123", "role" => "pelanggan"]
    ];

    if (isset($akun[$username]) && $akun[$username]["password"] == $password) {
        $_SESSION['role'] = $akun[$username]["role"];

        if ($_SESSION['role'] == "admin") {
            header("Location: dashboardAdmin.php");
            exit;
        } else {
            header("Location: dashboardPelanggan.php");
            exit;
        }
    } else {
        $error = "Username atau Password salah!";
    }
}
?>