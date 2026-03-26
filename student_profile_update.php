<?php
session_start();
include 'koneksi.php';

if (isset($_POST['update'])) {
    $id_user = $_SESSION['id'];
    $fname = mysqli_real_escape_string($koneksi, $_POST['firstname']);
    $lname = mysqli_real_escape_string($koneksi, $_POST['lasttname']);
    
    // Cek apakah user upload foto baru
    if ($_FILES['foto']['name'] != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
        $nama_file = $_FILES['foto']['name'];
        $x = explode('.', $nama_file);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto']['tmp_name'];
        
        // Bikin nama file unik biar gak bentrok
        $nama_file_baru = "user_" . $id_user . "_" . time() . "." . $ekstensi;

        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            $upload_dir = __DIR__ . '/img/';
            if (!file_exists($upload_dir)) mkdir($upload_dir, 0755, true);
            move_uploaded_file($file_tmp, $upload_dir . $nama_file_baru);
            
            // Query update dengan foto baru
            $query = "UPDATE user SET firstname='$fname', lasttname='$lname', image='$nama_file_baru' WHERE id='$id_user'";
        } else {
            echo "<script>alert('Ekstensi file tidak didukung!'); window.location='student_profile.php';</script>";
            exit();
        }
    } else {
        // Query update tanpa ganti foto
        $query = "UPDATE user SET firstname='$fname', lasttname='$lname' WHERE id='$id_user'";
    }

    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        // Update session juga biar nama di sidebar langsung ganti tanpa logout
        $_SESSION['firstname'] = $fname;
        $_SESSION['lasttname'] = $lname;
        
        echo "<script>alert('Profile updated successfully!'); window.location='student_profile.php';</script>";
    } else {
        echo "Gagal update: " . mysqli_error($koneksi);
    }
}