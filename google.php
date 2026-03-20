<?php
include_once 'gpconfig.php';

if(isset($_GET['code'])){
    $gclient->authenticate($_GET['code']);
    $_SESSION['token'] = $gclient->getAccessToken();
    header('Location: ' . filter_var($redirect_url, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gclient->setAccessToken($_SESSION['token']);
}

if ($gclient->getAccessToken()) {
    include 'koneksi.php';

    $gpuserprofile = $google_oauthv2->userinfo->get();

    $nama = $gpuserprofile['given_name']." ".$gpuserprofile['family_name'];
    $email = $gpuserprofile['email'];

    
    $conn = new PDO("mysql:host=localhost;dbname=learngo", "root", "12345");
    $sql = $conn->prepare("SELECT id, firstname, image FROM user WHERE email=:a");
    $sql->bindParam(':a', $email);
    $sql->execute(); 

    $user = $sql->fetch();
if(empty($user)){ 
    $ex = explode('@', $email); 
    $firstname = $ex[0]; 

    $conn = new PDO("mysql:host=localhost;dbname=learngo", "root", "12345");
    $sql = $conn->prepare("INSERT INTO user(firstname, lastname, email, role) VALUES(:firstname,:lastname,:email, 'Student')");
    $sql->bindParam(':firstname', $firstname);
    $sql->bindParam(':lastname', $lastname);
    $sql->bindParam(':email', $email);
    $sql->execute();

    $id = $conn->lastInsertId();
}else{
    $id = $user['id'];
    $firstname = $user['firstname'];
    $lastname = $user['lastname'];
}

    $_SESSION['id'] = $id;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['email'] = $email;

    header("location: dashboard.php");
} else {
    $authUrl = $gclient->createAuthUrl();
    header("location: ".$authUrl);
}
?>