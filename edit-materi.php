<?php
session_start();
include 'koneksi.php';

// Ambil ID dari URL
$id_materi = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM materi WHERE id_materi='$id_materi'");
$data = mysqli_fetch_assoc($query);

// Ambil daftar course buat dropdown biar bisa ganti kategori kursusnya
$query_course = mysqli_query($koneksi, "SELECT * FROM course");

if (isset($_POST['update'])) {
    $judul = mysqli_real_escape_string($koneksi, $_POST['title_materi']);
    $link = mysqli_real_escape_string($koneksi, $_POST['video_link']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi_materi']);
    $id_c = $_POST['id_course'];

    $update = mysqli_query($koneksi, "UPDATE materi SET 
        title_materi='$judul', 
        video_link='$link', 
        deskripsi_materi='$deskripsi', 
        id_course='$id_c' 
        WHERE id_materi='$id_materi'");

    if ($update) {
        echo "<script>alert('Materi berhasil diupdate!'); window.location='all-materi.php';</script>";
    } else {
        echo "Gagal: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Materi - LearnGo</title>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="m-0">Edit Materi: <?= $data['title_materi']; ?></h5>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group mb-3">
                        <label>Pilih Course</label>
                        <select name="id_course" class="form-control" required>
                            <?php while($c = mysqli_fetch_assoc($query_course)) { ?>
                                <option value="<?= $c['id']; ?>" <?= ($c['id'] == $data['id_course']) ? 'selected' : ''; ?>>
                                    <?= $c['title']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Judul Materi</label>
                        <input type="text" name="title_materi" class="form-control" value="<?= $data['title_materi']; ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Link Video (Embed)</label>
                        <input type="text" name="video_link" class="form-control" value="<?= $data['video_link']; ?>" required>
                        <small class="text-muted">Contoh: https://www.youtube.com/embed/XXXXX</small>
                    </div>
                    <div class="form-group mb-3">
                        <label>Deskripsi Materi</label>
                        <textarea name="deskripsi_materi" class="form-control" rows="5"><?= $data['deskripsi_materi']; ?></textarea>
                    </div>
                    <hr>
                    <a href="all-materi.php" class="btn btn-secondary">Batal</a>
                    <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>