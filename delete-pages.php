<?php
	include 'koneksi.php';
	
	$id = $_GET['id'];
	
	$query = "DELETE FROM pages WHERE id='$id' ";
	$hasil = mysqli_query($koneksi, $query);
	
	if(!$hasil){
		die ("gagal menghapus data: ".mysqli_errno($koneksi). " - " . mysqli_error($koneksi));
	} else {
		echo "<script>alert('The pages has been successfully deleted.');window.location='all-pages.php'</script>";
	}