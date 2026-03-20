<?php
session_start();
include("koneksi.php");

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Set Session Data
        $_SESSION['id'] = $row['id'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lasttname'] = $row['lasttname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['image'] = $row['image'];
        $_SESSION['role'] = $row['role']; // Ambil role: Teacher atau Student
        $_SESSION['status'] = "login";

        // REDIRECT BERDASARKAN ROLE
        if ($row['role'] == "Teacher") {
            header("Location: dashboard.php?berhasil");
            exit();
        } else if ($row['role'] == "Student") {
            header("Location: student_dashboard.php?berhasil");
            exit();
        } else {
            header("Location: dashboard.php?berhasil"); // Fallback
            exit();
        }
    } else {
        $alert_msg = "Email atau password anda salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>LearnGo - Login</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body class="bg-gradient-info">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="alert alert-danger <?php if(empty($alert_msg)) echo 'd-none'; ?>"
                                            role="alert">
                                            <?php if(!empty($alert_msg)) echo $alert_msg; ?>
                                        </div>
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Welcome !</h1>
                                        </div>
                                        <form class="user" method="POST">
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user"
                                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                                    placeholder="Enter Email Address..." name="email" required>
                                            </div>
                                            <div class="form mb-1">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" placeholder="Password" name="password"
                                                    required>
                                                <!-- <div class="alert" id="">WARNING! Caps lock is ON.</div> -->
                                            </div>
                                            <div class="text-right mb-3">
                                                <a class="small" href="#" onclick="myAlert()">Forgot
                                                    Password?</a>
                                            </div>
                                            <!-- <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div>
                                            </div> -->
                                            <button type="submit" name="login"
                                                class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>
                                            <div class="d-flex">
                                                <div class="col-5 px-0">
                                                    <hr>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <div class="mt-1"> or </div>
                                                </div>
                                                <div class="col-5 px-0">
                                                    <hr>
                                                </div>
                                            </div>
                                            <a href="google.php" class="btn btn-google btn-user btn-block">
                                                <i class="fab fa-google fa-fw"></i> Login with Google
                                            </a>
                                        </form>
                                        <hr>

                                        <div class="text-center">
                                            <a class="small" href="register.php">Create an Account!</a>
                                        </div>
                                        <div class="text-center">
                                            <a href="index.php" class="small">
                                                Back To Home
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script>
        function myAlert() {
            alert("Coming Soon... Bro");
        }
        </script>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

    </body>

</html>