<?php
    include 'koneksi.php';

    session_start();

    $id = $_POST['id'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];

    $n_phone = $_POST['n_phone'];
    $email_support = $_POST['email_support'];
    $email_general = $_POST['email_general'];

    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];
    $facebook = $_POST['facebook'];
    $linkedin = $_POST['linkedin'];

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