<?php
    session_start();
    include 'koneksi.php';

    if(!isset($_SESSION['admin']))
    {
        echo "<script>alert('Anda Harus Login Dahulu');</script>";
        echo "<script>location='login.php';</script>";
        exit();
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    
    <title>Admin Siswa</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
        <div class="">
            <a class="navbar-brand text-white" href="/data_siswa"><img src="images/white-128.png" width="34" height="30"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="row no-gutters mt-5">
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
                    <hr class="bg-primary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php?page=siswa"><i class="fas fa-solid fa-user-tie mr-2"></i>Data Siswa</a>
                    <hr class="bg-primary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php?page=kota"><i class="fas fa-city mr-2"></i>Data Kota</a>
                    <hr class="bg-primary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php?page=logout" onclick="return confirm('Ingin Logout??')"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                    <hr class="bg-primary">
                </li>
            </ul>
        </div>
        <div class="col-md-10 p-5 pt-2">
            <?php
            if(isset($_GET['page'])){
                if($_GET['page']=="siswa"){
                    include 'siswa.php';
                }elseif($_GET['page']=="kota"){
                    include 'kota.php';
                }elseif($_GET['page']=="logout"){
                    include 'logout.php';
                }elseif($_GET['page']=="tambahsiswa"){
                    include 'tambahsiswa.php';
                }elseif($_GET['page']=="ubahsiswa"){
                    include 'ubahsiswa.php';
                }elseif($_GET['page']=="hapussiswa"){
                    include 'hapussiswa.php';
                }elseif($_GET['page']=="ubahkota"){
                    include 'ubahkota.php';
                }
            }else{
                include 'home.php';
            }
            ?>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
  </body>
</html>