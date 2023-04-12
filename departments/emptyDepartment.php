<?php
// include App
include '../App/config.php';
include '../App/functions.php';

// include public
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';

emptypath();
auth(2,3);
// Read 
$select = "SELECT * FROM `departmentswithoutemployee`";
$s = mysqli_query($conn, $select);

//Delete
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete = "DELETE FROM `departments` where id=$id";
  mysqli_query($conn, $delete);
 path('departments/list.php');
}



?>

<div class="home ">
  <h1 class="my-5 text-center display-1 h1"> Empty Department</h1>
  <div class="container col-md-6">
  <table class="table ">

    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
    <?php foreach ($s as $data) : ?>
      <tr>
        <th><?= $data['id']  ?></th>
        <th><?= $data['name']  ?></th>
        <th>
          <a href="/odc/departments/list.php?delete=<?= $data['id'] ?>"  class="btn btn-danger">Remove</a>

          <a href="/odc/departments/edit.php?edit=<?= $data['id'] ?>" class="btn btn-warning">edit</a>
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