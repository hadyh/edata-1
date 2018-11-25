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
        <?php include "../header.php"; ?> 
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

                    $q = $db->insert("ki","id,no_ki,desk_ki","null,'$no_ki','$desk_ki'");

                    if ($q){
                        echo "berhasil mengupdate data";
                    } else {
                        echo "gagal".$db->showError();
                    }
                }
                
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

            
            <section class="content container-fluid">
                <div class="row">
                <div class="col-md-6">
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