<?php 
session_start();
include 'koneksi.php';

if(!isset($_SESSION['status']) || $_SESSION['role'] !== 'Student'){
    header("location:login.php");
    exit();
}

$query_course = mysqli_query($koneksi, "SELECT * FROM course ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My Learning - LearnGo</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .card-custom { border: none; border-radius: 15px; overflow: hidden; background: #fff; transition: 0.3s; }
        .progress { height: 8px; border-radius: 5px; }
        .course-icon { width: 50px; height: 50px; background: #4e73df; color: white; border-radius: 10px; display: flex; align-items: center; justify-content: center; }
    </style>
</head>
<body id="page-top">
    <div id="wrapper">
        <?php include 'sidebar_student.php'; ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" class="p-4">
                
                <h1 class="h3 mb-4 text-gray-800 font-weight-bold">Progres Belajar Gue 🚀</h1>

                <div class="row">
                    <?php while($data = mysqli_fetch_assoc($query_course)) { 
                        $id_c = $data['id'];
                        
                        // HITUNG TOTAL MATERI
                        $q_total = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM materi WHERE id_course='$id_c'");
                        $res_total = mysqli_fetch_assoc($q_total);
                        $total_materi = $res_total['total'];

                        // DUMMY PROGRESS (Nanti bisa lu ganti pake join tabel penyelesaian)
                        // Kita asumsikan murid udah selesaiin 1 materi buat contoh
                        $materi_selesai = ($total_materi > 0) ? 1 : 0; 
                        $persen = ($total_materi > 0) ? round(($materi_selesai / $total_materi) * 100) : 0;
                    ?>
                    
                    <div class="col-lg-12 mb-4">
                        <div class="card card-custom shadow-sm border-left-primary">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="course-icon shadow">
                                            <i class="fas fa-book-reader fa-lg"></i>
                                        </div>
                                    </div>
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            <?= $data['author']; ?>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['title']; ?></div>
                                        
                                        <div class="row no-gutters align-items-center mt-3">
                                            <div class="col-auto">
                                                <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800"><?= $persen; ?>%</div>
                                            </div>
                                            <div class="col">
                                                <div class="progress mr-2">
                                                    <div class="progress-bar bg-primary" role="progressbar" 
                                                        style="width: <?= $persen; ?>%" aria-valuenow="<?= $persen; ?>" 
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="text-muted mt-2 d-block">Terakhir dipelajari: <b>Materi 1</b></small>
                                    </div>
                                    <div class="col-auto">
                                        <a href="watch.php?id=<?= $data['id']; ?>" class="btn btn-primary btn-circle btn-lg shadow">
                                            <i class="fas fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</body>
</html>