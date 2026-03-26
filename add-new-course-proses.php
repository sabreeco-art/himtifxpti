<?php
    include 'koneksi.php';

    session_start();
    
    $title = mysqli_real_escape_string($koneksi, $_POST['title']);
    $author = $_SESSION['firstname'];
    $description = mysqli_real_escape_string($koneksi, $_POST['description']);
    $jumlah_pelajaran = intval($_POST['jumlah_pelajaran']);
    $jam = intval($_POST['jam']);
    $harga = intval($_POST['harga']);
    $tingkat = mysqli_real_escape_string($koneksi, $_POST['tingkat']);
    $date = date('Y-m-d H:i:s');
    $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
    $nama_file = mysqli_real_escape_string($koneksi, $_FILES['img']['name']);

$query = "INSERT INTO course (title, author, description, jumlah_pelajaran, jam, harga, tingkat, date, nama_file, img) VALUES ('$title', '$author', '$description', '$jumlah_pelajaran', '$jam', '$harga', '$tingkat', '$date', '$nama_file', '$img')";
    
    
    $hasil = mysqli_query($koneksi, $query);
    
    if ($hasil) {
        echo "<script>alert('Course Berhasil Dibuat');window.location='all-course.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
?>