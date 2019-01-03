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
                <h1> Kompetensi Inti</h1>
            </div>
           <table class='table table-striped'>
                <thead>
                  <tr>
                    <th> No </th>
                    <th> Deskripsi </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include "conf/conn.php";

                
                   if (isset($_POST['update-ki'])){
                    $id = $_POST['id_ki'];
                    
                    $no_ki = $_POST['update_no_ki'];
                    $desk_ki = $_POST['update_desk_ki'];

                    $q = $db->update("ki","no_ki='$no_ki',desk_ki='$desk_ki'","id='$id'");
                      if ($q){
                        echo "<div class='alert alert-success' role='alert'>Berhasil Mengupdate Data </div>";
                      } else {
                        echo "gagal mengupdate";
                      }
                    }
                
                   

                 $q = $db->select("*","ki");
                 if ($db->getTableRows($q) === 0){
                   echo "tidak ada data";
                 } else {
                    while ($row = $db->fetch($q)){

                      echo "<tr>
                              <td>".$row['no_ki']."</td>
                              <td>".$row['desk_ki']."</td>";
                      
                      echo "<td> <button class='edit_ki btn btn-success' data-toggle='modal' data-id='".$row['id'].",".$row['no_ki'].",".$row['desk_ki']." ' data-target='#edit_kelas'> edit </button> </td></tr>";
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
<div id="edit_kompetensi_inti" class="modal fade" role="dialog">
  <div class="modal-dialog">
     
  
    <!-- Modal content-->
    <div class="modal-content">
    <form action="" method="post">
     
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id_ki" name="id_ki">

        <label for="Deskripsi"> Nomor KI</label>
        <input type="text" id="val1" name="update_no_ki" placeholder="masukkan nomor ki .."  class="form-control" />

        <label for="Deskripsi"> Deskripsi Kompetensi Inti </label>
        <input type="text" id="val2" name="update_desk_ki" placeholder="Deskripsi .."  class="form-control" />
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" name="update-ki">Update</button>

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

<script>
  
  $(document).on("click", ".edit_ki", function () {
     var _value= $(this).data('id');
     var arr_id = _value.split(",");

     $("#id_ki").val( arr_id[0] );
     $("#val1").val(arr_id[1]);
     $("#val2").val(arr_id[2]);
     
    $('#edit_kompetensi_inti').modal('show');
});
</script>
</body>
</html>