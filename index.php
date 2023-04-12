<?php
include './App/config.php';
include './App/functions.php';
include './shared/head.php';
include './shared/header.php';
include './shared/aside.php';
error_reporting(1);



?>



<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/odc/index.php">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <h1>Welcome <?= $_SESSION['admin']['username'] ?></h1>


</main><!-- End #main -->



<?php  
include './shared/footer.php';
include './shared/script.php';
?>