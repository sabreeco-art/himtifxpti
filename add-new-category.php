<?php
	include 'koneksi.php';

	session_start();
	
	$name = $_POST['name'];
    $description = $_POST['description'];
	$slug = $_POST['slug'];
	
	$query = "INSERT INTO categories (name, description, slug) VALUES ('$name', '$description', '$slug')";
	
	$hasil = mysqli_query($koneksi, $query);
	
	if ($hasil) {
		echo "<script>alert('Category Berhasil Ditambah');window.location='categories.php';</script>";
	}