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
// Read 
$select = "SELECT * FROM admins";
$s = mysqli_query($conn, $select);

//Delete
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $selectone = "SELECT * FROM `admins` WHERE id=$id";
  $sone = mysqli_query($conn, $selectone);
  $row = mysqli_fetch_assoc($sone);
  $delete = "DELETE FROM `admins` where id=$id";
 $deleterow= mysqli_query($conn, $delete);
 path('admin/list.php');
}




?>


<div class="home ">
  <h1 class="my-5 text-center display-1 h1"> All Admins</h1>
  <div class="container col-md-6">
  <table class="table ">

    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
    <?php foreach ($s as $data) : ?>
      <tr>
        <th><?= $data['id']  ?></th>
        <th><?= $data['name']  ?></th>
        <th><?= $data['username']  ?></th>
        <th><?= $data['email']  ?></th>
        <th>
          <a href="/odc/Admin/list.php?delete=<?= $data['id'] ?>"  class="btn btn-danger">Remove</a>

          <a href="/odc/Admin/edit.php?edit=<?= $data['id'] ?>" class="btn btn-warning">edit</a>
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