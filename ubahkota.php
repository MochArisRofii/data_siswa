<h2>Form Ubah KOTA</h2>
<hr>
<?php
    include 'koneksi.php';
    $id = mysqli_query($config, "select * from kota where id_kota='$_GET[id]'");
    $data = mysqli_fetch_assoc($id);
?>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Kota</label>
        <input type="text" class="form-control" name="nk" value="<?php echo $data['kota'] ?>">
    </div>
    <button class="btn btn-primary w-100" name="ubahongkir">UBAH KOTA</button>
</form>
<?php

if(isset($_POST['ubahongkir'])) {
    $namakota=$_POST['nk'];
   

    
    $sql = mysqli_query($config, "update kota set kota='$namakota' WHERE id_kota='$_GET[id]'");

    echo "<script>alert('Data Kota Berhasil Di Ubah!');</script>";
    echo "<script>location='index.php?page=kota';</script>";
}
?>