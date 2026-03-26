<?php
	include 'koneksi.php';

	if ($_POST['password'] != $_POST['cpassword']) {
        // $_SESSION['alert_msg'] = 'Password and confirm password do not match';
        // header('Location: register.php');
		echo "<script>alert('Invalid Password and confirm password do not match');window.location='add-new-user.php';</script>";
        exit;
    }
	
	$firstname = mysqli_real_escape_string($koneksi, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($koneksi, $_POST['lastname']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $cpassword = mysqli_real_escape_string($koneksi, $_POST['cpassword']);
    $role = mysqli_real_escape_string($koneksi, $_POST['role']);
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$nama_file = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);
	
	$query = "INSERT INTO user (firstname, lastname, email, password, cpassword, role, nama_file, image) VALUES ('$firstname', '$lastname', '$email', '$password', '$cpassword', '$role', '$nama_file', '".$image."')";
	
	$hasil = mysqli_query($koneksi, $query);
	
	if ($hasil) {
		echo "<script>alert('Tambah User Berhasil');window.location='all-user.php';</script>";
	} else {
        echo "GAGAL";
    }