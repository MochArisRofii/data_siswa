<?php
include 'koneksi.php';
$get1 = mysqli_query($config,"select * from siswa");
$count1 = mysqli_num_rows($get1);

$get2 = mysqli_query($config,"select * from siswa where jenis='Laki-Laki'");
$count2 = mysqli_num_rows($get2);

$get3 = mysqli_query($config,"select * from siswa where jenis='Perempuan'");
$count3 = mysqli_num_rows($get3);
?>


<h3><i class="fas fa-tachometer-alt mr-2"></i> Dashboard</h3><hr>
<div class="row">
    <div class="col-md-4">
        <div class="card bg-warning" style="width: 18rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-users mr-2" ></i>
                </div>
                <div class="display-4"><?=$count1 ?></div>
                <h6 class="card-title">Total Siswa</h6>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-info" style="width: 18rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-solid fa-user-tie mr-2" ></i>
                </div>
                <div class="display-4"><?=$count2 ?></div>
                <h6 class="card-title ">Siswa Laki Laki</h6>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success" style="width: 18rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-solid fa-user-nurse mr-2" ></i>
                </div>
                <div class="display-4"><?=$count3 ?></div>
                <h6 class="card-title ">Siswa Perempuan</h6>
            </div>
        </div>
    </div>
</div>


