<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("location:login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Query hapus
    $query = "DELETE FROM materi WHERE id_materi = '$id'";
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        echo "<script>alert('Materi berhasil dihapus!'); window.location='all-materi.php';</script>";
    } else {
        echo "Gagal menghapus: " . mysqli_error($koneksi);
    }
} else {
    header("location:all-materi.php");
}
?>