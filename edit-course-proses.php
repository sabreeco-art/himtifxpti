<?php
    include 'koneksi.php';

    session_start();
    
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_SESSION['firstname'];
    $description = $_POST['description'];
    $jumlah_pelajaran = $_POST['jumlah_pelajaran'];
    $jam = $_POST['jam'];
    $harga = $_POST['harga'];
    $tingkat = $_POST['tingkat'];
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