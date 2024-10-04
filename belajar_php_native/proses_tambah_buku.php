<?php
if ($_POST) {
    $nama_file = $_FILES['foto']['name'];
    $tmp_file = $_FILES['foto']['tmp_name'];
    $tipe_file = $_FILES['foto']['type'];
    $ukuran_file = $_FILES['foto']['size'];

    $nama_buku = $_POST['nama_buku'];
    $deskripsi_buku = $_POST['deskripsi_buku'];

    if ($tipe_file != "image/jpeg" && $tipe_file != "image/png" && $tipe_file != "image/jpg") {
        echo "<script>alert('Tipe file yang diupload bukan gambar!');location.href='tambah_buku.php';</script>";
        exit;
    }

    
    if ($ukuran_file > 1048576) { 
        echo "<script>alert('Ukuran file melebihi batas (1 MB)!');location.href='tambah_buku.php';</script>";
        exit;
    }


    $ext = explode(".", $nama_file);
    $nama_file_baru = uniqid() . "." . end($ext);


    move_uploaded_file($tmp_file, "assets/foto/" . $nama_file_baru);

    include "koneksi.php";
    $insert = mysqli_query($conn, "INSERT INTO buku (foto, nama_buku, deskripsi) VALUES ('" . $nama_file_baru . "', '" . $nama_buku . "', '" . $deskripsi_buku . "')");

    if ($insert) {
        echo "<script>alert('Sukses menambahkan buku');location.href='buku.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan buku');location.href='tambah_buku.php';</script>";
    }
}
?>