<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> E DATA </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <?php 

  include_once "link_css.php";
  ?>
</head>
<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">
    <!-- Main Header -->
    
    <?php
    include "header.php";
    ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <?php include "sidebar.php"; ?>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
       <h1 class="text-center">
          <img src="images/1.jpg" alt="logo" width="100px"/> SELAMAT DATANG 
        </h1>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">
        <h2> Your Content Here </h2>     

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

   <?php
   include "footer.php";
   ?>

  </div>
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
  <script src="https://www.gstatic.com/firebasejs/live/3.0/firebase.js"></script>
  
</body>

</html>