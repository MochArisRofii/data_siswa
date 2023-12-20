<h2 class="text-info"><i class="fas fa-solid fa-user-tie mr-2"></i>Data Siswa</h2>
<hr>
<form method="post">
    <div class="form-group form-inline">
        <input type="text" class="form-control mr-2" name="cari" placeholder="Ketik nama..."/>
        <button class="btn btn-success mr-2" name="tombol_cari"><i class="fas fa-search"></i></button>
        <a href="index.php?page=tambahsiswa" class="btn btn-primary ">Tambah Data Siswa</a>
    </div>
</form>
<table class="table table-bordered table-hover">
    <thead>
        <th>ID</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Janis Kelamin</th>
        <th>Alamat</th>
        <th>Kota</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php
        include 'koneksi.php';
        if(isset($_POST['tombol_cari'])) {
            $input = $_POST['cari'];
            if($input != "") {
                $sql = mysqli_query($config, "SELECT * FROM siswa WHERE Nama like '$input%'");
            } else {
                $sql = mysqli_query($config, "SELECT * FROM siswa");
            }
        }else {
            $sql = mysqli_query($config, "SELECT * FROM siswa");
        }
        $jumlahrecord = mysqli_num_rows($sql);
        if ($jumlahrecord < 1) {
            echo "<tr>";
            echo "<td colspan='8'><center class='bg-danger text-white'>Data Tidak Ditemukan</center></td>";
            echo "</tr>";
            echo "<meta http-equiv='refresh' content='2;url=index.php?page=siswa'>";
        }else {
            $nomor = 1;
            while ($data = mysqli_fetch_array($sql)) {
        ?>  
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $data['NIS']; ?></td>
                    <td><?php echo $data['Nama']; ?></td>
                    <td><?php echo $data['Tanggal_Lahir']; ?></td>
                    <td><?php echo $data['jenis']; ?></td>
                    <td><?php echo $data['Alamat']; ?></td>
                    <td><?php echo $data['Kota']; ?></td>
                    <td><a href="index.php?page=ubahsiswa&id=<?php echo $data['id_siswa']; ?>"
                        class="btn btn-info mr-2">Ubah</a>
                        <a href="index.php?page=hapussiswa&id=<?php echo $data['id_siswa']; ?>"
                        onclick="return confirm('Apakah Data Dihapus??')" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
        <?php
                $nomor++;      
            }
        }
        ?>
    </tbody>
</table>