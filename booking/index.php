<?php 
    date_default_timezone_set('Asia/Jakarta');
    $date = date('Y-m-d');
    include '../config/conn.php';
    include '../class/jadwal.php';

    $jadwal = new jadwal;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking</title>
    <?php include '../css.php';?>
</head>
<body>
    <?php include '../navbar.php';?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 float-left mb-5">
            <h4 class="text-center pb-4">Plan and Book</h4>
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group input-material">
                                        <input type="hidden" name="identitas" value="<?php if(isset($_SESSION['nama'])) echo $_SESSION['id']?>"/>
                                        <input type="text" name="nama" class="form-control" <?php if(isset($_SESSION['nama'])) echo "value='".$_SESSION['nama']."' disabled style='text-transform:capitalize;'"?> required/>
                                        <label for="nama">Nama</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group input-material">
                                        <input type="text" id="phone" name="phone" class="form-control" value="<?php if(isset($_SESSION['nama'])) echo $_SESSION['telp']?>" required/>
                                        <label for="phone">No Telephone</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group input-material">
                                        <input type="date" class="form-control" name="tanggal" value='<?php echo $date; ?>' min='<?php echo $date; ?>' required/>
                                        <label for="tanggal">Tanggal</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4">
                                    <div class="form-group">
                                        <label for="keberangkatan" class='labelBiru'>Keberangkatan</label>
                                        <select name="keberangkatan" class="form-control">
                                            <?php $jadwal->selectJam($conn);?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group input-material">
                                        <input type="number" class="form-control" id="jumlah" name="jumlah" min='1' value="1" required/>
                                        <label for="jumlah">Jumlah</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="rute" class='labelBiru'>Rute</label>
                                        <select name="rute" class="form-control" id="cmbFrom">
                                            <option value="1">Bandung - Jatinangor</option>
                                            <option value="2">Jatinangor - Bandung</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group text-center mt-4 pt-2">
                                        <label class='text-danger'>Harga: </label>
                                        <label class='text-danger' id="harga">17000</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" name="order" class="btn btn-danger btn-block mt-2" <?php if(!isset($_SESSION['nama'])) echo 'disabled';?>>Order</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <small>*daftar/login terlebih dahulu untuk booking</small>
            </div>
            
            <?php include '../js.php';?>
            <div class="col-lg-6 float-right">
                <div class="d-flex flex-row">
                    <div class="pr-2"><h4>Cek Jadwal</h4></div>
                    <div>
                        <select name="jadwal" id="jadwal" class="form-control">
                            <option value="1">Bandung</option>
                            <option value="2">Jatinangor</option>
                        </select>
                    </div>
                </div>
                <table class="table table-bordered table-striped mt-4">
                    <thead>
                        <tr class="text-center">
                            <th>Tujuan</th>
                            <th>Keberangkatan</th>
                            <th>Sisa Kursi</th>
                        </tr>
                    </thead>
                    <tbody class="tblJadwal">
                        <?php $jadwal->slotKursi($conn,'1');?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function(){
            var dt = new Date();
            var n = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
            
            for(var i = 1; i <=16 ; i++){
                if($('#baris'+i).closest('tr').find('td:eq(1)').text() < n){
                    $('#baris'+i).addClass('text-danger');
                }
            }

            $('body').materializeInputs();
            $("#phone").mask("9999-9999-9999");
            <?php
            if(isset($_POST['order'])){
                $jadwal->insertOrder($conn,$_SESSION['id'],$_POST['phone'],$_POST['tanggal'],$_POST['keberangkatan'],$_POST['rute'],$_POST['jumlah']);
                }
            ?>

            $("#jadwal").change(function(){
                var jdwl = this.value;
                $.ajax({
                    type: 'get',
                    url: 'ajaxBooking.php',
                    datatype: 'json',
                    data: {jadwal:jdwl},
                    success: function(response){
                        $('.tblJadwal').html(response);
                    }
                });
            });

            $("#jumlah").keyup(function(){
                var jumlah = this.value;
                if(jumlah > 10){
                    this.value = 10;
                    jumlah = 10;
                    var total = jumlah * 17000;
                    $("#harga").html(total);
                }else{
                    var total = this.value * 17000;
                    $("#harga").html(total);
                }
            });

            $("#jumlah").on('input',function(){
                var jumlah = this.value;
                if(jumlah > 10){
                    this.value = 10;
                    jumlah = 10;
                    var total = jumlah * 17000;
                    $("#harga").html(total);
                }else{
                    var total = this.value * 17000;
                    $("#harga").html(total);
                }
            });

        });
    </script>
        
    <!-- Modal -->
    <div class="modal fade" id="modalku" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="mb-5 font-weight-bold">Order Success!</h4>
                    <img src="../assets/img/icon/positive-vote.png" class="img-fluid mb-5">
                    <br/>
                    <p>Your order No. <b><?php $jadwal->selectOrder($conn,$_POST['tanggal']);?></b> has been success!<br>Please pay to cashier 30 min before leaving</p>
                    <h5>Thanks! enjoy your trip!
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#modalku').on('hidden.bs.modal', function () {
        // do something…
            window.location.href = '/flocity/booking/';
        })
    </script> 
</body>
</html>