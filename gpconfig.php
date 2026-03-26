<?php
session_start();

// Include Librari Google Client (API)
include_once 'libraries/google-client/Google_Client.php';
include_once 'libraries/google-client/contrib/Google_Oauth2Service.php';

$client_id = getenv('GOOGLE_CLIENT_ID') ?: '570438074677-qic0reb8qj5a0hbtogngr5mc44difphd.apps.googleusercontent.com';
$client_secret = getenv('GOOGLE_CLIENT_SECRET') ?: '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';
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
$redirect_url = getenv('GOOGLE_REDIRECT_URL') ?: $base_url . '/google.php';

// Call Google API
$gclient = new Google_Client();
$gclient->setApplicationName('Google Login'); // Set dengan Nama Aplikasi Kalian
$gclient->setClientId($client_id); // Set dengan Client ID
$gclient->setClientSecret($client_secret); // Set dengan Client Secret
$gclient->setRedirectUri($redirect_url); // Set URL untuk Redirect setelah berhasil login

$google_oauthv2 = new Google_Oauth2Service($gclient);
?>