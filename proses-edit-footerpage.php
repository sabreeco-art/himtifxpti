<?php
    include 'koneksi.php';

    session_start();

    $id = $_POST['id'];
    //$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    if ($_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
        // Jika tidak, ambil nama file dari database
        $query_image = "SELECT nama_file FROM homepage WHERE id = '$id'";
        $result_image = mysqli_query($koneksi, $query_image);
        $row_image = mysqli_fetch_assoc($result_image);
        $nama_file = $row_image['nama_file'];
        $image = null;
    } else {
        // Jika diupload, ambil nama file dan isi file
        $nama_file = $_FILES['image']['name'];
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    }
	$description = $_POST['description'];
	$nama_web = $_POST['nama_web'];
	$desain_by = $_POST['desain_by'];
	$link_ig = $_POST['link_ig'];
	$link_fb = $_POST['link_fb'];
	$link_twt = $_POST['link_twt'];
	$link_lk = $_POST['link_lk'];


    $query = "UPDATE footerpage SET 
            nama_file = '".$_FILES['image']['name']."', 
            image = '".$image."',
            description = '$description',
			nama_web = '$nama_web',
			desain_by = '$desain_by',
			link_ig = '$link_ig',
			link_fb = '$link_fb',
			link_twt = '$link_twt',
			link_lk = '$link_lk',
            tahun_copyright = YEAR(CURRENT_TIMESTAMP)
            WHERE id = '$id'";


    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
    echo "<script>alert('Footer Berhasil Diedit');window.location='footer-page.php'</script>";
    } else {
    $error_msg = "Kesalahan dalam mengedit homepage: " . mysqli_error($koneksi);
    error_log($error_msg);
    echo "<script>alert('Homepage Gagal Diedit: ".$error_msg."');</script>";
    }