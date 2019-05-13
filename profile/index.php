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
            <div class="col-lg-3">
                <div class="card" style="border-radius:10% 10% 0 0;">
                    <div class="card-image p-5 text-center" style="border-radius:10% 10% 0 0 ;">
                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="rounded-circle img-fluid" alt="<?php echo $_SESSION['nama'];?>">
                        <h4 class="pt-4 text-capitalize"><?php echo $_SESSION['nama'];?></h4>
                        <small><span class="pr-2"><i class="far fa-envelope"></i></span><?php echo $_SESSION['email'];?></small>
                    </div>
                    <div class="card-body text-center">
                    <p><i class="fas fa-money-bill-wave" style="color:#42f45c;"></i> <?php echo $saldo->rupiah($saldo->getSaldo()); ?> <a  data-toggle="modal" data-target="#modelId" class='pl-2' title="Tambah Saldo" id="tambahsaldo"><i class="fas fa-plus" ></i></a></p>
                        <a href="#" class="btn btn-danger" id="btnEdit" style="font-size:14px;">Edit Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Daftar Transaksi</h4>
                        <table class="table tableOrder" id="tableOrder">
                            <thead  class="mt-2">
                                <tr>
                                    <th class='text-center'>No Order</th>
                                    <th class='text-center'>Rute</th>
                                    <th class='text-center'>Keberangkatan</th>
                                    <th class='text-center'>Tanggal</th>
                                    <th class='text-center'>Jumlah</th>
                                    <th class='text-center'>Status</th>
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
    
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Tambah Saldo</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <div class="form-group row">
                            <label for="" class="col-form-label col-lg-2">Nominal</label>
                            <div class="col-lg-10">
                            <input type="text" name="nominal" class="form-control">
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalKu" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="text-center">
                            <img src="../assets/img/icon/bank.png" class="img-fluid m-4"/>
                            <h4>Tambah Saldo Berhasil!</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalBayar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="text-center">
                            <img src="../assets/img/icon/question.png" class="img-fluid m-4"/>
                            <h4 class="mb-4">Bayar Tiket?</h4>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="pr-2"><i class="fas fa-times"></i></span>Cancel</button>
                            <button type="button" name="submit" class="btn btn-success ml-3" id="bayar"><span class="pr-2"><i class="fas fa-check"></i></span>Bayar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalThanks" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="text-center">
                            <img src="../assets/img/icon/checked.png" class="img-fluid m-4"/>
                            <h5 class="mt-4">Pembayaran No <span class='font-weight-bold' id="headId"></span> Sukses!<br>Terima kasih sudah menggunakan Flociti!</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="modalEditProfile" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action='<?php echo $_SERVER["PHP_SELF"];?>' method='POST'>
                        <div class="form-group input-material">
                            <input type="text" name="nama" class="form-control text-capitalize" value="<?php echo $_SESSION['nama'];?>"/>
                            <label for="nama">Nama</label>
                        </div>
                        <div class="form-group input-material">
                            <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['email'];?>"/>
                            <label for="email">Email</label>
                        </div>
                        <div class="form-group input-material">
                            <input type="text" name="telpon" class="form-control" value="<?php echo $_SESSION['telp'];?>"/>
                            <label for="telpon">Nomor Telepon</label>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="btnUpdate">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <?php include '../js.php';
    if(isset($_POST['btnUpdate'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $telp = $_POST['telpon'];
        $_SESSION['nama'] = $nama;
        $_SESSION['email'] = $email;
        $_SESSION['telp'] = $telp;
        $sql = "update users set nama='{$nama}', email = '{$email}', telp='{$telp}' where id = ".$_SESSION['id']."";
        $conn->query($sql);
        echo '<meta http-equiv="refresh" content="0;url=/flocity/profile/" />';
    }
    
    
    ?>
    <script>
    $(document).ready(function(){
        $('body').materializeInputs();
        $('#tambahsaldo').tooltipster({
            arrow:false,
            side: 'right'
        });
        <?php 
        if(isset($_POST['submit'])){
            $saldo->insertSaldo($conn,$_POST['nominal'],$_SESSION['id']);
        }
        ?>
        $('.tableOrder').bootstrapTable({
                pagination: true,
                paginationLoop: true,
                pageNumber: 1,
                pageSize: 10,
                pageList: [10, 25, 50, 100],
                search: true,
                showPaginationSwitch: true
            });

            $('#btnEdit').click(function(){
                $('#modalEditProfile').modal('show');
            });

            $('#tableOrder tbody tr').click(function(){
                var edan = $(this).index();
                var nomor = $('#kolom'+edan).text();
                var total = $('#bayar'+edan).text();
                $('#bayar').click(function(){
                    $.ajax({
                        type: 'post',
                        url: 'ajaxInsertBayar.php',
                        data: {id:nomor, bayar:total},
                        success: function(response){
                            $('#modalBayar').modal('hide');
                            if(response == 'berhasil'){
                                $('#modalThanks').modal('show');
                                $('#headId').html(nomor);
                                $('#modalThanks').on('hidden.bs.modal', function () {
                                    window.location.href = '/flocity/profile/';
                                });
                            }else{
                                swal("Pembayaran Gagal", "Saldo anda kurang, silahkan isi ulang saldo", "error");
                            }
                        }
                    });
                });
            });
        });
        $('#modalKu').on('hidden.bs.modal', function () {
            window.location.href = '/flocity/profile/';
        });
    </script>
</body>
</html>