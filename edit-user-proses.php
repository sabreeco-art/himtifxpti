<?php
	include 'koneksi.php';

    session_start();
	
    $id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $about = $_POST['about'];
    $role = $_POST['role'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	
	$query = "UPDATE user SET firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password', about = '$about', role = '$role', nama_file = '".$_FILES['image']['name']."', image = '".$image."' WHERE id = $id";
	
	$hasil = mysqli_query($koneksi, $query);
	
	if (!$hasil) {
    	die("Update data gagal: " . mysqli_error($koneksi));
    } else {
    	echo "<script>alert('Data berhasil diubah.');window.location='all-user.php';</script>";
    }
	