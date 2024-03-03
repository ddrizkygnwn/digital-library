<?php
session_start();
require('config/fungsi.php');
$fung = new Fungsi;
if(!isset($_SESSION['data'])){
    echo "<script>";
    echo 'alert("Harus Login Dulu!"); ' ;
    echo 'window.location.href = "index.php?page=login";';
    echo '</script>';
}
require('layouts/dashboard/header.php');

if($_GET['page'] == 'admin'){
    include('auth/user.php');
} elseif($_GET['page'] == 'user'){
     echo "user";
    include('auth/user.php');

//Kategori
}elseif($_GET['page'] == 'Kategoribuku'){
    // echo "ok";
    include('auth/kategoribuku.php');
}elseif($_GET['page'] == 'viewKategori'){
 $fung->viewKategori($query);
}elseif ($_GET['page'] == 'postKategori'){
    $NamaKategori = $_POST ['NamaKategori'];
    $fung->tambahKategori($NamaKategori);
}elseif($_GET['page'] == 'editKategori'){
    $KategoriID = $_POST ['KategoriID'];
    $fung->editKategori($KategoriID);
}elseif($_GET['page'] == 'updateKategori'){
    $KategoriID = $_POST ['KategoriID'];
    $NamaKategori = $_POST ['NamaKategori'];
    $fung->updateKategori($KategoriID, $NamaKategori);
}elseif($_GET['page'] == 'hapusKategori'){
    $fung->hapusKategori($_GET['KategoriID']);
}
//databuku
elseif ($_GET['page'] == 'databuku') {
    include('auth/databuku.php');
} elseif ($_GET['page'] == 'viewbuku') {
    $fung->viewDatabuku($query);
}elseif ($_GET['page'] == 'postdatabuku') {
    $Judul = $_POST['Judul'];
    $Penulis = $_POST['Penulis'];
    $Penerbit = $_POST['Penerbit'];
    $TahunTerbit = $_POST['TahunTerbit'];
    $Kategori = $_POST['Kategori'];
    $fung->tambahBuku($Judul, $Penulis, $Penerbit, $TahunTerbit, $Kategori);
}elseif($_GET['page'] == 'editdatabuku'){
    $BukuID = $_POST ['BukuID'];
    $Judul = $_POST ['Judul'];
    $Penulis = $_POST['Penulis'];
    $Penerbit = $_POST['Penerbit'];
    $TahunTerbit = $_POST['TahunTerbit'];
    $fung->editBuku($BukuID);
}elseif($_GET['page'] == 'updatedatabuku'){
    $BukuID = $_POST ['BukuID'];
    $Judul = $_POST ['Judul'];
    $Penulis = $_POST['Penulis'];
    $Penerbit = $_POST['Penerbit'];
    $TahunTerbit = $_POST['TahunTerbit'];
    $fung->updatedatabuku($BukuID, $Judul, $Penulis, $Penerbit, $TahunTerbit);
}elseif($_GET['page'] == 'hapusBuku'){
    $fung->hapusBuku($_GET['BukuID']);
} elseif($_GET['page'] == 'ajukanpinjam') {
    // echo "ok";
    $fung->ajukanPinjam($_POST['UserID'],$_POST['BukuID'], $_POST['TanggalPeminjaman']);
}
//peminjaman
elseif ($_GET['page'] == 'Peminjam'){
    include('auth/datapeminjam.php');
 } elseif($_GET['page'] == 'KonfirmasiPeminjam') {
    $PeminjamanID = $_POST ['PeminjamanID'];
    $Tglp = $_POST['Tglp'];
    // var_dump($TanggalPengembalian);
    $UserID = $_POST ['UserID'];
    $BukuID = $_POST ['BukuID'];
    $fung->KonfirmasiPeminjam($PeminjamanID, $Tglp, $UserID, $BukuID);    
} elseif($_GET['page'] == 'konfirmasiPengembalian') {
    $PeminjamanID = $_POST ['PeminjamanID'];
    $fung->konfirmasiPengembalian($PeminjamanID);
} elseif($_GET['page'] == 'hapusPeminjam') {
    $fung->hapusPeminjam($_GET['PeminjamanID']);
} 



// Registrasi petugas
elseif($_GET['page'] == 'petugas'){
    include('auth/petugas.php');
}elseif($_GET['page'] == 'viewpetugas'){
    $fung->viewpetugas();
}elseif ($_GET['page'] == 'postpetugas') {
    $data['Username'] = $_POST['Username'];
    $data['Password'] = $_POST['Password'];
    $data['Email'] = $_POST['Email'];
    $data['NamaLengkap'] = $_POST['NamaLengkap'];
    $data['Alamat'] = $_POST['Alamat'];
    $fung->tambahpetugas($data);
}elseif ($_GET['page'] == 'editpetugas') {
    $UserID = $_POST['UserID'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $Email = $_POST['Email'];
    $NamaLengkap = $_POST['NamaLengkap'];
    $Alamat = $_POST['Alamat'];
    $Role = $_POST['Role'];
    $fung->editpetugas($UserID);
}elseif ($_GET['page'] == 'updatepetugas') {
    $UserID = $_POST['UserID'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $Email = $_POST['Email'];
    $NamaLengkap = $_POST['NamaLengkap'];
    $Alamat = $_POST['Alamat'];
    $Role = $_POST['Role'];
    $fung->updatepetugas($UserID,$Username, $Password, $Email, $NamaLengkap, $Alamat, $Role);
}elseif($_GET['page'] == 'hapuspetugas'){
    $fung->hapuspetugas($_GET['UserID']);
}

//koleksi
elseif ($_GET['page'] == 'koleksi'){
    include('auth/koleksi.php');
}elseif($_GET['page'] == 'viewkoleksi'){
    $fung->viewkoleksi($query);
}


//ulasan buku
elseif($_GET['page'] == 'ulasanbuku'){
    include('auth/ulasan.php');
} elseif($_GET['page'] == 'viewulasan'){
    $fung->viewulasan();
}elseif($_GET['page'] == 'editulasan'){
    $UlasanID = $_POST ['UlasanID'];
    $UserID = $_POST ['UserID'];
    $BukuID = $_POST['BukuID'];
    $Ulasan = $_POST['Ulasan'];
    $Rating = $_POST['Rating'];
    $fung->editulasanbuku($UlasanID);
}elseif($_GET['page'] == 'updateulasan'){
    $UlasanID = $_POST ['UlasanID'];
    $UserID = $_POST ['UserID'];
    $BukuID = $_POST['BukuID'];
    $Ulasan = $_POST['Ulasan'];
    $Rating = $_POST['Rating'];
    $fung->updateulasanbuku($UlasanID, $UserID, $BukuID, $Ulasan, $Rating);
}elseif($_GET['page'] == 'postulasan'){
    $UserID = $_POST ['UserID'];
    $BukuID = $_POST['BukuID'];
    $Ulasan = $_POST['Ulasan'];
    $Rating = $_POST['Rating'];
    $fung->postulasan($UserID, $BukuID, $Ulasan, $Rating);
}elseif($_GET['page'] == 'hapusulasan'){
    $fung->hapusulasan($_GET['UlasanID']);
}
require('layouts/dashboard/footer.php');
