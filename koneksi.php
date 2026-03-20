<?php

	$server = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'learngo';
	
	$koneksi = mysqli_connect($server, $user, $password, $database);

    if (!$koneksi){
        die("Gagal terhubung" . mysqli_connect_error());
    }