<?php
// include App
include '../App/config.php';
include '../App/functions.php';

// include public
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
emptypath();
auth();

  if (isset($_GET["edit"])) {
    $id = $_GET['edit'];
    $up = "SELECT * FROM `admins`where id=$id ";
    $i = mysqli_query($conn, $up);
    $row = mysqli_fetch_assoc($i);
  
    if (isset($_POST['update'])) {
      $name = $_POST['name'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $update = "UPDATE `admins` SET name='$name' , username ='$username', email='$email' where id=$id";
      $update2 = mysqli_query($conn, $update);
     
      path("Admin/list.php");
    }
  } else {
    path("Admin/list.php");
  }

?>


    <div class="home">
        <h1 class="my-5 text-center display-1"> update Admins </h1>
        <div class="container col-md-6">
      <div class="card">
        <div class="card-body">
          <form method="post">
            <div class="form-group">
              <input type="text" name="name"value="<?= $row['name'] ?>" class="form-control" placeholder="update Name....">
            </div>
            <div class="form-group">
              <input type="text" name="username"value="<?= $row['username'] ?>" class="form-control" placeholder="update Username....">
            </div>
            <div class="form-group">
              <input type="text" name="email"value="<?= $row['email'] ?>" class="form-control" placeholder="update Email....">
            </div>
            
            <button class="btn btn-info" name="update" >update Admin</button>
          </form>
        </div>
      </div>
    </div>

    </div>
    
 

<?php
include '../shared/footer.php';
include '../shared/script.php';
?>