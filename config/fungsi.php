<?php
require "config/koneksi.php";
$cek = new Koneksi;


class Fungsi {
    public function viewKategori(){
        $cek = new Koneksi;
        $sql = "SELECT * from Kategoribuku";
        $query = mysqli_query($cek->koneksi(),$sql);
        $select = [];
        while($d = mysqli_fetch_assoc($query)){
        $select[] = $d;}
        return $select;
    }
    public function tambahKategori($NamaKategori){
        $cek = new Koneksi;
        $sql = "INSERT INTO Kategoribuku VALUES (null, '$NamaKategori')" ;
        $hitung = mysqli_num_rows(mysqli_query($cek->koneksi(), "SELECT * FROM Kategoribuku WHERE NamaKategori = '$NamaKategori'"));
        if ($hitung < 1){
            $query = mysqli_query($cek->koneksi(), $sql);
            header('location: dashboard.php?page=Kategoribuku');
            
        }else{
             echo "<script>";
            //  echo 'alert("Tambah Kategori Berhasil\."); ' ;
            //  echo 'window.location.href = "dashboard.php?page=kategoribuku";';
             echo '</script>';  

        }
    }
    public function editKategori($id){
        $set = new Koneksi;
        $sql = "SELECT * from kategoribuku WHERE KategoriID='$id'";
        $query = mysqli_query($set->koneksi(), $sql);
        $data = mysqli_fetch_assoc($query);
        return $data;
    }
    public function updateKategori($id,$kategori){
        $set = new Koneksi;
        $sql = "UPDATE kategoribuku SET NamaKategori='$kategori' WHERE KategoriID='$id'";
        $query = mysqli_query($set->koneksi(), $sql);
        if($query){
            echo "<script>";
            // echo 'alert("Hapus Berhasil."); ' ;
            // echo 'window.location.href = "dashboard.php?page=kategoribuku";';
            echo '</script>';  
            echo '<script>window.location="dashboard.php?page=Kategoribuku"</script>';
        } else {
            echo "<script>";
            // echo 'alert("Hapus Berhasil."); ' ;
            // echo 'window.location.href = "dashboard.php?page=kategoribuku";';
            echo '</script>';  
            echo '<script>window.location="dashboard.php?page=Kategoribuku"</script>';
        }
    }
    public function hapusKategori($id){
        $set = new Koneksi;
        $sql = "DELETE from kategoribuku WHERE KategoriID='$id'";
        $query = mysqli_query($set->koneksi(), $sql);
        if($query){
            echo "<script>";
            // echo 'alert("Hapus Berhasil."); ' ;
            // echo 'window.location.href = "dashboard.php?page=kategoribuku";';
            echo '</script>';  
            echo '<script>window.location="dashboard.php?page=Kategoribuku"</script>';
        } else {
            echo "<script>";
            // echo 'alert("Hapus Berhasil."); ' ;
            // echo 'window.location.href = "dashboard.php?page=kategoribuku";';
            echo '</script>';  
            echo '<script>window.location="dashboard.php?page=Kategoribuku"</script>';
        }
    }
    public function viewDatabuku(){
        $cek = new Koneksi;
        $sql = "SELECT * FROM buku";
        $query = mysqli_query($cek->koneksi(),$sql);
        $select = [];
        while($d = mysqli_fetch_assoc($query)){
        $select[] = $d;}
        return $select;
    }
    public function katbuku($id){
        $set = new Koneksi;
        $sql = "SELECT * from kategoribuku_relasi LEFT JOIN kategoribuku ON kategoribuku_relasi.KategoriID=kategoribuku.KategoriID WHERE kategoribuku_relasi.BukuID='$id'";
        $query = mysqli_query($set->koneksi(), $sql);
        $select = [];
        while($d = mysqli_fetch_assoc($query)){
            $select[] = $d;}
            return $select;
    }
    public function tambahBuku($Judul, $Penulis, $Penerbit, $TahunTerbit, $Kategori){
        $set = new Koneksi;
        $sql = "INSERT INTO buku VALUES (NULL,'$Judul', '$Penulis', '$Penerbit', '$TahunTerbit')";
        if($Kategori == NULL){
            echo "<script>";
            // echo 'alert("Hapus Berhasil."); ' ;
            // echo 'window.location.href = "dashboard.php?page=kategoribuku";';
            echo '</script>';  
            echo '<script>window.location="dashboard.php?page=databuku"</script>';
            exit();
        }
        $query = mysqli_query($set->koneksi(), $sql);
        $buk = "SELECT * from buku order by BukuID desc limit 1";
        $qkat = mysqli_query($set->koneksi(), $buk);
        $data = mysqli_fetch_assoc($qkat);
        $BukuID = $data['BukuID'];

        foreach($Kategori as $d){
            $sql2 = "INSERT INTO kategoribuku_relasi VALUES (NULL,'$BukuID', '$d')";
            $query = mysqli_query($set->koneksi(), $sql2);
        }
        if($query){
            echo "<script>";
            // echo 'alert("Hapus Berhasil."); ' ;
            // echo 'window.location.href = "dashboard.php?page=kategoribuku";';
            echo '</script>';  
            echo '<script>window.location="dashboard.php?page=databuku"</script>';
        } else {
            echo "<script>";
            // echo 'alert("Hapus Berhasil."); ' ;
            // echo 'window.location.href = "dashboard.php?page=kategoribuku";';
            echo '</script>';  
            echo '<script>window.location="dashboard.php?page=databuku"</script>';
        }
    }
    public function editBuku($BukuID)
    {
        $cek = new Koneksi;
        $sql = "SELECT * FROM buku WHERE BukuID = '$BukuID'";
        $query = mysqli_query($cek->koneksi(),$sql);
        $data = mysqli_fetch_assoc($query);

        return $data;

            echo "<script>";
            // echo 'alert("Buku gagal ditambahkan"); ' ;
            // echo 'window.location.href = "dashboard.php?page=databuku";';
            echo '</script>';
            echo '<script>window.location="dashboard.php?page=databuku"</script>';

    }
    public function updatedatabuku($BukuID, $Judul, $Penulis, $Penerbit, $TahunTerbit)
    {
        $cek = new Koneksi;
        $sql = "UPDATE buku SET Judul = '$Judul', Penulis = '$Penulis', Penerbit = '$Penerbit', TahunTerbit = '$TahunTerbit' WHERE BukuID='$BukuID'";
        $query = mysqli_query($cek->koneksi(),$sql);
        if($query){
            echo "<script>";
            // echo 'alert("berhasil edit data");';
            // echo 'window.location.href = "dashboard.php?page=databuku";';
            echo '</script>';
            echo '<script>window.location="dashboard.php?page=databuku"</script>';

         }else{
            echo "<script>";
            // echo 'alert("berhasil edit data");';
            // echo 'window.location.href = "dashboard.php?page=databuku";';
            echo '</script>';
         }
         echo '<script>window.location="dashboard.php?page=databuku"</script>';

    }
    public function hapusBuku($BukuID)
    {
        $cek = new Koneksi;
        $sql = "DELETE FROM buku WHERE BukuID = '$BukuID'";
        $query = mysqli_query($cek->koneksi(), $sql);
        
        echo "<script>";
        // echo 'alert("Buku berhasil dihapus"); ' ;
        // echo 'window.location.href = "dashboard.php?page=databuku";';
        echo '</script>';

        echo '<script>window.location="dashboard.php?page=databuku"</script>';
    }
    public function ajukanPinjam($UserID, $BukuID, $TanggalPeminjaman){
        $TanggalPengembalian = date('Y-m', strtotime($TanggalPeminjaman)) . '-' . date('d', strtotime($TanggalPeminjaman)) + 3;
        $set = new Koneksi;
        $sql = "INSERT into peminjaman VALUES (NULL, '$UserID', '$BukuID', '$TanggalPeminjaman', '$TanggalPengembalian', 'wait')";
        $query = mysqli_query($set->koneksi(), $sql);
        if($query){
            echo "<script>";
        // echo 'alert("pinjam berhasil dihapus"); ' ;
        // echo 'window.location.href = "dashboard.php?page=databuku";';
        echo '</script>';
        echo '<script>window.location="dashboard.php?page=databuku"</script>';
        } else {
            echo "<script>";
        // echo 'alert("pinjam berhasil dihapus"); ' ;
        // echo 'window.location.href = "dashboard.php?page=databuku";';
        echo '</script>';
        echo '<script>window.location="dashboard.php?page=databuku"</script>';
        }
    }
    public function postUlasan($UserID, $BukuID, $Ulasan, $Rating){
        $set = new Koneksi;
        $sql = "INSERT into ulasanbuku VALUES (NULL, '$UserID', '$BukuID', '$Ulasan', '$Rating')";
        $query = mysqli_query($set->koneksi(), $sql);
        if($query){
            echo "<script>";
        // echo 'alert("Ulasan berhasil"); ' ;
        // echo 'window.location.href = "dashboard.php?page=databuku";';
        echo '</script>';
        echo '<script>window.location="dashboard.php?page=databuku"</script>';
        } else {
            echo "<script>";
            // echo 'alert("Ulasan Gagal"); ' ;
            // echo 'window.location.href = "dashboard.php?page=databuku";';
            echo '</script>';
            echo '<script>window.location="dashboard.php?page=databuku"</script>';
        }
    }

