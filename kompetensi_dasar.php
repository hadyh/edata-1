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
                    <th>
                      No
                    </th>
                    <th> Kompetensi Inti </th>
                    <th> Kompetensi dasar</th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php  
                 $q3 = $db->select("*","ki",'no_ki=3');
                  $q4 = $db->select("*","ki",'no_ki=4');
                    
                    while ($row1 = $db->fetch($q3)){
                      echo "<tr>
                              <td>1</td>
                              <td>".$row1['desk_ki']."</td>
                              <td>";
                              $x = $row1['no_ki'];
                              $select_kd = $db->select('*',"kd","no_ki='$x'");
                              echo "<ul>";
                              while ($data_kd = $db->fetch($select_kd)) {
                                echo "<li>".$data_kd['no_kd']."-".$data_kd['desk_kd']."  <a href='kompetensi_dasar.php?id=".$data_kd['id']."' onClick=\"javascript: return confirm('Apakah anda yakin ? ');\"><button class='btn btn-danger btn-sm'>x</button></a> </li>";
                              }
                              echo "</ul>";
                      echo "</td><td> <button class='edit_kd btn btn-success' data-toggle='modal' data-id='".$row1['no_ki']." ' data-target='#kompetensi_dasar'> Tambah </button>

                     </td>
                     </tr>";
                    }
                    while ($row2 = $db->fetch($q4)){
                      echo "<tr>
                              <td>2</td>
                              <td>".$row2['desk_ki']."</td>
                              <td>";
                              $x = $row2['no_ki'];
                              $select_kd = $db->select('*',"kd","no_ki='$x'");
                              echo "<ul>";
                              while ($data_kd = $db->fetch($select_kd)) {
                                echo "<li>".$data_kd['no_kd']."-".$data_kd['desk_kd']."  <a href='kompetensi_dasar.php?id=".$data_kd['id']."' onClick=\"javascript: return confirm('Apakah anda yakin ? ');\"><button class='btn btn-danger btn-sm'>x</button></a> </li>";
                              }
                              echo "</ul>";
                      echo "</td><td> <button class='edit_kd btn btn-success' data-toggle='modal' data-id='".$row2['no_ki']." ' data-target='#kompetensi_dasar'> Tambah </button>

                     </td>
                     </tr>";
                    
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
        <input type="hidden" id="val1" name="no_ki">

        <label for="Deskripsi"> Nomor KD</label>
        <input type="text"  name="update_no_kd" placeholder="masukkan nomor kd .."  class="form-control" />

        <label for="Deskripsi"> Deskripsi Kompetensi Dasar </label>
        <input type="text" name="update_desk_kd" placeholder="Deskripsi .."  class="form-control" />
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
<script src="https://www.gstatic.com/firebasejs/live/3.0/firebase.js"></script>
<script>
  
  $(document).on("click", ".edit_kd", function () {
     var id = $(this).data('id');

     $("#val1").val(id);
    $('#kompetensi_inti_modal').modal('show');
});
</script>
</body>
</html>