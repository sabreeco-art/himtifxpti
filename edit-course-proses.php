<?php
    include 'koneksi.php';

    session_start();
    
    $id = intval($_POST['id']);
    $title = mysqli_real_escape_string($koneksi, $_POST['title']);
    $author = $_SESSION['firstname'];
    $description = mysqli_real_escape_string($koneksi, $_POST['description']);
    $jumlah_pelajaran = intval($_POST['jumlah_pelajaran']);
    $jam = intval($_POST['jam']);
    $harga = intval($_POST['harga']);
    $tingkat = mysqli_real_escape_string($koneksi, $_POST['tingkat']);
    $date = date('Y-m-d H:i:s');
    $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));

    $query = "UPDATE course SET title = '$title', 
    author = '$author', 
    description = '$description', 
    jumlah_pelajaran ='$jumlah_pelajaran', 
    jam = '$jam', 
    harga = '$harga', 
    tingkat = '$tingkat', 
    date = '$date', 
    nama_file = '".$_FILES['img']['name']."', 
    img = '$img'
    WHERE id = $id";
    
    
    $hasil = mysqli_query($koneksi, $query);
    
    if ($hasil) {
        echo "<script>alert('Course Berhasil Diedit');window.location='all-course.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
?>