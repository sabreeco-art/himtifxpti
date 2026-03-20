<?php
include('koneksi.php');

$id = $_GET['id'];
$query = "SELECT * FROM post WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
$img = $data['img'];

header("Content-type: image/jpeg");
echo $img;
?>