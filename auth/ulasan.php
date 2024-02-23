<div class="content-wrapper" style="min-height: 641px;">
   

    <!-- konten utama -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
<!-- Default box -->
<h1>Ulasan Buku</h1>
<hr>

<div class="table-responsive">
  <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Judul</th>
                <th>Rating</th>
                <th>Ulasan</th>
                <?php
                if($_SESSION['data']['Role'] == 'admin' || $_SESSION['data']['Role'] == 'petugas'){ ?>
                <th>Aksi</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no=1;
                foreach($fung->viewulasan() as $d){ ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['NamaLengkap']; ?></td>
                    <td><?= $d['Judul']; ?></td>
                    <td><?= $d['Rating']; ?></td>
                    <td><?= $d['Ulasan']; ?></td>
                    <?php
                if($_SESSION['data']['Role'] == 'admin' || $_SESSION['data']['Role'] == 'petugas'){ ?>
                    <td>
                        <a class="btn btn-danger btn-sm" href="dashboard.php?page=hapusulasan&UlasanID=<?= $d['UlasanID'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                </td>
                <?php } ?>
                </tr>
             <?php   }
            ?>
        </tbody>
    </table>
</div>
</div>
</div>
                </div>
                </div>
<div class="modal fade" id="tambahdatabuku">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Tambah Buku</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="dashboard.php?page=postdatabuku" method="post">
                

                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" name="Judul" placeholder="Masukkan Judul " class="form-control">
                </div>

                <div class="form-group">
                  <label>Penulis</label>
                  <input type="text" name="Penulis" placeholder="Masukkan Penulis"class="form-control">
                </div>

                <div class="form-group">
                  <label>Penerbit</label>
                  <input type="text" name="Penerbit" placeholder="Masukkan Penerbit"class="form-control">
                </div>

                <div class="form-group">
                  <label>Tahun Terbit</label>
                  <input type="number" name="TahunTerbit" placeholder="Masukkan Tahun Terbit"class="form-control">
                </div>
                <div class="form-group">
                <?php 
                        foreach($fung->viewKategori() as $b){ ?>
                            <div><input type="checkbox" name="kategori[<?= $b['KategoriID'] ?>]" value="<?= $b['KategoriID'] ?>"> <?= $b['NamaKategori'] ?></div>
                      <?php  }
                    ?>
              </div>
            </div>
                <button type="submit" class="btn btn-primary">SIMPAN</button>

              </div>
            </div>
          </div>
        </form>
</div>
</div>

</div>
</div>

                <!-- /.modal -->
                <?php 
            foreach ($fung->viewDatabuku() as $a){ ?>
<div class="modal fade" id="edit<?= $a['BukuID']?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Buku</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <form action="dashboard.php?page=updatedatabuku" method="post">
                            <div class="modal-body">
                        
                                <input type="text" name="BukuID" value="<?= $b['BukuID']; ?>" hidden>
                                <div class="form-group">
                                    <label for="">Data Buku</label>
                                    <input type="text" class="form-control" name="Judul" value="<?= $b['Judul']; ?>" required="">
                                    <input type="text" class="form-control" name="Penulis" value="<?= $b['Penulis']; ?>" required="">
                                    <input type="text" class="form-control" name="Penerbit" value="<?= $b['Penerbit']; ?>" required="">
                                    <input type="text" class="form-control" name="TahunTerbit" value="<?= $b['TahunTerbit']; ?>" required="">
                                </div>

                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                   
                                </div>
                                
                               
                        </form>
                        </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            
          <?php  }
            ?>
            
            
            <!-- /.modal -->

            <?php 
        foreach($fung->viewbuku() as $b) { ?>
            <div class="modal fade" id="peminjaman<?= $b['BukuID'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pinjam Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=ajukanpeminjaman" method="post">
            <div class="modal-body">
            <input type="text" name="BukuID" value="<?= $b['BukuID'];?>" hidden>
            <input type="text" value="<?= $_SESSION['data']['UserID'];?>" name="UserID" hidden>
            <input type="text" value="<?= date('Y-m-d h:i:s')?>" name="TanggalPeminjaman" hidden>
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="judul" value="<?= $b['Judul'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Penulis</label>
                <input type="text" class="form-control" name="penulis" value="<?= $b['Penulis'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Penerbit</label>
                <input type="text" class="form-control" name="penerbit" value="<?= $b['Penerbit'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tahun</label>
                <input type="number" class="form-control" name="tahun" value="<?= $b['TahunTerbit'] ?>" disabled>
              </div>
             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Ajukan Pinjam Buku</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php  }
    ?>

<?php 
        foreach($fung->viewbuku() as $b) { ?>
            <div class="modal fade" id="ulas<?= $b['BukuID'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pinjam Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=postulasan" method="post">
            <div class="modal-body">
            <input type="text" name="BukuID" value="<?= $b['BukuID'];?>" hidden>
            <input type="text" value="<?= $_SESSION['data']['UserID'];?>" name="UserID" hidden>
            <input type="text" value="<?= date('Y-m-d h:i:s')?>" name="TanggalPeminjaman" hidden>
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="Judul" value="<?= $b['Judul'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Ulasan</label>
                <textarea name="ulasan" class="form-control" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <label for="">Rating</label>
                <select name="Rating" class="form-control" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
              </div>
             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php  }
    ?>