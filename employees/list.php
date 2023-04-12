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
// Read 
$select = "SELECT * FROM `employeesjoinwithdepartment`";
$s = mysqli_query($conn, $select);

//Delete
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $selectone = "SELECT * FROM `employees` WHERE id=$id";
$sone = mysqli_query($conn, $selectone);
$row = mysqli_fetch_assoc($sone);
$imageName = $row['image'];
unlink("./upload/$imageName");
  $delete = "DELETE FROM `employees` where id=$id";
  mysqli_query($conn, $delete);
 path('employees/list.php');
}



?>


<div class="home ">
  <h1 class="my-5 text-center display-1 h1"> All Employees</h1>
  <div class="container col-md-6">
  <table class="table ">

    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Salary</th>
      <th scope="col">Department Name

      </th>
      <th scope="col">Image</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
    <?php foreach ($s as $data) : ?>
      <tr>
        <th><?= $data['empID']  ?></th>
        <th><?= $data['empName']  ?></th>
        <th><?= $data['empSalary']  ?></th>
        <th><?= $data['depName']  ?></th>
        <th><img src="./upload/<?= $data['image'] ?>" width="50" alt=""></th>
        <th>
          <a href="/odc/employees/list.php?delete=<?= $data['empID'] ?>" class="btn btn-danger">Remove</a>

          <a href="/odc/employees/edit.php?edit=<?= $data['empID'] ?>" class="btn btn-warning">edit</a>
        </th>
        <th>

        </th>
      </tr>
    <?php endforeach; ?>


    </tbody>
  </table>

  </div>
</div>



<?php
include '../shared/footer.php';
include '../shared/script.php';
?>