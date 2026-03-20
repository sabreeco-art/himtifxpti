<?php
	include 'koneksi.php';

    session_start();
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$author = $_SESSION['firstname'];
    $contents = $_POST['contents'];
    $categories = $_POST['categories'];
	$date = date('Y-m-d H:i:s');

	if (!empty($_FILES['img']['tmp_name'])) {
		// JIKA USER UNGGAH GAMBAR BARU
		$img_data = addslashes(file_get_contents($_FILES['img']['tmp_name']));
		$nama_file = $_FILES['img']['name'];

		$query = "UPDATE post SET 
					title = '$title', 
					author = '$author', 
					content = '$contents', 
					categories = '$categories', 
					date = '$date', 
					nama_file = '$nama_file', 
					img = '$img_data' 
				WHERE id = '$id'";
	} else {
		// JIKA USER TIDAK UNGGAH GAMBAR (Hanya update teks)
		$query = "UPDATE post SET 
					title = '$title', 
					author = '$author', 
					content = '$contents', 
					categories = '$categories', 
					date = '$date' 
				WHERE id = '$id'";
	}
	
	$hasil = mysqli_query($koneksi, $query);
	
	if (!$hasil) {
    	die("Update data gagal: " . mysqli_error($koneksi));
    } else {
    	echo "<script>alert('Data berhasil diubah.');window.location='all-post.php';</script>";
    }
	