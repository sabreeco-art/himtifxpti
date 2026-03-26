<?php
	include 'koneksi.php';

	session_start();
	
	$title = mysqli_real_escape_string($koneksi, $_POST['title']);
	$author = $_SESSION['firstname'];
	$contents = mysqli_real_escape_string($koneksi, $_POST['contents']);
	$date = date('Y-m-d H:i:s');
	$src = mysqli_real_escape_string($koneksi, $_POST['src']);
	$src_db = mysqli_real_escape_string($koneksi, $_POST['src_db']);
	
	$query = "INSERT INTO pages (title, author, content, date, src, src_db) VALUES ('$title', '$author', '$contents', '$date', '$src', '$src_db')";
	
	$hasil = mysqli_query($koneksi, $query);
	
	if ($hasil) {
		echo "<script>alert('Pages Berhasil Ditambah');window.location='all-pages.php';</script>";
	}