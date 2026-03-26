<?php
	include 'koneksi.php';

	session_start();
	
	$title = mysqli_real_escape_string($koneksi, $_POST['title']);
	$author = $_SESSION['firstname'];
	$contents = mysqli_real_escape_string($koneksi, $_POST['contents']);
    $categories = mysqli_real_escape_string($koneksi, $_POST['categories']);
	$date = date('Y-m-d H:i:s');
	$img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
	$nama_file = mysqli_real_escape_string($koneksi, $_FILES['img']['name']);
	
	$query = "INSERT INTO post (title, author, content, categories, date, nama_file, img) VALUES
				('$title', '$author', '$contents', '$categories', '$date', '$nama_file', '$img')";
	
	$hasil = mysqli_query($koneksi, $query);
	
	if ($hasil) {
		echo "<script>alert('Data Berhasil');window.location='all-post.php';</script>";
	}