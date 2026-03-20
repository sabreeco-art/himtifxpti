<?php
include('koneksi.php');

session_start();

if (!isset($_SESSION['email'])) {
    echo "<script>alert('Session expired. Please log in again.!');window.location='login.php';</script>";
    exit();
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

        <title>Add New Course - LearnGo</title>

        <!-- CKEditor Text Editor -->
        <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>

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
            <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion " id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Learn Go <sup>1</sup></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Interface
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-thumbtack"></i>
                        <span>Posts</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="all-post.php">All Posts</a>
                            <a class="collapse-item" href="add-new-post.php">Add New</a>
                            <a class="collapse-item" href="categories.php">Categories</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMedia"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-photo-video"></i>
                        <span>Media</span>
                    </a>
                    <div id="collapseMedia" class="collapse" aria-labelledby="headingMedia"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="library.php">Library</a>
                            <a class="collapse-item" href="add-new-library.php">Add New</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Pages</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="all-pages.php">All Pages</a>
                            <a class="collapse-item" href="add-new-pages.php">Add New</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFeedback"
                        aria-expanded="true" aria-controls="collapseFeedback">
                        <i class="fas fa-fw fa-comments"></i>
                        <span>User Feedback</span>
                    </a>
                    <div id="collapseFeedback" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="comments.php">Comments</a>
                            <a class="collapse-item" href="message.php">Message</a>
                        </div>
                    </div>
                </li>


                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCourse"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fab fa-fw fa-discourse"></i>
                        <span>Course</span>
                    </a>
                    <div id="collapseCourse" class="collapse show" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="all-course.php">All Course</a>
                            <a class="collapse-item active" href="add-new-course.php">Add New</a>
                            <a class="collapse-item" href="type-course.php">Type Of Course</a>
                            <a class="collapse-item" href="add-new-type-course.php">Add New Type Course</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Users</span>
                    </a>
                    <div id="collapseUsers" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="all-user.php">All Users</a>
                            <a class="collapse-item" href="add-new-user.php">Add New</a>
                            <a class="collapse-item" href="profile.php">Profile</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettings"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-cogs"></i>
                        <span>Settings</span>
                    </a>
                    <div id="collapseSettings" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php
                            $pages = "SELECT * FROM pages ORDER BY id ASC";
                            $jadi = mysqli_query($koneksi, $pages);

                            while ($page = mysqli_fetch_assoc($jadi)) {
                                $active_page = basename($_SERVER['PHP_SELF'], ".php");

                                $class = ($page['src_db'] == $active_page . ".php") ? "collapse-item active" : "collapse-item";

                                echo '<a href="' . $page['src_db'] . '" class="' . $class . '">' . $page['title'] . '</a>';
                            }
                            ?>
                            <a class="collapse-item" href="footer-page.php">Footer</a>
                            <a class="collapse-item" href="all-pages.php">Other</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
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
                            <h1 class="h3 mb-0 text-gray-800">Add New Course</h1>
                        </div>

                        <!-- Content Row -->
                        <form method="post" action="add-new-course-proses.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-9">
                                    <input class="w-100 form form-control" type="text" placeholder="Add Title"
                                        name="title" required>
                                    <div class="mt-5">
                                        <textarea name="description" id="description" rows="5" required></textarea>
                                        <script>
                                        CKEDITOR.replace('description');
                                        </script>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card mt-3">
                                                <div class="card-header py-0 pt-2">
                                                    <label class="text-gray-700">Harga</label>
                                                </div>
                                                <div class="card-body p-0 px-2 py-2">
                                                    <input type="number" name="harga"
                                                        class="form-control form-control-sm" min="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card mt-3">
                                                <div class="card-header py-0 pt-2">
                                                    <label class="text-gray-700">Jam Pelajaran</label>
                                                </div>
                                                <div class="card-body p-0 px-2 py-2">
                                                    <input type="number" name="jam" class="form-control form-control-sm"
                                                        min="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card mt-3">
                                                <div class="card-header py-0 pt-2">
                                                    <label class="text-gray-700">Tingkat</label>
                                                </div>
                                                <div class="card-body p-0 px-2 py-2">
                                                    <select type="text" name="tingkat"
                                                        class="form-control form-control-sm" required>
                                                        <option selected>None</option>
                                                        <option>Pemula</option>
                                                        <option>Sedang</option>
                                                        <option>Mahir</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="d-flex justify-content-end ">
                                        <input type="submit" name="submit" value="Publish" class="btn btn-primary">
                                    </div>
                                    <!-- <div class="card mt-5">
                                        <div class="card-header py-0 pt-2">
                                            <label class="text-gray-700">Harga</label>
                                        </div>
                                        <div class="card-body p-0 px-2 py-2">
                                            <input type="number" name="harga" class="form-control form-control-sm"
                                                min="0">
                                        </div>
                                    </div> -->
                                    <div class="card mt-3 d-none">
                                        <div class="card-header py-0 pt-2">
                                            <label class="text-gray-700">Jumlah Pelajaran</label>
                                        </div>
                                        <div class="card-body p-0 px-2 py-2">
                                            <input type="number" value="1" name="jumlah_pelajaran"
                                                class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <!-- <div class="card mt-3">
                                        <div class="card-header py-0 pt-2">
                                            <label class="text-gray-700">Jam Pelajaran</label>
                                        </div>
                                        <div class="card-body p-0 px-2 py-2">
                                            <input type="number" name="jam" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="card mt-3">
                                        <div class="card-header py-0 pt-2">
                                            <label class="text-gray-700">Tingkat</label>
                                        </div>
                                        <div class="card-body p-0 px-2 py-2">
                                            <select type="text" name="tingkat" class="form-control form-control-sm">
                                                <option selected>None</option>
                                                <option>Pemula</option>
                                                <option>Sedang</option>
                                                <option>Mahir</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="card mt-5">
                                        <div class="card-header py-0 pt-2">
                                            <label class="text-gray-700 text-bold">Featured Image</label>
                                        </div>
                                        <div class="card-body p-0 px-2 py-2">
                                            <input type="file" name="img" class="form form-control" required>
                                        </div>
                                    </div>
                                    <!-- <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header bg-white" id="headingOne">
                                                <h2 class="mb-0">
                                                    <button
                                                        class="btn btn-link btn-block text-left text-dark font-weight-bold"
                                                        type="button" data-toggle="collapse"
                                                        data-target="#collapsePublish" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                        Publish
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="collapsePublish" class="collapse" aria-labelledby="headingOne"
                                                data-parent="#accordionExample">
                                                <div class="card-body d-flex justify-content-end ">
                                                    <input type="submit" name="submit" value="Publish"
                                                        class="btn btn-primary">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mt-4">
                                            <div class="card-header bg-white" id="headingOne">
                                                <h2 class="mb-0">
                                                    <button
                                                        class="btn btn-link btn-block text-left text-dark font-weight-bold"
                                                        type="button" data-toggle="collapse"
                                                        data-target="#collapseAmount" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                        Amount
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="collapseAmount" class="collapse" aria-labelledby="headingOne"
                                                data-parent="#accordionExample">
                                                <div class="card-body d-flex justify-content-end ">
                                                    <input type="number" name="harga"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mt-4">
                                            <div class="card-header bg-white" id="headingOne">
                                                <h2 class="mb-0">
                                                    <button
                                                        class="btn btn-link btn-block text-left text-dark font-weight-bold"
                                                        type="button" data-toggle="collapse"
                                                        data-target="#collapsePelajaran" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                        Jumlah Pelajaran
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="collapsePelajaran" class="collapse" aria-labelledby="headingOne"
                                                data-parent="#accordionExample">
                                                <div class="card-body d-flex justify-content-end ">
                                                    <input type="number" name="jumlah_pelajaran"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mt-4">
                                            <div class="card-header bg-white" id="headingOne">
                                                <h2 class="mb-0">
                                                    <button
                                                        class="btn btn-link btn-block text-left text-dark font-weight-bold"
                                                        type="button" data-toggle="collapse"
                                                        data-target="#collapseLesson" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                        Lesson Hours
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="collapseLesson" class="collapse" aria-labelledby="headingOne"
                                                data-parent="#accordionExample">
                                                <div class="card-body d-flex justify-content-end ">
                                                    <input type="number" name="jam"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mt-4">
                                            <div class="card-header bg-white" id="headingOne">
                                                <h2 class="mb-0">
                                                    <button
                                                        class="btn btn-link btn-block text-left text-dark font-weight-bold"
                                                        type="button" data-toggle="collapse"
                                                        data-target="#collapseCategories" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                        Tingkat
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="collapseCategories" class="collapse" aria-labelledby="headingOne"
                                                data-parent="#accordionExample">
                                                <div class="card-body d-flex justify-content-end ">
                                                    <select type="text" name="tingkat" class="form form-control">
                                                        <option selected>None</option>
                                                        <option>Pemula</option>
                                                        <option>Sedang</option>
                                                        <option>Mahir</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mt-4">
                                            <div class="card-header bg-white" id="headingOne">
                                                <h2 class="mb-0">
                                                    <button
                                                        class="btn btn-link btn-block text-left text-dark font-weight-bold"
                                                        type="button" data-toggle="collapse"
                                                        data-target="#collapseFeatured" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                        Featured Image
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="collapseFeatured" class="collapse" aria-labelledby="headingOne"
                                                data-parent="#accordionExample">
                                                <div class="card-body d-flex justify-content-center">
                                                    <a href="">Set Featured Image</a>
                                                    <input type="text" name="image" class="form form-control">
                                                    <input type="file" name="img" class="form form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </form>
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
                        <a class="btn btn-primary" href="login.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- For Auto Check Button -->
        <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            var editorContent = CKEDITOR.instances.description.getData();
            if (!editorContent.trim()) {
                event.preventDefault();
                alert('Please enter a description');
            }
        });
        </script>


        <!-- TinnyMCE Editor -->
        <script src="//cdn.tiny.cloud/1/saa6ca03cwk8vxdx8rs9tcug11a4x6pey1ooij16fzq2znjt/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

    </body>

</html>