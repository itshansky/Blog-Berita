<?php
session_start();
include_once('koneksi.php');

$page = $_GET['page'];
$proses = $_GET['proses'];

if ($page == 'berita' and $proses == 'entri') {
    $id_kategori = $_POST['kategori'];
    $id_user = $_SESSION['id_user'];
    $judul = $_POST['judul'];
    $isi_berita = $_POST['isi_berita'];

    $lokasi_file = $_FILES['file_image']['tmp_name'];
    $tipe_file = $_FILES['file_image']['type'];
    $nama_file = $_FILES['file_image']['name'];

    if (!empty($lokasi_file)) {
        if ($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/pjpg") {
            $path = "$_SERVER[DOCUMENT_ROOT]" . "berita/assets/foto-berita/";
            move_uploaded_file($lokasi_file, $path . $nama_file);
            $sql = $mysqli->query("INSERT INTO berita VALUES (null, '$id_kategori', '$id_user', '$judul', '$isi_berita', '$nama_file', null)");
        } else {
            echo "Gagal menyimpan data !!! <br>
            Tipe file <b>$nama_file</b> : $tipe_file <br>
            Tipe file yang diperbolehkan adalah : <b>JPG/JPEG/PNG<b>.<br>";
            echo "<a href=javascript:history.go(-1)>Ulangi Lagi</a>";
        }
    } else {
        $sql = $mysqli->query("INSERT INTO berita (id_kategori, id_user, judul, isi_berita)
        VALUES ('$id_kategori', '$id_user', '$judul', '$isi_berita')");
    }

    header('location:index.php?page=' . $page);
} elseif ($page == 'berita' and $proses == 'update') {
    $id = $_POST['id'];
    $id_kategori = $_POST['kategori'];
    $id_user = $_SESSION['id_user'];
    $judul = $_POST['judul'];
    $isi_berita = $_POST['isi_berita'];

    $lokasi_file = $_FILES['file_image']['tmp_name'];
    $tipe_file = $_FILES['file_image']['type'];
    $nama_file = $_FILES['file_image']['name'];

    if (!empty($lokasi_file)) {
        if ($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/pjpg") {
            echo $nama_file_unik;
            $path = "$_SERVER[DOCUMENT_ROOT]" . "berita/assets/foto-berita/";
            move_uploaded_file($lokasi_file, $path . $nama_file);
            $sql = $mysqli->query("UPDATE berita SET id_kategori = $id_kategori, id_user = $id_user, judul = '$judul', isi_berita = '$isi_berita', gambar = '$nama_file' WHERE id_berita = $id");
        } else {
            echo "Gagal menyimpan data !!! <br>
            Tipe file <b>$nama_file</b> : $tipe_file <br>
            Tipe file yang diperbolehkan adalah : <b>JPG/JPEG/PNG<b>.<br>";
            echo "<a href=javascript:history.go(-1)>Ulangi Lagi</a>";
        }
    } else {
        $sql = $mysqli->query("UPDATE berita SET id_kategori = $id_kategori, id_user = $id_user, judul = '$judul', isi_berita = '$isi_berita' WHERE id_berita = $id");
    }

    header('location:index.php?page=' . $page);
} elseif ($page == 'berita' and $proses == 'delete') {
    $id = $_GET['id'];

    $sql = $mysqli->query("SELECT * FROM berita WHERE id_berita = $id");
    $data = $sql->fetch_array();

    $file1 = $data['gambar'];
    $file2 = $_SERVER['DOCUMENT_ROOT'] . "berita/assets/foto-berita/" . $file1;

    unlink($file2);
    $sql = $mysqli->query("DELETE FROM berita WHERE id_berita = $id");

    header('location:index.php?page=' . $page);
} else {
    header('location:index.php?page=' . $page);
}
