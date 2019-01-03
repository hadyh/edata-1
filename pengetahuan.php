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
                <h1> Nilai Pengetahuan kelas : <?php echo $_GET['nama_kelas']; ?> </h1>
            </div>

            <?php

            $where = "";
            include "conf/conn.php"; 
           
            $where = "kode_kelas='".$_GET['kode_kelas']."'";
            
            if (isset($_POST['insert_nilai'])){
              $nis = $_POST['nis'];
              $no_kd = $_POST['no_kd'];
              $nilai = $_POST['nilai'];

              $search_content = $db->select("*","nilai","nis='$nis' and no_kd='$no_kd' and type='pe'");

              $count_result = $db->getTableRows($search_content);

              if ($count_result == 0 ){
                $q = $db->insert("nilai","nis,no_kd,nilai,type","'$nis','$no_kd','$nilai','pe'");

              if ($q){
                echo 
                  "<div class='alert alert-success' role='alert'> 
                    Berhasil Mengupdate Data 
                  </div>";
                } else {
                  echo "gagal menambahkan nilai";
                }
              } else{
                echo "<div class='alert alert-warning' role='alert'> 
                    silakan tekan tombol edit untuk mengedit nilai 
                  </div>";
              }

              
            } 
            if (isset($_POST['edit_nilai'])){
              $nis = $_POST['nis'];
              $no_kd = $_POST['no_kd'];
              $nilai = $_POST['nilai'];


              $update = $db->update("nilai","nilai='$nilai'","nis='$nis' and no_kd='$no_kd' and type='pe'");

              if ($update){
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
                              
                              $select_kd = $db->select("*","kd","no_ki=3");

                              echo "<table class='table'>";
                              while ($data_kd = $db->fetch($select_kd)) {

                                 echo "<tr><td>".
                                  $data_kd['no_kd']." - ".$data_kd['desk_kd']." </td><td> Nilai = ";
                                  $nis = $row['nis'];
                                  $no_kd_inner = $data_kd['no_kd'];

                                  $src_nilai = $db->select("*","nilai","nis='$nis' and no_kd='$no_kd_inner' and type='pe'");
                                  $fetch_nilai = $db->fetch($src_nilai);
                                  if ($fetch_nilai['nilai'] == null || $fetch_nilai['nilai'] == ""){
                                    echo "berikan nilai";
                                  } else {
                                    echo $fetch_nilai['nilai'];
                                  }
                                  
                                  echo "</td><td>";

                                  $select_predikat = $db->select("*","kkm","id='1'");
                                  $fetch_predikat = $db->fetch($select_predikat);

                                  if ($fetch_nilai['nilai'] >= $fetch_predikat['A'] && $fetch_nilai['nilai'] <= 100  ){
                                    echo "A";
                                  } else if ( $fetch_nilai['nilai'] >= $fetch_predikat['A'] && $fetch_nilai['nilai'] <= $fetch_predikat['B'] ){
                                    echo "B";
                                  } else if ($fetch_nilai['nilai'] >= $fetch_predikat['C'] && $fetch_nilai['nilai'] <= $fetch_predikat['B']){
                                    echo "C";
                                  } else if ( $fetch_nilai['nilai'] >= $fetch_predikat['D'] && $fetch_nilai['nilai'] <= $fetch_predikat['C']){
                                    echo "D";
                                  } else {
                                    echo "-";
                                  }


                                  echo "</td><td>";

                                 echo "<button style='margin-left:60px' class='tambah_nilai btn-sm btn btn-primary' data-toggle='modal' data-id='".$row['nis'].",".$data_kd['no_kd']."' data-target='#tambah_nilai' > tambah nilai </button>";

                                  echo "<button class='tambah_nilai btn-sm btn btn-warning' data-toggle='modal' data-id='".$row['nis'].",".$data_kd['no_kd']."' data-target='#edit_nilai' > edit nilai </button> </td></tr>";

                                 // echo " <a href='kompetensi_dasar.php?id=".$data_kd['id']."' onClick=\"javascript: return confirm('Apakah anda yakin ? ');\"><button class='btn btn-danger btn-sm'>x</button></a> ";
                              }
                        echo "</table>";

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


<div id="edit_nilai" class="modal fade" role="dialog">
  <div class="modal-dialog">
     
  
    <!-- Modal content-->
    <div class="modal-content">
    <form action="" method="post">
     
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Edit Nilai </h4>
      </div>
      <div class="modal-body">
        <input type="hidden" class="val1" name="nis">
         <input type="hidden" class="val2" name="no_kd">

        <label for="Deskripsi"> Nilai </label>    
        <input type="number" name="nilai" class="form-control" placeholder="berikan nilai">    

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" name="edit_nilai">Update</button>

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>
      
    </div>

  </div>
</div>
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
        <input type="hidden" class="val1" name="nis">
         <input type="hidden" class="val2" name="no_kd">

        <label for="Deskripsi"> Nilai </label>    
        <input type="number" name="nilai" class="form-control" placeholder="berikan nilai">    

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
     var arr_id = _value.split(",");
     console.log(arr_id);
     $(".val1").val( arr_id[0] );
     $(".val2").val(arr_id[1]);     
    $('#edit_kompetensi_inti').modal('show');
});
</script>
</body>
</html>