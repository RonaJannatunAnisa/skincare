<?php include "../koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>List Transaksi Skincare</title>
</head>
<body>
    <h2>List Transaksi Skincare</h2>
    
    <?php
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == 'sukses'){
            echo "<p style='color:green'>Data berhasil disimpan!</p>";
        } else if($_GET['pesan'] == 'gagal'){
            echo "<p style='color:red'>Data gagal disimpan!</p>";
        }
    }
    ?>
    
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID Pembelian</th>
            <th>ID Skincare</th>
            <th>Tgl Pembelian</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
        </tr>
        <?php
        $data = mysqli_query($con, "SELECT * FROM trs_pembelian");
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $d['id_pembelian']; ?></td>
            <td><?php echo $d['id_skincare']; ?></td>
            <td><?php echo $d['tanggal']; ?></td>
            <td><?php echo $d['harga']; ?></td>
            <td><?php echo $d['jumlah']; ?></td>
            <td><?php echo $d['total_harga']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <br>
    <a href="../dashboardAdmin.php">Kembali ke Home</a>
</body>
</html>