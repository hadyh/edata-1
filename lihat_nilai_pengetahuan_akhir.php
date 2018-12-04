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
                <h1> Nilai 
                  <?php
                    include "conf/conn.php"; 
                    $wherenis = $_GET['nis']; 
                    $q = $db->select("*","data_siswa","nis='$wherenis'");
                    $name = $db->fetch($q);
                    echo $name['nama_siswa'];
                  ?>
                  </h1>
            </div>
            <div class="box-body">
              <h3> Nilai Tugas </h3>
               <table class='table table-striped'>
                <thead>
                  <tr>
                    <th> No </th>
                    <th> Nama Tugas  </th>
                    <th> Nilai </th>                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                  

                
                  $q = $db->select("*","tugas","nis='$wherenis'");
                  if ($db->getTableRows($q) === 0){
                     echo "tidak ada data";
                  } else {
                      $i = 0;                     
                      while ($row = $db->fetch($q)){
                      
                      $i++;
                      
                      echo "<tr>
                              <td>".$i."</td>
                              <td>".$row['nama_tugas']."</td>
                              <td>".$row['nilai']."</td>
                            </tr>";
                       }
                    
                 }
                  ?>
                </tbody>
            </table> 

            <h3> Nilai Ulangan harian </h3>
               <table class='table table-striped'>
                <thead>
                  <tr>
                    <th> No </th>
                    <th> Nama Ulangan Harian  </th>
                    <th> Nilai </th>                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                  

                
                  $q = $db->select("*","ulangan_harian","nis='$wherenis'");
                  if ($db->getTableRows($q) === 0){
                     echo "tidak ada data";
                  } else {
                      $i = 0;                     
                      while ($row = $db->fetch($q)){
                      
                      $i++;
                      
                      echo "<tr>
                              <td>".$i."</td>
                              <td>".$row['ulangan_harian']."</td>
                              <td>".$row['nilai']."</td>
                            </tr>";
                       }
                    
                 }
                  ?>
                </tbody>
            </table> 

             <h3> Ujian Tengah Semester  </h3>
               <p> Nilai ujian tengah semester : 
                  <?php
                  $q = $db->select("*","data_siswa","nis='$wherenis'");
                 $nilai_uts= $db->fetch($q);

                 echo $nilai_uts['uts'];
                  ?>
                </p>
               <h3> Ujian Akhir Semester </h3>
               <p> Nilai ujian akhir semester : 
                  <?php
                  $q = $db->select("*","data_siswa","nis='$wherenis'");
                 $nilai_uas = $db->fetch($q);

                 echo $nilai_uas['uas'];
                  ?>
                </p>
                        
                <button class="btn btn-primary" onclick="print_file()"> print </button> 
                                   
            </div>
            
            <br/>

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
  
  $(document).on("click", ".tambah_nilai", function () {
     var id = $(this).data('id');

     $("#nis").val( id);
    $('#tambah_nilai').modal('show');
});

  function print_file(){
    window.print();
  }
</script>
</body>
</html>