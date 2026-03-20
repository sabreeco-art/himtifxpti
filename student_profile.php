<?php
session_start();
include 'koneksi.php';

// Proteksi: Harus login sebagai Student
if(!isset($_SESSION['status']) || $_SESSION['role'] !== 'Student'){
    header("location:login.php");
    exit();
}

// Ambil data terbaru dari database berdasarkan ID di session
$id_user = $_SESSION['id'];
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id_user'");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My Profile - LearnGo</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <?php include('sidebar-student.php'); ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" class="p-4">
                <h1 class="h3 mb-4 text-gray-800">My Profile</h1>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card shadow mb-4 text-center">
                            <div class="card-body">
                                <img class="img-profile rounded-circle mb-3" 
                                     src="img/<?= !empty($user['image']) ? $user['image'] : 'undraw_profile.svg'; ?>" 
                                     style="width: 150px; height: 150px; object-fit: cover;">
                                <h5 class="font-weight-bold"><?= $user['firstname'] . " " . $user['lasttname']; ?></h5>
                                <p class="text-muted"><?= $user['email']; ?></p>
                                <span class="badge badge-success"><?= $user['role']; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Edit Personal Info</h6>
                            </div>
                            <div class="card-body">
                                <form action="student_profile_update.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>First Name</label>
                                            <input type="text" name="firstname" class="form-control" value="<?= $user['firstname']; ?>" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Last Name</label>
                                            <input type="text" name="lasttname" class="form-control" value="<?= $user['lasttname']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email Address (Cannot be changed)</label>
                                        <input type="email" class="form-control" value="<?= $user['email']; ?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label>Update Profile Picture</label>
                                        <input type="file" name="foto" class="form-control-file">
                                        <small class="text-muted">Format: JPG/PNG, Max: 2MB</small>
                                    </div>
                                    <hr>
                                    <button type="submit" name="update" class="btn btn-primary btn-block">Save Changes</button>
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