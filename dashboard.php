<?php
include('koneksi.php');

session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] !== "login" || $_SESSION['role'] !== 'Teacher') {
    header("location:index.php");
    exit();
}

$footer = "SELECT * FROM footerpage";
$hasil_footerpage = mysqli_query($koneksi, $footer);
$footerpage = mysqli_fetch_assoc($hasil_footerpage);

$image = $footerpage['image'];


?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Dashboard- LearnGo</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">


    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php include "sidebar-db.php" ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->
                        <!-- <form
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form> -->

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Search for..." aria-label="Search"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['firstname'] ?></span>
                                    <img class="img-profile rounded-circle"
                                        src="data:image/jpeg;base64,<?php echo base64_encode($_SESSION['image']); ?>">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="profile.php">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        </div>

                        <!-- Content Row -->
                        <div class="row">

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Posts</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                        $mengambil = "SELECT COUNT(*) AS total FROM post";
                                                        $hasil = mysqli_query($koneksi, $mengambil);
                                                        $data = mysqli_fetch_assoc($hasil);
                                                        $total_post = $data['total'];
                                                    ?>
                                                    <?php echo $total_post; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-fw fa-thumbtack fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Pages</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                        $mengambil = "SELECT COUNT(*) AS total FROM pages";
                                                        $hasil = mysqli_query($koneksi, $mengambil);
                                                        $data = mysqli_fetch_assoc($hasil);
                                                        $total_pages = $data['total'];
                                                    ?>
                                                    <?php echo $total_pages; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-folder fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    User
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                        $mengambil = "SELECT COUNT(*) AS total FROM user";
                                                        $hasil = mysqli_query($koneksi, $mengambil);
                                                        $data = mysqli_fetch_assoc($hasil);
                                                        $total_user = $data['total'];
                                                    ?>
                                                    <?php echo $total_user; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Course</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                        $mengambil = "SELECT COUNT(*) AS total FROM course";
                                                        $hasil = mysqli_query($koneksi, $mengambil);
                                                        $data = mysqli_fetch_assoc($hasil);
                                                        $total_course = $data['total'];
                                                    ?>
                                                    <?php echo $total_course; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fab fa-discourse fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    Teacher</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                        $mengambil = "SELECT COUNT(*) AS total FROM user WHERE role='Teacher'";
                                                        $hasil = mysqli_query($koneksi, $mengambil);
                                                        $data = mysqli_fetch_assoc($hasil);
                                                        $total_teacher = $data['total'];
                                                    ?>
                                                    <?php echo $total_teacher; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-muted text-uppercase mb-1">
                                                    Student</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                        $mengambil = "SELECT COUNT(*) AS total FROM user WHERE role='Student'";
                                                        $hasil = mysqli_query($koneksi, $mengambil);
                                                        $data = mysqli_fetch_assoc($hasil);
                                                        $total_student = $data['total'];
                                                    ?>
                                                    <?php echo $total_student; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Row -->

                        <div class="row">

                            <div class="col-xl-12 col-lg-7">
                                <div class="card shadow mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Chart View</h6>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="">
                                            <canvas id="myChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-pie pt-4 pb-2">
                                            <canvas id="myPieChart"></canvas>
                                        </div>
                                        <div class="mt-4 text-center small">
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-primary"></i> Direct
                                            </span>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-success"></i> Social
                                            </span>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-info"></i> Referral
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>



                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; LearnGo 2023</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
        var totalPost = <?php echo $total_post; ?>;
        var totalPages = <?php echo $total_pages; ?>;
        var totalUser = <?php echo $total_user; ?>;
        var totalCourse = <?php echo $total_course; ?>;
        var totalTeacher = <?php echo $total_teacher; ?>;
        var totalStudent = <?php echo $total_student; ?>;

        var today = new Date();
        var month = today.toLocaleString('default', {
            month: 'long'
        });

        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [month],
                datasets: [{
                    label: 'Post',
                    data: [totalPost],
                    backgroundColor: [
                        'rgba(78, 115, 223, 0.4)'
                    ],
                    borderColor: [
                        'rgba(78, 115, 223, 1)'
                    ],
                    borderWidth: 1
                }, {
                    label: 'Pages',
                    data: [totalPages],
                    backgroundColor: [
                        'rgb(28, 200, 138, 0.4)'
                    ],
                    borderColor: [
                        'rgb(28, 200, 138)'
                    ],
                    borderWidth: 1
                }, {
                    label: 'User',
                    data: [totalUser],
                    backgroundColor: [
                        'rgb(54, 185, 204, 0.4)'
                    ],
                    borderColor: [
                        'rgb(54, 185, 204)'
                    ],
                    borderWidth: 1
                }, {
                    label: 'Course',
                    data: [totalCourse],
                    backgroundColor: [
                        'rgb(246, 194, 62, 0.4)'
                    ],
                    borderColor: [
                        'rgb(246, 194, 62)'
                    ],
                    borderWidth: 1
                }, {
                    label: 'Teacher',
                    data: [totalTeacher],
                    backgroundColor: [
                        'rgb(231, 74, 59, 0.4)'
                    ],
                    borderColor: [
                        'rgb(231, 74, 59)'
                    ],
                    borderWidth: 1
                }, {
                    label: 'Student',
                    data: [totalStudent],
                    backgroundColor: [
                        'rgb(133, 135, 150, 0.4)'
                    ],
                    borderColor: [
                        'rgb(133, 135, 150)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>



        <!-- Bootstrap core JavaScript-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="https://cdn.jsdelivr.net/gh/StartBootstrap/startbootstrap-sb-admin-2@master/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

        <!-- Page level custom scripts -->
        <!-- <script src="js/demo/chart-area-demo.js"></script> -->
        <script src="js/demo/chart-pie-demo.js"></script>

    </body>

</html>