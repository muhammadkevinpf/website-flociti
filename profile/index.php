<?php 
    include '../class/saldo.php';
    include '../config/conn.php';
    $saldo = new saldo;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Page | Flociti</title>
    <?php include '../css.php';?>
</head>
<body>
<?php include '../navbar.php'; $saldo->getProfile($conn,$_SESSION['id']);?>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card h-100" style="border-radius:10% 10% 0 0;">
                    <div class="card-image p-5 text-center" style="border-radius:10% 10% 0 0 ;">
                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="rounded-circle img-fluid" alt="ateng">
                        <h4 class="pt-4 text-capitalize"><?php echo $_SESSION['nama'];?></h4>
                        <small><span class="pr-2"><i class="far fa-envelope"></i></span><?php echo $_SESSION['email'];?></small>
                    </div>
                    <div class="card-body text-center">
                    <p>Saldo: <?php echo $saldo->rupiah($saldo->getSaldo()); ?></p>
                        <a href="#" class="btn btn-danger" style="font-size:14px;">Edit Profile</a>
                        <a href="#" class="btn btn-primary" style="font-size:14px;">Tambah Saldo</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Daftar Transaksi</h4>
                        <table class="table">
                            <thead>
                                <tr class='text-center'>
                                    <th>No Order</th>
                                    <th>Rute</th>
                                    <th>Tujuan</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $saldo->getOrder($conn,$_SESSION['id']); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../js.php';?>
</body>
</html>