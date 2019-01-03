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
                if (isset($_POST['insert_ki'])){
                    $no_ki = $_POST['nomor_ki'];
                    $desk_ki = $_POST['desk_ki'];

                    $q = $db->insert("kompetensi","id,no_ki,deskripsi_ki","null,'$no_ki','$desk_ki'");

                    if ($q){
                        echo "berhasil mengupdate data";
                    } else {
                        echo "gagal".$db->showError();
                    }
                }
                
                


            ?>

            
            <section class="content container-fluid">
                <div class="row">
                <div class="col-md-6">

                <!-- Tambah kompetensi Inti  -->
                 <div class="box box-primary">
                <div class="box-header">
                    <h1> Tambahkan KI</h1>
                </div>
                <form action="" method="post">
                <div class="box-body">
                    
                    <label for="nomor"> Nomor KI </label>
                    <input class="form-control" type="text" name="nomor_ki" id="nomor_ki" placeholder="Masukkan Nomor" required />

                    <label for="kompetensi_inti"> Kompetensi Inti </label>
                    <input class="form-control" type="text" name="desk_ki" placeholder="masukkan ki" required />
                    <br>
                    <input type="submit" class="btn btn-primary" name="insert_ki" value="Submit" />
                   
                </div>
            </form>
                
            </div>
        </div>
        <div class="col-md-6">
            <?php
            if (isset($_POST['insert_kd'])){
                    $no_kd = $_POST['nomor_kd'];
                    $desk_kd = $_POST['desk_kd'];
                    $q = $db->insert("kd","id,no_kd,desk_kd","null,'$no_kd','$desk_kd'");
                    if ($q){
                        echo "berhasil mengupdate data";
                    } else {
                        echo "gagal".$db->showError();
                    }
                }
                 
            ?>
            <!-- tambah kompetensi dasar -->
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
                    <br>

                    <input type="submit" class="btn btn-primary" name="insert_kd" value="Submit"/>
                   
                </div>
            </form>
                
            </div>
        </div>
    </div>
      <div class="row">
        <?php
         if (isset($_POST['insert_kelas'])){
                    $kode_kelas = $_POST['kode_kelas'];
                    $nama_kelas = $_POST['nama_kelas'];
                    $q = $db->insert("data_kelas","id,nama_kelas,kode_kelas","null,'$nama_kelas','$kode_kelas'");
                    if ($q){
                        echo "berhasil mengupdate data";
                    } else {
                        echo "gagal".$db->showError();
                    }
                }

                ?>
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
             <?php
             if (isset($_POST['insert_siswa'])){
                    $nama = $_POST['nama'];
                    $nis = $_POST['nis'];
                    $kelas = $_POST['kelas'];

                    $q = $db->insert("data_siswa","id,nis,nama_siswa,kode_kelas","null,'$nis','$nama','$kelas'");
                    if ($q){
                        echo "berhasil mengupdate data";
                    } else {
                        echo "gagal".$db->showError();
                    }
                }
            ?>
             <div class="box box-primary">
                <div class="box-header">
                    <h1> Tambahkan Siswa </h1>
                </div>
                <form action="" method="post">
                <div class="box-body">
                    
                    <label for="nomor"> Nama </label>
                    <input class="form-control" type="text" name="nama" id="Nama kd" placeholder="Masukkan Nama " required/>

                    <label for="nis"> Nis </label>
                    <input class="form-control" type="text" name="nis" id="nis" placeholder="Masukkan Nis " required="" />
                    
                    <label for="kompetensi_inti"> Kelas </label>
                    <select class="form-control" name="kelas">
                        <option value="kosong"> Pilih kelas </option>
                        <?php
                        $q = $db->select("*","data_kelas");
                        while ($row = $db->fetch($q)) {
                            echo "<option value='".$row['kode_kelas']."'>".$row['nama_kelas']."</option>";
                        }
                        ?>
                    </select>
                    <br/>

                    <input type="submit" class="btn btn-primary" name="insert_siswa" value="Submit"/>
                   
                </div>
            </form>
                
            </div>
        </div>
    </div>
    <div class="row">
        <?php
         if (isset($_POST['insert_guru'])){
                    $nip = $_POST['nip'];
                    $nama_guru = $_POST['nama_guru'];
                    $query_count = $db->select("*","data_guru","nip='$nip'");
                    $count_user = $db->getTableRows($query_count);
                    if ($count_user == 0){
                      $q = $db->insert("data_guru","id,nip,nama_guru,password","null,'$nip','$nama_guru','edata'");
                        if ($q){
                            echo "berhasil mengupdate data";
                        } else {
                            echo "gagal".$db->showError();
                        }  
                    } else {
                        echo "data user sudah ada";
                    }
                    
                }

                ?>
                <div class="col-md-6">
                 <div class="box box-primary">
                <div class="box-header">
                    <h1> Tambah Kelas </h1>
                </div>
                <form action="" method="post">
                <div class="box-body">
                    
                    <label for="nomor"> Nip </label>
                    <input class="form-control" type="text" name="nip" placeholder="Masukkan Nip" required />

                    <label for="kompetensi_inti"> Nama Guru </label>
                    <input class="form-control" type="text" name="nama_guru" placeholder="masukkan nama guru " required />
                    <br>
                    <input type="submit" class="btn btn-primary" name="insert_guru" value="Submit" />
                   
                </div>
            </form>
                
            </div>
        </div>
        <div class="col-md-6">             
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

       
        
    </div>
    
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../dist/js/adminlte.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/live/3.0/firebase.js"></script>
    <script src="../script.js"></script>


</body>

</html>