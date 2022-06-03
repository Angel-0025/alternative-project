<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
  
</head>
<body class="sidebar-fixed sidebar-dark header-fixed header-light" id="body">
    <div class="mobile-sticky-body-overlay"></div>
        <div class="wrapper">
                <?php include 'header.php' ?>
                <script>
                    NProgress.configure({ showSpinner: false });
                    NProgress.start();
                </script>
                <?php include 'sidebar.php' ?>
            <div class="page-wrapper">
                <?php include 'main_header.php' ?>
                <div class="content-wrapper">
                    <?php $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard'; ?>
                    <?php include $page.'.php' ?>
                </div>
            </div> 
        </div>
    </div>
</body>
</html>