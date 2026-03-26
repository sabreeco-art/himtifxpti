<?php
    include 'koneksi.php';

    session_start();

    $id = intval($_POST['id']);
    $title = mysqli_real_escape_string($koneksi, $_POST['title']);
    $subtitle = mysqli_real_escape_string($koneksi, $_POST['subtitle']);

    $title_3_1 = mysqli_real_escape_string($koneksi, $_POST['title_3_1']);
    $jumlah_3_1 = mysqli_real_escape_string($koneksi, $_POST['jumlah_3_1']);
    $fast_3_1 = mysqli_real_escape_string($koneksi, $_POST['fast_3_1']);
    $title_3_2 = mysqli_real_escape_string($koneksi, $_POST['title_3_2']);
    $jumlah_3_2 = mysqli_real_escape_string($koneksi, $_POST['jumlah_3_2']);
    $fast_3_2 = mysqli_real_escape_string($koneksi, $_POST['fast_3_2']);
    $title_3_3 = mysqli_real_escape_string($koneksi, $_POST['title_3_3']);
    $jumlah_3_3 = mysqli_real_escape_string($koneksi, $_POST['jumlah_3_3']);
    $fast_3_3 = mysqli_real_escape_string($koneksi, $_POST['fast_3_3']);

    $title_vm = mysqli_real_escape_string($koneksi, $_POST['title_vm']);
    $title_v = mysqli_real_escape_string($koneksi, $_POST['title_v']);
    $isi_v = mysqli_real_escape_string($koneksi, $_POST['isi_v']);
    $title_m = mysqli_real_escape_string($koneksi, $_POST['title_m']);
    $isi_m = mysqli_real_escape_string($koneksi, $_POST['isi_m']);

    $title_tim = mysqli_real_escape_string($koneksi, $_POST['title_tim']);

    $query = "UPDATE aboutpage SET 
            title = '$title', 
            subtitle = '$subtitle', 
            title_3_1 = '$title_3_1', 
            jumlah_3_1= '$jumlah_3_1', 
            fast_3_1 = '$fast_3_1', 
            title_3_2 = '$title_3_2', 
            jumlah_3_2= '$jumlah_3_2', 
            fast_3_2 = '$fast_3_2',
            title_3_3 = '$title_3_3', 
            jumlah_3_3= '$jumlah_3_3', 
            fast_3_3 = '$fast_3_3', 
            title_vm = '$title_vm',
            title_v = '$title_v',
            isi_v = '$isi_v',
            title_m = '$title_m',
            isi_m = '$isi_m',
            title_tim = '$title_tim'
            WHERE id = '$id'";


    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
    echo "<script>alert('AboutPage Berhasil Diedit');window.location='about-page.php'</script>";
    } else {
    $error_msg = "Kesalahan dalam mengedit AboutPage: " . mysqli_error($koneksi);
    error_log($error_msg);
    echo "<script>alert('AboutPage Gagal Diedit: ".$error_msg."');</script>";
    }