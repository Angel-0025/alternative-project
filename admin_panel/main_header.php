<style>
    .user-menu .dropdown-toggle::after{
        display: none;
    }
</style>
<header class="main-header " id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg">
        <!-- Sidebar toggle button -->
        <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
        </button>
        <!-- search form -->
        <div class="search-form d-none d-lg-inline-block">
            <div class="input-group">
                <button type="button" name="search" id="search-btn" class="btn btn-flat">
                    <i class="mdi mdi-magnify"></i>
                </button>
              <input type="text" name="query" id="search-input" class="form-control" placeholder="'button', 'chart' etc."autofocus autocomplete="off" />
            </div>
            <div id="search-results-container">
                <ul id="search-results"></ul>
            </div>
        </div>
        <div class="navbar-right ">
            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu">
                    <button class="dropdown-toggle" data-toggle="dropdown" style="padding-right: 0px !important; padding-left: 20px !important;">
                        <i class="mdi mdi-bell-outline"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-header">You have 5 notifications</li>
                            <li>
                                <a href="#">
                                    <i class="mdi mdi-account-plus"></i> New user registered
                                    <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="mdi mdi-account-remove"></i> User deleted
                                    <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 07 AM</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                                    <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 12 PM</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="mdi mdi-account-supervisor"></i> New client
                                    <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                <i class="mdi mdi-server-network-off"></i> Server overloaded
                                    <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 05 AM</span>
                                </a>
                            </li>
                            <li class="dropdown-footer">
                                <a class="text-center" href="#"> View All </a>
                            </li>
                        </li>
                    </ul>
                </li>
                    <!-- User Account -->
                    
                <li class="dropdown user-menu">
                    <?php
                        $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                        $admin_info = $connect->prepare("SELECT * from admin_account WHERE admin_id=?");
                        $admin_info->execute([$_SESSION["admin_id"]]);
                        $info= $admin_info->fetch(PDO::FETCH_ASSOC)
                    ?>
                    <button href="#" id="name" class="dropdown-toggle nav-link">
                        <span class="d-none d-lg-inline-block"><?=$info['admin_name'];?></span>
                    </button>
                </li>
            </ul>
        </div>
    </nav>
</header>