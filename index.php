<?php
    include 'class/komen.php';
    include 'config/conn.php';

    $kontak = new komen;

    if(isset($_POST['submit'])){
        $kontak->insertKomen($conn,$_POST['nama'],$_POST['email'],$_POST['pesan']);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flocity Shuttle</title>
    <?php include 'css.php'; ?>
</head>

<body>
    <section>
        <?php include 'navbar.php'; ?>
        <ul id="partial-view">
            <li>
                <img src="assets/img/5.jpg">
            </li>
            <li>
                <img src="assets/img/6.jpg">
            </li>
            <li>
                <img src="assets/img/3.jpg">
            </li>
            <li>
                <img src="assets/img/4.jpg">
            </li>
            <li>
                <img src="assets/img/1.jpg">
            </li>
            <li>
                <img src="assets/img/2.jpg">
            </li>
        </ul>
    </section>

    <!-- <section id="service">
        <div class="row p-5">
            <div class="col-lg-12 text-center">
                <h2>Layanan Kami</h2>
                <div class="col-lg-3 mx-auto">
                    <hr>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" data-aos="fade-down" data-aos-duration="1000">
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="media mt-4 pr-2">
                            <img class="align-self-start mr-2 mt-4 ml-3" src="assets/img/icon/bus.png" alt="Generic placeholder image">
                            <div class="media-body mt-2 ml-3">
                                <h4 class="font-weight-bold">Shuttle</h4>
                                <p class="text-justify">Mengutamakan kenyamanan dan kemanan dalam perjalanan anda</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="media mt-4 pb-4 pr-2">
                            <img class="align-self-start mr-2 mt-4 ml-3" src="assets/img/icon/box.png" alt="Generic placeholder image">
                            <div class="media-body mt-2 ml-3">
                                <h4 class="font-weight-bold text-justify">Paket & Dokumen</h4>
                                <p class="text-justify">Mengirim dokumen dan paket dengan cepat dan tepat</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="media mt-4 pr-2">
                            <img class="align-self-start mr-2 mt-4 ml-3" src="assets/img/icon/car.png" alt="Generic placeholder image">
                            <div class="media-body mt-2 ml-3">
                                <h4 class="font-weight-bold">Rental Mobil</h4>
                                <p class="text-justify">Menyediakan berbagai jenis mobil dari minibus hingga big bus</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-4" data-aos="fade-up" data-aos-duration="1000">
                <div class="col-lg-4 mb-4 slideInUp">
                    <div class="card">
                        <div class="media mt-4 pb-4 pr-2">
                            <img class="align-self-start mr-2 mt-4 ml-3" src="assets/img/icon/suitcase.png" alt="Generic placeholder image">
                            <div class="media-body mt-2 ml-3">
                                <h4 class="font-weight-bold text-justify">Bandung City Tour</h4>
                                <p class="text-justify">Wisata alam, belanja dan oleh-oleh serta kuliner seputar kota Bandung</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="media mt-4 pb-4 pr-2">
                            <img class="align-self-start mr-2 mt-4 ml-3" src="assets/img/icon/gift.png" alt="Generic placeholder image">
                            <div class="media-body mt-2 ml-3">
                                <h4 class="font-weight-bold text-justify">Oleh-Oleh Bandung</h4>
                                <p class="text-justify">Layanan pengiriman oleh-oleh Bandung ke Jatinangor, anda pesan kami antar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 merah"></div>
    </section> -->

    <section id="testi">
        <div class="row mt-5 h-75">
            <div class="col-lg-12">
                <h2 class="text-center">Testimonial</h2>
                <div class="testi mt-5">
                    <div class="col-lg-6 mx-auto" style="padding-top:6%">
                        <div class="owl-carousel owl-theme p-5">
                            <div class="item text-center">
                                <h4><i class="fas fa-quote-right"></i></h4>
                                <h3 class="font-weight-bold">Recommended</h3>
                                <p> Nyaman bangettt!!! Ada port buat charger bisa buat kerjain tugas juga di travel, shuttlenya bersih, operatornya juga ramah.</p>
                                <p class="font-weight-bold">- Kirana Laras -</p>
                            </div>
                            <div class="item text-center">
                                <h4><i class="fas fa-quote-right"></i></h4>
                                <h3 class="font-weight-bold">Recommended</h3>
                                <p>Gaakan nyeseell pilih Flociti, nyaman banget, mau di mobil maupun di poolnya, ga nunggu lama juga dan ga kepanasan.</p>
                                <p class="font-weight-bold">- Asep Suherman -</p>
                            </div>
                            <div class="item text-center">
                                <h4><i class="fas fa-quote-right"></i></h4>
                                <h3 class="font-weight-bold">Recommended</h3>
                                <p>Operator ramah, supir ga ugal-ugalan, selalu tepat waktu, dan yang paling penting poolnya nyaman bangeettt!!!! </p>
                                <p class="font-weight-bold">- Agus Salim -</p>
                            </div>
                            <div class="item text-center">
                                <h4><i class="fas fa-quote-right"></i></h4>
                                <h3 class="font-weight-bold">Recommended</h3>
                                <p>Harganya sangat ramah di kantong, cocok banget buat mahasiswa.</p>
                                <p class="font-weight-bold">- Clara Ginting -</p>
                            </div>
                            <div class="item text-center">
                                <h4><i class="fas fa-quote-right"></i></h4>
                                <h3 class="font-weight-bold">Recommended</h3>
                                <p>Males berpaling ke shuttle lain. Flociti terbaik pokoknyaa!!</p>
                                <p class="font-weight-bold">- Dwi Anggara -</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kontak">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 mt-5">
                    <h2>Hubungi Kami</h2>
                    <p>Memiliki pertanyaan? kami sangat senang mendengarnya dari anda.<br> Kirim kita pesan dan kita
                        akan membalasnya secepatnya!</p>
                    <hr>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="media mt-5  ">
                        <img class="align-self-start mr-4 mt-2" src="assets/img/icon/cityscapes.png"
                            alt="Generic placeholder image">
                        <div class="media-body">
                            <h5>Pool Bandung</h5>
                            <p>Jl. Hasanudin No.28, Lebakgede, Coblong, Kota Bandung, Jawa Barat 40132</p>
                        </div>
                    </div>
                    <div class="media mt-3">
                        <img class="align-self-start mr-4 mt-2" src="assets/img/icon/buildings.png"
                            alt="Generic placeholder image">
                        <div class="media-body">
                            <h5>Pool Jatinangor</h5>
                            <p>Jl. Raya Bandung Sumedang, Hegarmanah, Jatinangor, Kabupaten Sumedang, Jawa Barat 45363
                            </p>
                        </div>
                    </div>
                    <div class="media mt-3">
                        <img class="align-self-start mr-4 mt-2 ml-3" src="assets/img/icon/mobile-phone.png"
                            alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-2 ml-3">0811-221-967</h5>
                        </div>
                    </div>
                    <div class="media mt-4">
                        <img class="align-self-start mr-4 mt-2 ml-3" src="assets/img/icon/gmail.png"
                            alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-2 ml-3">flociti@gmail.com</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <div class="form-group input-material pb-1">
                            <input type="text" name="nama" class="form-control text-capitalize"
                                value="<?php if(isset($_SESSION['nama'])) echo $_SESSION['nama']; ?>" />
                            <label for="nama">Nama</label>
                        </div>
                        <div class="form-group input-material pb-1">
                            <input type="email" name="email" class="form-control"
                                value="<?php if(isset($_SESSION['nama'])) echo $_SESSION['email']; ?>" />
                            <label for="email">Email</label>
                        </div>
                        <div class="form-group input-material pb-1">
                            <textarea class="form-control" name="pesan" rows="5" cols="50"></textarea>
                            <label for="pesan">Pesan Anda</label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-danger float-right p-3">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 footer">
            <footer>
                <h5 class="text-center text-white">Copyright &copy; <?php echo date('Y');?></h5>
            </footer>
        </div>
    </section>
    <?php include 'js.php';?>

    <script>
        $(".owl-carousel").owlCarousel({
            items: 1,
            nav: true,
            autoPlay: true,
            rewindNav: true,
            slideSpeed: 200,
            paginationSpeed: 800,
            rewindSpeed: 1000,
            loop:true,
            dots:false
        });
        $(".owl-prev").html('<i class="fa fa-chevron-left"></i>');
        $(".owl-next").html('<i class="fa fa-chevron-right"></i>');
        $('#partial-view').partialViewSlider({
            width: 45,
            controls: true,
            controlsPosition: 'inside',
            backdrop: true,
            dots: true,
            auto: true,
            transitionSpeed: 1500,
            delay: 3000,
            pauseOnHover: true,
            keyboard: true,
            perspective: false,
            prevHtml: '<i class="fas fa-chevron-left"></i>',
            nextHtml: '<i class="fas fa-chevron-right"></i>'
        });
        $(function () {
            $.scrollify({
                section: "section",
            });
        });
        AOS.init();

        $('body').materializeInputs();
    </script>
</body>

</html>