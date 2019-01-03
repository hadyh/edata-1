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
                <h1> Data Kelas </h1>
            </div>
           <table class='table table-striped'>
                <thead>
                  <tr>
                    <th> No </th>
                    <th> Nama Kelas </th>
                    
                    <th> Lihat Siswa </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include "conf/conn.php";  

                                   $q = $db->select("*","data_kelas");
                 if ($db->getTableRows($q) === 0){
                   echo "tidak ada data";
                 } else {
                    $i = 0;
                    while ($row = $db->fetch($q)){
                      $i++;
                      echo "<tr>
                              <td>".$i."</td>
                              <td>".$row['nama_kelas']."</td>";
                      

                              echo "<td><a href='sosial.php?kode_kelas=".$row['kode_kelas']."&nama_kelas=".$row['nama_kelas']."' ><button class='btn btn-primary'>lihat siswa</button></a> </td>";
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

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
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
     var arr_id = id.split(",")

     $('#val1').val(arr_id[1]);
    
     $("#id_kelas").val( arr_id[0] );
    $('#data_kelas').modal('show');
});
</script>
</body>
</html>