<?php
include "../koneksi.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id     = $_POST['id_skincare'];              
    $jumlah = (int)$_POST['jumlah'];    

    $sql = mysqli_query($con, "SELECT * FROM skincare WHERE id_skincare='$id'");
    $produk = mysqli_fetch_assoc($sql);

    if (!$produk) {
        die("Produk tidak ditemukan.");
    }

    $namaProduk = $produk['nama_skincare'];
    $harga      = (int)$produk['harga'];
    $stok       = (int)$produk['stok'];

    if ($jumlah <= 0 || $jumlah > $stok) {
        die("Jumlah tidak valid. Stok tersedia: $stok");
    }

    $total = $harga * $jumlah;

    $q = mysqli_query($con, "SELECT id_pembelian FROM trs_pembelian ORDER BY id_pembelian DESC LIMIT 1");
    $d = mysqli_fetch_assoc($q);

    if ($d) {
        $lastId = (int) substr($d['id_pembelian'], 3); 
        $newId = $lastId + 1;
    } else {
        $newId = 1;
    }

    $idTransaksi = "TRS" . str_pad($newId, 3, "0", STR_PAD_LEFT);

    // simpan transaksi
    $sqlInsert = "INSERT INTO trs_pembelian 
        (id_pembelian, id_skincare, tanggal, harga, jumlah, total_harga) 
        VALUES 
        ('$idTransaksi', '$id', NOW(), '$harga', '$jumlah', '$total')";

    $result = mysqli_query($con, $sqlInsert);

    if ($result) {
        $sisa = $stok - $jumlah;
        mysqli_query($con, "UPDATE skincare SET stok='$sisa' WHERE id_skincare='$id'");

        echo "<h3>Transaksi Berhasil!</h3>";
        echo "ID Transaksi : $idTransaksi <br>";
        echo "Produk : $namaProduk <br>";
        echo "Jumlah : $jumlah <br>";
        echo "Harga  : Rp " . number_format($harga, 0, ',', '.') . "<br>";
        echo "Total  : Rp " . number_format($total, 0, ',', '.');
    } else {
        echo "Gagal menyimpan transaksi: " . mysqli_error($con);
    }
}
?>