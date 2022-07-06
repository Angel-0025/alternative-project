<?php
session_start();
    $_SESSION['search_word'] = $_POST['searchInput'];
    
    if(isset($_SESSION['search_word']) && !empty($_SESSION['search_word'])) {
        echo 1;
    }
    else{
        echo 2;
    }
?>