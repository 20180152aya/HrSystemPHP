<?php

// include App
include './App/config.php';
include './App/functions.php';

// include public
include './shared/head.php';
include './shared/header.php';
include './shared/aside.php';



if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $hashpassword = sha1($password);

  $selects = "SELECT * FROM `admins` WHERE username='$username' and password ='$hashpassword' limit 1";
  $ss = mysqli_query($conn, $selects);
  $row = mysqli_fetch_assoc($ss);
  $idrow = $row['rule'];
  $selectrules = "SELECT * FROM rules WHERE id =$idrow ";
  $sss = mysqli_query($conn, $selectrules);
  $rowrules = mysqli_fetch_assoc($sss);
  $numRows = mysqli_num_rows($ss);
  if ($numRows == 1) {


    $_SESSION['admin'] = [
      "username" => $username,
      "rule" => $row['rule'],
      "id" => $row['id'],
      "email" => $row['email'],
      "name" => $row['name'],
      "image" => $row['image'],
      "rules" => $rowrules['name']
    ];

    path("index.php");
  }
  else {
    path('pages-login.php');
  }
}


?>
<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">NiceAdmin</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  <p class="text-center small">Enter your username & password to login</p>
                </div>

                <form class="row g-3 needs-validation" method="post" novalidate>

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="username" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit" name="login">Login</button>
                  </div>
                  <div class="col-12">
                  
                  </div>
                 
                  <div class="col-12">
                    <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                  </div>
                </form>

              </div>
            </div>

            <div class="credits">

              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->


<?php
include './shared/footer.php';
include './shared/script.php';
?>