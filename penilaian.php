<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> E DATA </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php
  include "link_css.php";
  ?>
</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

 <?php
  include "header.php";
 ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
   <?php include "sidebar.php"; ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content container-fluid">
         <div class="box container">
            <div class="box-header">
                <h1> Kompetensi Dasar</h1>
            </div>
            <?php
            include "conf/conn.php";
            if (isset($_POST['update'])){

                    $id = $_POST['no_ki'];
                    
                    $no_kd = $_POST['update_no_kd'];
                    $desk_kd = $_POST['update_desk_kd'];


                    $q = $db->insert("kd","id,no_ki,no_kd,desk_kd","null,'$id','$no_kd','$desk_kd'");
                      if ($q){
                        echo "<div class='alert alert-success' role='alert'> Berhasil Mengupdate Data </div>";
                      } else {
                        echo "gagal mengupdate";
                      }
                    }

              if (isset($_GET['id'])){
                $id = $_GET['id'];
                $db->delete("kd","id='$id'");
              } 

                
            ?>
           <table class='table table-responsive table-hover'>
                <thead>
                  <tr>
                    <th> No Kd </th>
                    <th> Kompetensi dasar</th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php  
                 $q = $db->select("*","kd");
                 if ($db->getTableRows($q) === 0){
                   echo "tidak ada data";
                 } else {
                    while ($row = $db->fetch($q)){
                      echo "<tr>
                              <td>".$row['no_kd']."</td>
                              <td>".$row['desk_kd']."</td>";

                      echo "</td><td> <a href='nilai.php?'><button class='edit_kd btn btn-success'> berikan nilai </button> </a> </td>";
                    }
                 }
                
                  ?>
                </tbody>
            </table>
        </div>     

      </section>
       
       
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php
  include "footer.php";
  ?>
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/live/3.0/firebase.js"></script>

</body>
</html>