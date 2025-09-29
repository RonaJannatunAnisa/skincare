<?php include "../koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Jenis Produk</title>
</head>
<body>
    <h2>Tambah Jenis Produk</h2>
    
    <?php
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == 'idada'){
            echo "<p style='color:red'>ID sudah ada! Gunakan ID lain.</p>";
        }
    }
    ?>
    
    <form method="post" action="create_db.php">
        ID Skincare: <input type="text" name="id_skincare" required><br><br>
        Nama Skincare: <input type="text" name="nama_skincare" required><br><br>
        <label for="jenis_skincare">Jenis Skincare:</label>
            <select name="jenis_skincare" id="jenis_skincare" required>
                <option value="">-- Pilih Jenis Skincare --</option>
                <option value="Cleanser">Cleanser</option>
                <option value="Toner">Toner</option>
                <option value="Serum">Serum</option>
                <option value="Moisturizer">Moisturizer</option>
                <option value="Sunscreen">Sunscreen</option>
                <option value="Masker">Masker</option>
            </select> <br><br>  
        <label for="expdate">Tanggal Expired:</label>
            <input type="date" name="expdate" id="expdate" required><br><br>
        <label for="harga">Harga (Rp):</label>
            <input type="number" step="0.01" name="harga" id="harga" placeholder="Contoh: 120000" required><br><br>
        <label for="stok">Stok:</label>
            <input type="number" name="stok" id="stok" placeholder="Contoh: 50" required><br><br>
        <button type="submit">Simpan</button>
        <a href="read.php">Kembali</a>
    </form>
</body>
</html>