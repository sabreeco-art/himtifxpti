<?php
session_start();
include 'koneksi.php';

// Proteksi halaman
if(!isset($_SESSION['status']) || $_SESSION['role'] !== 'Student'){
    header("location:login.php");
    exit();
}

// Ambil data user terbaru
$id_user = $_SESSION['id'];
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id_user'");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Setting User - LearnGo</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <?php include 'sidebar_student.php'; ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" class="p-4">
                <h1 class="h3 mb-4 text-gray-800 font-weight-bold">⚙️ Setting User</h1>

                <div class="row">
                    <div class="col-lg-7">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Informasi Profil</h6>
                            </div>
                            <div class="card-body">
                                <form action="setting_user_process.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>Nama Depan</label>
                                            <input type="text" name="firstname" class="form-control" value="<?= $user['firstname']; ?>" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Nama Belakang</label>
                                            <input type="text" name="lasttname" class="form-control" value="<?= $user['lastname']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email (Username)</label>
                                        <input type="text" class="form-control" value="<?= $user['email']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label>Foto Profil Baru</label>
                                        <input type="file" name="foto" class="form-control-file">
                                    </div>
                                    <button type="submit" name="update_profil" class="btn btn-primary">Simpan Profil</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="card shadow mb-4 border-left-danger">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-danger">Keamanan Password</h6>
                            </div>
                            <div class="card-body">
                                <form action="setting_user_process.php" method="POST">
                                    <div class="mb-3">
                                        <label>Password Lama</label>
                                        <input type="password" name="old_pass" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Password Baru</label>
                                        <input type="password" name="new_pass" class="form-control" required>
                                    </div>
                                    <button type="submit" name="update_password" class="btn btn-danger btn-block">Ganti Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>