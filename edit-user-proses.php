<?php
	include 'koneksi.php';

    session_start();
	
    $id = intval($_POST['id']);
	$firstname = mysqli_real_escape_string($koneksi, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($koneksi, $_POST['lastname']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $about = mysqli_real_escape_string($koneksi, $_POST['about']);
    $role = mysqli_real_escape_string($koneksi, $_POST['role']);
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$nama_file = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
	
	$query = "UPDATE user SET firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password', about = '$about', role = '$role', nama_file = '$nama_file', image = '".$image."' WHERE id = $id";
	
	$hasil = mysqli_query($koneksi, $query);
	
	if (!$hasil) {
    	die("Update data gagal: " . mysqli_error($koneksi));
    } else {
    	echo "<script>alert('Data berhasil diubah.');window.location='all-user.php';</script>";
    }
	