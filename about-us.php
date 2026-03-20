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

$rumus_homepage = "SELECT * FROM homepage";
$hasil_homepage = mysqli_query($koneksi, $rumus_homepage);
$homepage = mysqli_fetch_assoc($hasil_homepage);

$gambar2 = $homepage['image2'];

$rumus_about = "SELECT * FROM aboutpage";
$hasil_aboutpage = mysqli_query($koneksi, $rumus_about);
$aboutpage = mysqli_fetch_assoc($hasil_aboutpage);

$footer = "SELECT * FROM footerpage";
$hasil_footerpage = mysqli_query($koneksi, $footer);
$footerpage = mysqli_fetch_assoc($hasil_footerpage);

$image = $footerpage['image'];

$hitung = "SELECT COUNT(*) AS total FROM user WHERE role='Teacher'";
$result = mysqli_query($koneksi, $hitung);
$count = mysqli_fetch_assoc($result)['total'];

$hitung_student = "SELECT COUNT(*) AS total FROM user WHERE role='Student'";
$result_student = mysqli_query($koneksi, $hitung_student);
$count_student = mysqli_fetch_assoc($result_student)['total'];

$hitung_course = "SELECT COUNT(*) AS total FROM course";
$result_course = mysqli_query($koneksi, $hitung_course);
$count_course = mysqli_fetch_assoc($result_course)['total'];


?>

