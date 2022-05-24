<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    
	
</head>
<body>
    <?php include 'header.php' ?>
	<?php include 'navbar.php' ?>
    <main id="view-panel" >
        <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home_page'; ?>
        <?php include $page.'.php' ?>
    </main>
    <?php include 'footer.php' ?>
    <!-- LOADER -->
    <div class="preloader">
        <div class="lds-ellipsis">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!--END LOADER-->
    
</body>
<script src="assets/Js/script.js"></script>
</html>