<?php
  session_start();
  include 'conf/conn.php';
  if (isset($_POST['aksi'])){
    $user = $_POST['user'];
    $pass = $_POST['password'];

    $q = $db->select("*","data_guru","nip='$user'");
    $fetch = $db->getTableRows($q);
    $data = $db->fetch($q);

    if ($fetch == 0 ){
       echo "<div class='text-center' style='width:100%' ><div class='alert alert-danger' role='alert'>
             username atau password salah
        </div></div>";
    } else {
      
      $_SESSION['name'] = $data['nama_guru'];
      header("location: kompetensi-inti.php");
    }
  }

?>
<!-- halaman baru  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Edata </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    
    <?php 

    include "link_css.php";
    ?>
    <style type="text/css">
    .landing-page {
        padding:5%;
       
        
    }
    .landing-page .rocket{
        text-align: right;
        padding-right:5%;

    }
    .fil0 {fill:#52658C;}
    #heading {
      width: 350px;
    }
    .aksi {
      background-color: #52658C;
      color: #fff;
      border:none;
      font-weight: bold;
      border-radius: 0;
    }
    .rocket {
      animation: anim 1s infinite;
    }

    

</style>
</head>


<body>
    <?php
    include "nav.php";
    ?>
    <div class="container">
        <!-- navbar -->
        <div class="row landing-page">
            <div class="col-sm-6 col-md-6 col-xl-6 rocket">
                <img src="images/1.jpg" width="350px" alt="logo" class="rocket" >
            </div>
            <div class="col-sm-6 col-md-6 col-xl-6" style="margin-top: 5%">    
                <h1> Sistem Pengolahan Data Nilai Siswa </h1>
                <p> Lorem ipsumLorem ipsumLorem ipsumLorem ipsum </p>
        
            </div>
        </div>
        
    </div>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
   
   
    <!-- Modal login -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="post" action="">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h1> Login </h1>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                   
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="user" id="username" placeholder="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="aksi" class="btn btn-primary ">login</button>
                </div>
            </div>
        </div>
        </form>
    </div>
   
    <!-- Modal register -->
   
    <script src="assets/js/jquery-2.2.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/icheck.min.js"></script>
</body>

</html>