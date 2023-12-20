<h2 class="text-primary"><i class="fas fa-city mr-2"></i>Data Kota</h2>
<hr>
<form method="post">
    <div class="form-group form-inline">
        <input type="text" class="form-control mr-2" name="cari" placeholder="Ketik nama Kota...."/>
        <button class="btn btn-success mr-2" name="tombol_cari"><i class="fas fa-search"></i></button>
        <a href="index.php?page=tambahongkir" class="btn btn-primary">Tambah Data Kota</a>
    </div>
</form>
<table class="table-bordered table-hover">
    <thead>
        <th>ID</th>
        <th>Kota</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php
        include 'koneksi.php';
        if(isset($_POST['tombol_cari'])) {
            $input = $_POST['cari'];
            if($input != "") {
                $sql = mysqli_query($config, "SELECT * FROM kota WHERE kota like '$input%'");
            } else {
                $sql = mysqli_query($config, "SELECT * FROM kota");
            }
        }else {
            $sql = mysqli_query($config, "SELECT * FROM kota");
        }
        $jumlahrecord = mysqli_num_rows($sql);
        if ($jumlahrecord < 1) {
            echo "<tr>";
            echo "<td colspan='8'><center class='bg-danger text-white'>Data Tidak Ditemukan</center></td>";
            echo "</tr>";
            echo "<meta http-equiv='refresh' content='2;url=index.php?page=kota'>";
        }else {
            $nomor = 1;
            while ($data = mysqli_fetch_array($sql)) {
        ?>  
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $data['kota']; ?></td>
                    <td><a href="index.php?page=ubahkota&id=<?php echo $data['id_kota']; ?>"
                        class="btn btn-info mr-2">Ubah</a>
                    </td>
                </tr>
        <?php
                $nomor++;      
            }
        }
        ?>
    </tbody>
</table>