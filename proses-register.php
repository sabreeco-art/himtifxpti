<?php
session_start();
include 'koneksi.php';

if ($_POST['password'] != $_POST['cpassword']) {
    echo "<script>alert('Password dan konfirmasi password tidak cocok');window.location='register.php';</script>";
    exit;
}

// Security: Cegah SQL Injection
$firstname = mysqli_real_escape_string($koneksi, $_POST['firstname']);
$lastname  = mysqli_real_escape_string($koneksi, $_POST['lastname']);
$email     = mysqli_real_escape_string($koneksi, $_POST['email']);
$password  = $_POST['password'];
$cpassword = $_POST['cpassword'];
$role      = mysqli_real_escape_string($koneksi, $_POST['role']);

// 1. Simpan ke Database MySQL (Lokal/Hosting)
$query = "INSERT INTO user (firstname, lastname, email, password, cpassword, role) VALUES ('$firstname', '$lastname', '$email', '$password', '$cpassword', '$role')";
$hasil = mysqli_query($koneksi, $query);

if ($hasil) {
    // 2. PROSES KIRIM KE GOOGLE SHEETS
    $spreadsheetId = '1jFPI_sNQH3ixtFfte2hP7-A2pEo2v9yGgK14Iug3Vxs'; // ID Sheets lu
    $range = 'Sheet1!A:E'; // Pastikan nama tab di bawah adalah 'Sheet1'
    
    // Load file credential.json
    $json = file_get_contents(__DIR__ . '/api/credential.json');
    $creds = json_decode($json, true);

    function get_google_access_token($creds) {
        $header = base64_encode(json_encode(['alg' => 'RS256', 'typ' => 'JWT']));
        $time = time();
        $payload = base64_encode(json_encode([
            'iss' => $creds['client_email'],
            'scope' => 'https://www.googleapis.com/auth/spreadsheets',
            'aud' => 'https://oauth2.googleapis.com/token',
            'exp' => $time + 3600,
            'iat' => $time
        ]));
        $signature_base = "$header.$payload";
        openssl_sign($signature_base, $signature, $creds['private_key'], "SHA256");
        $signature = base64_encode($signature);
        $jwt = "$header.$payload.$signature";
        
        $ch = curl_init('https://oauth2.googleapis.com/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $jwt
        ]));
        $res = json_decode(curl_exec($ch), true);
        return $res['access_token'];
    }

    // Eksekusi pengiriman data ke Google Sheets
    try {
        $accessToken = get_google_access_token($creds);
        
        // Urutan data: First Name, Last Name, Email, Role, Waktu Daftar
        $values = [[$firstname, $lastname, $email, $role, date('Y-m-d H:i:s')]];
        $data = json_encode(['values' => $values]);

        $url = "https://sheets.googleapis.com/v4/spreadsheets/$spreadsheetId/values/$range:append?valueInputOption=USER_ENTERED";
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $accessToken,
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_exec($ch);
        curl_close($ch);
    } catch (Exception $e) {
        // Ganti baris ini sementara buat nyari error
        echo "Error Sheets: " . $e->getMessage(); 
        exit;
    }

    echo "<script>alert('Pendaftaran Berhasil! Data sudah masuk ke MySQL & Google Sheets.');window.location='login.php';</script>";
} else {
    echo "Error Database: " . mysqli_error($koneksi);
}
?>