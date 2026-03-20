<?php
include('koneksi.php');

session_start();

if (!isset($_SESSION['email'])) {
    echo "<script>alert('Session expired. Please log in again.!');window.location='login.php';</script>";
    exit();
}

if (isset($_GET['id'])) {
	$id = ($_GET['id']);

	$query = "SELECT * FROM pages WHERE id='$id'";
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
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Edit Pages - LearnGo</title>

        <!-- Quill Text Editor -->
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
            <?php include "sidebar-db.php"?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php include "navbar-db.php"?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center mb-4">
                            <h1 class="h3 mb-0 text-gray-800 pe-5">Edit Pages</h1>
                        </div>

                        <!-- Content Row -->
                        <form method="post" action="edit-pages-proses.php">
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="hidden" value="<?= $data['id'] ?>" name="id" />
                                    <input class="w-100 form form-control" type="text" placeholder="Add Title"
                                        name="title" value="<?php echo $data['title'] ?>">
                                    <div class="mt-5">
                                        <textarea name="contents" value=""><?php echo $data['content'] ?></textarea>
                                        <script>
                                        CKEDITOR.replace('contents');
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="d-flex justify-content-end ">
                                        <input type="submit" name="submit" value="Publish" class="btn btn-primary">
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-header py-0 pt-2">
                                            <label class="text-gray-700">Source</label>
                                        </div>
                                        <div class="card-body p-0 px-2 py-2">
                                            <input type="text" name="src" value="<?= $data['src']?>"
                                                class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="card mt-3">
                                        <div class="card-header py-0 pt-2">
                                            <label class="text-gray-700">Source Dashboard</label>
                                        </div>
                                        <div class="card-body p-0 px-2 py-2">
                                            <input type="text" name="src_db" value="<?= $data['src_db']?>"
                                                class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="card mt-3">
                                        <div class="card-header py-0 pt-2">
                                            <label class="text-gray-700">Featured Image</label>
                                        </div>
                                        <div class="card-body p-0 px-2 py-2">
                                            <input type="file" name="img" class="form-control form-control-sm">
                                        </div>
                                    </div>

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
        tinymce.init({
            selector: '#mytextarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            height: 500
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