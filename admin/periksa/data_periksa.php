<?php

require_once 'koneksi.php';

$query = "SELECT periksa.*, pasien.nama as nama_pasien, dokter.nama as nama_dokter
            FROM periksa
            LEFT JOIN pasien ON periksa.pasien_id = pasien.id_pasien
            LEFT JOIN dokter ON periksa.dokter_id = dokter.id";

$hasil = $dbh->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Data Periksa</h2>
        <a href="create_periksa.php" class="btn btn-primary"> Tambah Data Pasien</a>
        <table class="table table-bordered">
            <tr class="table-warning">
                <th>No</th>
                <th>Tanggal</th>
                <th>Berat</th>
                <th>Tinggi</th>
                <th>Tensi</th>
                <th>Keterangan</th>
                <th>pasien</th>
                <th>dokter</th>
                <th>Aksi</th>

            </tr>
            <?php
            $no = 1;
            foreach ($hasil as $hasil) { ?>
                <tr>

                    <td><?= $no++; ?></td>
                    <td><?= $hasil['tanggal']; ?></td>
                    <td><?= $hasil['berat']; ?></td>
                    <td><?= $hasil['tinggi']; ?></td>
                    <td><?= $hasil['tensi']; ?></td>
                    <td><?= $hasil['keterangan']; ?></td>
                    <td><?= $hasil['nama_pasien']; ?></td>
                    <td><?= $hasil['nama_dokter']; ?></td>
                    <td>
                        <a href="edit_periksa.php?id=<?= $hasil['id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="proses_periksa.php?id=<?= $hasil['id']; ?>" class="btn btn-danger">Hapus</a>
                    </td>


                </tr>
            <?php } ?>
        </table>

    </div>
</body>

</html>