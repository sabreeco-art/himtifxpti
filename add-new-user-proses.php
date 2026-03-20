<?php
	include 'koneksi.php';

	if ($_POST['password'] != $_POST['cpassword']) {
        // $_SESSION['alert_msg'] = 'Password and confirm password do not match';
        // header('Location: register.php');
		echo "<script>alert('Invalid Password and confirm password do not match');window.location='add-new-user.php';</script>";
        exit;
    }
	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $role = $_POST['role'];
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	
	$query = "INSERT INTO user (firstname, lastname, email, password, cpassword, role, nama_file, image) VALUES ('$firstname', '$lastname', '$email', '$password', '$cpassword', '$role', '".$_FILES['image']['name']."', '".$image."')";
	
	$hasil = mysqli_query($koneksi, $query);
	
	if ($hasil) {
		echo "<script>alert('Tambah User Berhasil');window.location='all-user.php';</script>";
	} else {
        echo "GAGAL";
    }