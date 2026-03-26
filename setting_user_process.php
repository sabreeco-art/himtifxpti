<?php
session_start();
include 'koneksi.php';

$id_user = $_SESSION['id'];

// PROSES 1: UPDATE PROFIL
if (isset($_POST['update_profil'])) {
    $fname = mysqli_real_escape_string($koneksi, $_POST['firstname']);
    $lname = mysqli_real_escape_string($koneksi, $_POST['lasttname']);

    if ($_FILES['foto']['name'] != "") {
        $nama_file = $_FILES['foto']['name'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        $ekstensi = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
        $nama_baru = "user_" . $id_user . "_" . time() . "." . $ekstensi;

        $upload_dir = __DIR__ . '/img/';
        if (!file_exists($upload_dir)) mkdir($upload_dir, 0755, true);
        move_uploaded_file($file_tmp, $upload_dir . $nama_baru);
        $query = "UPDATE user SET firstname='$fname', lasttname='$lname', image='$nama_baru' WHERE id='$id_user'";
        $_SESSION['image'] = $nama_baru; // Update foto di session
    } else {
        $query = "UPDATE user SET firstname='$fname', lasttname='$lname' WHERE id='$id_user'";
    }

    if (mysqli_query($koneksi, $query)) {
        $_SESSION['firstname'] = $fname;
        $_SESSION['lasttname'] = $lname;
        echo "<script>alert('Profil berhasil diupdate!'); window.location='setting_user.php';</script>";
    }
}

// PROSES 2: UPDATE PASSWORD
if (isset($_POST['update_password'])) {
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];

    $data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT password FROM user WHERE id='$id_user'"));

    if ($old_pass === $data['password']) {
        mysqli_query($koneksi, "UPDATE user SET password='$new_pass' WHERE id='$id_user'");
        echo "<script>alert('Password berhasil diganti!'); window.location='setting_user.php';</script>";
    } else {
        echo "<script>alert('Password lama salah!'); window.location='setting_user.php';</script>";
    }
}