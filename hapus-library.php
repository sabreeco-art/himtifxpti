<?php
	include 'koneksi.php';
	
	$id = $_GET['id'];
	
	$query = "DELETE FROM media WHERE id='$id' ";
	$hasil = mysqli_query($koneksi, $query);
	
	if(!$hasil){
		die ("gagal menghapus data: ".mysqli_errno($koneksi). " - " . mysqli_error($koneksi));
	} else {
		echo "<script>alert('Media Berhasil Dihapus');window.location='library.php'</script>";
	}