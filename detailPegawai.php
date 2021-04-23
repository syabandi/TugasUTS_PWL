<?php 
    require_once 'models/Pegawai.php';
    //tangkap request id di url
    $id = $_GET['id'];
    $obj = new Pegawai();
    $rs = $obj->getPegawai($id);
    // print_r($rs);
    // exit();

?>



<div class="card" style="width: 18rem;">
  <?php 
    $gambar = (!empty($rs['foto'])) ? $rs['foto'] : "no_image.jpg";
  
  ?>
  <img src="image/<?= $gambar ?>" width ="40%"class="card-img-top">
  <div class="card-body">
    <h5 class="card-title"><?= $rs['nama'] ?></h5>
    <p class="card-text">
        NIP : <?= $rs['nip'] ?>
        <br/>Nama : <?= $rs['nama'] ?>
        <br/>Email : <?= $rs['email'] ?>
        <br/>Agama : <?= $rs['agama'] ?>
        <br/>Divisi : <?= $rs['divisi'] ?>
    </p>
    <a href="index.php?hal=dataPegawai" class="btn btn-primary">Go Back</a>
  </div>
</div>