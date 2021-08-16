<?php
$ambil=$mysqli->query("SELECT * FROM berita INNER JOIN user ON berita.id_user = user.id INNER JOIN kategori ON berita.id_kategori = kategori.id where id_berita='$_GET[id_berita]'");
$data=mysqli_fetch_array($ambil);
?>
<html>
<?php
if ($data) {
?>
<div class="blog-post">
  <h2 class="blog-post-title"><?php echo $data['judul'] ?></h2>
  <p class="blog-post-meta"><svg class="bi bi-alarm" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A6 6 0 1 0 8 3a6 6 0 0 0 0 12zm0 1A7 7 0 1 0 8 2a7 7 0 0 0 0 14z"/>
  <path fill-rule="evenodd" d="M8 4.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.053.224l-1.5 3a.5.5 0 1 1-.894-.448L7.5 8.882V5a.5.5 0 0 1 .5-.5z"/>
  <path d="M.86 5.387A2.5 2.5 0 1 1 4.387 1.86 8.035 8.035 0 0 0 .86 5.387zM11.613 1.86a2.5 2.5 0 1 1 3.527 3.527 8.035 8.035 0 0 0-3.527-3.527z"/>
  <path fill-rule="evenodd" d="M11.646 14.146a.5.5 0 0 1 .708 0l1 1a.5.5 0 0 1-.708.708l-1-1a.5.5 0 0 1 0-.708zm-7.292 0a.5.5 0 0 0-.708 0l-1 1a.5.5 0 0 0 .708.708l1-1a.5.5 0 0 0 0-.708zM5.5.5A.5.5 0 0 1 6 0h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
  <path d="M7 1h2v2H7V1z"/>
</svg> <?php echo $data['tgl_posting'] ?> <svg class="bi bi-person-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
  <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
</svg> <?php echo $data['username'] ?> <svg class="bi bi-bookmarks-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12l-5-3-5 3V4z"/>
  <path d="M14 14l-1-.6V2a1 1 0 0 0-1-1H4.268A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v12z"/>
</svg><?php echo $data['nama_kategori'] ?></p>
  <hr>
  <center>
    <img src="assets/foto-berita/<?php echo $data['gambar']?>" alt="Cover" width="600" height="300"></img>
  </center>
  <br />
  <p style="text-align:justify">
    <?php echo $data['isi_berita']?>
  </p>
</div><!-- /.blog-post -->

<nav class="blog-pagination">
  <a class="btn btn-outline-dark" href="index.php?page=post&id_berita=<?php echo $data['id_berita']-1; ?>">Sebelumnya</a>
  <a class="btn btn-outline-dark float-right" href="index.php?page=post&id_berita=<?php echo $data['id_berita']+1; ?>">Selanjutnya</a>
</nav>

<link href="assets/css/komentar.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">

<div class="be-comment-block">
  <h1 class="comments-title">Kolom Komentar</h1>

  <?php
  $komentar=$mysqli->query("SELECT * FROM komentar where id_berita = $data[id_berita] ORDER BY id_berita DESC");
  $no=1;
  ?>

  <?php
  while ($komentar_data = $komentar->fetch_array()) {
      ?>
      <div class="be-comment">
      		<div class="be-img-comment">
      				<img src="assets/img/user.png" alt="" class="be-ava-comment">
      		</div>
      		<div class="be-comment-content">
      				<span class="be-comment-name">
      					<?php echo $komentar_data['nama'] ?>
      					</span>
      				<span class="be-comment-time">
      					<i class="fa fa-clock-o"></i>
      					<?php echo $komentar_data['tgl_komentar'] ?>
      				</span>
      			<p class="be-comment-text">
      				<?php echo $komentar_data['isi_komentar'] ?>
      			</p>
      		</div>
      	</div>
       <?php
  }
    $no++; ?>

	<form class="form-block" method="post" action="">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<div class="form-group fl_icon">
					<div class="icon"><i class="fa fa-user"></i></div>
					<input class="form-input" type="text" name="nama" placeholder="Nama Anda" required>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 fl_icon">
				<div class="form-group fl_icon">
					<div class="icon"><i class="fa fa-envelope-o"></i></div>
					<input class="form-input" type="email" name="email" placeholder="Email Anda" required>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12">
				<div class="form-group">
					<textarea class="form-input" name="komentar" placeholder="Komentar Anda" required></textarea>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12">
        <input type="submit" name="submit" value="Submit" class="btn btn-light btn-outline-dark btn-sm float-right">
       <input type="reset" name="reset" value="Reset"class="btn btn-light btn-outline-dark btn-sm"></div>
		</div>
	</form>
</div>
</div>
</link>
</html>
<?php
if (isset($_POST['submit'])) {
        $simpan = mysqli_query($mysqli, "INSERT INTO komentar (id_berita,nama,email,isi_komentar)
    VALUES ('$data[id_berita]',
      '$_POST[nama]',
      '$_POST[email]',
      '$_POST[komentar]')");
        if ($simpan) {
            echo"<div class=alert alert-info alert-dismissible fade show>";
            echo"<strong>Berhasil!</strong> Komentar telah ditambahkan.";
            echo"<button type=button class=close data-dismiss=alert>&times;</button>";
            echo"</div>";
            echo("<meta http-equiv='refresh' content='3'>");
        }
    } ?>
<br />
<?php
} else {
        echo "<center>";
        echo "<img src=assets/img/404.png alt=404></img>";
        echo "<p><a class=btn btn-md btn-outline-secondary href=index.php?page=beranda>Beranda</a></P>";
        echo "</center>";
    }
?>
