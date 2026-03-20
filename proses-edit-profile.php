<?php
include('koneksi.php');

session_start();

$id = $_POST['id'];
$firstname = $_POST['firstname'];
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$password = $_POST['password'];
$email = $_POST['email'];
$about = $_POST['about'];

$query = "UPDATE user SET firstname='$firstname', nama_file='".$_FILES['image']['name']."', image='".$image."', password='$password', email='$email', about='$about' WHERE id='$id'";

$result = mysqli_query($koneksi, $query);

if ($result) {
    $_SESSION['image'] = $image;
    $_SESSION['nama_file'] = $_FILES['image']['name'];
    echo "<script>alert('Profile berhasil diedit... Silahkan login kembail');window.location='logout.php'</script>";
} else {
    echo "Gagal mengupdate data";
}
?>