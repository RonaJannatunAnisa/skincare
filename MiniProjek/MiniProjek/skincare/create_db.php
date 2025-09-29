<?php
include "../koneksi.php";

if(isset($_POST['id_skincare'])){
    $id_skincare = $_POST['id_skincare'];
    $nama_skincare = $_POST['nama_skincare'];
    $jenis_skincare = $_POST['jenis_skincare'];
    $expdate = $_POST['expdate'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    
    // Cek apakah ID sudah ada
    $cek = mysqli_query($con, "SELECT * FROM skincare WHERE id_skincare='$id_skincare'");
    if(mysqli_num_rows($cek) > 0){
        header("location:createJenis.php?pesan=idada");
        exit;
    }
    
    $insert = mysqli_query($con, "INSERT INTO skincare (id_skincare, nama_skincare, jenis_skincare, expdate, harga, stok) VALUES ('$id_skincare', '$nama_skincare', '$jenis_skincare', '$expdate', '$harga', '$stok')");
    
    if($insert){
        header("location:read.php?pesan=sukses");
    } else {
        header("location:read.php?pesan=gagal");
    }
}
?>