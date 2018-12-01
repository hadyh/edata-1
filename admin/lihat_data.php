<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> E DATA </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php include "link_css_admin.php"; ?> 

</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <?php include "header.php"; ?> 
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <?php include "sidebar_admin.php"; ?> 
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->


        <div class="content-wrapper  ">
            <?php
                include "../conf/conn.php";

                   if (isset($_POST['update-ki'])){
                    $id = $_POST['id_ki'];
                    
                    $no_ki = $_POST['update_no_ki'];
                    $desk_ki = $_POST['update_desk_ki'];

                    $q = $db->update("ki","no_ki='$no_ki',desk_ki='$desk_ki'","id='$id'");
                      if ($q){
                        echo "berhasil update";
                      } else {
                        echo "gagal mengupdate";
                      }
                    }
                
                  if (isset($_GET['id_ki'])){
                    $id = $_GET['id_ki'];
                    $db->delete("ki","id='$id'");
                  } 
            ?>

            
            <section class="content container-fluid">
                <div class="row">
                <div class="col-md-6">

                <!-- Tambah kompetensi Inti  -->
                 <div class="box box-primary">
                <div class="box-header">
                    <h1> Kompetensi Inti </h1>
                </div>
                <form action="" method="post">
                <div class="box-body">
                    
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
                 $q = $db->select("*","ki");
                     if ($db->getTableRows($q) === 0){
                       echo "tidak ada data";
                     } else {
                        while ($row = $db->fetch($q)){
                          echo "<tr>
                                  <td>".$row['no_ki']."</td>
                                  <td>".$row['desk_ki']."</td>";
                          echo "<td> <button class='edit_ki btn btn-success' data-toggle='modal' data-id='".$row['id']."' data-target='#edit_kelas'> edit </button>

                          <a href='lihat_data.php?id_ki=".$row['id']."'<button class='btn btn-danger'> delete </button></td>";
                        }
                     }
                     $row = $db->fetch($q);
                  ?>
                </tbody>
            </table>
                   
                </div>
            </form>
                
            </div>
        </div>
        <div class="col-md-6">
            <!-- tambah kompetensi dasar -->
             <div class="box box-primary">
                <div class="box-header">
                    <h1> Tambahkan KD</h1>
                </div>
                <form action="" method="post">
                <div class="box-body">
                    
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
                          echo "<td> <button class='edit_kd btn btn-success' data-toggle='modal' data-id='".$row['id']."' data-target='#edit_kelas'> edit </button>

                          <a href='lihat_data.php?id_ki=".$row['id']."'<button class='btn btn-danger'> delete </button></td>";
                        }
                     }
                     $row = $db->fetch($q);
                  ?>
                </tbody>
            </table>
                   
                </div>
            </form>
                
            </div>
        </div>
    </div>
      <div class="row">
        <!-- tambak kelas  -->
                <div class="col-md-6">
                 <div class="box box-primary">
                <div class="box-header">
                    <h1> Tambah Kelas </h1>
                </div>
                <form action="" method="post">
                <div class="box-body">
                    
                    <label for="nomor"> Kode Kelas </label>
                    <input class="form-control" type="text" name="kode_kelas" placeholder="Masukkan Nomor" required />

                    <label for="kompetensi_inti"> Nama Kelas </label>
                    <input class="form-control" type="text" name="nama_kelas" placeholder="masukkan ki" required />
                    <br>
                    <input type="submit" class="btn btn-primary" name="insert_kelas" value="Submit" />
                   
                </div>
            </form>
                
            </div>
        </div>
        <div class="col-md-6">

             <div class="box box-primary">
                <div class="box-header">
                    <h1> Tambahkan KD</h1>
                </div>
                <form action="" method="post">
                <div class="box-body">
                    
                    <label for="nomor"> Nomor KD </label>
                    <input class="form-control" type="text" name="nomor_kd" id="nomor_kd" placeholder="Masukkan Nomor" required/>

                    <label for="kompetensi_inti"> Kompetensi Dasar </label>
                    <input class="form-control" type="text" name="desk_kd" id="kompetensi_dasar" placeholder="masukkan kd" required="" />

                    <label for="kompetensi_inti"> Kelas </label>
                    <select class="form-control">
                        <option value="kosong"> Pilih kelas </option>
                        <?php
                        $q = $db->select("*","data_kelas");
                        while ($row = $db->fetch($q)) {
                            echo "<option value='".$row['kode_kelas']."'>".$row['nama_kelas']."</option>";
                        }
                        ?>
                    </select>
                    <br>

                    <input type="submit" class="btn btn-primary" name="insert_kelas" value="Submit"/>
                   
                </div>
            </form>
                
            </div>
        </div>
    </div>

            </section>
            <!-- /.content -->
        </form>
        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        <?php 

        include "../footer.php";

        ?>

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
        <input type="text" id="nomor_ki" name="update_no_ki" placeholder="masukkan nomor ki .."  class="form-control" />

        <label for="Deskripsi"> Deskripsi Kompetensi Inti </label>
        <input type="text" id="desk_ki" name="update_desk_ki" placeholder="Deskripsi .."  class="form-control" />
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" name="update-ki">Update</button>

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>
      
    </div>

  </div>
</div>


        
    </div>
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../dist/js/adminlte.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/live/3.0/firebase.js"></script>
    <script>
        
        $(document).on("click", ".edit_ki", function () {
             var _value= $(this).data('id');
             $("#id_ki").val( _value );
            $('#edit_kompetensi_inti').modal('show');
        });
    </script>


</body>

</html>