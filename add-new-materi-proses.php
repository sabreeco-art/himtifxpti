<?php
include 'koneksi.php';
session_start();

if (isset($_POST['id_course'])) {
    $id_course = $_POST['id_course'];
    $title_materi = mysqli_real_escape_string($koneksi, $_POST['title_materi']);
    $video_link = mysqli_real_escape_string($koneksi, $_POST['video_link']);
    $deskripsi_materi = mysqli_real_escape_string($koneksi, $_POST['deskripsi_materi']);
    $date = date('Y-m-d H:i:s');

    $query = "INSERT INTO materi (id_course, title_materi, video_link, deskripsi_materi, date_created) 
              VALUES ('$id_course', '$title_materi', '$video_link', '$deskripsi_materi', '$date')";
    
    $hasil = mysqli_query($koneksi, $query);
    
    if ($hasil) {
        echo "<script>alert('Materi Berhasil Ditambahkan!');window.location='all-materi.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>