        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= __BASEURL__; ?>assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>
                            <?= $_SESSION['user']['name'] ?>
                        </p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="index.php">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=blog-posts">
                            <i class="fa fa-pencil"></i>
                            <span>Blog Posts</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=comments">
                            <i class="fa fa-comments"></i>
                            <span>Komentar</span>
                        </a>
                    </li>
                    <?php if($_SESSION['user']['level'] == 'Administrator' || $_SESSION['user']['level'] == 'Operator'):  ?>
                    <li>
                        <a href="?page=categories">
                            <i class="fa fa-th"></i>
                            <span>Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=roles">
                            <i class="fa fa-cogs"></i>
                            <span>Role User</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span>Users Management</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="?page=author&action=list">
                                    <i class="fa fa-circle-o"></i>
                                    <span>Author List</span>
                                </a>
                            </li>
                            <li>
                                <a href="?page=user&action=list">
                                    <i class="fa fa-circle-o"></i>
                                    <span>User List</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <li>
                        <a onclick="return confirm('Apakah Anda yakin akan keluar ?')" href="logout.php">
                            <i class='fa fa-sign-out'></i>
                            <span>Logout</a>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>