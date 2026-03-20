<?php
    include('koneksi.php');

    session_start();

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];
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