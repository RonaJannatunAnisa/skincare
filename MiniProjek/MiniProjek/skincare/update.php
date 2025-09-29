<?php
include "../koneksi.php";

$id = $_GET['id'];
$data = mysqli_query($con, "SELECT * FROM skincare WHERE id_skincare='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
</head>
<body>
    <h2>Edit Produk</h2>
    
    <?php
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == 'idada'){
            echo "<p style='color:red'>ID sudah ada! Gunakan ID lain.</p>";
        }
    }
    ?>
    
    <form method="post" action="update_db.php">
        <input type="hidden" name="id_skincare" value="<?php echo $d['id_skincare']; ?>">
        
        ID Skincare: 
            <input type="text" name="id_skincare" 
            value="<?php echo $d['id_skincare']; ?>" 
            readonly required><br><br>
        Nama Skincare: <input type="text" name="nama_skincare" value="<?php echo $d['nama_skincare']; ?>" required><br><br>
        <label for="jenis_skincare">Jenis Skincare:</label>
            <select name="jenis_skincare" id="jenis_skincare" required>
                <option value="">-- Pilih Jenis Skincare --</option>
                <option value="Cleanser"   <?php if($d['jenis_skincare']=="Cleanser") echo "selected"; ?>>Cleanser</option>
                <option value="Toner"      <?php if($d['jenis_skincare']=="Toner") echo "selected"; ?>>Toner</option>
                <option value="Serum"      <?php if($d['jenis_skincare']=="Serum") echo "selected"; ?>>Serum</option>
                <option value="Moisturizer"<?php if($d['jenis_skincare']=="Moisturizer") echo "selected"; ?>>Moisturizer</option>
                <option value="Sunscreen"  <?php if($d['jenis_skincare']=="Sunscreen") echo "selected"; ?>>Sunscreen</option>
                <option value="Masker"     <?php if($d['jenis_skincare']=="Masker") echo "selected"; ?>>Masker</option>
            </select><br><br>
        <label for="expdate">Tanggal Expired:</label>
            <input type="date" name="expdate" id="expdate" value="<?php echo $d['expdate']; ?>" required><br><br>
        <label for="harga">Harga (Rp):</label>
            <input type="number" step="0.01" name="harga" id="harga" placeholder="Contoh: 120000" value="<?php echo $d['harga']; ?>" required><br><br>
        <label for="stok">Stok:</label>
            <input type="number" name="stok" id="stok" placeholder="Contoh: 50" value="<?php echo $d['stok']; ?>" required><br><br>
        
        <button type="submit">Update</button>
        <a href="read.php">Kembali</a>
    </form>
</body>
</html>