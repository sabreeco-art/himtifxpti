<?php
include('koneksi.php');
session_start();

if (!isset($_SESSION['email'])) {
    header("location:login.php");
    exit();
}

// Query buat ambil data materi dan nama course-nya
$query = "SELECT materi.*, course.title AS nama_course 
          FROM materi 
          JOIN course ON materi.id_course = course.id 
          ORDER BY materi.id_materi DESC";
$hasil = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>All Materi - LearnGo</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <?php include('sidebar-db.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" class="p-4">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Manajemen Materi</h1>
                    <a href="add-new-materi.php" class="btn btn-primary btn-sm shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Materi
                    </a>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Materi</th>
                                        <th>Nama Course</th>
                                        <th>Link Video</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    while($row = mysqli_fetch_assoc($hasil)) { 
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['title_materi']; ?></td>
                                        <td><span class="badge badge-info"><?= $row['nama_course']; ?></span></td>
                                        <td><small><?= $row['video_link']; ?></small></td>
                                        <td>
                                            <a href="edit-materi.php?id=<?= $row['id_materi']; ?>" class="btn btn-warning btn-circle btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="delete-materi.php?id=<?= $row['id_materi']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin mau hapus materi ini brok?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</body>
</html>