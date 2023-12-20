<h2>From Tambah Data Siswa</h2>
<hr>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>NIS</label>
        <input type="number" class="form-control" name="nis">
    </div>
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nm">
    </div>
    <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" class="form-control" name="tgl">
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <input type="text" class="form-control" name="jk">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" rows="2" name="alm"></textarea>
    </div>
    <div class="form-group">
        <label>Kota</label>
        <select class="form-control control-label text-left" name="kot">
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
    <button class="btn btn-primary w-100 h-50" name="tambah">TAMBAH SISWA</button>
</form>
<?php
include 'koneksi.php';
if(isset($_POST['tambah'])) {
    $nis=$_POST['nis'];
    $nama=$_POST['nm'];
    $tgl=$_POST['tgl'];

    $jenis=$_POST['jk'];
    $alamat=$_POST['alm'];
    $kota=$_POST['kot'];

    $sql = mysqli_query($config, "INSERT INTO siswa(id_siswa,NIS,
    Nama,Tanggal_Lahir,jenis,Alamat,Kota)
    VALUES ('','$nis','$nama','$tgl','$jenis',
    '$alamat','$kota')");

    echo "<script>alert('Siswa Berhasil Di Tambahkan');</script>";
    echo "<script>location='index.php?page=siswa';</script>";
}
?>