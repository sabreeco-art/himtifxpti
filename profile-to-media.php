<?php
include('koneksi.php');

$id = $_GET['id'];
$query = "SELECT * FROM user WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$image = $row['image'];

header("Content-type: image/jpeg");
echo $image;
?>