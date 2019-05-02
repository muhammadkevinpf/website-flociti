<?php session_start(); ?>
<div class="navbar navbar-expand-sm bsnav bsnav-brand-top">
    <a class="navbar-brand" href="/flocity/"><img src="/flocity/assets/img/flo.png" class="img-fluid"></a>
    <button class="navbar-toggler toggler-spring"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse justify-content-sm-end">
        <ul class="navbar-nav navbar-mobile mr-0">
            <li class="nav-item active"><a class="nav-link" href="/flocity/">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#testi">Testimoni</a></li>
            <li class="nav-item"><a class="nav-link" href="#kontak">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="/flocity/booking/">Booking</a></li>
            <?php
                if(isset($_SESSION['nama'])){
                    // echo '<li class="nav-item"><a class="nav-link" href="/flocity/logout.php">Logout</a></li>';
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-capitalize" href="#"><?php echo $_SESSION['nama'];?> <i class="caret"></i></a>
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="/flocity/profile/">Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="/flocity/logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php
                }
                else{
                echo '<li class="nav-item"><a class="nav-link" href="/flocity/login/">Login</a></li>';
                }
                
            ?>
        </ul>
    </div>
</div>
    <div class="bsnav-mobile">
        <div class="bsnav-mobile-overlay"></div>
        <div class="navbar"></div>
    </div>