<?php 
    include "../koneksi.php"; 

    $id = $_GET['id'];
    $sql = mysqli_query($con, "SELECT * FROM skincare WHERE id_skincare='$id'");
    $produk = mysqli_fetch_assoc($sql);

    $namaProduk = $produk['nama_skincare'];
    $hrgProduk = $produk['harga'];
    $stokProduk = $produk['stok'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pesan Barang</title>
</head>
<body>
    <h2>Pesan Barang</h2>
    <form method="post" action="transaksi_db.php">
        <input type="hidden" name="id_skincare" value="<?php echo $id; ?>">
        <label>Nama Produk : <?php echo $namaProduk?></label><br>
        <label>Harga Produk : <span id="harga"><?php echo $hrgProduk?></span></label><br>
        <label>Stok Tersisa : <?php echo $stokProduk?></label><br>

        <label for="jumlah">Jumlah :</label>
        <input type="number" name="jumlah" id="jumlah" placeholder="1" min="1" max="<?php echo $stokProduk?>" required><br>

        <label>Total Harga : <span id="total">0</span></label><br><br>

        <input type="hidden" name="total" id="total_input">

        <button type="submit">Beli</button>
    </form>

    <script>
    // ambil harga produk dari PHP
    let harga = parseInt(document.getElementById("harga").innerText);
    let jumlahInput = document.getElementById("jumlah");
    let totalSpan = document.getElementById("total");
    let totalInput = document.getElementById("total_input");

    jumlahInput.addEventListener("input", function(){
        let qty = parseInt(this.value) || 0;
        let total = harga * qty;
        totalSpan.innerText = total;       
        totalInput.value = total;          
    });
    </script>

    <br>
    <a href="../dashboardPelanggan.php">Kembali ke Home</a>
</body>
</html>