    public function viewPeminjam(){
        $set = new Koneksi;
        $sql = "SELECT * from peminjaman LEFT JOIN user ON peminjaman.UserID=user.UserID LEFT JOIN buku ON peminjaman.BukuID=buku.BukuID";
        $query = mysqli_query($set->koneksi(), $sql);
        $select = [];
        while($d = mysqli_fetch_assoc($query)){
            $select[] = $d;}
            return $select;
    }
   


    public function KonfirmasiPeminjam($PeminjamanID, $Tglp, $UserID, $BukuID){
        $set = new Koneksi;
        $sql = "UPDATE peminjaman SET UserID='$UserID', BukuID='$BukuID', TanggalPengembalian='$Tglp',StatusPeminjaman='pinjam' WHERE PeminjamanID='$PeminjamanID'";
        $query = mysqli_query($set->koneksi(), $sql);

        $sql2 = "INSERT into koleksipribadi VALUES (NULL, '$UserID', '$BukuID')";
        $query2 = mysqli_query($set->koneksi(), $sql2);

        if($query2){
        
            echo "<script>";
            // echo 'alert("Ulasan Gagal"); ' ;
            // echo 'window.location.href = "dashboard.php?page=databuku";';
            echo '</script>';
            echo '<script>window.location="dashboard.php?page=Peminjam"</script>';
        } else {
            echo "<script>";
            // echo 'alert("Ulasan Gagal"); ' ;
             echo 'window.location.href = "dashboard.php?page=databuku";';
            echo '</script>';
            // echo '<script>window.location="dashboard.php?page=Peminjam"</script>';
        }
    }
    public function konfirmasiPengembalian($PeminjamanID){
        $set = new Koneksi;
        $sql = "UPDATE peminjaman SET StatusPeminjaman='selesai' WHERE PeminjamanID='$PeminjamanID'";
        $query = mysqli_query($set->koneksi(), $sql);
        if($query){
            echo "<script>";
            // echo 'alert("Ulasan berhasil"); ' ;
            // echo 'window.location.href = "dashboard.php?page=databuku";';
            echo '</script>';
            // echo '<script>window.location="dashboard.php?page=Peminjam"</script>';
             echo '<script>window.location="dashboard.php?page=Peminjam"</script>';
        } else {
            echo "<script>";
            // echo 'alert("Ulasan berhasil"); ' ;
            // echo 'window.location.href = "dashboard.php?page=databuku";';
            echo '</script>';
            echo '<script>window.location="dashboard.php?page=Peminjam"</script>';
        }
    }
    public function hapusPeminjam($PeminjamanID){
        $set = new Koneksi;
        $sql = "DELETE from peminjaman WHERE PeminjamanID='$PeminjamanID'";
        $query = mysqli_query($set->koneksi(), $sql);
        if($query){
            echo "<script>";
            // echo 'alert("Ulasan berhasil"); ' ;
            // echo 'window.location.href = "dashboard.php?page=databuku";';
            echo '</script>';
            echo '<script>window.location="dashboard.php?page=Peminjam"</script>';
        } else {
            echo "<script>";
            // echo 'alert("Ulasan berhasil"); ' ;
            // echo 'window.location.href = "dashboard.php?page=databuku";';
            echo '</script>';
            echo '<script>window.location="dashboard.php?page=Peminjam"</script>';
        }
    }
    //koleksi
public function viewkoleksi(){
    $set = new Koneksi;
    $UserID = $_SESSION['data']['UserID'];
    $sql = "SELECT * FROM koleksipribadi LEFT JOIN user ON koleksipribadi.UserID=user.UserID LEFT JOIN buku ON koleksipribadi.BukuID=buku.BukuID LEFT JOIN peminjaman ON koleksipribadi.UserID=peminjaman.UserID WHERE koleksipribadi.UserID='$UserID'";
    $query = mysqli_query($set->koneksi(), $sql);
    $select = [];
    while($d = mysqli_fetch_assoc($query)){
        $select[] = $d;}
        return $select;
}
    //ulasan
    public function viewulasan(){
        $set = new Koneksi;
        $sql = "SELECT * from ulasanbuku LEFT JOIN user ON ulasanbuku.UserID=user.UserID LEFT JOIN buku ON ulasanbuku.BukuID=buku.BukuID";
        $query = mysqli_query($set->koneksi(), $sql);
        $select = [];
        while($d = mysqli_fetch_assoc($query)){
            $select[] = $d;}
            return $select;
    }
    public function hapusulasan($id){
        $set = new Koneksi;
        $sql = "DELETE from ulasanbuku WHERE UlasanID='$id'";
        $query = mysqli_query($set->koneksi(), $sql);
        if($query){
            echo "<script>";
            // echo 'alert("Hapus Berhasil."); ' ;
            // echo 'window.location.href = "dashboard.php?page=kategoribuku";';
            echo '</script>';  
            echo '<script>window.location="dashboard.php?page=ulasanbuku"</script>';
        } else {
            echo "<script>";
            // echo 'alert("Hapus Berhasil."); ' ;
            // echo 'window.location.href = "dashboard.php?page=kategoribuku";';
            echo '</script>';  
            echo '<script>window.location="dashboard.php?page=ulasanbuku"</script>';
        }
    }


