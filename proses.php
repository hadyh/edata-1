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
                <h1> Proses  </h1>
            </div>
           <table class='table table-striped'>
                <thead>
                  <tr>
                    <th> No </th>
                    <th> Nama Proses  </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  
                  include "conf/conn.php";
                  if (isset($_POST['tambah_proses'])){
                    $nama_indikator = $_POST['nama_proses'];
                    $q = $db->insert("proses","nama_proses","'$nama_indikator'");
                    if ($q) {
                      echo "berhasil menambahkan data";
                    } else {
                      echo "gagal menambahkan data";
                    }
                  }
                  if (isset($_POST['update_proses'])){

                    $id = $_POST['id'];
                    $nama_proses = $_POST['nama_proses'];
                  

                    $q = $db->update("proses","nama_proses='$nama_proses'","id='$id'");
                      if ($q){
                        echo "berhasil update";
                      } else {
                        echo "gagal mengupdate";
                      }
                    }
                  if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    $db->delete("proses","id='$id'");
                  } 

                 $q = $db->select("*","proses");
                 if ($db->getTableRows($q) === 0){
                   echo "tidak ada data";
                 } else {
                    $i=0;
                    while ($row = $db->fetch($q)){
                      $i++;
                      echo "<tr>
                              <td>".$i."</td>
                              <td>".$row['nama_proses']."</td>";

                      echo "<td> <button class='edit_ki btn btn-success' data-toggle='modal' data-id='".$row['id'].",".$row['nama_proses']."' data-target='#modal'> edit </button>

                      <a href='proses.php?id=".$row['id']." ' onClick=\"javascript: return confirm('Apakah anda yakin ? ');\" ><button class='btn btn-danger'> delete </button></a> 

                       <a href='nilai_proses.php?nama_proses=".$row['nama_proses']."&id_proses=".$row['id']."&database=proses' ><button class='btn btn-primary' > kelola </button> </a></td>
                       ";
                       
                    }
                 }
                
                  ?>
                </tbody>
            </table>
            <button class='btn btn-success' data-toggle='modal' data-target='#tambah_indikator'> Tambah proses </button>

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
        <h4 class="modal-title">Edit Proses </h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id" name="id">

        <label for="proses"> Proses </label>
        <input type="text" id="val1" name="nama_proses" placeholder="masukkan proses .."  class="form-control" />

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" name="update_proses"> Update </button>

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
        <h4 class="modal-title">Tambah Proses </h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id" name="id">

        <label for="Deskripsi"> Nama Proses </label>
        <input type="text" id="val1" name="nama_proses" placeholder="tambahkan Proses .."  class="form-control" />

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" name="tambah_proses">Update </button>

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