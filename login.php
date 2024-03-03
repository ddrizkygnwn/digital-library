<body style='background-image: url("layouts/Book.jpg"); 
  background-position:center; 
  background-repeat: no-repeat; 
  background-size: cover; '>
<div class="col-md-3 mb-5 mt-5">
      <div class="card">
          <div class="card-header">
            <p class="text-center"><strong>Login Digital Library</strong></p>
          </div>
          <img src="layouts/logo.jpg" alt="logo" width='300px' height='300px'>
          <form action="index.php?page=postlogin" method="POST" id="logForm">
          <div class="card-body">
          <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email">
        </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password">
        </div>
            <button type="submit" class="btn btn-primary btn-sm">Login</button>
            <hr>
            <a href="index.php?page=register">Registrasi</a>
          </div>
          </form>
        </div>
  </div>
</body>