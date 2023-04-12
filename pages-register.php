<?php
// include App
include './App/config.php';
include './App/functions.php';

include './shared/head.php';
error_reporting(1);
auth();
$errors = [];
$select = "SELECT * FROM `rules`";
$s = mysqli_query($conn, $select);


if (isset($_POST['add'])) {
  $name = filtervalidtion($_POST['name']);
  $email = $_POST['email'];
  $username = filtervalidtion($_POST['username']);
  $password = $_POST['password'];
  $rule = $_POST['rule'];
  $hashpassword = sha1($password);
  // image code
  $image_size = $_FILES['image']['size'];
  $image_type = $_FILES['image']['type'];
  if (!empty($_FILES['image']['name'])) {
    $image_name = rand(0, 1000) . rand(0, 1000) . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "assets/img/" . $image_name;
  } else {
    $image_name = "fake.png";
  }

  if (stringvalidtion($name)) {
    $errors[] = "Please Enter Employee Name and Length >3";
  }
  if (filesizevalidtion($image_name, $image_size, 3)) {
    $errors[] = "Please Enter Valid Image or Image Size large 3M";
  }
  if (fileTypevalidate($image_type, "image/jpeg", "image/png", "image/jpg")) {
    $errors[] = "Your file out site";
  }
  if (empty($errors)) {
    move_uploaded_file($tmp_name, $location);
    $insert = "INSERT INTO `admins` VALUES (null,'$name','$email','$username','$hashpassword',$rule,'$image_name')";
    $i = mysqli_query($conn, $insert);
    $selects ="SELECT * FROM `admins` WHERE name='$name' and password ='$hashpassword' limit 1" ;
    $ss = mysqli_query($conn,$selects);
    $row = mysqli_fetch_assoc($ss);
    $adminid = $row['id'];
    $color = $_POST['color'];
    $insert2 ="INSERT INTO them VALUES (null,'$color',$adminid)";
    $i =mysqli_query($conn,$insert2);
    setcookie("Color","$color",time() + 8400,"/");
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
                  <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                  <p class="text-center small">Enter your personal details to create account</p>
                </div>
                <div class="">
                  <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger">
                      <ul>
                        <?php foreach ($errors as $error) : ?>
                          <li><?= $error  ?></li>
                          <hr>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  <?php endif; ?>
                  <form class="row g-3 needs-validation" method="post" novalidate enctype="multipart/form-data">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12">
                      <select name="rule" id="" class="form-control">
                        <option value="" selected>-</option>
                        <?php foreach ($s as $data) : ?>
                          <option value="<?= $data['id'] ?>"> <?= $data['name']; ?> </option>
                        <?php endforeach; ?>

                      </select>
                    </div>
                    <div class="col-12">

                      <label for=""> Upload File:</label>
                      <input type="file" name="image" class="form-control">

                    </div>
                    <!-- add color -->
                    <div class="col-12">
                      <div class="form-group">
                        <label for="">color :</label>
                        <select type="text" name="color" class="form-control">

                          <option value="<?= "dark" ?>"> dark </option>
                          <option value="<?= "ligth" ?>"> ligth </option>

                        </select>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="add">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="/odc/pages-login.php">Log in</a></p>
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