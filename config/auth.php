<?php
session_start();
require('config/koneksi.php');
$cek = new Koneksi;
class Auth{

    public function login($email, $password)
    {
        $cek = new Koneksi;
        $sql = "select * from user WHERE email = '$email'";
        $query = mysqli_query($cek->koneksi(), $sql);
        $data = mysqli_fetch_assoc($query);
        $datapassword = isset($data['Password']) ? $data['Password']: "";
        $ver = password_verify($password, $datapassword);
        if(password_verify($password, $datapassword)){
        
        if($data['Role'] == 'admin'){
            $_SESSION['data'] = $data;
    echo "<script>";
    echo 'alert("Login Berhasil."); ' ;
    echo 'window.location.href = "dashboard.php?page=user";';
    echo '</script>';
        }elseif($data['Role'] == 'petugas'){
            $_SESSION['data'] = $data;
    echo "<script>";
    echo 'alert("Login Berhasil."); ' ;
    echo 'window.location.href = "dashboard.php?page=user";';
    echo '</script>';
        }else {
            $_SESSION['data'] = $data;
    echo "<script>";
    echo 'alert("Login Berhasil."); ' ;
    echo 'window.location.href = "dashboard.php?page=user";';
    echo '</script>';           
    }
} else {
    echo "<script>";
    echo 'alert("Login Gagal."); ' ;
    echo 'window.location.href = "index.php?page=login";';
    echo '</script>';
}     
    }
    public function register($UserID, $Username, $Password, $Email, $NamaLengkap, $Alamat, $Role){

        $cek = new Koneksi;
        // ini adalah perintah untuk memasukan data ke dalam tabel user
        $sql = "INSERT INTO user VALUES ('$UserID','$Username','$Password','$Email','$NamaLengkap','$Alamat','user')";
        // ini exsekutornya
        $query = mysqli_query($cek->koneksi(), $sql);

       if ($query) {
            echo "<script>alert('Registrasi Berhasil');window.location='index.php?page=login'</script>";
       }else{
        echo "data gagal ditambahkan";
       
       }
    }
    
    public function logout()
    {
        session_destroy();
        echo "<script>";
        echo 'alert("Logout Berhasil."); ' ;
        echo 'window.location.href = "index.php?page=login";';
        echo '</script>';  
    }


}