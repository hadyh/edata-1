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
      <?php
      include "conf/conn.php";
      $id = $_SESSION['nip'];
       include "conf/conn.php";
       
     $s = $db->select("*","kkm","id='1'");
     $data = $db->fetch($s);

     
       if (isset($_POST['update'])){
          
          $a = $_POST['A'];
          $b = $_POST['B'];
          $c = $_POST['C'];
          $d = $_POST['D'];

          $dbquery = $db->update("kkm","A='$a',B='$b',C='$c',D='$d'","id='1'");
          if ($dbquery){
             echo "<div class='alert alert-success' role='alert'>Berhasil Mengupdate Data </div>";
          }
       }
      ?>
    
         <div class="box container">
            <div class="box-header">
                <h1> KKM </h1>
                
                <table>
                  <tr>
                      <td>
                        KKM Satuan Pendidikan 
                      </td>
                      <td>
                        :
                      </td>
                      <td>
                        
                      </td>
                  </tr>
                   <tr>
                      <td>
                        A (sangat Baik)
                      </td>
                      <td>
                        :
                      </td>
                      <td>
                        <?= $data['A'];?> - 100
                      </td>
                  </tr>
                   <tr>
                      <td>
                        B (Baik) 
                      </td>
                      <td>
                        :
                      </td>
                      <td>
                       <?= $data['B'];?> -  <?= $data['A'];?>
                      </td>
                  </tr>
                   <tr>
                      <td>
                        C (cukup) 
                      </td>
                      <td>
                        :
                      </td>
                      <td>
                        <?= $data['C'];?> - <?= $data['B'];?>
                      </td>
                  </tr>
                   <tr>
                      <td>
                        D (Perlu Bimbingan )
                      </td>
                      <td>
                        :
                      </td>
                      <td>
                        <?= $data['D'];?> -  <?= $data['C'];?>
                      </td>
                  </tr>
                </table>
            </div>
             <button class="btn btn-primary" data-toggle="modal" data-target='#edit_data_kkm'> edit kkm </button>
            <hr>

       
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
<!-- ./wrapper -->

<div id="edit_data_kkm" class="modal fade" role="dialog">
  <div class="modal-dialog">
     
    
    <!-- Modal content-->
    <div class="modal-content">
    <form action="" method="post">
     
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit</h4>
      </div>
      <div class="modal-body">
        
     
        <label>Jumlah Minimal Nilai A</label>
        <input type="number" name="A" placeholder="A"  class="form-control" value="<?php echo $data['A'];?>"/>

        <label>Jumlah Minimal Nilai B</label>
        <input type="number" name="B" placeholder="B"  class="form-control" value="<?php echo $data['B'];?>"/>

<label>Jumlah Minimal Nilai C</label>
        <input type="number" name="C" placeholder="C"  class="form-control" value="<?php echo $data['C'];?>"/>

<label>Jumlah Minimal Nilai D</label>
        <input type="number" name="D" placeholder="D"  class="form-control" value="<?php echo $data['D'];?>"/>


      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" name="update">Update</button>

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>
      
    </div>

  </div>
</div>

<!-- modal n -->
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>