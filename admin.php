<?php
include 'layouts/dashboard/header.php' ;
    if(!isset($_GET['page'])){
         header('location: admin.php?page=dashboard');
    }
    if($_GET['page'] == 'dashboard'){
        include 'library/dashboard.php' ;
    } elseif($_GET['page'] == 'databuku'){
        include 'auth/databuku.php' ;
    }
    include 'layouts/dashboard/footer.php';
?>