<?php 
session_start();
include 'koneksi.php';

// Proteksi halaman buat Student
if(!isset($_SESSION['status']) || $_SESSION['status'] !== "login" || $_SESSION['role'] !== 'Student'){
    header("location:index.php");
    exit();
}

// Ambil data course dari tabel 'course' punya lu
// Nama kolom gua samain: title, author, description, harga, img
$query_course = mysqli_query($koneksi, "SELECT * FROM course ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Dashboard - LearnGo</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .course-card { border: none; border-radius: 15px; transition: 0.3s; overflow: hidden; }
        .course-card:hover { transform: translateY(-7px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
        .course-img { height: 180px; object-fit: cover; width: 100%; }
        .price-badge { background: #eef2ff; color: #4e73df; font-weight: bold; padding: 4px 12px; border-radius: 20px; font-size: 0.8rem; }
    </style>
</head>
<body id="page-top">
    <div id="wrapper">
        <?php include 'sidebar_student.php'; ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" class="p-4">
                
                <div class="mb-4">
                    <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Halo, <?php echo $_SESSION['firstname']; ?>! 👋</h1>
                    <p class="text-muted">Mau belajar apa hari ini? Cek kursus terbaru dari Teacher.</p>
                </div>

                <div class="row">
                    <?php while($data = mysqli_fetch_assoc($query_course)) { ?>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card course-card shadow h-100">
                            
                            <?php 
                                // Karena lu simpen gambar pake addslashes/blob, kita konversi ke base64
                                $imageData = base64_encode($data['img']);
                                $src = 'data:image/jpeg;base64,'.$imageData;
                            ?>
                            <img src="<?php echo $src; ?>" class="course-img" onerror="this.src='https://via.placeholder.com/300x180?text=No+Image'">
                            
                            <div class="card-body">
                                <div class="mb-2">
                                    <span class="price-badge">Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></span>
                                </div>
                                <h6 class="font-weight-bold text-gray-900"><?php echo $data['title']; ?></h6>
                                <p class="text-muted small mb-3">
                                    <?php echo substr(strip_tags($data['description']), 0, 80); ?>...
                                </p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <small class="text-primary"><i class="fas fa-user-tie mr-1"></i> <?php echo $data['author']; ?></small>
                                    <a href="watch.php?id=<?php echo $data['id']; ?>" class="btn btn-primary btn-sm rounded-pill px-3">Mulai</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <?php if(mysqli_num_rows($query_course) == 0) : ?>
                    <div class="text-center mt-5">
                        <i class="fas fa-book-open fa-3x text-gray-300 mb-3"></i>
                        <p class="text-gray-500">Belum ada kursus yang dibuat oleh Teacher.</p>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</body>
</html>