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
                <h1> Indikator Sikap Spiritual </h1>
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
                  if (isset($_POST['tambah-spiritual'])){
                    $indikator = $_POST['indikator_spiritual'];
                    $q = $db->insert("spiritual","indikator","'$indikator'");
                    if ($q) {
                      echo "berhasil menambahkan data";
                    } else {
                      echo "gagal menambahkan data";
                    }
                  }
                  if (isset($_POST['update-spiritual'])){

                    $id = $_POST['id'];
                    $indikator = $_POST['indikator_spiritual'];
                  

                    $q = $db->update("spiritual","indikator='$indikator'","id='$id'");
                      if ($q){
                        echo "berhasil update";
                      } else {
                        echo "gagal mengupdate";
                      }
                    }
                  if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    $db->delete("spiritual","id='$id'");
                  } 

                 $q = $db->select("*","spiritual");
                 if ($db->getTableRows($q) === 0){
                   echo "tidak ada data";
                 } else {
                    $i=0;
                    while ($row = $db->fetch($q)){
                      $i++;
                      echo "<tr>
                              <td>".$i."</td>
                              <td>".$row['indikator']."</td>";
                      echo "<td> <button class='edit_ki btn btn-success' data-toggle='modal' data-id='".$row['id'].",".$row['indikator']."' data-target='#modal'> edit </button>

                      <a href='spiritual.php?id=".$row['id']." ' onClick=\"javascript: return confirm('Apakah anda yakin ? ');\" ><button class='btn btn-danger'> delete </button></a> 
                       <a href='nilai.php?nama_indikator=".$row['indikator']."&id_indikator=".$row['id']."&database=spiritual' ><button class='btn btn-primary' > kelola </button> </a></td>
                       ";
                    }
                 }
                 $row = $db->fetch($q);
                  ?>
                </tbody>
            </table>
            <button class='edit_ki btn btn-success' data-toggle='modal' data-target='#tambah_indikator'> edit </button>

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


<!-- modal  -->
<!-- Modal -->
<div id="modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
     
  
    <!-- Modal content-->
    <div class="modal-content">
    <form action="" method="post">
     
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Indikator Spiritual </h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id" name="id">

        <label for="Deskripsi"> Indikator </label>
        <input type="text" id="val1" name="indikator_spiritual" placeholder="masukkan nomor ki .."  class="form-control" />

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" name="update-spiritual"> Update </button>

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>
      
    </div>

  </div>
</div>

<div id="tambah_indikator" class="modal fade" role="dialog">
  <div class="modal-dialog">
     
  
    <!-- Modal content-->
    <div class="modal-content">
    <form action="" method="post">
     
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Indikator Spiritual </h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id" name="id">

        <label for="Deskripsi"> Indikator </label>
        <input type="text" id="val1" name="indikator_spiritual" placeholder="tambahkan indikator.."  class="form-control" />

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" name="tambah-spiritual">Update </button>

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

     $("#id").val( arr_id[0] );
     $("#val1").val(arr_id[1]);     
    $('#edit_kompetensi_inti').modal('show');
});
</script>
</body>
</html>