<?php

// include App
include './App/config.php';
include './App/functions.php';

include './shared/head.php';
include './shared/header.php';
include './shared/aside.php';
emptypath();
auth(2, 3);
session_start();
$selects = "SELECT * FROM `adminwithrules`";
$srules = mysqli_query($conn, $selects);

$adminID = $_SESSION['admin']['id'];
$select = " SELECT * FROM adminwithrules WHERE adminID =$adminID";
$s = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);
if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  if (!empty($_FILES['image']['name'])) {
    $image_name = rand(0, 1000) . rand(0, 1000) . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "assets/img//" . $image_name;
    move_uploaded_file($tmp_name, $location);
    $image_old = $row['image'];
    unlink("assets/img/$image_old");
  } else {
    $image_name = $row['image'];
  }
  $update = "UPDATE `admins` SET name='$name' , username ='$username', email='$email',image='$image_name' where id=$adminID ";
  $update2 = mysqli_query($conn, $update);
  // $rowupdate =mysqli_fetch_assoc($update2);
  $_SESSION['admin']['image'] = $image_name;
  $_SESSION['admin']['name']=$name;
  $_SESSION['admin']['username']=$username;
  path('users-profile.php');
}



?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <form action="" method="post" enctype="multipart/form-data">

              <img src="assets/img/<?= $row['image'] ?>" alt="Profile" class="rounded-circle">

            </form>

            <h2><?= $row['username'] ?></h2>
            <h3><?= $row['ruleName']  ?></h3>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
              </li>

              <!-- <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li> -->

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">About</h5>
                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8"><?= $row['adminName'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8"><?= $row['email'] ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Username</div>
                  <div class="col-lg-9 col-md-8"><?= $row['username'] ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Rules</div>
                  <div class="col-lg-9 col-md-8"><?= $row['ruleName'] ?></div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form method="post" action="" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <?php if ($_SESSION['admin']['image']) : ?>
                        <div class="form-group">
                          <label for=""> Upload File: <img src="assets/img/<?= $row['image'] ?>" width="50" alt=""></label>
                          <input type="file" name="image" class="form-control">
                        </div>

                      <?php else : ?>

                        <div class="form-group">
                          <label for=""> Upload Filem: <img src="assets/img/fake.png" width="50" alt=""></label>
                          <input type="file" name="image" class="form-control">
                        </div>

                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control" id="fullName" value="<?= $row['adminName'] ?>">
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="Email" value="<?= $row['email']  ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="username" type="text" class="form-control" id="Username" value="<?= $row['username'] ?>">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="update">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">

                <!-- Settings Form -->
                <form>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                    <div class="col-md-8 col-lg-9">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="changesMade" checked>
                        <label class="form-check-label" for="changesMade">
                          Changes made to your account
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="newProducts" checked>
                        <label class="form-check-label" for="newProducts">
                          Information on new products and services
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="proOffers">
                        <label class="form-check-label" for="proOffers">
                          Marketing and promo offers
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                        <label class="form-check-label" for="securityNotify">
                          Security alerts
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End settings Form -->

              </div>
              <!-- Change Password Form -->
              <!-- <div class="tab-pane fade pt-3" id="profile-change-password">
                
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form>
                  

                </div> -->

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->



<?php
include './shared/footer.php';
include './shared/script.php';
?>