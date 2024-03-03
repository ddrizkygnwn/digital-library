<div class="card">
    <div class="card-body"><h1> Data Petugas </h1>
    <hr>
    <?php
    if($_SESSION['data']['Role'] == 'admin'){ ?>
        <div class="mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahpetugas">Tambah Petugas
</button>
</div>
<?php } ?>
<div class="table-responsive">
</hr>

<div class="card-body"> 
    <table class= "table table-bordered" id="example1" width="100%" cellspacing="0">
        <thead>
            <tr>
               <th>No</th>
               <th>Nama Lengkap</th>
               <th>Username</th>
               <th>Email</th>
               <th>Alamat</th>
               <th>Role</th>
               <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
                foreach($fung->viewpetugas() as $b){ ?> 
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $b['NamaLengkap'] ?></td>
                    <td><?= $b['Username'] ?></td>
                    <td><?= $b['Email'] ?></td>
                    <td><?= $b['Alamat'] ?></td>
                    <td><?= $b['Role'] ?></td>
                    <td>
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?= $b['UserID'] ?>">Edit</button>
                <a class="btn btn-danger btn-sm" href="dashboard.php?page=hapuspetugas&UserID=<?=$b['UserID']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
              </td>
              </tr>
             <?php   }
            ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="tambahpetugas">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Tambah Petugas</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="dashboard.php?page=postpetugas" method="post">
                

                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="Username" placeholder="Masukkan Username" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" name="Password" placeholder="Masukkan Password" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="Email" placeholder="Masukkan Email"class="form-control" required>
                </div>

                <div class="form-group">
                  <label>NamaLengkap</label>
                  <input type="text" name="NamaLengkap" placeholder="Masukkan NamaLengkap"class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="Alamat" placeholder="Masukkan Alamat"class="form-control" required>
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




    <!-- /.modal untuk edit  -->
    
    <?php 
            foreach($fung->viewpetugas() as $b){ ?>
<div class="modal fade" id="edit<?= $b['UserID']?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Petugas</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <form action="dashboard.php?page=updatepetugas" method="post">
                            <div class="modal-body">
                        
                                <input type="text" name="UserID" value="<?= $b['UserID']; ?>" hidden>
                                <div class="form-group">
                                   
                                    <div class="form-group">
                                    <label>NamaLengkap</label>
                                    <input type="text" class="form-control" name="NamaLengkap" value="<?= $b['NamaLengkap']; ?>" required>
                                    </div>

                                    <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="Username" value="<?= $b['Username']; ?>" required>
                                    </div>
                                    


                                    <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="Email" value="<?= $b['Email']; ?>" required>
                                    </div>

                                    <div class="form-group"> 
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="Alamat" value="<?= $b['Alamat']; ?>" required>
                                    </div>

                                

                                </div>

                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                   
                                </div>
                                
                               
                        </form>
                        
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            </div>
            
            
          <?php  }
            ?>