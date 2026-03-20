<?php
	include 'koneksi.php';
	
	$id = $_GET['id'];
	
	$query = "DELETE FROM user WHERE id='$id' ";
	$hasil = mysqli_query($koneksi, $query);
	
	if(!$hasil){
		die ("gagal menghapus data: ".mysqli_errno($koneksi). " - " . mysqli_error($koneksi));
	} else {
		echo "<script>alert('The user has been successfully deleted.');window.location='all-user.php'</script>";
	}