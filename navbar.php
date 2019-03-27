<?php session_start(); ?>
<div class="navbar navbar-expand-sm bsnav bsnav-brand-top">
    <a class="navbar-brand" href="/flocity/"><img src="/flocity/assets/img/flo.png" class="img-fluid"></a>
    <button class="navbar-toggler toggler-spring"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse justify-content-sm-end">
        <ul class="navbar-nav navbar-mobile mr-0">
            <li class="nav-item active"><a class="nav-link" href="/flocity/">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="/flocity/#2">Jadwal</a></li>
            <li class="nav-item"><a class="nav-link" href="/flocity/booking/">Booking</a></li>
            <?php
                if(isset($_SESSION['nama']))
                    echo '<li class="nav-item"><a class="nav-link" href="/flocity/logout.php">Logout</a></li>';
                else
                    echo '<li class="nav-item"><a class="nav-link" href="/flocity/login/">Login</a></li>';
            ?>
        </ul>
    </div>
</div>
    <div class="bsnav-mobile">
        <div class="bsnav-mobile-overlay"></div>
        <div class="navbar"></div>
    </div>