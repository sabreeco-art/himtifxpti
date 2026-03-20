<?php
    include 'koneksi.php';

    session_start();

    $id = $_POST['id'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];

    $title_3_1 = $_POST['title_3_1'];
    $jumlah_3_1 = $_POST['jumlah_3_1'];
    $fast_3_1 = $_POST['fast_3_1'];
    $title_3_2 = $_POST['title_3_2'];
    $jumlah_3_2 = $_POST['jumlah_3_2'];
    $fast_3_2 = $_POST['fast_3_2'];
    $title_3_3 = $_POST['title_3_3'];
    $jumlah_3_3 = $_POST['jumlah_3_3'];
    $fast_3_3 = $_POST['fast_3_3'];

    $title_vm = $_POST['title_vm'];
    $title_v = $_POST['title_v'];
    $isi_v = $_POST['isi_v'];
    $title_m = $_POST['title_m'];
    $isi_m = $_POST['isi_m'];

    $title_tim = $_POST['title_tim'];

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