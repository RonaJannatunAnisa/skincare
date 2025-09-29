<?php include "../koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Produk Skincare</title>
</head>
<body>
    <h2>Data Produk Skincare</h2>
    
    <?php
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == 'sukses'){
            echo "<p style='color:green'>Data berhasil disimpan!</p>";
        } else if($_GET['pesan'] == 'gagal'){
            echo "<p style='color:red'>Data gagal disimpan!</p>";
        }
    }
    ?>
    
    <a href="create.php">Tambah Jenis Produk</a><br><br>
    
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID Skincare</th>
            <th>Nama Skincare</th>
            <th>Jenis Skincare</th>
            <th>Exp Date</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php
        $data = mysqli_query($con, "SELECT * FROM skincare");
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $d['id_skincare']; ?></td>
            <td><?php echo $d['nama_skincare']; ?></td>
            <td><?php echo $d['jenis_skincare']; ?></td>
            <td><?php echo $d['expdate']; ?></td>
            <td><?php echo $d['harga']; ?></td>
            <td><?php echo $d['stok']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $d['id_skincare']; ?>">Edit</a> | 
                <a href="delete.php?id=<?php echo $d['id_skincare']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <br>
    <a href="../dashboardAdmin.php">Kembali ke Home</a>
</body>
</html>