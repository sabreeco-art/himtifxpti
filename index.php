<?php
include('koneksi.php');

session_start();

if (isset($_SESSION["email"])) {
    $login_text = "Hai, " . $_SESSION["firstname"]; // Tambahin firstname langsung di sini
    
    // LOGIC BARU: Cek Role buat nentuin tujuan dashboard
    if ($_SESSION['role'] == 'Teacher') {
        $url = "dashboard.php"; // Ganti dengan nama file dashboard admin lu yang bener
    } else {
        $url = "student_dashboard.php";
    }
} else {
    $login_text = "Login";
    $url = "login.php";
}

$rumus = "SELECT * FROM homepage";
$hasil_homepage = mysqli_query($koneksi, $rumus);
$homepage = mysqli_fetch_assoc($hasil_homepage);

$gambar = $homepage['image'];
$gambar2 = $homepage['image2'];

$footer = "SELECT * FROM footerpage";
$hasil_footerpage = mysqli_query($koneksi, $footer);
$footerpage = mysqli_fetch_assoc($hasil_footerpage);

$image = $footerpage['image'];



?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome | LearnGo</title>
        <link rel="icon" href="assets/favicon(1).ico">
        <link rel="stylesheet" href="cssinweb/web-styling.css">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
        <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css"
            rel="stylesheet"> -->
    </head>

    <body>
        <!-------------------   NAVBAR  ---------------------->

        <?php include ("navbar-web.php")?>

        <!--------------------------------   NAVBAR CLOSE   --------------------------------------->

        <!-------------------------------   SECTION-01 OPEN   --------------------------------------->
        <section>
            <div class="section-01" data-aos="zoom-out-down" data-aos-duration="2000">
                <div class="item-sect-01">
                    <h1 class="txt-01"><?= $homepage['title_1'] ?></h1>
                    <p class="sub-txt"><?= $homepage['subtitle_1'] ?></p>
                    <a href="<?= $homepage['src_btn_1'] ?>"><button
                            class="btn-01"><?= $homepage['btn_1'] ?></button></a>
                    <a href="<?= $homepage['src_btn_2'] ?>"><button
                            class="btn-02"><?= $homepage['btn_2'] ?></button></a>
                </div>
                <div class="img-sect-01">
                    <img src="data:image/jpeg;base64,<?= base64_encode($gambar) ?>" alt="" width="867 ">
                </div>
            </div>
        </section>

        <!-------------------------------   SECTION-01 CLOSE   --------------------------------------->

        <!-------------------------------   SECTION-02 OPEN   --------------------------------------->

        <section>
            <div class="section-02" data-aos="fade-right" data-aos-offset="300" data-aos-duration="2000">
                <img src="data:image/jpeg;base64,<?= base64_encode($gambar2) ?>" alt="" width="580" height="auto"
                    class="img-sect-02">
                <div class="text-sect-02">
                    <h2 class="txt-02"><?= $homepage['title_2_1'] ?></h2>
                    <div class="sub-txt-1">
                        <img src="assets/svg/Vector2.svg" alt="" width="50">
                        <h3><?= $homepage['title_2_2'] ?></h3>
                        <hr class="hr-aneh">
                        <div class="buletan"></div>
                    </div>
                    <p class="sub-txt-2"><?= $homepage['subtitle_2'] ?></p>
                    <div class="item">
                        <div class="sub-item">
                            <img src="assets/svg/1/Vector(1).svg" alt="" width="20">
                            <p><?= $homepage['menu_1'] ?></p>
                        </div>
                        <div class="sub-item">
                            <img src="assets/svg/1/2.svg" alt="" width="20">
                            <p><?= $homepage['menu_2'] ?></p>
                        </div>
                        <div class="sub-item">
                            <img src="assets/svg/1/3.svg" alt="" width="20">
                            <p><?= $homepage['menu_3'] ?></p>
                        </div>
                    </div>
                    <a href="<?= $homepage['src_btn_2_1']?>"><button
                            class="btn-sect-01"><?= $homepage['btn_2_1'] ?></button></a>
                </div>
            </div>
        </section>

        <!-------------------------------   SECTION-02 CLOSE   --------------------------------------->

        <!-------------------------------   SECTION-03 OPEN   --------------------------------------->

        <section>
            <div class="section-03">
                <div class="item-sect-03" data-aos="zoom-out" data-aos-duration="2000">
                    <div class="sub-item-03">
                        <img src="assets/svg/2/Outline.svg" alt="" width="50">
                        <h4><?= $homepage['title_3_1'] ?></h4>
                        <p><?= $homepage['subtitle_3_1'] ?></p>
                    </div>
                    <div class="sub-item-03">
                        <img src="assets/svg/2/Outline-1.svg" alt="" width="50">
                        <h4><?= $homepage['title_3_2'] ?></h4>
                        <p><?= $homepage['subtitle_3_2'] ?></p>
                    </div>
                    <div class="sub-item-03">
                        <img src="assets/svg/2/Outline-3.svg" alt="" width="50">
                        <h4><?= $homepage['title_3_3'] ?></h4>
                        <p><?= $homepage['subtitle_3_3'] ?></p>
                    </div>

                </div>
            </div>
        </section>

        <!-------------------------------   SECTION-03 CLOSE   --------------------------------------->

        <!-------------------------------   SECTION-04 OPEN   --------------------------------------->

        <section>
            <div>
                <div class="section-04">
                    <div class="txt-04" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                        <p><?= $homepage['subtitle_4_1'] ?></p>
                        <h1><?= $homepage['title_4_1'] ?></h1>
                        <a href="<?= $homepage['btntarget_4_1'] ?>"><button><?= $homepage['btn_4_1'] ?></button></a>
                    </div>

                    <div class="isi-item-sect-04">
                        <div>
                            <div class="sub-item-sect-04" data-aos="fade-down" data-aos-duration="3000">
                                <?php
                                $apa = "SELECT COUNT(*) AS total FROM typecourse";
                                $ini = mysqli_query($koneksi, $apa);
                                $count = mysqli_fetch_assoc($ini)['total'];

                                $limit = 6;
                                $total_pages = ceil($count / $limit);

                                if (isset($_GET['page'])) {
                                    $active_page = $_GET['page'];
                                } else {
                                    $active_page = 1;
                                }

                                $offset = ($active_page - 1) * $limit;

                                $rumus_typecourse = "SELECT * FROM typecourse ORDER BY id DESC LIMIT $limit OFFSET $offset";
                                $hasil_typecourse = mysqli_query($koneksi, $rumus_typecourse);

                                while ($typecourse = mysqli_fetch_assoc($hasil_typecourse)){
                                ?>
                                <div class="box-sect-04">
                                    <i class="<?= $typecourse['icon'] ?>"
                                        style="color: #17b8c2; margin-bottom: 5px"></i>
                                    <h5><?= $typecourse['title'] ?></h5>
                                    <p><?= $typecourse['description'] ?></p>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-------------------------------   SECTION-04 CLOSE   --------------------------------------->

        <!-------------------------------   SECTION-05 OPEN   --------------------------------------->
        <section>
            <div class="sect-05" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <div class="content-05">
                    <h1><?= $homepage['title_cta'] ?></h1>
                    <p><?= $homepage['subtitle_cta'] ?></p>
                </div>
                <a href="<?= $homepage['btntarget_cta'] ?>"><button
                        class="btn-sect-05"><?= $homepage['btn_cta'] ?></button></a>
            </div>
        </section>
        <!-------------------------------   SECTION-05 CLOSE   --------------------------------------->

        <!-------------------------------   SECTION-06 OPEN   --------------------------------------->
        <section>
            <div class="sect-06" id="course">
                <h1 data-aos="fade-down" data-aos-duration="1500"><?= $homepage['title_5_1'] ?></h1>
                <div class="card-wrap">
                    <?php
                        $hitung = "SELECT COUNT(*) AS total FROM course";
                        $result = mysqli_query($koneksi, $hitung);
                        $count = mysqli_fetch_assoc($result)['total'];

                        $limit = 6;
                        $total_pages = ceil($count / $limit);

                        if (isset($_GET['page'])) {
                            $active_page = $_GET['page'];
                        } else {
                            $active_page = 1;
                        }

                        $offset = ($active_page - 1) * $limit;

                        $query_data = "SELECT * FROM course ORDER BY id DESC LIMIT $limit OFFSET $offset";
                        $result_data = mysqli_query($koneksi, $query_data);

                        while ($data = mysqli_fetch_assoc($result_data)) {
                            $description = $data['description']; 
                            $limited_description = substr($description, 0, 80);
                            $harga = $data['harga'];
                            $harga_rupiah = "Rp " . number_format($harga, 0, ',', '.');
                        ?>
                    <div data-aos="fade-right" data-aos-duration="1000">
                        <div class="card-kursus">
                            <img src="show-image-course.php?id=<?php echo $data['id'] ?>" alt="" width="325"
                                height="170">
                            <h2><?= $data['title']?></h2>
                            <p class="card-description"><?= $limited_description ?></p>
                            <div class="star">
                                <!-- <img src="assets/svg/star.svg" alt="" width="90">
                                <p>(327)</p> -->
                            </div>
                            <div class="kursus">
                                <div class="sub-kursus">
                                    <img src="assets/svg/card/Outline-2.svg" alt="" width="15">
                                    <p><?= $data['jumlah_pelajaran'] ?> Pelajaran</p>
                                </div>
                                <div class="sub-kursus">
                                    <img src="assets/svg/card/Outline-1.svg" alt="" width="15">
                                    <p><?= $data['jam']?> Total jam</p>
                                </div>
                                <div class="sub-kursus">
                                    <img src="assets/svg/card/Outline.svg" alt="" width="15">
                                    <p><?php echo $data['tingkat'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="btn-kursus">
                            <button><?php echo $harga_rupiah ?></button>
                        </div>
                    </div>
                    <?php 
                    }
                    ?>
                </div>
        </section>


        <!-------------------------------   SECTION-06 CLOSE   --------------------------------------->

        <!-------------------------------   SECTION-07 OPEN   --------------------------------------->
        <section>
            <div>
                <div class="sect-07">
                    <h1 data-aos="fade-right"><?= $homepage['title_6_1'] ?></h1>
                    <p data-aos="fade-right" data-aos-duration="1000"><?= $homepage['subtitle_6_1'] ?></p>
                    <div class="container-sensei">
                        <div class="box-container">
                            <?php
                        $sql = "SELECT * FROM user WHERE role='Teacher'";
                        $result = mysqli_query($koneksi, $sql);

                        while ($data = mysqli_fetch_assoc($result)) {

                        ?>
                            <div class="box">
                                <div class="sensei-1" data-aos="zoom-in-right" data-aos-duration="2000">
                                    <img src="show-image-teacher.php?id=<?php echo $data['id'] ?>" alt="" width="310"
                                        height="380">
                                    <!-- <img src="assets/svg/plus.svg" alt="" class="plus" width="50" href="index.html"> -->
                                    <h2><?= $data['firstname'] ?></h2>
                                </div>
                            </div>
                            <?php 
                    }
                    ?>

                        </div>

                        <div id="load-more"> See More </div>

                    </div>
                    <!--<div class="isi-sensei">
                	<div class="sensei">
                    <div class="sensei-1" data-aos="zoom-in-right" data-aos-duration="2000">
                        <img src="assets/sensei/Rectangle 197.png" alt="" width="310">
                        <img src="assets/svg/plus.svg" alt="" class="plus" width="50" href="index.html">
                        <h2>Dwi Rahayu</h2>
                    </div>
                    <div class="sensei-1" data-aos="zoom-in" data-aos-duration="2000">
                        <img src="assets/sensei/Rectangle 198.png" alt="" width="310">
                        <img src="assets/svg/plus.svg" alt="" class="plus" width="50">
                        <h2>Heru</h2>
                    </div>
                    <div class="sensei-1" data-aos="zoom-in-left" data-aos-duration="2000">
                        <img src="assets/sensei/Rectangle 199.png" alt="" width="310">
                        <img src="assets/svg/plus.svg" alt="" class="plus" width="50">
                        <h2>Purnomo</h2>
                    </div>
                </div>
                <div class="sensei">
                    <div class="sensei-1" data-aos="zoom-in-right" data-aos-duration="2000">
                        <img src="assets/sensei/Rectangle 197.png" alt="" width="310">
                        <img src="assets/svg/plus.svg" alt="" class="plus" width="50" href="index.html">
                        <h2>Dwi Rahayu</h2>
                    </div>
                    <div class="sensei-1" data-aos="zoom-in" data-aos-duration="2000">
                        <img src="assets/sensei/Rectangle 198.png" alt="" width="310">
                        <img src="assets/svg/plus.svg" alt="" class="plus" width="50">
                        <h2>Heru</h2>
                    </div>
                    <div class="sensei-1" data-aos="zoom-in-left" data-aos-duration="2000">
                        <img src="assets/sensei/Rectangle 199.png" alt="" width="310">
                        <img src="assets/svg/plus.svg" alt="" class="plus" width="50">
                        <h2>Purnomo</h2>
                    </div>
                </div>
                </div>
                <a href="">See More</a>-->
                </div>
            </div>
        </section>


        <!-------------------------------   SECTION-07 CLOSE   --------------------------------------->

        <!-------------------------------   SECTION-08 OPEN   --------------------------------------->
        <!-- <section>
            <div class="sect-08">
                <p class="p-08" data-aos="fade-right" data-aos-duration="2000">Testimoni</p>
                <h2 data-aos="fade-right">Apa kata Client kami?</h2>
                <div class="testimoni">
                    <div data-aos="flip-left" data-aos-duration="3000">
                        <img src="assets/people/ilham.png" alt="" class="img-testimoni" width="80">
                        <div class="card-testimoni">
                            <h3>Ilham</h3>
                            <img src="assets/svg/star.svg" alt="">
                            <p>“ maximus nec erat eu porta. Uteuismod, <br>
                                eros ante faucibus nulla Donec elementum. <br>
                                Lorem ipsum dolor sit amet maximus <br>
                                nec erat eu porta. Uteuismo ”</p>
                        </div>
                    </div>
                    <div data-aos="flip-right" data-aos-duration="1500">
                        <img src="assets/people/budi.png" alt="" class="img-testimoni" width="80">
                        <div class="card-testimoni">
                            <h3>Budi</h3>
                            <img src="assets/svg/star.svg" alt="">
                            <p>“ maximus nec erat eu porta. Uteuismod, <br>
                                eros ante faucibus nulla Donec elementum. <br>
                                Lorem ipsum dolor sit amet maximus <br>
                                nec erat eu porta. Uteuismo ”</p>
                        </div>
                    </div>
                </div>

                <div class="testimoni">
                    <div data-aos="flip-left" data-aos-duration="3000">
                        <img src="assets/people/sarianti.png" alt="" class="img-testimoni" width="80">
                        <div class="card-testimoni">
                            <h3>Sarianti</h3>
                            <img src="assets/svg/star.svg" alt="">
                            <p>“ maximus nec erat eu porta. Uteuismod, <br>
                                eros ante faucibus nulla Donec elementum. <br>
                                Lorem ipsum dolor sit amet maximus <br>
                                nec erat eu porta. Uteuismo ”</p>
                        </div>
                    </div>
                    <div data-aos="flip-right" data-aos-duration="3000">
                        <img src="assets/people/angelina.png" alt="" class="img-testimoni" width="80">
                        <div class="card-testimoni">
                            <h3>Angelina</h3>
                            <img src="assets/svg/star.svg" alt="">
                            <p>“ maximus nec erat eu porta. Uteuismod, <br>
                                eros ante faucibus nulla Donec elementum. <br>
                                Lorem ipsum dolor sit amet maximus <br>
                                nec erat eu porta. Uteuismo ”</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->


        <!-------------------------------   SECTION-08 CLOSE   --------------------------------------->

        <!-------------------------------   SECTION-09 OPEN   --------------------------------------->
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
        </section>

        <!-------------------------------   SECTION-09 CLOSE   --------------------------------------->

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
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
        AOS.init({
            easing: 'ease-out-back',
        });

        let loadMoreBtn = document.querySelector('#load-more');
        let currentItem = 3;

        loadMoreBtn.onclick = () => {
            let boxes = [...document.querySelectorAll('.container-sensei .box-container .box')];
            for (var i = currentItem; i < currentItem + 3; i++) {
                boxes[i].style.display = 'inline-block';
            }
            currentItem += 3;

            if (currentItem >= boxes.length) {
                loadMoreBtn.style.display = 'none';
            }
        }
        </script>
    </body>

</html>