<!DOCTYPE html>
<html>

    <head>
        <title>About Us</title>
        <link rel="icon" href="assets/favicon(1).ico">
        <link rel="stylesheet" href="cssinweb/web-styling.css">
        <link rel="stylesheeyt" href="vendor/fontawesome-free/css/all.min.css">
        <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->
    </head>

    <body>
        <!-------------------   NAVBAR  ---------------------->
        <?php include ("navbar-web.php")?>
        <!--------------------------------   NAVBAR CLOSE   --------------------------------------->
        <div class='back-to-top' onclick='window.scrollTo({top: 0})'>
            <img src="assets/svg/back-top-2.svg" id="btnBackToTop" class="btnBack" width="40">
        </div>
        <!-------------------------------   SECTION-01 OPEN   --------------------------------------->
        <section>
            <div class="sect-01-about-us">
                <h1 data-aos="fade-up"><?= $aboutpage['title'] ?></h1>
                <p data-aos="fade-down"><?= $aboutpage['subtitle'] ?></p>
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
                </div>
            </div>
        </section>
        <!-------------------------------   SECTION-02 CLOSE   --------------------------------------->

        <!-------------------------------   SECTION-03 OPEN   --------------------------------------->
        <section>
            <div class="sect-03-about-us">
                <div class="card-sect-03-about-us" data-aos="fade-right" data-aos-duration="1500">
                    <img src="assets/svg/about-us/1/Vector.svg" alt="" width="70" class="img-book">
                    <h1 id="counter">0</h1>
                    <p>Classes</p>
                </div>
                <div class="card-sect-03-about-us" data-aos="zoom-in" data-aos-duration="1500">
                    <img src="assets/svg/about-us/1/3.svg" alt="" width="50">
                    <h1 id="counter-2">0</h1>
                    <p>Students</p>
                </div>
                <div class="card-sect-03-about-us" data-aos="fade-left" data-aos-duration="1500">
                    <img src="assets/svg/about-us/1/2.svg" alt="" width="70" class="img-hat-about">
                    <h1 id="teacher">0</h1>
                    <p>Teachers</p>
                </div>
            </div>
        </section>
        <!-------------------------------   SECTION-03 CLOSE   --------------------------------------->

        <!-------------------------------   SECTION-04 OPEN   --------------------------------------->

        <section>
            <div class="sect-04-about-us">
                <div data-aos="fade-right">
                    <img src="assets/images/sect-0.png" alt="" width="400">
                </div>
                <div class="sect-04-txt-about-us">
                    <h2 data-aos="fade-left"><?= $aboutpage['title_vm'] ?></h2>
                    <h4 data-aos="fade-left" data-aos-duration="2000"><?= $aboutpage['title_v'] ?></h4>
                    <p data-aos="fade-left" data-aos-duration="3000"><?= $aboutpage['isi_v'] ?></p>
                    <h4 data-aos="fade-left" data-aos-duration="2000"><?= $aboutpage['title_m'] ?></h4>
                    <p data-aos="fade-left" data-aos-duration="3000"><?= $aboutpage['isi_m'] ?> </p>
                </div>
            </div>
        </section>

        <!-------------------------------   SECTION-04 CLOSE   --------------------------------------->

        <!-------------------------------   SECTION-05 OPEN   --------------------------------------->

        <section>
            <div class="sect-05-about-us">
                <h1 data-aos="fade-down"><?= $aboutpage['title_tim'] ?></h1>
                <div class="card-sect-05-about-us" id="slider">
                    <?php
                        $hitung = "SELECT COUNT(*) AS total FROM user WHERE role='Teacher'";
                        $result = mysqli_query($koneksi, $hitung);
                        $count = mysqli_fetch_assoc($result)['total'];

                        $limit = 5;
                        $total_pages = ceil($count / $limit);

                        if (isset($_GET['page'])) {
                            $active_page = $_GET['page'];
                        } else {
                            $active_page = 1;
                        }

                        $offset = ($active_page - 1) * $limit;

                        $sql = "SELECT * FROM user WHERE role='Teacher' ORDER BY id DESC LIMIT $limit OFFSET $offset";
                        $result = mysqli_query($koneksi, $sql);

                        while ($data = mysqli_fetch_assoc($result)) {

                    ?>
                    <div class="card-tim" data-aos="flip-down" data-aos-duration="3000">
                        <img src="show-image-teacher.php?id=<?php echo $data['id'] ?>" alt="" width="234" height="255">
                        <p><?= $data['firstname'] ?></p>
                    </div>
                    <?php 
                        }
                        ?>
                    <!-- <div class="card-tim" data-aos="flip-down" data-aos-duration="3000">
                        <img src="assets/we-tim/2.png" alt="" width="254" height="255">
                        <p>Heru</p>
                    </div>
                    <div class="card-tim" data-aos="flip-down" data-aos-duration="3000">
                        <img src="assets/we-tim/3.png" alt="" width="254" height="255">
                        <p>Purnomo</p>
                    </div>
                    <div class="card-tim" data-aos="flip-down" data-aos-duration="3000">
                        <img src="assets/we-tim/4.png" alt="" width="254" height="255">
                        <p>Sarjoko</p>
                    </div>
                    <div class="card-tim" data-aos="flip-down" data-aos-duration="3000">
                        <img src="assets/we-tim/5.png" alt="" width="254" height="255">
                        <p>Melinda</p>
                    </div> -->
                </div>
                <!-- <div class="btn-sect-05-about-us" data-aos="fade-up" data-aos-duration="3000">
                    <button>See more</button>
                </div> -->
            </div>
        </section>

        <!-------------------------------   SECTION-05 CLOSE   --------------------------------------->

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
            </div>
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
        </script>
        <script>
        //Animasi Angka 1
        let count = 0;
        const counter = document.getElementById('counter');
        let intervalId;

        intervalId = setInterval(function() {
            count++;
            counter.textContent = count;
            if (count === <?= $count_course ?>) {
                clearInterval(intervalId);
            }
        }, <?= $aboutpage['fast_3_1'] ?>);


        let countDua = 0;
        const counterDua = document.getElementById('counter-2');
        let intervalIdDua;

        intervalIdDua = setInterval(function() {
            countDua++;
            counterDua.textContent = countDua;
            if (countDua === <?= $count_student ?>) {
                clearInterval(intervalIdDua);
            }
        }, <?= $aboutpage['fast_3_2'] ?>);


        let teach = 0;
        const teacher = document.getElementById('teacher');
        let intervalIdTiga;

        intervalIdTiga = setInterval(function() {
            teach++;
            teacher.textContent = teach;
            if (teach === <?= $count ?>) {
                clearInterval(intervalIdTiga);
            }
        }, <?= $aboutpage['fast_3_3'] ?>);


        var swiper = new Swiper(".slide-content", {
            slidesPerView: 5,
            spaceBetween: 25,
            loop: true,
            centerSlide: 'true',
            fade: 'true',
            grabCursor: 'true',
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                520: {
                    slidesPerView: 2,
                },
                950: {
                    slidesPerView: 3,
                },
            },
        });
        </script>
    </body>

</html>