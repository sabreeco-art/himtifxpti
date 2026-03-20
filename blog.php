<?php
include('koneksi.php');

session_start();

if (isset($_SESSION["email"])) {
    $login_text = "Hai, ";
    $email = $_SESSION["firstname"];
    $url = "dashboard.php";
} else {
    $login_text = "Login";
    $email = "";
    $url = "login.php";
}

$footer = "SELECT * FROM footerpage";
$hasil_footerpage = mysqli_query($koneksi, $footer);
$footerpage = mysqli_fetch_assoc($hasil_footerpage);

$image = $footerpage['image'];

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Blog</title>
        <link rel="icon" href="assets/favicon(1).ico">
        <link href="cssinweb/web-styling.css" rel="stylesheet">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->
        <style>
        .detail-text {
            background: linear-gradient(to top, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));
            /* gradient hitam ke transparent */
            color: #fff;
            /* warna teks putih agar kontras */
            padding: 20px;
            /* jarak antara teks dengan tepi */
        }
        </style>



    </head>

    <body>
        <!-------------------   NAVBAR  ---------------------->
        <navbar>
            <div id="navbar" class="navbar">
                <ul id="navbar-01">
                    <div>
                        <li>
                            <div class="logo">
                                <img src="data:image/jpeg;base64,<?= base64_encode($image) ?>" width="160" alt="">
                            </div>
                        </li>
                    </div>
                    <div class="txt-navbar">
                        <?php
                        $mengambil = "SELECT * FROM pages ORDER BY id ASC";
                        $hasil = mysqli_query($koneksi, $mengambil);

                        if (!$hasil) {
                            die("Hasil Error" . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                        }

                        while ($data = mysqli_fetch_assoc($hasil)) {
                            $active_page = basename($_SERVER['PHP_SELF'], ".php");

                            $class = ($data['src'] == $active_page . ".php") ? "text-active" : "text";

                            echo '<li class="menu">';
                            echo '<a href="' . $data['src'] . '" class="' . $class . '">' . $data['title'] . '</a>';
                            echo '</li>';
                        }
                        ?>
                    </div>
                    <li>
                        <div class="login-01">
                            <img src="assets/svg/Vector.svg" class="svg-login" width="27">
                            <a href="<?php echo $url; ?>">
                                <span id="login"><?php echo $login_text; ?></span>
                                <span id="username"><?php echo $email; ?></span>
                            </a>
                        </div>
                    </li>
                </ul>
                <div class='back-to-top' onclick='window.scrollTo({top: 0})'>
                    <img src="assets/svg/back-top-2.svg" id="btnBackToTop" class="btnBack" width="40">
                </div>
            </div>
        </navbar>
        <!--------------------------------   NAVBAR CLOSE   --------------------------------------->

        <!-------------------------------   SECTION-01 OPEN   --------------------------------------->
        <section>
            <div class="sect-01-blog">
                <h1 data-aos="fade-up" data-aos-duration="1000">Blogs</h1>
                <div class="image-blog" data-aos="fade-down" data-aos-duration="1000">
                    <img src="assets/images/blog.png" alt="" class="blog-img-1" width="400">
                    <img src="assets/images/setengah.png" alt="" class="blog-img-2" width="500">
                </div>
            </div>
        </section>


        <!-------------------------------   SECTION-01 CLOSE   --------------------------------------->

        <!-------------------------------   SECTION-02 OPEN   --------------------------------------->
        <div class="sect-02-blog">

            <!-- <div class="content" data-aos="fade-right" data-aos-duration="2000">
                <a href="detail-blog.html">
                    <img src="show-image-blog.php?id=<?php echo $data['id'] ?>" width="810" height="450">
                </a>
                <div class="detail-text">
                    <h1 href="detail-blog.html"><?php echo $data['title']; ?></h1>
                    <p class="sub-content"><span class="span"><?php echo $data['author'] ?></span>,
                        <?php echo $data['date'] ?></p>
                </div>
            </div>

            <div class="content-blog">
                <h5 data-aos="fade-left" data-aos-duration="500">Terpopuler</h5>
                <div class="right-content" data-aos="fade-left" data-aos-duration="3000">
                    <img src="assets/blog/1.1.png" width="100" height="100" class="img-beda">
                    <h4>Desain Grafis: Pengertian <br>dan Jenisnya</h4>
                </div>
                <div class="right-content" data-aos="fade-left" data-aos-duration="3000">
                    <img src="assets/blog/1.2.png" width="100" height="100">
                    <h4>Tips Bikin UI/UX Ramah <br>Pengguna</h4>
                </div>
                <div class="right-content" data-aos="fade-left" data-aos-duration="3000">
                    <img src="assets/blog/1.3.png" width="100" height="100">
                    <h4>Konten Artikel dan <br>Keuntungannya Untuk <br>Anda Website</h4>
                </div>
            </div> -->
        </div>
        </section>
        <!-------------------------------   SECTION-02 CLOSE   --------------------------------------->

        <!-------------------------------   SECTION-03 OPEN   --------------------------------------->
        <section>
            <div class="sect-02-bottom">
                <div class="sect-03-blog">
                    <?php
                $hitung = "SELECT COUNT(*) AS total FROM post";
                $result = mysqli_query($koneksi, $hitung);
                $count = mysqli_fetch_assoc($result)['total'];

                $limit = 7;
                $total_pages = ceil($count / $limit);

                if (isset($_GET['page'])) {
                    $active_page = $_GET['page'];
                } else {
                    $active_page = 1;
                }

                $offset = ($active_page - 1) * $limit;

                $query_data = "SELECT * FROM post ORDER BY id DESC LIMIT $limit OFFSET $offset";
                $result_data = mysqli_query($koneksi, $query_data);


                while ($data = mysqli_fetch_assoc($result_data)) {
                    $content = $data['content']; 
                    $limited_content = substr($content, 0, 150);
            ?>
                    <div class="content-2" data-aos="fade-right" data-aos-duration="3000">
                        <img class="img" src="show-image-blog.php?id=<?php echo $data['id'] ?>" width="350"
                            height="200">
                        <div class="sub-content-2">
                            <p><span class="span"><?php echo $data['author']; ?></span>, <?php echo $data['date']; ?>
                            </p>


                            <h2 class="w-75"><a
                                    href="detail-blog.php?id=<?php echo $data['id'] ?>"><?php echo $data['title']; ?></a>
                            </h2>
                            <p class="p-conntent-2"><?php echo $limited_content ?> ...</p>
                        </div>
                    </div>

                    <?php } ?>
                    <div class="pagination" data-aos="fade-right" data-aos-duration="3000">
                        <?php
                        for ($i = 1; $i <= $total_pages; $i++) {
                            if ($i == $active_page) {
                                echo "<a class='active' href='?page=$i'>$i</a>";
                            } else {
                                echo "<a href='?page=$i'>$i</a>";
                            }
                        }
                        ?>
                    </div>

                </div>
                <div class="right">
                    <h5 data-aos="fade-left" data-aos-duration="500">Terbaru</h5>

                    <?php
                        $hitung = "SELECT COUNT(*) AS total FROM post";
                        $result = mysqli_query($koneksi, $hitung);
                        $count = mysqli_fetch_assoc($result)['total'];

                        $limit = 5;

                        $offset = ($active_page - 1) * $limit;

                        $query_data = "SELECT * FROM post ORDER BY id DESC LIMIT $limit";
                        $result_data = mysqli_query($koneksi, $query_data);

                        while ($data = mysqli_fetch_assoc($result_data)) {
                    ?>
                    <div class="right-content-2" data-aos="fade-left" data-aos-duration="3000">
                        <img src="show-image-blog.php?id=<?php echo $data['id'] ?>" width="100" height="100">
                        <p><a href="detail-blog.php?id=<?php echo $data['id'] ?>"><?php echo $data['title']; ?></a></p>
                    </div>
                    <?php
                    ;
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-------------------------------   SECTION-03 OPEN   --------------------------------------->
        <section>
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

        <!-------------------------------   SECTION-03 CLOSE   --------------------------------------->

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
        <script src="js/script.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
        AOS.init({
            easing: 'ease-out-back',
        });
        </script>
    </body>

</html>