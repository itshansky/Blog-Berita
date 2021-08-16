<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Berita</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <a href="index.php?page=berita&aksi=entri" role="button" class="btn btn-sm btn-outline-secondary"><span data-feather="plus-square"></span> Entri Berita</a>
      <a href="index.php?page=berita&aksi=list" role="button" class="btn btn-sm btn-outline-secondary"><span data-feather="list"></span> List Berita</a>
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
            <th scope="col">Kategori</th>
            <th scope="col">User</th>
            <th scope="col">Judul</th>
            <th scope="col"><center>Tanggal</center></th>
            <th scope="col"><center>Aksi</center></th>
        </tr>
    </thead>
    <tbody>
        <?php
        include_once('koneksi.php');
        $no = 1;
        $sql = $mysqli->query("SELECT * FROM berita ORDER BY id_berita DESC");
        while ($data = $sql->fetch_array()) {
        $kategori_sql = $mysqli->query("SELECT * FROM kategori WHERE id = $data[id_kategori]");
        $user_sql = $mysqli->query("SELECT * FROM user WHERE id = $data[id_user]");
        $kategori_data = $kategori_sql->fetch_array();
        $user_data = $user_sql->fetch_array(); ?>
        <tr>
            <th scope="row"><?php echo "<center>$no</center>"; ?></th>
            <td><?php echo $kategori_data['nama_kategori'] ?></td>
            <td><?php echo $user_data['username'] ?></td>
            <td><?php echo $data['judul'] ?></td>
            <td><center><?php echo $data['tgl_posting'] ?></center></td>
            <td><center>
                <a href="?page=berita&aksi=edit&id=<?php echo $data['id_berita'] ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                <a href="aksi_berita.php?page=berita&proses=delete&id=<?php echo $data['id_berita'] ?>" class="btn btn-sm btn-outline-secondary" onclick="return confirm('Yakin akan menghapus data?')">Hapus</a>
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
include_once('koneksi.php');
?>

<h3 class="mt-4">Entri Berita</h3>
<form action="aksi_berita.php?page=berita&proses=entri" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="kategori">Nama Kategori</label>
        <select name="kategori" id="kategori" class="form-control">
            <?php
                    $kategori_sql = $mysqli->query("SELECT * FROM kategori ORDER BY id ASC");
                    while ($kategori_data = $kategori_sql->fetch_array()) {
                        echo "<option value='$kategori_data[id]'>$kategori_data[nama_kategori]</option>";
                    }
                    ?>
        </select>
    </div>
    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul">
    </div>
    <div class="form-group">
        <label for="isi_berita">Isi Berita</label>
        <textarea name="isi_berita" id="isi_berita" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="file_image">Gambar</label>
        <input type="file" id="file_image" name="file_image" class="form-control">
    </div>
    <button class="btn btn-info" type="submit">Simpan</button>
    <button class="btn btn-default" type="reset">Reset</button>
</form>

<?php
break;
case 'edit':
include_once('koneksi.php');
$sql = $mysqli->query("SELECT * FROM berita WHERE id_berita = '$_GET[id]'");
$data = $sql->fetch_array();
?>

<h3 class="mt-4">Edit Berita</h3>
<form action="aksi_berita.php?page=berita&proses=update" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $data['id_berita']; ?>">

    <div class="form-group">
        <label for="kategori">Nama Kategori</label>
        <select name="kategori" id="kategori" class="form-control">
            <?php
            $kategori_sql = $mysqli->query("SELECT * FROM kategori ORDER BY id ASC");
            while ($kategori_data = $kategori_sql->fetch_array()) {
            ?>
            <option value="<?php echo $kategori_data['id'] ?>"
                <?php if ($kategori_data['id'] == $data['id_kategori']) {
                            echo 'selected';
                        } ?>>
                <?php echo $kategori_data['nama_kategori']; ?></option>
            <?php
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul" value="<?php echo $data['judul']; ?>">
    </div>

    <div class="form-group">
        <label for="isi_berita">Isi Berita</label>
        <textarea name="isi_berita" id="isi_berita" cols="30" rows="10" class="form-control"><?php echo $data['isi_berita']; ?></textarea>
    </div>

    <div class="form-group">
        <label for="file_image">Gambar</label>
        <input type="file" id="file_image" name="file_image" class="form-control">
        <br>

        <?php
        if ($data['gambar'] != '') {
          echo "<img src=../assets/foto-berita/$data[gambar] width=100 height=50";
          } else {
              echo "Tidak ada image";
            }
          ?>
    </div>
    <br><br>
    <button class="btn btn-info" type="submit">Simpan</button>
    <button class="btn btn-default" type="reset">Reset</button>
</form>

<?php
break;
}
?>
