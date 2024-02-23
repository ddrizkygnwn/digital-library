<?php
require('config/auth.php');
require 'layouts/auth/header.php' ;
$cek =new Auth;
    if(!isset($_GET['page'])){
        echo "<script>";
        echo "alert('harus login dulu');";
        echo "window.location.href = 'index.php?page=login';";
        echo "</script>";
    }
    if($_GET['page'] == 'login'){
        require 'login.php' ;

    } elseif($_GET['page'] == 'register'){
        include 'register.php' ;

    } elseif($_GET['page'] == 'postlogin'){
        $cek->login($_POST['email'],$_POST['password']);
    }elseif($_GET['page'] == 'postregister'){
        $cek->register($_POST['UserID']=null,$_POST['Username'],password_hash($_POST['Password'],PASSWORD_DEFAULT),$_POST['Email'],$_POST['NamaLengkap'],$_POST['Alamat'],$_POST['Role']);
    }
    elseif ($_GET['page'] == 'logout'){
        $cek->logout();
    }
    require 'layouts/auth/footer.php';
?>