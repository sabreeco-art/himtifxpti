<?php
include('koneksi.php');

session_start();

$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

$query = "INSERT INTO media (nama_file, image) VALUES ('".$_FILES['image']['name']."', '".$image."')";
$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
    die("Menyimpan gambar gagal: " . mysqli_error($koneksi));
    } else {
	echo "<script>alert('Gambar berhasil disimpan.');window.location='library.php';</script>";
    }
?>