    //petugas
        
    public function viewpetugas(){
        $cek = new Koneksi;
        $sql = "SELECT * FROM user WHERE Role='Petugas' ORDER BY UserID DESC";
        $query = mysqli_query($cek->koneksi(),$sql);
        $select = [];
        while($d = mysqli_fetch_assoc($query)){
        $select[] = $d;}
        return $select;
    }
public function tambahpetugas($data){

        $cek = new Koneksi;
        $Username = $data['Username'];
        $Password = Password_hash($data['Password'], PASSWORD_BCRYPT);
        $Email = $data['Email'];
        $NamaLengkap = $data['NamaLengkap'];
        $Alamat = $data['Alamat'];
        $sql = "INSERT INTO user VALUES (NULL,'$Username', '$Password', '$Email', '$NamaLengkap', '$Alamat', 'petugas')";
        $hitung = mysqli_num_rows(mysqli_query($cek->koneksi(), "SELECT * FROM user WHERE Username = '$Username'"));
        
        if ($hitung < 1){
            $query = mysqli_query($cek->koneksi(), $sql);
            echo "<script>";
            // echo 'alert("Hapus Berhasil."); ' ;
            // echo 'window.location.href = "dashboard.php?page=kategoribuku";';
            echo '</script>';  
            echo '<script>window.location="dashboard.php?page=petugas"</script>';
        }else{
            echo "<script>";
            // echo 'alert("Hapus Berhasil."); ' ;
            // echo 'window.location.href = "dashboard.php?page=kategoribuku";';
            echo '</script>';  
            echo '<script>window.location="dashboard.php?page=petugas"</script>';

        }
    }
    public function editpetugas($UserID)
    {
        $cek = new Koneksi;
        $sql = "SELECT * FROM user WHERE UserID = '$UserID'";
        $query = mysqli_query($cek->koneksi(),$sql);
        $data = mysqli_fetch_assoc($query);

        return $data;

            echo "<script>";
            // echo 'alert("petugas gagal ditambahkan"); ' ;
            // echo 'window.location.href = "dashboard.php?page=petugas";';
            echo '</script>';
            echo '<script>window.location="dashboard.php?page=petugas"</script>';

    }
    public function updatepetugas($UserID,$Username,$Password,$Email,$NamaLengkap,$Alamat,$Role)
    {
        $cek = new Koneksi;
        $sql = "UPDATE user SET Username = '$Username', Password= '$Password', Email = '$Email', NamaLengkap = '$NamaLengkap', Alamat = '$Alamat' WHERE UserID='$UserID'";
        $query = mysqli_query($cek->koneksi(),$sql);
        if($query){
            echo "<script>";
            // echo 'alert("berhasil edit petugas");';
            // echo 'window.location.href = "dashboard.php?page=petugas";';
            echo '</script>';
            echo '<script>window.location="dashboard.php?page=petugas"</script>';

         }else{
            echo "<script>";
            // echo 'alert("berhasil edit petugas");';
            // echo 'window.location.href = "dashboard.php?page=petugas";';
            echo '</script>';
         }
         echo '<script>window.location="dashboard.php?page=petugas"</script>';

    }
    public function hapuspetugas($UserID)
    {
        $cek = new Koneksi;
        $sql = "DELETE FROM user WHERE UserID = '$UserID'";
        $query = mysqli_query($cek->koneksi(), $sql);
        
        echo "<script>";
        // echo 'alert("petugas berhasil dihapus"); ' ;
        // echo 'window.location.href = "dashboard.php?page=petugas";';
        echo '</script>';

        echo '<script>window.location="dashboard.php?page=petugas"</script>';
    }
}