<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

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
    <li class="nav-item <?php echo ($currentPage == 'dashboard.php') ? 'active' : '';?>">
        <a class=" nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li
        class="nav-item <?php echo ($currentPage == 'all-post.php' || $currentPage == 'edit-post.php' || $currentPage == 'add-new-post.php' || $currentPage == 'categories.php' || $currentPage == 'edit-categories.php') ? 'active' : '';?> ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-thumbtack"></i>
            <span>Posts</span>
        </a>
        <div id="collapseTwo"
            class="collapse <?php echo ($currentPage == 'all-post.php' || $currentPage == 'edit-post.php' || $currentPage == 'add-new-post.php' || $currentPage == 'categories.php' || $currentPage == 'edit-categories.php') ? 'show' : '';?> "
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php echo ($currentPage == 'all-post.php' || $currentPage == 'edit-post.php') ? 'active' : '';?> "
                    href="all-post.php">All Posts</a>
                <a class="collapse-item <?php echo ($currentPage == 'add-new-post.php') ? 'active' : '';?> "
                    href="add-new-post.php">Add New</a>
                <a class="collapse-item <?php echo ($currentPage == 'categories.php' || $currentPage == 'edit-categories.php') ? 'active' : '';?>"
                    href="categories.php">Categories</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li
        class="nav-item  <?php echo ($currentPage == 'library.php' || $currentPage == 'edit-library.php' || $currentPage == 'edit-profile-media.php' || $currentPage == 'edit-post-media.php.php' || $currentPage == 'edit-course-media.php') ? 'active' : '';?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMedia" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-photo-video"></i>
            <span>Media</span>
        </a>
        <div id="collapseMedia"
            class="collapse  <?php echo ($currentPage == 'library.php' || $currentPage == 'edit-library.php' || $currentPage == 'edit-profile-media.php' || $currentPage == 'edit-post-media.php.php' || $currentPage == 'edit-course-media.php') ? 'show' : '';?>"
            aria-labelledby="headingMedia" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php echo ($currentPage == 'library.php' || $currentPage == 'edit-library.php' || $currentPage == 'edit-profile-media.php' || $currentPage == 'edit-post-media.php.php' || $currentPage == 'edit-course-media.php') ? 'active' : '';?>"
                    href="library.php">Library</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li
        class="nav-item <?php echo ($currentPage == 'all-pages.php' || $currentPage == 'add-new-pages.php' || $currentPage == 'edit-pages.php') ? 'active' : '';?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages"
            class="collapse <?php echo ($currentPage == 'all-pages.php' || $currentPage == 'add-new-pages.php' || $currentPage == 'edit-pages.php') ? 'show' : '';?>"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php echo ($currentPage == 'all-pages.php' || $currentPage == 'edit-pages.php') ? 'active' : '';?>"
                    href="all-pages.php">All Pages</a>
                <a class="collapse-item <?php echo ($currentPage == 'add-new-pages.php') ? 'active' : '';?>"
                    href="add-new-pages.php">Add New</a>
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
        <div id="collapseFeedback" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="comments.php">Comments</a>
                <a class="collapse-item" href="message.php">Message</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCourse" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fab fa-fw fa-discourse"></i>
            <span>Course</span>
        </a>
        <div id="collapseCourse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="all-course.php">All Course</a>
                <a class="collapse-item" href="add-new-course.php">Add New</a>
                <a class="collapse-item" href="type-course.php">Type Of Course</a>
                <a class="collapse-item" href="add-new-type-course.php">Add New Type Course</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMateri" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fa-solid fa-book"></i>
            <span>Managemen Materi</span>
        </a>
        <div id="collapseMateri" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="all-materi.php">All Materi</a>
                <a class="collapse-item" href="add-new-materi.php">Add New Materi</a>
                <a class="collapse-item" href="delate-materi.php">Delete Materi</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
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
        <div id="collapseSettings" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php
                            $pages = "SELECT * FROM pages ORDER BY id ASC";
                            $jadi = mysqli_query($koneksi, $pages);

                            while ($page = mysqli_fetch_assoc($jadi)) {
                                $active_page = basename($_SERVER['PHP_SELF'], ".php");

                                $class = ($page['src_db'] == $active_page . ".php") ? "collapse-item active" : "collapse-item";

                                echo '<a href="' . $page['src_db'] . '" class="' . $class . '">' . $page['title'] . '</a>';
                            }
                            ?> <a class="collapse-item" href="footer-page.php">Footer</a>
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