<?php
	include 'koneksi.php';

    session_start();
	
	$id = intval($_POST['id']);
	$title = mysqli_real_escape_string($koneksi, $_POST['title']);
	$author = $_SESSION['firstname'];
    $contents = mysqli_real_escape_string($koneksi, $_POST['contents']);
	$src = mysqli_real_escape_string($koneksi, $_POST['src']);
	$src_db = mysqli_real_escape_string($koneksi, $_POST['src_db']);
	$date = date('Y-m-d H:i:s');
	
	$query = "UPDATE pages SET title = '$title', author = '$author', content = '$contents', src = '$src', src_db = '$src_db', date = '$date' WHERE id = $id";
	
	$hasil = mysqli_query($koneksi, $query);
	
	if (!$hasil) {
    	die("Update data gagal: " . mysqli_error($koneksi));
    } else {
    	echo "<script>alert('Pages berhasil diubah...');window.location='all-pages.php';</script>";
    }
	