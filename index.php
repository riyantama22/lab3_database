<?php
include("koneksi.php");
// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Data Barang</title>
   

</head>

<body>
    <div class="container">
        <h1 style="margin-bottom: 20px;">Data Barang</h1>

        <a class="simpan" href="tambah.php">
            tambah barang
        </a>
        <div class="main">
            <table>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Katagori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>

                <?php if ($result) : ?>
                    <?php while ($row = mysqli_fetch_array($result)) : ?>
                        <tr>

                            <td><img class="img" src="gambar/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>" style="width: 100px; height:100px;"></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['kategori']; ?></td>
                            <td><?= $row['harga_beli']; ?></td>
                            <td><?= $row['harga_jual']; ?></td>
                            <td><?= $row['stok']; ?></td>
                            <td>
                                <a class="edit" href="ubah.php?id=<?php echo $row['id_barang']; ?>">Ubah</a> |
                                <a class="hapus" href="hapus.php?id=<?php echo $row['id_barang']; ?>">Hapus</a>
                            </td>

                        </tr>
                    <?php endwhile;
                else : ?>
                    <tr>
                        <td colspan="7">Belum ada data</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</body>

</html>