<?php
	include 'koneksi.php';

	session_start();
	
    $id = $_POST['id'];
	$name = $_POST['name'];
    $description = $_POST['description'];
	$slug = $_POST['slug'];
	
	$query = "UPDATE categories SET name = '$name', description = '$description', slug = '$slug' WHERE id = $id";
	
	$hasil = mysqli_query($koneksi, $query);
	
	if ($hasil) {
		echo "<script>alert('Category Berhasil Diedit');window.location='categories.php'</script>";
	}