<navbar>
    <div id="navbar" class="navbar-css">
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

                        while ($nav = mysqli_fetch_assoc($hasil)) {
                            $active_page = basename($_SERVER['PHP_SELF'], ".php");

                            $class = ($nav['src'] == $active_page . ".php") ? "text-active" : "text";

                            echo '<li class="menu">';
                            echo '<a href="' . $nav['src'] . '" class="' . $class . '">' . $nav['title'] . '</a>';
                            echo '</li>';
                        }
                        ?>
            </div>
            <li>
                <a href="<?php echo $url; ?>">
                    <div class="login-01">
                        <img src="assets/svg/Vector.svg" class="svg-login" width="27">
                        
                        <?php if(isset($_SESSION["email"])): ?>
                            <span id="username"><?php echo $_SESSION['firstname']; ?></span>
                        <?php else: ?>
                            <span id="login">Login</span>
                        <?php endif; ?>
                    </div>
                </a>
            </li>
        </ul>
        <div class='back-to-top' onclick='window.scrollTo({top: 0})'>
            <img src="assets/svg/back-top-2.svg" id="btnBackToTop" class="btnBack" width="40">
        </div>
    </div>
</navbar>
<script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").style.top = "0";
    } else {
        document.getElementById("navbar").style.top = "-100px";
    }
    prevScrollpos = currentScrollPos;
};
</script>