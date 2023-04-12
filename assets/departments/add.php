<?php
// // include App
include '../App/config.php';
include '../App/functions.php';

// include public
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
emptypath();
auth(2,3);
$errors=[];
  if(isset($_POST['add'])){
    $name=filtervalidtion($_POST['name']) ; 
    if(stringvalidtion($name)){
      $errors[] ="Please Enter Employee Name and Length >3";
    
    }
   
      $insert ="INSERT INTO departments VALUES (null,'$name')";
      $i =mysqli_query($conn,$insert);
   
 
  
    path("departments/list.php");
  }
  
?>


    <div class="home">
      
        <div class="container col-md-6">
      <div class="card">
        <div class="card-body">
        <div class="home">
  <h1 class="my-5 text-center display-1 h1"> Add Department</h1>
  <div class="container col-md-6  ">
    <div class="card ">
      <div class="card-body">
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
              <input type="text" name="name" class="form-control" placeholder="Add Department....">
            </div>
            <button class="btn btn-info" name="add">Add Department</button>
          </form>
        </div>
      </div>
    </div>

    </div>
    
 

<?php
include '../shared/footer.php';
include '../shared/script.php';
?>