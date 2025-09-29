<?php
include "../koneksi.php";

$id = $_GET['id'];

$delete = mysqli_query($con, "DELETE FROM skincare WHERE id_skincare='$id'");

if($delete){
    header("location:read.php?pesan=berhasil dihapus");
} else {
    header("location:read.php?pesan=gagal dihapus");
}
?>