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
if (isset($_GET["edit"])) {
  $id = $_GET['edit'];
  $select = "SELECT * FROM `employeesjoinwithdepartment` WHERE empID=$id";
  $s = mysqli_query($conn, $select);
  $row = mysqli_fetch_assoc($s);
}
if (isset($_POST['update'])) {
  $name = filtervalidtion ($_POST['name']);
  $salary = filtervalidtion($_POST['salary']) ;
  $departmentid = filtervalidtion($_POST['departmentid']) ;
// image code
if(!empty($_FILES['image']['name'])){
  $image_name = rand(0,1000) . rand(0,1000) . $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$location ="upload/" . $image_name;
move_uploaded_file($tmp_name,$location);
$image_old =$row['image'];
unlink("./upload/$image_old");
 }else{
  $image_name =$row['image'];
 }


  $insert = "UPDATE  employees SET name='$name',salary=$salary,image='$image_name',departmentID=$departmentid WHERE id=$id";
  $i = mysqli_query($conn, $insert);
 
  path('employees/list.php'); 
}
// All departments
$select = "SELECT * FROM departments";
$departments = mysqli_query($conn, $select);


?>


<div class="home">
  <h1 class="my-5 text-center display-1 h1"> Update Employees </h1>
  <div class="container col-md-6">
    <div class="card">
      <div class="card-body">
      <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Name :</label>
            <input type="text" name="name" value="<?= $row['empName'] ?>" class="form-control" placeholder="Add Name....">
          </div>
          <div class="row" id="cost">
          
           
                <div class="form-group">
                 
                  <input type="text" name="salary"  value="<?= $row['empSalary'] ?>"   class="form-control" placeholder="Your Salary....">
                </div>
       
           
                <div class="form-group">
                 <label for=""> Upload Filem: <img src="./upload/<?= $row['image'] ?>" width="50" alt=""></label>
                  <input type="file" name="image"  class="form-control" >
                </div>
        
              <div class="form-group">
            <label for="">Department :</label>
            <select type="text" name="departmentid" class="form-control">
              <option value="<?= $row['depID'] ?>" selected><?= $row['depName'] ?></option>
              <?php foreach ($departments as $data) : ?>
                <option value="<?= $data['id'] ?>"> <?= $data['name']; ?> </option>
              <?php endforeach; ?>
            </select>
          </div>
            </div>

          </div>

          
          <button class="btn btn-info" name="update">Update Employee</button>
        </form>
      </div>
    </div>
  </div>

</div>



<?php
include '../shared/footer.php';
include '../shared/script.php';
?>