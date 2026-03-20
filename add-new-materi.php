<?php
include('koneksi.php');
session_start();

// Cek Session Teacher
if (!isset($_SESSION['email'])) {
    echo "<script>alert('Login dulu brok!');window.location='login.php';</script>";
    exit();
}

// Ambil daftar course buat dropdown
$query_course = mysqli_query($koneksi, "SELECT id, title FROM course ORDER BY title ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add New Materi - LearnGo</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
</head>
<body id="page-top">
    <div id="wrapper">
        <?php include('sidebar-db.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" class="p-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Materi Baru</h6>
                    </div>
                    <div class="card-body">
                        <form action="add-new-materi-proses.php" method="POST">
                            <div class="form-group">
                                <label>Pilih Course (Materi ini buat kursus apa?)</label>
                                <select name="id_course" class="form-control" required>
                                    <option value="">-- Pilih Course --</option>
                                    <?php while($c = mysqli_fetch_assoc($query_course)) { ?>
                                        <option value="<?= $c['id']; ?>"><?= $c['title']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Judul Materi</label>
                                <input type="text" name="title_materi" class="form-control" placeholder="Contoh: Pengenalan PHP Dasar" required>
                            </div>
                            <div class="form-group">
                                <label>Link Video YouTube (Embed Link)</label>
                                <input type="text" name="video_link" class="form-control" placeholder="Contoh: https://www.youtube.com/embed/xxxxxx" required>
                                <small class="text-danger">*Pastikan link menggunakan format /embed/</small>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi/Teks Materi</label>
                                <textarea name="deskripsi_materi" id="editor1"></textarea>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                <span class="text">Simpan Materi</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>CKEDITOR.replace('editor1');</script>
</body>
</html>