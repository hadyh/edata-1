<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> login </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include_once "link_css.php"; ?> 
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>E</b>DATA</a>
  </div>
  <!-- /.login-logo -->
  <?php 
  include_once("conf/conn.php");

  if (isset($_POST['signin'])){

    $user = $_POST['username'];
    $password = $_POST['password'];
    
    $q = $db->select("*","nilai_keterampilan","proyek='$user'");
    
    $row = $db->getTableRows($q);
    echo $row;
    if (!$row){
      echo "Username atau password salah";
    } else {
      echo "Berhasil login";
    }
  }
  ?>
  <div class="login-box-body">
    <p class="login-box-msg">Silakan Sign in dengan username dan password yang telah diberikan</p>

    <form action="#" method="post">
      <div class="form-group has-feedback">
        <input type="username" name="username" class="form-control" placeholder="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="signin" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   
  

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>