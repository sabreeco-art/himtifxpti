<?php
include('koneksi.php');

session_start();

if (isset($_SESSION["email"])) {
    $login_text = "Hai, ";
    $email = $_SESSION["firstname"];
    $url = "dashboard.php";
    $gambar_profile = $_SESSION["image"];
} else {
    $login_text = "Login";
    $email = "";
    $url = "login.php";
    $gambar_profile = "img/user1.png";
}

if (isset($_GET['id'])) {
	$id = ($_GET['id']);

	$query = "SELECT * FROM post WHERE id='$id'";
	$hasil = mysqli_query($koneksi, $query);

	if (!$hasil) {
		die("Query Error: " . mysqli_errno($koneksi) .
			" - " . mysqli_error($koneksi));
	}

	$data = mysqli_fetch_assoc($hasil);

	if (!count($data)) {
		echo "<script>alert('Data tidak ditemukan pada database');window.location='all-post.php';</script>";
	}
} else {
	echo "<script>alert('Masukkan data id.');window.location='all-post.php';</script>";
}

$footer = "SELECT * FROM footerpage";
$hasil_footerpage = mysqli_query($koneksi, $footer);
$footerpage = mysqli_fetch_assoc($hasil_footerpage);

$image = $footerpage['image'];

?>

<!DOCTYPE html>
<html>

    <head>
        <title><?php echo $data['title'] ?></title>
        <link rel="stylesheet" href="cssinweb/web-styling.css">
        <link rel="icon" href="assets/favicon(1).ico">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->
        <script src="js/script.js"></script>
    </head>

    <body>
        <!-------------------   NAVBAR  ---------------------->
        <?php include ("navbar-web.php")?>
        <!--------------------------------   NAVBAR CLOSE   --------------------------------------->

        <!--------------------------------   DATAIL.BLOG OPEN   --------------------------------------->
        <section>
            <div class="sect-01-detail-blog">
                <div class="detail-content">
                    <p data-aos="fade-down" data-aos-duration="3000" class="link"><a href="index.php">Home</a> > <a
                            href="blog.php">Blog</a> > <a href="#"><?php echo $data['title'] ?></a></p>
                    <h1 data-aos="fade-right" data-aos-duration="2000"><?php echo $data['title'] ?></h1>
                    <div class="top-content">
                        <div class="name" data-aos="fade-left" data-aos-duration="1000">
                            <img src="assets/svg/detail-blog/account.svg" width="18">
                            <p><?php echo $data['author'] ?></p>
                        </div>
                        <div class="date" data-aos="fade-down" data-aos-duration="1000">
                            <img src="assets/svg/detail-blog/kalender.svg" width="18">
                            <p><?php echo $data['date'] ?></p>
                        </div>
                        <div class="share" data-aos="fade-right" data-aos-duration="1000">
                            <p>Share :</p>
                            <img src="assets/svg/detail-blog/instagram.svg" width="25">
                            <img src="assets/svg/detail-blog/facebook.svg" width="25" class="fb">
                            <img src="assets/svg/detail-blog/twitter.svg" width="25">
                        </div>
                        <div class="watch" data-aos="flip-down" data-aos-duration="1000">
                            <!-- <img src="assets/svg/detail-blog/lihat.svg" width="70"> -->
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $query = "SELECT * FROM user WHERE id = $id";
                        $result = mysqli_query($koneksi, $query);
                        $row = mysqli_fetch_assoc($result);
                        echo "<img data-aos='fade-right' data-aos-duration='3000' src='show-image-blog.php?id=$id' width='810' height='450'>";
                    }
                    ?>
                    <div class="isi-konten">
                        <div class="text-content">
                            <div class="content" data-aos="fade-right" data-aos-duration="3000">
                                <?php echo $data['content'] ?>
                            </div>

                            <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $nama = $_POST["nama"];
                                $email = $_POST["email"];
                                $comment = $_POST["comment"];
                                $artikel_id = $_POST["id_artikel"];
                                
                                $sql = "INSERT INTO commentuser (nama, email, comment, date, id_artikel) 
                                        VALUES ('$nama', '$email', '$comment', NOW(), '$artikel_id')";

                                if (mysqli_query($koneksi, $sql)) {
                                    echo "<script>alert('Komentar berhasil ditambahkan.')</script>";
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
                                }
                                
                            }
                            ?>

                            <form action="#" method="POST">
                                <div class="input-comment">
                                    <h4 data-aos="fade-right" data-aos-duration="1000">Komentar<h4>
                                            <input type="hidden" name="id_artikel" value="<?php echo $id; ?>">
                                            <textarea data-aos="zoom-in-right" data-aos-duration="3000" cols="61"
                                                rows="5" placeholder="Komentar kalian" name="comment"></textarea>
                                            <div class="name-and-email">
                                                <input data-aos="fade-right" data-aos-duration="3000" type="text"
                                                    id="nama" name="nama" placeholder="Nama kalian" name="nama">
                                                <input data-aos="fade-left" data-aos-duration="3000" type="email"
                                                    id="email" name="email" placeholder="Email kalian" name="email">
                                            </div>
                                            <button class="post">Post Komentar</button>
                                </div>
                            </form>
                            <h2 style="margin-bottom: 1rem">All Comments</h2>

                            <?php
                                $id_artikel = $_GET['id'];

                                $query = "SELECT * FROM commentuser WHERE id_artikel='$id_artikel' ORDER BY id DESC";
                                $hasil = mysqli_query($koneksi, $query);

                                while ($data = mysqli_fetch_assoc($hasil)) {
                                    $nama = $data['nama'];
                                    $date = $data['date'];
                                    $comment = $data['comment'];

                                    ?>
                            <div
                                style="margin: 0 0 1rem 0; border: 1px solid rgb(221, 221, 221, 1); border-radius: 5px; width: 49rem; background-color: rgb(221, 221, 221, 0.2)">
                                <div style="display: flex; align-items: center; margin: 0.2rem 0 0 0.8rem ">
                                    <img src="img/user1.png" width="30" style="">
                                    <div
                                        style="display: flex; justify-content: space-between; padding: 0.5rem 1rem 0.2rem 0.8rem;width: 49rem; align-items: center">
                                        <h4 style="color: "><?= $data['nama'] ?></h4>
                                        <h4 style="color: #17B8C2; font-size: 12px; font-style: italic">
                                            <?= $data['date'] ?>
                                        </h4>
                                    </div>
                                </div>
                                <p style="padding: 0.5rem 0.8rem 0.8rem 0.8rem; width: 49rem;"><?= $data['comment'] ?>
                                </p>
                            </div>
                            <?php
                                }
                                ?>
                        </div>
                    </div>
                </div>
                <div class="detail-content-blog">
                    <h5 data-aos="fade-left" data-aos-duration="1000">Terbaru</h5>
                    <?php
                        $hitung = "SELECT COUNT(*) AS total FROM post";
                        $tes = mysqli_query($koneksi, $hitung);
                        $count = mysqli_fetch_assoc($tes)['total'];

                        $limit = 4;

                        $active_page = 1;
                        if(isset($_GET['page'])){
                        $active_page = $_GET['page'];
                        }

                        $offset = ($active_page - 1) * $limit;

                        $query_data = "SELECT * FROM post ORDER BY id DESC LIMIT $limit";
                        $result_data = mysqli_query($koneksi, $query_data);

                        while ($ambil = mysqli_fetch_assoc($result_data)) {
                    ?>
                    <div class="detail-right-content" data-aos="fade-left" data-aos-duration="3000">
                        <img src="show-image-blog.php?id=<?php echo $ambil['id'] ?>" width="100" height="100"
                            class="img-beda">
                        <a href="detail-blog.php?id=<?php echo $ambil['id'] ?>">
                            <h4><?php echo $ambil['title']; ?></h4>
                        </a>

                    </div>
                    <?php
                    ;
                    }
                    ?>
                </div>
            </div>

            <!-- <div class="isi-konten">
                <div class="text-content">
                    <div class="content" data-aos="fade-right" data-aos-duration="3000">
                        <?php echo $data['content'] ?>
                    </div>

                    <div class="input-comment">
                        <h4 data-aos="fade-right" data-aos-duration="1000">Komentar<h4>
                                <textarea data-aos="zoom-in-right" data-aos-duration="3000" cols="61" rows="12"
                                    placeholder="Komentar kalian"></textarea>
                                <div class="name-and-email">
                                    <input data-aos="fade-right" data-aos-duration="3000" type="text" id="nama"
                                        name="nama" placeholder="Nama kalian">
                                    <input data-aos="fade-left" data-aos-duration="3000" type="email" id="email"
                                        name="email" placeholder="Email kalian">
                                </div>
                                <button class="post">Post Komentar</button>
                    </div>
                </div>
            </div> -->
        </section>
        <!--------------------------------   DATAIL.BLOG CLOSE   --------------------------------------->

        <!-------------------------------   SECTION LAST OPEN   --------------------------------------->
        <section style="margin-top: 2rem">
            <div class="sect-09">
                <a href="<?= $footerpage['link_ig'] ?>" target="blank" data-aos="fade-down" data-aos-duration="1500">
                    <img src="assets/svg/media/instagram.svg" alt="">
                </a>
                <a href="<?= $footerpage['link_fb'] ?>" target="blank" data-aos="fade-up" data-aos-duration="1500">
                    <img src="assets/svg/media/Vector(1).svg" alt="">
                </a>
                <a href="<?= $footerpage['link_twt'] ?>" target="blank" data-aos="fade-up" data-aos-duration="1500">
                    <img src="assets/svg/media/twitter.svg" alt="">
                </a>
                <a href="<?= $footerpage['link_lk'] ?>" target="blank" data-aos="fade-down" data-aos-duration="1500">
                    <img src="assets/svg/media/linkedin.svg" alt="">
                </a>
            </div>
        </section>
        <!-------------------------------   SECTION LAST CLOSE   --------------------------------------->

        <!-------------------------------   FOOTER   --------------------------------------->
        <footer class="footer" data-aos="zoom-in" data-aos-duration="1000">
            <div class="footer-item">
                <div class="item-footer">
                    <div class="item-footer-01">
                        <img src="data:image/jpeg;base64,<?= base64_encode($image) ?>" alt="logo" width="210">
                    </div>
                    <p style="width: 20rem"><?= $footerpage['description']?></p>
                    <div class="container_gtranslate">
                        <p style="font-size: 10px; margin-top: 1rem">Terjemahkan halaman ini:</p>
                        <div id="google_translate_element"></div>
                    </div>
                </div>
                <?php
                    $mengambil = "SELECT * FROM pages ORDER BY id ASC";
                    $hasil = mysqli_query($koneksi, $mengambil);

                    while ($data = mysqli_fetch_assoc($hasil)) {
                ?>
                <div class="footer-menu" id="footer-menu">
                    <h4><a href="<?= $data['src'] ?>"><?= $data['title'] ?></a></h4>
                </div>
                <?php        
                    }
                ?>
            </div>

            <hr>
            <div class="footer-copyright">
                <p>&copy; <?= $footerpage['tahun_copyright']?> <a href="#"><?= $footerpage['nama_web']?></a>. Designed
                    by
                    <?= $footerpage['desain_by']?>.
                    All rights reserved
                </p>
            </div>
        </footer>
        </div>

        <!-------------------------------   FOOTER   --------------------------------------->
        <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'id'
            }, 'google_translate_element');
        }
        </script>
        <script type="text/javascript"
            src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
        AOS.init({
            easing: 'ease-out-back',
        });
        </script>
    </body>

</html>