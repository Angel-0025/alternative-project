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