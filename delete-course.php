<?php
	include 'koneksi.php';
	
	$id = $_GET['id'];
	
	$query = "DELETE FROM course WHERE id='$id' ";
	$hasil = mysqli_query($koneksi, $query);
	
	if(!$hasil){
		die ("gagal menghapus data: ".mysqli_errno($koneksi). " - " . mysqli_error($koneksi));
	} else {
		echo "<script>window.location='all-course.php'</script>";
	}