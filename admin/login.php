<?php
require_once '../config.php';

//Redirect if already session user
if (isset($_SESSION['user']) && $_SESSION['user']['email'] != "") {
    header("Location: index.php");
}

//If user click button login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Check if the input text is not empty
    if (!empty(trim($email)) && !empty(trim($password))) {
        
        $sql = "SELECT *,users.name as uname FROM users WHERE email = '$email'";
        $query = mysqli_query($link, $sql);
        $cek = mysqli_num_rows($query);

        //Check if rows is exists in tables
        if ($cek > 0) {
            $SQL = "SELECT *,users.name as uname, users.id AS uid, roles.name as level FROM users JOIN roles ON roles.id = users.role_id WHERE email = '$email'";
            $query = mysqli_query($link, $SQL);
            $data = mysqli_fetch_object($query);

            //Validate password
            $validate = password_verify($password, $data->password);
            if ($validate) {

                //Create a session
                $_SESSION['user']['email'] = $data->email;
                $_SESSION['user']['username'] = $data->username;
                $_SESSION['user']['name'] = $data->uname;
                $_SESSION['user']['level'] = $data->level;
                $_SESSION['user']['id'] = $data->uid;

                //Redirect to Home
                header("Location: index.php");
            } else {
            echo "
                <script>
                    alert('E-mail atau Password salah!');
                    window.location='login.php';
                </script>";
            }

        } else {
            echo "
                <script>
                    alert('E-mail tidak ditemukan!');
                    window.location='login.php';
                </script>";
        }

    } else {
        echo "
            <script>
                alert('Form tidak boleh ada yang kosong!');
                window.location='login.php';
            </script>";
    }

}



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Informatic Blog | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= __BASEURL__; ?>/assets/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= __BASEURL__; ?>/assets/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= __BASEURL__; ?>/assets/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= __BASEURL__; ?>/assets//css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= __BASEURL__; ?>/assets/iCheck/square/blue.css">

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Informatic</b>Blog</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="login.php" method="POST">
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-6">
                        <a href="register.php" class="btn btn-success btn-block btn-flat">Register</a>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="<?= __BASEURL__; ?>/assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= __BASEURL__; ?>/assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?= __BASEURL__; ?>/assets/iCheck/icheck.min.js"></script>
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