<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Kategori</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <a href="index.php?page=kategori&aksi=entri" role="button" class="btn btn-sm btn-outline-secondary"><span data-feather="plus-square"></span> Entri Kategori</a>
      <a href="index.php?page=kategori&aksi=list" role="button" class="btn btn-sm btn-outline-secondary"><span data-feather="list"></span> List Kategori</a>
    </div>
  </div>
</div>

<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
case 'list':
?>

<table class="table table-borderless">
    <thead class="thead-light">
        <tr>
            <th scope="col"><center>No</center></th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Keterangan</th>
            <th scope="col"><center>Aksi</center></th>
        </tr>
    </thead>
    <tbody>
        <?php
                include_once('koneksi.php');
                $no = 1;
                $sql = $mysqli->query("SELECT * FROM kategori ORDER BY nama_kategori ASC");
                while ($data = $sql->fetch_array()) {
                    ?>
        <tr>
            <th scope="row"><?php echo "<center>$no</center>"; ?></th>
            <td><?php echo $data['nama_kategori'] ?></td>
            <td><?php echo $data['keterangan'] ?></td>
            <td><center>
                <a href="?page=kategori&aksi=edit&id=<?php echo $data['id'] ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                <a href="aksi_kategori.php?page=kategori&proses=delete&id=<?php echo $data['id'] ?>" class="btn btn-sm btn-outline-secondary" onclick="return confirm('Yakin akan menghapus data?')">Hapus</a>
            </center></td>
        </tr>
        <?php
        $no++;
        }
        ?>
    </tbody>
</table>

<?php
break;
case 'entri':
?>

<h3 class="mt-4">Entri Kategori</h3>
<form action="aksi_kategori.php?page=kategori&proses=entri" method="POST">
    <div class="form-group">
        <label for="nama_kategori">Nama Kategori</label>
        <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" placeholder="Nama Kategori">
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan">
    </div>
    <button class="btn btn-info" type="submit">Simpan</button>
    <button class="btn btn-default" type="reset">Reset</button>
</form>

<?php
break;
case 'edit':
include_once('koneksi.php');
$sql = $mysqli->query("SELECT * FROM kategori WHERE id = '$_GET[id]'");
$data = $sql->fetch_array();
?>

<h3 class="mt-4">Edit Kategori</h3>
<form action="aksi_kategori.php?page=kategori&proses=update" method="POST">
    <div class="form-group">
        <label for="id_kategori">ID Kategori</label>
        <input type="text" id="id_kategori" name="id_kategori" class="form-control" value="<?php echo $data['id']; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="nama_kategori">Nama Kategori</label>
        <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" placeholder="Nama Kategori" value="<?php echo $data['nama_kategori']; ?>">
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" value="<?php echo $data['keterangan']; ?>">
    </div>
    <button class="btn btn-info" type="submit">Simpan</button>
    <button class="btn btn-default" type="reset">Reset</button>
</form>

<?php
break;
}
?>
