<?php
include('koneksi.php');

$id = $_GET['id'];
$query = "SELECT * FROM homepage WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
$img_1 = $data['img_1'];

header("Content-type: image/jpeg");
echo $img;
?>