<?php
include("admin/koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Technesia - Berita Teknologi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">

    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.css" rel="stylesheet">

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
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/blog.css" rel="stylesheet">
  </head>
  <body>

<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="text-muted" href="#">1811081034</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="index.php">Technesia</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="text-muted" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>
        <a class="btn btn-sm btn-outline-secondary" href="admin/">Dashboard</a>
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      <?php
      $kategori_list = $mysqli->query("SELECT * FROM kategori ORDER BY nama_kategori ASC");
      while ($widget_kategori = $kategori_list->fetch_array()) {
          echo "<a class=p-2 text-muted href=?page=kategori&id_kategori=$widget_kategori[id]>$widget_kategori[nama_kategori]</a>";
      }
      ?>
    </nav>
  </div>
  <img src="assets/img/cover.png" class="mb-4" alt="Responsive image" width="100%" height="65%"></img>
</div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <?php
      $page = isset($_GET['page']) ? $_GET['page'] : 'beranda';
      if ($page=='beranda') {
          include('beranda.php');
      }
      if ($page=='post') {
          include('post.php');
      }
      if ($page=='kategori') {
          include('kategori.php');
      }
      ?>
    </div>

    <aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-light rounded">
        <h4 class="font-italic">Tentang</h4>
        <p class="mb-0" style="text-align:justify">Technesia adalah website berita terbaik seputar teknologi. Lengkap dengan berita nasional dan internasional. Sesuai dengan temanya, Website ini merupakan media yang banyak memberikan informasi terbaru mengenai teknologi masakini.</p>
      </div>

      <div class="p-4">
        <h4 class="font-italic">Berita Terbaru</h4>
        <ol class="list-unstyled">
      <?php
      $berita_terkini = $mysqli->query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT 5");
      while ($widget_berita = $berita_terkini->fetch_array()) {
          echo "<li><a href=?page=post&id_berita=$widget_berita[id_berita]>$widget_berita[judul]</a></li>";
      }
      ?>
    </ol>
  </div>

  <div class="p-4">
    <h4 class="font-italic">Komentar Terbaru</h4>
    <ol class="list-unstyled">
      <?php
      $komentar_terkini = $mysqli->query("SELECT komentar.nama, berita.judul, berita.id_berita FROM komentar INNER JOIN berita ON komentar.id_berita = berita.id_berita ORDER BY id DESC LIMIT 5");
      while ($widget_komentar = $komentar_terkini->fetch_array()) {
          echo "<li>$widget_komentar[nama] pada <a href=?page=post&id_berita=$widget_komentar[id_berita]>$widget_komentar[judul]</a></li>";
      }
      ?>
    </ol>
  </div>

    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->

<footer class="blog-footer">
  <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>

<script src="assets/js/jquery-3.4.1.slim.min.js"> </script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
