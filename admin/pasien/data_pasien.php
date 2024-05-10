<?php
require_once("koneksi.php");
$query = "SELECT pasien. *, kelurahan.nama as nama_kelurahan
            FROM pasien
            LEFT JOIN kelurahan ON pasien.kelurahan_id = kelurahan.id_kelurahan";

$pasiens = $dbh->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien Puskesmas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Data Pasien Puskesmas </h2>
        <a href="create.php" class ='btn btn-primary mt-4'>Tambah Data Passien</a>
        <table class="table table-boardered">
            <tr class="table-warning">
                <th>No</th>
                <th>Kode Pasien</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Kelurahan</th>
                <th>Aksi</th>
            </tr>
            <?php 
            $no = 1;
            foreach ($pasiens as $pasien) { ?>
            <tr>
                <td><?= $no++; ?> </td>
                <td><?=$pasien ['kode']; ?></td>
                <td><?=$pasien ['nama'];?> </td>
                <td><?=$pasien ['gender']; ?></td>
                <td><?=$pasien ['tmp_lahir']; ?></td>
                <td><?=$pasien ['tgl_lahir']; ?></td>
                <td><?=$pasien ['alamat']; ?></td>
                <td><?=$pasien ['nama_kelurahan']; ?></td>
                <td>
                <a href="edit.php?id=<?php echo $pasien['id_pasien']; ?>" class="btn btn-primary"> Edit</a>
                <a href="proses.php?id=<?php echo $pasien['id_pasien']; ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>