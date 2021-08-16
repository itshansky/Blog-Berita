<?php
include_once('koneksi.php');

$page = $_GET['page'];
$proses = $_GET['proses'];

if ($page == 'pengguna' and $proses == 'entri') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];

    $sql = $mysqli->query("INSERT INTO user VALUES (null, '$username', '$password', '$level')");

    header('location:index.php?page=' . $page);
} elseif ($page == 'pengguna' and $proses == 'update') {
    $id = $_POST['id_user'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];

    if ($_POST['password'] != '') {
        $sql = $mysqli->query("UPDATE user SET username = '$username', password = '$password', level = '$level' WHERE id = '$id'");
    } else {
        $sql = $mysqli->query("UPDATE user SET username = '$username', level = '$level' WHERE id = '$id'");
    }

    header('location:index.php?page=' . $page);
} elseif ($page == 'pengguna' and $proses == 'delete') {
    $id = $_GET['id'];

    $sql = $mysqli->query("DELETE FROM user WHERE id = '$id'");
    header('location:index.php?page=' . $page);
} else {
    header('location:index.php?page=' . $page);
}
