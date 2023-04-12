<?php
// // include App

use function PHPSTORM_META\elementType;

include '../App/config.php';
include '../App/functions.php';

// include public
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
emptypath();
auth(2,3);
$errors=[];
if (isset($_GET["edit"])) {
  $id = $_GET['edit'];
  $up = "SELECT * FROM `departments`where id=$id ";
  $i = mysqli_query($conn, $up);
  $row = mysqli_fetch_assoc($i);

  if (isset($_POST['update'])) {
    $name = filtervalidtion($_POST['name']);

    if(stringvalidtion($name)){
      $errors[] ="Please Enter Employee Name and Length >3";
    
    }
    else{
      $update = "UPDATE `departments` SET name='$name' where id=$id";
    $update2 = mysqli_query($conn, $update);
    path("departments/list.php");
  }
    
  }
} else {
  path("departments/list.php");
}



?>


<div class="home">
  <div class="container col-md-6">
    <div class="card">
      <div class="card-body">
      <div class="home">
  <h1 class="my-5 text-center display-1 h1"> Update Daprtment</h1>
  <?php if(!empty($errors)): ?>
  <div class="alert alert-danger">
    <ul>
      <?php foreach($errors as $error): ?>
        <li><?= $error  ?></li><hr>
        <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>
  <form method="post">
          <div class="form-group">
            <input type="text" value="<?= $row['name'] ?>" name="name" class="form-control" placeholder="Add Department....">
          </div>
          <button class="btn btn-warning editDpart" name="update">Update Department </button>
        </form>


</div>

      </div>

<?php
include '../shared/footer.php';
include '../shared/script.php';
?>