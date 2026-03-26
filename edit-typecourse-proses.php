<?php
    include('koneksi.php');

    session_start();

    $id = intval($_POST['id']);
    $title = mysqli_real_escape_string($koneksi, $_POST['title']);
    $description = mysqli_real_escape_string($koneksi, $_POST['description']);
    $icon = mysqli_real_escape_string($koneksi, $_POST['icon']);
    $author = $_SESSION['firstname'];
    $date = date('Y-m-d H:i:s');

    $query = "UPDATE typecourse SET
        title = '$title',
        description = '$description',
        icon = '$icon',
        author = '$author',
        date = '$date'
        WHERE id = $id";

    $hasil = mysqli_query($koneksi, $query);

    if($hasil){
        echo "<script>alert('Data Type Of Course Berhasil Dirubah.');window.location='type-course.php'</script>";
    }