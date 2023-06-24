<?php
session_start();

$nik=@$_POST['nik'];
$nama=@$_POST['nama'];


$file="file/".$nik."-".$nama.".txt";

// jika di tekan tombol pengguna baru
if (isset($_POST['pengguna_baru'])) {
    if (empty(file_exists($file))) {
        $fh=fopen($file, "w");
        fwrite($fh, "");
        fclose($fh);
        $alert="<div class='alert alert-success'>Selamat Datang Teman-Teman Baru</div>";
        $_SESSION['nik']=$nik;
        $_SESSION['nama']=$nik;
        echo "<meta http-equiv='refresh', content='2; url=index.php'>";
    }
    else{
        $alert="<div class='alert alert-danger'>Anda gagal bergabung bersama kami tolong daftar ulang</div>";
    }
}
// jika di tekan tombol masuk
elseif(isset($_POST['masuk'])){
    if (!empty(file_exists($file))) {
        $alert="<div class='alert alert-success'>Anda Berhasil Masuk</div>";
        $_SESSION['nik']=$nik;
        $_SESSION['nama']=$nama;
        echo "<meta http-equiv='refresh', content='2; url=index.php'>";
    }
    else{
        $alert="<div class='alert alert-danger'>Maaf Anda gagal masuk</div>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bs/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card mt-5">
                <div class="card-body py-5">
                <center><img src="logo.png"widht=120 height=70></center>
                    <?php echo @$alert ?>
                    <!-- form login -->
                    <div class="card-body py-5">
                    <form action="" method="POST">
                        <input type="nik" name="nik" class="form-control mb-4" placeholder="nik/absen" required>
                        <input type="text" name="Nama" class="form-control mb-4" placeholder="Nama Lengkap" required>
                        <div class="form-inline btn-a">
                            <button class="btn btn-primary" name="pengguna_baru">Murid Baru</button>
                            <button class="btn btn-primary btn-b" name="masuk">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="jquery/jquery.js"></script>
<script src="bs/js/bootstrap.js"></script>
</body>
</html>