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
                <h1><?php echo $_GET['nama_proses'];?> </h1>
            </div>

            <?php
            include "conf/conn.php";     
            
            ?>
            <br/>

           <table class='table table-striped'>
                <thead>
                  <tr>
                    <th> No </th>
                    <th> Proses </th>
                    <th> Nilai </th>                 
                  </tr>
                </thead>
                <tbody>
                  <?php
                  
                  $database = $_GET['database'];
                  $nis = $_GET['nis'];
                  $nama_proses = $_GET['nama_proses'];

                  $q = $db->select("*",$database,"nis='$nis' and nama_proses='$nama_proses'");
                  
                  if ($db->getTableRows($q) === 0){
                     echo "tidak ada data";
                  } else {
                      $i = 0;
                      $database = $_GET['database'];
                      while ($row = $db->fetch($q)){
                      $i++;
                      echo "<tr>
                              <td>".$i."</td>
                              <td>".$row['nama_proses']."</td>
                              <td>".$row['nilai']."</td>";
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
<!-- ./wrapper -->


<!-- modal  -->
<!-- Modal -->


<div id="tambah_nilai" class="modal fade" role="dialog">
  <div class="modal-dialog">
     
  
    <!-- Modal content-->
    <div class="modal-content">
    <form action="" method="post">
     
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Beri Nilai </h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="nis" name="nis">

        <label for="Deskripsi"> Nilai </label>
        <input type="number" id="val1" name="nilai" placeholder="masukkan nilai" class="form-control" />

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" name="insert_nilai">Update</button>

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
<script src="https://www.gstatic.com/firebasejs/live/3.0/firebase.js"></script>
<script>
  
  $(document).on("click", ".edit_kelas", function () {
     var id = $(this).data('id');
     $("#nis").val( id);
    $('#tambah_nilai').modal('show');
});
</script>
</body>
</html>