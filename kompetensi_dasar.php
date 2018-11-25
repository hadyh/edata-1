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
            <?php
            include "conf/conn.php";
            if (isset($_POST['update-kd'])){
                    $id = $_POST['id_kd'];
                    
                    $no_kd = $_POST['update_no_kd'];
                    $desk_kd = $_POST['update_desk_kd'];

                    $q = $db->update("kd","no_kd='$no_kd',desk_kd='$desk_kd'","id='$id'");
                      if ($q){
                        echo "berhasil update";
                      } else {
                        echo "gagal mengupdate";
                      }
                    }

              if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    $db->delete("kd","id='$id'");
                  } 

                
            ?>
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
                 $q = $db->select("*","kd");
                 if ($db->getTableRows($q) === 0){
                   echo "tidak ada data";
                 } else {
                    while ($row = $db->fetch($q)){
                      echo "<tr>
                              <td>".$row['no_kd']."</td>
                              <td>".$row['desk_kd']."</td>";
                      echo "<td> <button class='edit_kd btn btn-success' data-toggle='modal' data-id='".$row['id']."' data-target='#kompetensi_inti_modal'> edit </button>

                      <a href='kompetensi_dasar.php?id=".$row['id']."'<button class='btn btn-danger'> delete </button></td>";
                    }
                 }
                 $row = $db->fetch($q);
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
<div id="kompetensi_inti_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
     
  
    <!-- Modal content-->
    <div class="modal-content">
    <form action="" method="post">
     
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id_kd" name="id_kd">

        <label for="Deskripsi"> Nomor KD</label>
        <input type="text" id="nomor_kd" name="update_no_kd" placeholder="masukkan nomor kd .."  class="form-control" />

        <label for="Deskripsi"> Deskripsi Kompetensi Inti </label>
        <input type="text" id="desk_kd" name="update_desk_kd" placeholder="Deskripsi .."  class="form-control" />
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" name="update-kd">Update</button>

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
  
  $(document).on("click", ".edit_kd", function () {
     var myBookId = $(this).data('id');
     $("#id_kd").val( myBookId );
    $('#kompetensi_inti_modal').modal('show');
});
</script>
</body>
</html>