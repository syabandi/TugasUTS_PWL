<?php 
    require_once 'models/Pegawai.php';
    //membuat objek dari kelas Produk
    $obj = new Pegawai();
    //panggil method tampilkan data
    $rs = $obj->dataPegawai();
?>
<h3>Data Pegawai</h3>
<?php 
    if(isset($member)) {
?>
<a href="index.php?hal=formPegawai" class="btn btn-primary">Tambah</a>
<?php } ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">NIP</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Agama</th>
      <th scope="col">Divisi</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $no = 1;
        foreach($rs as $prod){
    
    ?>
    <tr>
      <td><?= $no; ?></td>
      <td><?= $prod['nip']; ?></td>
      <td><?= $prod['nama']; ?></td>
      <td><?= $prod['email']; ?></td>
      <td><?= $prod['agama']; ?></td>
      <td><?= $prod['divisi']; ?></td>
      <td>
      <form method="POST" action="controllers/pegawaiController.php">
      <a href="index.php?hal=detailPegawai&id=<?= $prod['id']; ?>" 
      class="btn btn-info">Detail</a>
      <?php
        $role = $member['role'];
        if(isset($member)) {
      ?>
      <a href="index.php?hal=formEditPegawai&id=<?= $prod['id']; ?>" 
      class="btn btn-warning">Ubah</a>
      <?php
        if($role != 'staff') {
      ?>
      
      <button name="proses" value="hapus"
          onclick="return confirm('Anda Yakin Data diHapus?')"
      class="btn btn-danger">Hapus</button>
      <?php } ?>
      <input type="hidden" name="idx" value="<?= $prod['id']; ?>">
      <?php } ?>
      </form>
      </td>
    </tr>
    <?php
        $no++;
        }
    ?>
  </tbody>
</table>