<div class="row mt-5">
    <div class="col-md-6">
        <div class="card bg-light" style="width: 30rem;">
            <div class="card-body">
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <h5 class="text-center">Persentase Siswa Berdasarkan Jenis Kelamin</h5><hr>
                <div style="width: 400px; height: 400px; ">
                    <canvas id="grafik"></canvas>
                </div>
                <script>
                    var ctx = document.getElementById("grafik").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type:'doughnut',
                        data:{
                            labels : ["Laki-Laki", "Perempuan"],
                            datasets :[{
                                label:'',
                                data:[
                                    <?php
                                    $koneksi = mysqli_connect("localhost","root","","data_siswa");

                                    $laki_laki = mysqli_query($koneksi,"select * from siswa where jenis='Laki-Laki'");
                                    echo mysqli_num_rows($laki_laki);
                                    ?>,

                                    <?php

                                    $Perempuan = mysqli_query($koneksi,"select * from siswa where jenis='Perempuan'");
                                    echo mysqli_num_rows($Perempuan);
                                    ?>
                                ],
                                backgroundColor: [
                                    'rgb(0,0,255)',
                                    'rgb(255, 0, 127)'
                                ],
                                hoverOffset: 4
                        }]
                    }
            })
                </script>
            </div> 
        </div>
    </div>
    <div class="col-md-6">
        <div class="card bg-light" style="width: 30rem;">
            <div class="card-body">
                <h5 class="text-center">Persentase Asal Kota Siswa</h5><hr >
                <div style="width: 400px; height: 400px; ">
                    <canvas id="grafik1"></canvas>
                </div>
                <script>
                    var ctx =document.getElementById("grafik1").getContext('2d');
                    var Chartmy = new Chart(ctx, {
                        type:'pie',
                        data:{
                            labels : ["Bayuwangi", "Blitar", "Kediri", "Malang", "Mojokerto", "Pasuruan", "Surabaya", "Jakarta"],
                            datasets :[{
                                label:'',
                                data:[
                                    <?php
                                    $koneksi = mysqli_connect("localhost","root","","data_siswa");

                                    $bayuwangi = mysqli_query($koneksi,"select * from siswa where kota='Bayuwangi'");
                                    echo mysqli_num_rows($bayuwangi);
                                    ?>,

                                    <?php
                                    $blitar = mysqli_query($koneksi,"select * from siswa where kota='Blitar'");
                                    echo mysqli_num_rows($blitar);
                                    ?>,

                                    <?php
                                    $Kediri = mysqli_query($koneksi,"select * from siswa where kota='Kediri'");
                                    echo mysqli_num_rows($Kediri);
                                    ?>,

                                    <?php
                                    $Malang = mysqli_query($koneksi,"select * from siswa where kota='Malang'");
                                    echo mysqli_num_rows($Malang);
                                    ?>,

                                    <?php
                                    $Mojokerto = mysqli_query($koneksi,"select * from siswa where kota='Mojokerto'");
                                    echo mysqli_num_rows($Mojokerto);
                                    ?>,

                                    <?php
                                    $Pasuruan = mysqli_query($koneksi,"select * from siswa where kota='Pasuruan'");
                                    echo mysqli_num_rows($Pasuruan);
                                    ?>,

                                    <?php
                                    $Surabaya = mysqli_query($koneksi,"select * from siswa where kota='Surabaya'");
                                    echo mysqli_num_rows($Surabaya);
                                    ?>,

                                    <?php
                                    $Jakarta = mysqli_query($koneksi,"select * from siswa where kota='Jakarta'");
                                    echo mysqli_num_rows($Jakarta);
                                    ?>,
                                ],
                                backgroundColor: [
                                    'rgb(255,0,0)',
                                    'rgb(255,94,0)',
                                    'rgb(255,165,3)',
                                    'rgb(253,215,3)',
                                    'rgb(57, 220, 7)',
                                    'rgb(27, 128, 1)',
                                    'rgb(51,153,255)',
                                    'rgb(0, 0, 255)'
                                ]
                            }]
                        }
                    })
                </script>
            </div>
        </div>
    </div>
    <div class="col-md-12 mr-2 mt-5">
        <div class="card bg-light" style="width:67rem">
            <div class="card-body">
                <h5 class="text-center">Jumlah Siswa Bedasarkan Tahun Kelahiran</h5><hr >
                <div style="width: 97%; height: 50%;">
                    <canvas id="grafik2"></canvas>
                </div>
                <script>
                    var ctx =document.getElementById("grafik2").getContext('2d');
                    var myChart2 = new Chart(ctx, {
                        type:'bar',
                        data:{
                            labels : ["2004", "2005", "2006", "2007", "2008"],
                            datasets :[{
                                label: '',
                                data:[
                                    <?php 
                                    $koneksi = mysqli_connect("localhost","root","","data_siswa");
                                    
                                    $thn2004 = mysqli_query($koneksi,"SELECT YEAR(tanggal_lahir) from siswa where YEAR(tanggal_lahir) = 2004");
                                    echo mysqli_num_rows($thn2004);
                                    ?>,

                                    <?php
                                    $thn2005 = mysqli_query($koneksi,"SELECT YEAR(tanggal_lahir) from siswa where YEAR(tanggal_lahir) = 2005");
                                    echo mysqli_num_rows($thn2005);
                                    ?>,

                                    <?php
                                    $thn2006 = mysqli_query($koneksi,"SELECT YEAR(tanggal_lahir) from siswa where YEAR(tanggal_lahir) = 2006");
                                    echo mysqli_num_rows($thn2006);
                                    ?>,

                                    <?php
                                    $thn2007 = mysqli_query($koneksi,"SELECT YEAR(tanggal_lahir) from siswa where YEAR(tanggal_lahir) = 2007");
                                    echo mysqli_num_rows($thn2007);
                                    ?>,

                                    <?php
                                    $thn2008 = mysqli_query($koneksi,"SELECT YEAR(tanggal_lahir) from siswa where YEAR(tanggal_lahir) = 2008");
                                    echo mysqli_num_rows($thn2008);
                                    ?>
                                ],
                                backgroundColor: [
                                    'rgb(255,0,0)',
                                    'rgb(255,94,0)',
                                    'rgb(255,165,3)',
                                    'rgb(253,215,3)',
                                    'rgb(57, 220, 7)'
                                ]
                            }]
                        }
                    })
                </script>
            </div>
        </div>
    </div>
</div>

