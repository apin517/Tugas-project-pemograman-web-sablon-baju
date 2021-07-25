<html>

<head>
	<title>Homepage</title>
	<link rel="stylesheet" href="css\bootstrap.css">
</head>
<body>
<a href="admin.php">Home</a>
<div class="container">
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm">
        <div class="sidenav text-center" style="margin:auto">
         <div class="login-main-text">
            <h2>E-ClothPrinter Login</h2>
            <p>Login or register from here to access.</p>
         </div>
      </div>
      <div class="container">
          <div class="row">
              <div class="card col-md-12 mt-5">
                  <div class="card-body">
                      <form action="cek_login.php" method="post">
                      <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="user" class="form-control" id="user" aria-describedby="emailHelp" placeholder="Enter Username">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" name="pass" class="form-control" id="pass" aria-describedby="emailHelp" placeholder="Enter Password">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Login</button>
                        </div>
                      </form>
                  </div>
              </div>
          </div>
         
      </div>
    </div>
    <div class="col-sm">
    </div>
  </div>
</div>
</body>