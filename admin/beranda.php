<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <button type="button" class="btn btn-sm btn-outline-secondary">
        <span data-feather="user-check"></span>
        <?php $active_user = $_SESSION['user'];
        echo "$active_user";
        ?></button>
        <button type="button" class="btn btn-sm btn-outline-secondary">
        <span data-feather="shield"></span>
        <?php $active_user = $_SESSION['level'];
        echo "$active_user";
        ?></button>
    </div>
  </div>
</div>

<div class="jumbotron">
  <h1 class="display-4">Selamat Datang!</h1>
  <p class="my-4">Menu Pilihan</p>
  <hr class="my-4">
  <p class="lead">
    <a class="btn btn-sm btn-outline-secondary" href="index.php?page=berita" role="button">Publish Berita</a>
    <a class="btn btn-sm btn-outline-secondary" href="index.php?page=pengguna" role="button">Atur Pengguna</a>
  </p>
</div>
