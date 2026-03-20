<?php
session_start();
include("koneksi.php");

if (isset($_POST['login'])) {
    // Ambil data dari form login.php
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Query cek user di tabel 'user'
    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($koneksi, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Simpan data user ke dalam Session
        $_SESSION['id']         = $row['id'];
        $_SESSION['firstname']  = $row['firstname'];
        $_SESSION['lasttname']   = $row['lasttname'];
        $_SESSION['email']      = $row['email'];
        $_SESSION['image']      = $row['image'];
        $_SESSION['role']       = $row['role']; // Isinya 'Teacher' atau 'Student'
        $_SESSION['status']     = "login";

        if ($row['role'] == "Teacher") {
            header("Location: dashboard.php?login=success");
            exit();
        } else if ($row['role'] == "Student") {
            header("Location: student_dashboard.php?login=success");
            exit();
        } else {
            echo "<script>alert('Role tidak dikenali sebagai Teacher atau Student!');window.location='login.php';</script>";
        }

    } else {
        echo "<script>alert('Ooops.. Email atau password anda salah!');window.location='login.php';</script>";
    }
} else {
    header("Location: login.php");
    exit();
}
?>