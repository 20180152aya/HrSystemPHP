<?php
// include App
include '../App/config.php';
include '../App/functions.php';

// include public
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
emptypath();
auth(2);
$errors=[];
if (isset($_POST['add'])) {
  $name = filtervalidtion($_POST['name']);
  $salary =filtervalidtion($_POST['salary']) ;
  $departmentid = filtervalidtion($_POST['departmentid']) ;
// image code
$image_size = $_FILES['image']['size'];
$image_type =$_FILES['image']['type'];
$image_name = rand(0,1000) . rand(0,1000) . $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$location ="upload/" . $image_name;

if(stringvalidtion($name)){
  $errors[] ="Please Enter Employee Name and Length >3";

}
if(numberValidtion($salary)){
  $errors[] ="Please Enter Valida Salary";
}
if(filesizevalidtion($image_name,$image_size , 3)){
  $errors[] ="Please Enter Valid Image or Image Size large 3M";
}
if(fileTypevalidate($image_type ,"image/jpeg","image/png","image/jpg")){
  $errors[] ="Your file out site";
}

if(empty($errors)){
  move_uploaded_file($tmp_name,$location);
  $insert = "INSERT INTO employees VALUES (null,'$name',$salary,'$image_name',$departmentid)";
  $i = mysqli_query($conn, $insert);
  path('employees/list.php');
}
 
 
}
// All departments
$select = "SELECT * FROM departments";
$departments = mysqli_query($conn, $select);

?>

<div class="home">
  <h1 class="my-5 text-center display-1 h1"> Add Employee</h1>
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
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Name :</label>
            <input type="text" name="name" class="form-control" placeholder="Add Name....">
          </div>
              
                <div class="form-group">
                <label for="">Your Salary:</label>
                  <input type="text" name="salary" class="form-control" placeholder="Your Salary....">
                </div>
             
                <div class="form-group">
                 <label for=""> Upload File:</label>
                  <input type="file" name="image"  class="form-control" >
                </div>
                <div class="form-group">
            <label for="">Department :</label>
            <select type="text" name="departmentid" class="form-control">
              <?php foreach ($departments as $data) : ?>
                <option value="<?= $data['id'] ?>"> <?= $data['name']; ?> </option>
              <?php endforeach; ?>
            </select>
          </div>
          <button class="btn btn-info add" name="add">Add Employee</button>
              </div>
            </div>
          
          
        </form>
      </div>
    </div>
  </div>

</div>



<?php
include '../shared/footer.php';
include '../shared/script.php';
?>