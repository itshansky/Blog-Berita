<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Technesia - Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="../assets/css/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../assets/css/login.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" action="" role="form" method="POST">
      <img class="mb-4" src="../assets/img/admin.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
      <label class="sr-only">Username</label>
      <input name="username" type="text" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
      <label class="sr-only">Password</label>
      <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-secondary btn-block" type="submit" name="login">Login</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
</form>
<script src="../assets/js/jquery-3.4.1.slim.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php
if (isset($_POST['login'])) {
    include("koneksi.php");
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $check_user = $mysqli->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
    $data_user = $check_user->fetch_array();
    $result_user = $check_user->num_rows;

    if ($result_user == 1) {
        session_start();
        $_SESSION['id_user'] = $data_user['id'];
        $_SESSION['user'] = $data_user['username'];
        $_SESSION['level'] = $data_user['level'];

        header("location:.");
    } else {
        echo "<script>alert('Username and password invalid')</script>";
    }
}
?>
