<?php 


error_reporting(1);
session_start();

  if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    path("pages-login.php");
    emptypath();
  }
?>
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="#"data-bs-target="#tables-nav" data-bs-toggle="collapse">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/odc/Admin/list.php">
              <i class="bi bi-circle"></i><span>List Admin</span>
            </a>
          </li>
        </ul>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Employee</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/odc/employees/add.php">
              <i class="bi bi-circle"></i><span>Add Employees</span>
            </a>
          </li>
          <li>
            <a href="/odc/employees/list.php">
              <i class="bi bi-circle"></i><span>List Employee</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Departments</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/odc/departments/add.php">
              <i class="bi bi-circle"></i><span>Add Department</span>
            </a>
          </li>
          <li>
            <a href="/odc/departments/list.php">
              <i class="bi bi-circle"></i><span>List Departments</span>
            </a>
          </li>
          <li>
            <a href="/odc/departments/emptyDepartment.php">
              <i class="bi bi-circle"></i><span>Empty Departments</span>
            </a>
          </li>
        </ul>
      </li> 
     
      <!-- End Tables Department -->
 


      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/odc/users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

 

      <li class="nav-item">
        <a class="nav-link collapsed" href="/odc/pages-register.php">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->
      <?php   if(!$_SESSION['admin']['id']): ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="/odc/pages-login.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->
      <?php else: ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="/odc/pages-login.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <form action="">
          <button class="btn btn-danger" name="logout">Logout</button>
          </form>
        </a>
      </li>
      <?php endif; ?>



    </ul>

  </aside><!-- End Sidebar-->