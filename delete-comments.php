<?php
	include 'koneksi.php';
	
	$id = $_GET['id'];
	
	$query = "DELETE FROM commentuser WHERE id='$id' ";
	$hasil = mysqli_query($koneksi, $query);
	
	if(!$hasil){
		die ("gagal menghapus data: ".mysqli_errno($koneksi). " - " . mysqli_error($koneksi));
	} else {
		echo "<script>alert('The comments has been successfully deleted.');window.location='comments.php'</script>";
	}