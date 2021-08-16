<?php
include_once('koneksi.php');

$page = $_GET['page'];
$proses = $_GET['proses'];

if ($page == 'kategori' and $proses == 'entri') {
    $nama_kategori = $_POST['nama_kategori'];
    $keterangan = $_POST['keterangan'];

    $sql = $mysqli->query("INSERT INTO kategori VALUES (null, '$nama_kategori', '$keterangan')");

    header('location:index.php?page=' . $page);
} elseif ($page == 'kategori' and $proses == 'update') {
    $id = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];
    $keterangan = $_POST['keterangan'];

    $sql = $mysqli->query("UPDATE kategori SET nama_kategori = '$nama_kategori', keterangan = '$keterangan' WHERE id = '$id'");

    header('location:index.php?page=' . $page);
} elseif ($page == 'kategori' and $proses == 'delete') {
    $id = $_GET['id'];

    $sql = $mysqli->query("DELETE FROM kategori WHERE id = '$id'");
    header('location:index.php?page=' . $page);
} else {
    header('location:index.php?page=' . $page);
}
