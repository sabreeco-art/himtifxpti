<?php
    include 'koneksi.php';

    session_start();

    $id = $_POST['id'];
    $title_1 = $_POST['title_1'];
    $subtitle_1 = $_POST['subtitle_1'];
    $btn_1 = $_POST['btn_1'];
    $btn_2 = $_POST['btn_2'];
    $src_btn_1 = $_POST['src_btn_1'];
    $src_btn_2 = $_POST['src_btn_2'];
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

    $title_2_1 = $_POST['title_2_1'];
    $title_2_2 = $_POST['title_2_2'];
    $subtitle_2 = $_POST['subtitle_2'];
    $menu_1 = $_POST['menu_1'];
    $menu_2 = $_POST['menu_2'];
    $menu_3 = $_POST['menu_3'];
    $btn_2_1 = $_POST['btn_2_1'];
    //$image2 = addslashes(file_get_contents($_FILES['image2']['tmp_name']));
    // Cek apakah file image2 diupload atau tidak
    if ($_FILES['image2']['error'] == UPLOAD_ERR_NO_FILE) {
        // Jika tidak, ambil nama file dari database
        $query_image2 = "SELECT nama_file2 FROM homepage WHERE id = '$id'";
        $result_image2 = mysqli_query($koneksi, $query_image2);
        $row_image2 = mysqli_fetch_assoc($result_image2);
        $nama_file2 = $row_image2['nama_file2'];
        $image2 = null;
    } else {
        // Jika diupload, ambil nama file dan isi file
        $nama_file2 = $_FILES['image2']['name'];
        $image2 = addslashes(file_get_contents($_FILES['image2']['tmp_name']));
    }

    $title_3_1 = $_POST['title_3_1'];
    $subtitle_3_1 = $_POST['subtitle_3_1'];
    $title_3_2 = $_POST['title_3_2'];
    $subtitle_3_2 = $_POST['subtitle_3_2'];
    $title_3_3 = $_POST['title_3_3'];
    $subtitle_3_3 = $_POST['subtitle_3_3'];

    $subtitle_4_1 = $_POST['subtitle_4_1'];
    $title_4_1 = $_POST['title_4_1'];
    $btn_4_1 = $_POST['btn_4_1'];
    $btntarget_4_1 = $_POST['btntarget_4_1'];

    $title_cta = $_POST['title_cta'];
    $subtitle_cta = $_POST['subtitle_cta'];
    $btn_cta = $_POST['btn_cta'];
    $btntarget_cta = $_POST['btntarget_cta'];

    $title_5_1 = $_POST['title_5_1'];

    $title_6_1 = $_POST['title_6_1'];
    $subtitle_6_1 = $_POST['subtitle_6_1'];

    $query = "UPDATE homepage SET 
            title_1 = '$title_1', 
            subtitle_1 = '$subtitle_1', 
            btn_1 = '$btn_1', 
            btn_2 = '$btn_2', 
            src_btn_1 = '$src_btn_1', 
            src_btn_2 = '$src_btn_2', 
            nama_file = '".$_FILES['image']['name']."', 
            image = '".$image."',
            title_2_1 = '$title_2_1',
            title_2_2 = '$title_2_2',
            subtitle_2 = '$subtitle_2',
            menu_1 = '$menu_1',
            menu_2 = '$menu_2',
            menu_3 = '$menu_3',
            btn_2_1 = '$btn_2_1',
            nama_file2 = '".$_FILES['image2']['name']."', 
            image2 = '".$image2."',
            title_3_1 = '$title_3_1',
            subtitle_3_1 = '$subtitle_3_1',
            title_3_2 = '$title_3_2',
            subtitle_3_2 = '$subtitle_3_2',
            title_3_3 = '$title_3_3',
            subtitle_3_3 = '$subtitle_3_3',
            subtitle_4_1 = '$subtitle_4_1',
            title_4_1 = '$title_4_1',
            btn_4_1 = '$btn_4_1',
            btntarget_4_1 = '$btntarget_4_1',
            title_5_1 = '$title_5_1',
            title_6_1 = '$title_6_1',
            subtitle_6_1 = '$subtitle_6_1',
            title_cta = '$title_cta',
            subtitle_cta = '$subtitle_cta',
            btn_cta = '$btn_cta',
            btntarget_cta = '$btntarget_cta'
            WHERE id = '$id'";


    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
    echo "<script>alert('Homepage Berhasil Diedit');window.location='home-page.php'</script>";
    } else {
    $error_msg = "Kesalahan dalam mengedit homepage: " . mysqli_error($koneksi);
    error_log($error_msg);
    echo "<script>alert('Homepage Gagal Diedit: ".$error_msg."');</script>";
    }