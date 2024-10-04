<?php
include "header.php";
?> 
<h2>Daftar Buku</h2>
<div class="row">
    <?php
    include "koneksi.php";
    $qry_buku = mysqli_query($conn, "select * from buku");
    while ($dt_buku = mysqli_fetch_array($qry_buku)) {
        ?>
        <div class="col-md-3">
            <div class="card">
                <img src="assets/foto/<?= $dt_buku['foto'] ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $dt_buku['nama_buku'] ?></h5>
                    <p class="card-text"><?= substr($dt_buku['deskripsi'], 0, 20) ?></p>
                    <a href="pinjam_buku.php?id_buku=<?= $dt_buku['id_buku'] ?>" class="btn btn-primary">Pinjam</a>
                    <a href="hapus_buku.php?id_buku=<?= $dt_buku['id_buku'] ?>"
                        onclick="return confirm('Apakah anda yakin menghapus buku ini?')" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
        <?php   
    }
    ?>
</div>
<div class="text-left mt-4">
    <a href="tambah_buku.php" class="btn btn-success">Tambah Buku</a>
</div>
<!-- <?php
include "footer.php";
?> -->