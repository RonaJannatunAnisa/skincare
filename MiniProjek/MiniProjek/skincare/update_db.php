<?php
include "../koneksi.php";

if(isset($_POST['id_skincare'])){
    $id_skincare = $_POST['id_skincare'];
    $nama_skincare = $_POST['nama_skincare'];
    $jenis_skincare = $_POST['jenis_skincare'];
    $expdate = $_POST['expdate'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    
    // Jika ID diubah, cek apakah ID baru sudah ada
    if($id_jenisProduk_lama != $id_jenisProduk){
        $cek = mysqli_query($con, "SELECT * FROM skincare WHERE id_skincare='$id_skincare'");
        if(mysqli_num_rows($cek) > 0){
            header("location:updateJenis.php?id=$id_skincare_lama&pesan=idada");
            exit;
        }
    }
    
    $update = mysqli_query($con, "UPDATE skincare SET 
                                nama_skincare='$nama_skincare',
                                jenis_skincare='$jenis_skincare',
                                expdate='$expdate',
                                harga='$harga',
                                stok='$stok' 
                                WHERE id_skincare='$id_skincare'");
    
    if($update){
        header("location:read.php?pesan=berhasil diupdate");
    } else {
        header("location:read.php?pesan=gagal diupdate");
    }
}
?>