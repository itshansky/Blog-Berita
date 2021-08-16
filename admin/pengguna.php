<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Pengguna</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <a href="index.php?page=pengguna&aksi=entri" role="button" class="btn btn-sm btn-outline-secondary"><span data-feather="plus-square"></span> Entri Pengguna</a>
      <a href="index.php?page=pengguna&aksi=list" role="button" class="btn btn-sm btn-outline-secondary"><span data-feather="list"></span> List Pengguna</a>
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
            <th scope="col">Username</th>
            <th scope="col">Level</th>
            <th scope="col"><center>Aksi</center></th>
        </tr>
    </thead>
    <tbody>
        <?php
        include_once('koneksi.php');
        $no = 1;
        $sql = $mysqli->query("SELECT * FROM user ORDER BY username ASC");
        while ($data = $sql->fetch_array()) {
        ?>
        <tr>
            <th scope="row"><?php echo "<center>$no</center>"; ?></th>
            <td><?php echo $data['username'] ?></td>
            <td><?php echo $data['level'] ?></td>
            <td><center>
                <a href="?page=pengguna&aksi=edit&id=<?php echo $data['id'] ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                <a href="aksi_pengguna.php?page=pengguna&proses=delete&id=<?php echo $data['id'] ?>" class="btn btn-sm btn-outline-secondary" onclick="return confirm('Yakin akan menghapus data?')">Hapus</a>
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

<h3 class="mt-4">Entri Pengguna</h3>
<form action="aksi_pengguna.php?page=pengguna&proses=entri" method="POST">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="level">Level</label>
        <select name="level" id="level" class="form-control">
            <option value="Administrator">Administrator</option>
            <option value="Moderator">Moderator</option>
            <option value="Operator">Operator</option>
        </select>
    </div>
    <button class="btn btn-info" type="submit">Simpan</button>
    <button class="btn btn-default" type="reset">Reset</button>
</form>

<?php
break;
case 'edit':
include_once('koneksi.php');
$sql = $mysqli->query("SELECT * FROM user WHERE id = '$_GET[id]'");
$data = $sql->fetch_array();
?>

<h3 class="mt-4">Edit Pengguna</h3>
<form action="aksi_pengguna.php?page=pengguna&proses=update" method="POST">
    <div class="form-group">
        <label for="id_user">ID User</label>
        <input type="text" id="id_user" name="id_user" class="form-control" value="<?php echo $data['id']; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?php echo $data['username']; ?>">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" id="password" name="password" class="form-control" placeholder="Password" value=""></input>
    </div>
    <div class="form-group">
        <label for="level">Level</label>
        <select name="level" id="level" class="form-control">
            <option value="Administrator" <?php if ($data['level'] == 'Administrator') {
        echo 'selected';
    } ?>>Administrator
            </option>
            <option value="Moderator" <?php if ($data['level'] == 'Moderator') {
        echo 'selected';
    } ?>>Moderator
            </option>
            <option value="Operator" <?php if ($data['level'] == 'Operator') {
        echo 'selected';
    } ?>>Operator
            </option>
        </select>
    </div>
    <button class="btn btn-info" type="submit">Simpan</button>
    <button class="btn btn-default" type="reset">Reset</button>
</form>

<?php
break;
}
?>
