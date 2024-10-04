<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Tampil Siswa</title>
</head>

<body>
    <h3 align="center">Tampil Siswa</h3>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NIK</th>
                <th>NAMA SISWA</th>
                <th>TANGGAL LAHIR</th>
                <th>ALAMAT</th>
                <th>GENDER</th>
                <th>USERNAME</th>
                <th>KELAS</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $qry_siswa = mysqli_query($conn, "select * from siswa join kelas on kelas.id_kelas=siswa.id_kelas");
            $no = 0;
            while ($data_siswa = mysqli_fetch_array($qry_siswa)) {
                $no++; ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $data_siswa['nama_siswa'] ?></td>
                    <td><?= $data_siswa['tanggal_lahir'] ?></td>
                    <td><?= $data_siswa['alamat'] ?></td>
                    <td><?= $data_siswa['gender'] ?></td>
                    <td><?= $data_siswa['username'] ?></td>
                    <td><?= $data_siswa['nama_kelas'] ?></td>
                    <td>
                        <a href="ubah_siswa.php?id_siswa=<?= $data_siswa['id_siswa'] ?>" class="btn btn-success">Ubah</a> |
                        <a href="hapus.php?id_siswa=<?= $data_siswa['id_siswa'] ?>"
                            onclick="return confirm('Apakah anda yakin menghapus data ini?')"
                            class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <div class="text-left">
        <a href="tambah_siswa.php" class="btn btn-primary">Tambah Siswa</a>
    </div>
    <div class="text-left">
        <a href="home.php" class="btn btn-primary">kembali</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>