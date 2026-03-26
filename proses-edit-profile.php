<?php
include('koneksi.php');

session_start();

$id = intval($_POST['id']);
$firstname = mysqli_real_escape_string($koneksi, $_POST['firstname']);
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$password = mysqli_real_escape_string($koneksi, $_POST['password']);
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$about = mysqli_real_escape_string($koneksi, $_POST['about']);
$nama_file = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);

$query = "UPDATE user SET firstname='$firstname', nama_file='$nama_file', image='".$image."', password='$password', email='$email', about='$about' WHERE id='$id'";

$result = mysqli_query($koneksi, $query);

if ($result) {
    $_SESSION['image'] = $image;
    $_SESSION['nama_file'] = $_FILES['image']['name'];
    echo "<script>alert('Profile berhasil diedit... Silahkan login kembail');window.location='logout.php'</script>";
} else {
    echo "Gagal mengupdate data";
}
?>