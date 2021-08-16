<html>
<div class="container">
    <?php
    $tampil=$mysqli->query("SELECT * FROM berita INNER JOIN user ON berita.id_user = user.id INNER JOIN kategori ON berita.id_kategori = kategori.id where kategori.id = $_GET[id_kategori] ORDER BY berita.id_berita DESC");
    $no=1;
    ?>

    <?php
    while ($data = $tampil->fetch_array()) {
        ?>

      <div class="col-md-15">
           <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-300 position-relative">
             <div class="col p-4 d-flex flex-column position-static">
               <strong class="d-inline-block text-secondary"><svg class="bi bi-person-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                 <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                 <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                 <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
               </svg> <?php echo $data['username']?> <svg class="bi bi-bookmarks-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                 <path fill-rule="evenodd" d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12l-5-3-5 3V4z"/>
                 <path d="M14 14l-1-.6V2a1 1 0 0 0-1-1H4.268A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v12z"/>
               </svg><?php echo $data['nama_kategori'] ?></strong>
               <h3 class="mb-0"><?php echo $data['judul']?></h3>
               <p class="mb-auto" style="text-align:justify">
                 <?php
                 $isi_berita = htmlentities(strip_tags($data['isi_berita']));
                 $isi = substr($isi_berita, 0, 150);
                 $isi = substr($isi_berita, 0, strrpos($isi, " "));
                 echo "$isi ..."; ?></p>
               <a href="index.php?page=post&id_berita=<?php echo $data['id_berita'] ?>" class="stretched-link"><a href="index.php?page=post&id_berita=<?php echo $data['id_berita'] ?>"><button type="button" class="btn btn-light btn-outline-dark btn-sm">Selengkapnya</button></a></a>
             </div>
             <div class="col-auto d-none d-lg-block">
               <img src="assets/foto-berita/<?php echo $data['gambar']?>" alt="Cover" width="200" height="250"></img>
             </div>
           </div>
         </div>
         <?php
    }
    $no++;
    ?>

</div>
</html>
