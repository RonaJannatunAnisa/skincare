<!DOCTYPE html>
<html>
<head>
    <title>Home - Handsome Face</title>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: url('gambar/bgLogin.jpeg') no-repeat center center/cover;            
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        h1 {
            color: #ff66a3;
        }
        .btn-link {
            display: inline-block;
            background: #ff99c8;
            color: white;
            padding: 12px 20px;
            border-radius: 15px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-link:hover {
            background: #ff66a3;
        }
        .center {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0px 8px 20px rgba(0,0,0,0.1);
            width: 320px;
            text-align: center;
        }
        .center h2 {
            margin-bottom: 20px;
            color: #ff66a3;
        }
        
        .center button {
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
        .center button:hover {
            background: #ff66a3;
        }
    </style>
</head>
<body onload="showWelcome()">
    <div class="center">
        <h2>Selamat Datang di Toko Ketampanan Kami</h2>
        <p>
            <a href="skincare/read.php" class="btn-link">💄 Kelola Produk</a>
        </p>
        <p>
            <a href="pembelian/read.php" class="btn-link">🛒 Lihat Transaksi</a>
        </p>
        <p>
            <a href="logout.php" class="btn-link">🚪 Logout</a>
        </p>
    </div>
    <script>
        function showWelcome() {
            Swal.fire({
                title: '🌸 Selamat Datang Admin 🌸',
                text: 'Semoga harimu semakin ganteng 😎✨',
                icon: 'success',
                confirmButtonText: 'Siap!!',
                confirmButtonColor: '#ff66a3',
                background: '#fff',
                color: '#ff3399',
                backdrop: `rgba(0,0,0,0.3)`
            });
        }
    </script>
</body>
</html>
