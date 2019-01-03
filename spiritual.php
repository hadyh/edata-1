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
                <h1> Nilai Spiritual kelas : <?php echo $_GET['nama_kelas']; ?> </h1>
            </div>

            <?php

            $where = "";
            include "conf/conn.php"; 
            
            $where = "kode_kelas='".$_GET['kode_kelas']."'";
            
            if (isset($_POST['insert_nilai'])){
              $nis = $_POST['nis'];
              $nilai = $_POST['nilai'];
              $q = $db->update("data_siswa","spiritual='$nilai'","nis='$nis'");

              if ($q){
                echo 
                "<div class='alert alert-success' role='alert'> 
                  Berhasil Mengupdate Data 
                </div>";
              } else {
                echo "gagal menambahkan nilai";
              }
            }   
            ?>

            <br/>

           <table class='table table-striped'>
                <thead>
                  <tr>
                    <th> No </th>
                    <th> Nis </th>
                    <th> Nama Siswa </th>
                    <th> Nilai </th>        
                    <th> Deskripsi </th>            
                  </tr>
                </thead>
                <tbody>

                  <?php
                  if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    $db->delete("data_siswa","id='$id'");
                  } 
                  $q = $db->select("*","data_siswa",$where);
                  if ($db->getTableRows($q) === 0){
                     echo "tidak ada data";
                  } else {
                      $i = 0;
                      while ($row = $db->fetch($q)){
                        $i++;
                        echo "<tr>
                                <td>".$i."</td>
                                <td>".$row['nis']."</td>
                                <td>".$row['nama_siswa']."</td>
                                <td>";
                                if ($row['spiritual'] == 4) {
                                  echo "sangat baik";
                                } else if ($row['spiritual'] == 3) {
                                  echo "baik";
                                } else if ($row['spiritual'] == 2) {
                                  echo "cukup";
                                } else if ($row['spiritual'] == 1) {
                                  echo "perlu bimbingan";
                                } else {
                                  echo "kosong";
                                }
                        echo "</td> <td>";

                                if ($row['spiritual'] == 4) {
                                  echo "deskripsi sangat baik";
                                } else if ($row['spiritual'] == 3) {
                                  echo "deskripsi baik";
                                } else if ($row['spiritual'] == 2) {
                                  echo "deskripsi cukup";
                                } else if ($row['spiritual'] == 1) {
                                  echo "deskripsi perlu bimbingan";
                                } else {
                                  echo "kosong";
                                }
                        echo "</td> <td>";
                              

                                 echo "<td><button style='margin-left:60px' class='tambah_nilai btn-sm btn btn-primary' data-toggle='modal' data-id='".$row['nis']."' data-target='#tambah_nilai' > tambah nilai </button></td>";

  
                              

                        echo "</td>";
                        
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
        <input type="hidden" id="val1" name="nis">
        
        <label for="Deskripsi"> Nilai </label>        
       <select name="nilai" class="form-control">
          <option value="4"> sangat baik </option>
          <option value="3"> baik </option>
          <option value="2"> cukup </option>
          <option value="1"> perlu bimbingan </option>
        </select>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" name="insert_nilai">Update</button>

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>
      
    </div>

  </div>
</div>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/live/3.0/firebase.js"></script>
<script>
  
  $(document).on("click", ".tambah_nilai", function () {
     var _value= $(this).data('id');
     $("#val1").val(_value);     
    $('#edit_kompetensi_inti').modal('show');
});
</script>
</body>
</html>