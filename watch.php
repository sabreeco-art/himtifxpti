<?php 
session_start();
include 'koneksi.php';

// 1. Proteksi Student
if(!isset($_SESSION['status']) || $_SESSION['role'] !== 'Student'){
    header("location:login.php");
    exit();
}

// 2. Ambil ID Course
$id_course = isset($_GET['id']) ? mysqli_real_escape_string($koneksi, $_GET['id']) : '';

// 3. Ambil data Course
$query_course = mysqli_query($koneksi, "SELECT * FROM course WHERE id='$id_course'");
$course = mysqli_fetch_assoc($query_course);

if (!$course) {
    echo "<script>alert('Course tidak ditemukan!');window.location='student_dashboard.php';</script>";
    exit();
}

// 4. Ambil semua materi
$query_materi = mysqli_query($koneksi, "SELECT * FROM materi WHERE id_course='$id_course' ORDER BY id_materi ASC");
$materi_aktif = null;
$daftar_materi = [];
while($row = mysqli_fetch_assoc($query_materi)) {
    $daftar_materi[] = $row;
}

// 5. Tentukan materi yang lagi diputar
$id_materi_skrg = isset($_GET['materi']) ? $_GET['materi'] : (isset($daftar_materi[0]) ? $daftar_materi[0]['id_materi'] : null);

foreach ($daftar_materi as $m) {
    if ($m['id_materi'] == $id_materi_skrg) {
        $materi_aktif = $m;
    }
}

// --- MESIN KONVERTER YOUTUBE OTOMATIS ---
function getYoutubeEmbed($url) {
    // Cari ID Video (11 digit) dari berbagai format link YT
    $pattern = '%^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com/(?:embed/|v/|watch\?v=|watch\?.+&v=))([\w-]{11})(?:.+)?$%x';
    preg_match($pattern, $url, $matches);
    $videoId = (isset($matches[1])) ? $matches[1] : false;

    if ($videoId) {
        return "https://www.youtube.com/embed/" . $videoId;
    }
    return $url; // Balikin link asli kalau bukan YT
}
// ----------------------------------------
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Belajar: <?= $course['title']; ?></title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body { background: #f4f7f6; }
        .video-box { background: #000; border-radius: 12px; overflow: hidden; position: relative; padding-top: 56.25%; }
        .video-box iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none; }
        .materi-list-box { height: 500px; overflow-y: auto; background: white; border-radius: 12px; }
        .item-materi { border-left: 4px solid transparent; transition: 0.2s; cursor: pointer; text-decoration: none !important; display: block; }
        .item-materi:hover { background: #f8f9fc; border-left: 4px solid #4e73df; }
        .item-materi.active { background: #eaecf4; border-left: 4px solid #4e73df; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <a class="nav-link text-primary font-weight-bold" href="student_dashboard.php">
            <i class="fas fa-chevron-left mr-2"></i> Kembali
        </a>
        <div class="topbar-divider d-none d-sm-block"></div>
        <span class="navbar-text font-weight-bold text-gray-800"><?= $course['title']; ?></span>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <?php if ($materi_aktif): ?>
                    <div class="video-box shadow-lg mb-4">
                        <iframe src="<?= getYoutubeEmbed($materi_aktif['video_link']); ?>" allowfullscreen></iframe>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <h4 class="font-weight-bold text-primary"><?= $materi_aktif['title_materi']; ?></h4>
                            <hr>
                            <div class="text-gray-800">
                                <?= $materi_aktif['deskripsi_materi']; ?>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning">Teacher belum mengupload materi untuk kursus ini brok.</div>
                <?php endif; ?>
            </div>

            <div class="col-lg-4">
                <div class="card shadow materi-list-box">
                    <div class="card-header bg-primary text-white">
                        <h6 class="m-0 font-weight-bold">Kurikulum Kursus</h6>
                    </div>
                    <div class="card-body p-0">
                        <?php if (empty($daftar_materi)): ?>
                            <p class="p-3 text-center text-muted">Belum ada video.</p>
                        <?php else: ?>
                            <?php foreach ($daftar_materi as $index => $m): ?>
                                <a href="watch.php?id=<?= $id_course; ?>&materi=<?= $m['id_materi']; ?>" 
                                   class="item-materi p-3 border-bottom <?= ($m['id_materi'] == $id_materi_skrg) ? 'active' : ''; ?>">
                                    <div class="d-flex align-items-center">
                                        <div class="mr-3 text-gray-500 font-weight-bold"><?= $index + 1; ?>.</div>
                                        <div>
                                            <div class="text-gray-900 font-weight-bold small"><?= $m['title_materi']; ?></div>
                                            <small class="text-muted"><i class="fas fa-play-circle mr-1"></i> Video Materi</small>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>