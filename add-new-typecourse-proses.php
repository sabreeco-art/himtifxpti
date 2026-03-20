<?php
	include 'koneksi.php';

    session_start();
	
	$title = $_POST['title'];
	$description = $_POST['description'];
    $icon = $_POST['icon'];
    $author = $_SESSION['firstname'];
    $date = date('Y-m-d H:i:s');
	
	$query = "INSERT INTO typecourse (title, description, icon, author, date) VALUES ('$title', '$description', '$icon', '$author', '$date')";
	
	$hasil = mysqli_query($koneksi, $query);
	
	if ($hasil) {
		echo "<script>alert('Tambah Type Of Course Berhasil');window.location='type-course.php';</script>";
	} else {
        echo "GAGAL";
    }