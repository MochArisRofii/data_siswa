<h2>Form Ubah Data Siswa</h2>
<hr>
<?php
    include 'koneksi.php';
    $id = mysqli_query($config, "select * from siswa where id_siswa='$_GET[id]'");
    $data = mysqli_fetch_assoc($id);
?>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>ID</label>
        <input type="number" class="form-control" name="id" value="<?php echo $data['id_siswa'] ?>">
    </div>
    <div class="form-group">
        <label>NIS</label>
        <input type="number" class="form-control" name="nis" value="<?php echo $data['NIS'] ?>">
    </div>
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nm" value="<?php echo $data['Nama'] ?>">
    </div>
    <div class="form-group">
        <label>tanggal lahir</label>
        <input type="date" class="form-control" name="tgl" value="<?php echo $data['Tanggal_Lahir'] ?>">
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <input type="text" class="form-control" name="jk" value="<?php echo $data['jenis'] ?>">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" class="form-control" name="alm" value="<?php echo $data['Alamat'] ?>">
    </div>
    <div class="form-group">
        <label>Kota</label>
        <select class="form-control control-label text-left" name="kot">
            <option value="<?php echo $data['Kota']; ?>"><?php echo $data['Kota']; ?></option>
            <option>Bayuwangi</option>
            <option>Blitar</option>
            <option>Kediri</option>
            <option>Malang</option>
            <option>Mojokerto</option>
            <option>Pasuruan</option>
            <option>Surabaya</option>
            <option>Jakarta</option>
        </select>
    </div>
    <button class="btn btn-primary w-100" name="ubahproduk">UBAH PRODUK</button>
</form>
<?php

if(isset($_POST['ubahproduk'])) {
    $id_=$_POST['id'];
    $nis=$_POST['nis'];
    $nama=$_POST['nm'];
    $tgllhr=$_POST['tgl'];
    
    $jenis=$_POST['jk'];
    $alamat=$_POST['alm'];
    $kota=$_POST['kot'];
    
    $sql = mysqli_query($config, "update siswa set id_siswa='$id_',NIS='$nis',
    Nama='$nama',Tanggal_Lahir='$tgllhr', jenis='$jenis', Alamat='$alamat',
    Kota='$kota' WHERE id_siswa='$_GET[id]'");
   
    echo "<script>alert('Data Siswa Berhasil Di Ubah!');</script>";
    echo "<script>location='index.php?page=siswa';</script>";
}
?>