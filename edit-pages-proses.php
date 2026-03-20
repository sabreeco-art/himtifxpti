<?php
	include 'koneksi.php';

    session_start();
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$author = $_SESSION['firstname'];
    $contents = $_POST['contents'];
	$src = $_POST['src'];
	$src_db = $_POST['src_db'];
	$date = date('Y-m-d H:i:s');
	
	$query = "UPDATE pages SET title = '$title', author = '$author', content = '$contents', src = '$src', src_db = '$src_db', date = '$date' WHERE id = $id";
	
	$hasil = mysqli_query($koneksi, $query);
	
	if (!$hasil) {
    	die("Update data gagal: " . mysqli_error($koneksi));
    } else {
    	echo "<script>alert('Pages berhasil diubah...');window.location='all-pages.php';</script>";
    }
	