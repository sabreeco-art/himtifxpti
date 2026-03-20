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

$rumus = "SELECT * FROM contactpage";
$hasil_contactpage = mysqli_query($koneksi, $rumus);
$contactpage = mysqli_fetch_assoc($hasil_contactpage);

$footer = "SELECT * FROM footerpage";
$hasil_footerpage = mysqli_query($koneksi, $footer);
$footerpage = mysqli_fetch_assoc($hasil_footerpage);

$image = $footerpage['image'];

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Contact Us</title>
        <link rel="icon" href="assets/favicon(1).ico">
        <link rel="stylesheet" href="cssinweb/web-styling.css">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->
    </head>

    <body>
        <!-------------------   NAVBAR  ---------------------->
        <?php include ("navbar-web.php")?>
        <!--------------------------------   NAVBAR CLOSE   --------------------------------------->

        <!-------------------------------   SECTION 01 OPEN   --------------------------------------->
        <section>
            <div class="sect-01-contact">
                <h1 data-aos="fade-up"><?= $contactpage['title']?></h1>
                <p data-aos="fade-down"><?= $contactpage['subtitle']?></p>
            </div>
        </section>
        <!-------------------------------   SECTION 01 CLOSE   --------------------------------------->

        <!-------------------------------   SECTION 02 OPEN   --------------------------------------->
        <section>
            <div class="sect-02-contact">
                <div class="information" data-aos="fade-right">
                    <div class="contact">
                        <h2 class="sub-judul">Contact Information</h2>
                        <div class="info">
                            <p class="title">Phone &ensp;&ensp;&ensp;&ensp; :</p>
                            <a href="#" class="beda"><?= $contactpage['n_phone']?></a>
                        </div>
                        <div class="info">
                            <p class="title">Support &ensp;&nbsp;&nbsp; :</p>
                            <a href="#"><?= $contactpage['email_support']?></a>
                        </div>
                        <div class="info">
                            <p class="title">Genereal &nbsp;&nbsp; :</p>
                            <a href="#"><?= $contactpage['email_general']?></a>
                        </div>
                    </div>
                    <div class="socmed">
                        <h2 class="sub-judul">Social Media</h2>
                        <div class="socmed-item">
                            <img src="assets/svg/socmed/instagram.svg" width="20">
                            <a href="https://instagram.com/ramm_mpr" target="blank"><?= $contactpage['instagram']?></a>
                        </div>
                        <div class="socmed-item">
                            <img src="assets/svg/socmed/twitter.svg" width="20">
                            <a href="https://facebook.com/Muh271104/" target="blank"><?= $contactpage['twitter']?></a>
                        </div>
                        <div class="socmed-item">
                            <img src="assets/svg/socmed/facebook.svg" width="20">
                            <a href="https://facebook.com/Muh271104/" target="blank"><?= $contactpage['facebook']?></a>
                        </div>
                        <div class="socmed-item">
                            <img src="assets/svg/socmed/linkedin.svg" width="20">
                            <a href="https://linkedin.com/in/pasha-rama-888583154/"
                                target="blank"><?= $contactpage['linkedin']?></a>
                        </div>
                    </div>
                </div>
                <?php
                    if(isset($_POST['first_name'])){
                        $first_name = $_POST['first_name'];
                        $last_name = $_POST['last_name'];
                        $email = $_POST['email'];
                        $massage = $_POST['massage'];

                        $query = "INSERT INTO massage_user (first_name, last_name, email, massage, date) VALUES ('$first_name', '$last_name', '$email', '$massage', NOW())";
                        
                        if (mysqli_query($koneksi, $query)) {
                            echo "<script>alert('Thank you for your message. We will reply as soon as possible.')</script>";
                        } else {
                            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
                        }
                    }
                ?>

                <form action="#" method="POST">
                    <div class="message" data-aos="fade-left">
                        <h2>Send us a massage</h2>
                        <input type="text" placeholder="First Name*" name="first_name"></input>
                        <input type="text" placeholder="Last Name*" name="last_name"></input>
                        <input type="text" placeholder="Email addres*" name="email"></input>
                        <p>Put your massage/question here*</p>
                        <textarea cols="16" rows="5" name="massage"></textarea>
                        <div class="send">
                            <button>Send Massage</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-------------------------------   SECTION 02 CLOSE   --------------------------------------->

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
    </body>

</html>