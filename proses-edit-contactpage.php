<?php
    include 'koneksi.php';

    session_start();

    $id = intval($_POST['id']);
    $title = mysqli_real_escape_string($koneksi, $_POST['title']);
    $subtitle = mysqli_real_escape_string($koneksi, $_POST['subtitle']);

    $n_phone = mysqli_real_escape_string($koneksi, $_POST['n_phone']);
    $email_support = mysqli_real_escape_string($koneksi, $_POST['email_support']);
    $email_general = mysqli_real_escape_string($koneksi, $_POST['email_general']);

    $instagram = mysqli_real_escape_string($koneksi, $_POST['instagram']);
    $twitter = mysqli_real_escape_string($koneksi, $_POST['twitter']);
    $facebook = mysqli_real_escape_string($koneksi, $_POST['facebook']);
    $linkedin = mysqli_real_escape_string($koneksi, $_POST['linkedin']);

    $query = "UPDATE contactpage SET 
            title = '$title', 
            subtitle = '$subtitle', 
            n_phone = '$n_phone', 
            email_support= '$email_support', 
            email_general = '$email_general', 
            instagram = '$instagram', 
            twitter= '$twitter', 
            facebook = '$facebook',
            linkedin = '$linkedin'
            WHERE id = '$id'";


    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
    echo "<script>alert('ContactPage Berhasil Diedit');window.location='contact-page.php'</script>";
    } else {
    $error_msg = "Kesalahan dalam mengedit AboutPage: " . mysqli_error($koneksi);
    error_log($error_msg);
    echo "<script>alert('AboutPage Gagal Diedit: ".$error_msg."');</script>";
    }