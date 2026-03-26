<?php

	$server = getenv('MYSQLHOST') ?: 'localhost';
	$user = getenv('MYSQLUSER') ?: 'root';
	$password = getenv('MYSQLPASSWORD') ?: '';
	$database = getenv('MYSQLDATABASE') ?: 'learngo';
	$port = getenv('MYSQLPORT') ?: 3306;
	
	$koneksi = mysqli_connect($server, $user, $password, $database, $port);

    if (!$koneksi){
        die("Gagal terhubung" . mysqli_connect_error());
    }