<?php
	include 'koneksi.php';

	session_start();
	
	$title = $_POST['title'];
	$author = $_SESSION['firstname'];
	$contents = $_POST['contents'];
    $categories = $_POST['categories'];
	$date = date('Y-m-d H:i:s');
	$img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
	
	$query = "INSERT INTO post (title, author, content, categories, date, nama_file, img) VALUES
				('$title', '$author', '$contents', '$categories', '$date', '".$_FILES['img']['name']."', '$img')";
	
	$hasil = mysqli_query($koneksi, $query);
	
	if ($hasil) {
		echo "<script>alert('Data Berhasil');window.location='all-post.php';</script>";
	}