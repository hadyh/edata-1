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
      <?php
      $id = $_SESSION['nip'];
       include "conf/conn.php";
    if (isset($_POST['update'])){
      
      $nama_sekolah = $_POST['nama_sekolah'];
      $alamat = $_POST['alamat'];
      $kepala_sekolah = $_POST['kepala_sekolah'];
      $kelas_semester = $_POST['kelas_semester'];
      $tahun_pelajaran = $_POST['tahun_pelajaran'];
      $nama_guru = $_POST['nama_guru'];
      $mapel = $_POST['mapel'];
      $kecamatan = $_POST['kecamatan'];
      $kab_kota = $_POST['kab_kota'];

      $update = $db->update("data_guru","nama_guru='$nama_guru',kelas='$kelas_semester',tahun_ajaran='$tahun_pelajaran',mapel='$mapel',kecamatan='$kecamatan',kab_kota='$kab_kota',nama_sekolah='$nama_sekolah',alamat='$alamat',kepala_sekolah='$kepala_sekolah'","nip='$id'");

      if ($update){
        echo "<div class='alert alert-success' role='alert'>Berhasil Mengupdate Data </div>";
      } else {
         echo "<div class='alert alert-success' role='alert'>".$db->showError()."</div>";
      }
    }
    ?>
    <?php
    $getData = $db->select('*','data_guru',"nip='$id'");
    $data = $db->fetch($getData);
    ?>
         <div class="box container">
            <div class="box-header">
                <h1> Data Sekola </h1>
                <table>
                  <tr>
                    <td>
                      Nama Sekolah 
                    </td>
                    <td>
                      :
                    </td>
                    <td>
                      <?php
                      echo $data['nama_sekolah'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Alamat 
                    </td>
                    <td>
                      :
                    </td>
                    <td>
                      <?php echo $data['alamat']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Kepala Sekolah 
                    </td>
                    <td>
                      :
                    </td>
                    <td>
                       <?php echo $data['kepala_sekolah']; ?>
                    </td>
                  </tr>
                   <tr>
                    <td>
                      NIP
                    </td>
                    <td>
                      :
                    </td>
                    <td>
                        <?php echo $data['nip']; ?>
                    </td>
                  </tr>
                   <tr>
                    <td>
                      Kelas/Semester 
                    </td>
                    <td>
                      :
                    </td>
                    <td>
                        <?php echo $data['kelas']; ?>
                    </td>
                  </tr>
                   <tr>
                    <td>
                      Tahun Pelajaran 
                    </td>
                    <td>
                      :
                    </td>
                    <td>
                        <?php echo $data['tahun_ajaran']; ?>
                    </td>
                  </tr>
                   <tr>
                    <td>
                      Guru Mapel 
                    </td>
                    <td>
                      :
                    </td>
                    <td>
                        <?php echo $data['nama_guru']; ?>
                    </td>
                  </tr>
                   <tr>
                    <td>
                      Mapel 
                    </td>
                    <td>
                      :
                    </td>
                    <td>
                        <?php echo $data['mapel']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Kecamatan 
                    </td>
                    <td>
                      :
                    </td>
                    <td>
                      <?php echo $data['kecamatan']; ?>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      Kab/Kota
                    </td>
                    <td>
                      :
                    </td>
                    <td>
                        <?php echo $data['kab_kota']; ?>
                    </td>
                  </tr>

                </table>
                <button class="btn btn-primary" data-toggle='modal' data-target='#edit_data_sekolah'> edit </button>
            </div>
            <hr>
        </div>     

      </section>
       
       
  </div>
  <!-- /.content-wrapper -->

  <div id="edit_data_sekolah" class="modal fade" role="dialog">
  <div class="modal-dialog">
     
    
    <!-- Modal content-->
    <div class="modal-content">
    <form action="" method="post">
     
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit</h4>
      </div>
      <div class="modal-body">
        
        <label>Nama Sekolah </label>
        <input type="text" name="nama_sekolah" placeholder="nama sekolah"  class="form-control" value="<?php echo $data['nama_sekolah'];?>" />

        <label>Alamat</label>
        <input type="text" name="alamat" placeholder="alamat"  class="form-control"  value="<?php echo $data['alamat'];?>"/>

        <label>Kepala Sekolah</label>
        <input type="text" name="kepala_sekolah" placeholder="Kepala Sekolah"  class="form-control" value="<?php echo $data['kepala_sekolah'];?>" />

      
        <label>Kelas/Semester</label>
        <input type="text" name="kelas_semester" placeholder="Kelas Semester"  class="form-control" value="<?php echo $data['kelas'];?>" />

        <label>Tahun Pelajaran</label>
        <input type="text" name="tahun_pelajaran" placeholder="Tahun Pelajaran" value="<?php echo $data['tahun_ajaran'];?>"  class="form-control" />

        <label>Nama Guru </label>
        <input type="text" name="nama_guru" placeholder="Nama Guru"  class="form-control" value="<?php echo $data['nama_guru'];?>"/>

        <label>Mapel </label>
        <input type="text" name="mapel" placeholder="Mapel"  class="form-control" value="<?php echo $data['mapel'];?>" />

        <label>Kecamatan</label>
        <input type="text" name="kecamatan" placeholder="Kecamatan"  class="form-control" value="<?php echo $data['kecamatan'];?>"/>

        <label>Kab/Kota</label>
        <input type="text" name="kab_kota" placeholder="Kab/Kota"  class="form-control" value="<?php echo $data['kab_kota'];?>"/>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" name="update">Update</button>

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>
      
    </div>

  </div>
</div>

  <!-- Main Footer -->
  <?php
  include "footer.php";
  ?>
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- modal n -->
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>