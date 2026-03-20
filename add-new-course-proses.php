<?php
    include 'koneksi.php';

    session_start();
    
    $title = $_POST['title'];
    $author = $_SESSION['firstname'];
    $description = $_POST['description'];
    $jumlah_pelajaran = $_POST['jumlah_pelajaran'];
    $jam = $_POST['jam'];
    $harga = $_POST['harga'];
    $tingkat = $_POST['tingkat'];
    $date = date('Y-m-d H:i:s');
    $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));

$query = "INSERT INTO course (title, author, description, jumlah_pelajaran, jam, harga, tingkat, date, nama_file, img) VALUES ('$title', '$author', '$description', '$jumlah_pelajaran', '$jam', '$harga', '$tingkat', '$date', '".$_FILES['img']['name']."', '$img')";
    
    
    $hasil = mysqli_query($koneksi, $query);
    
    if ($hasil) {
        echo "<script>alert('Course Berhasil Dibuat');window.location='all-course.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
?>