<?php
    include '../config/conn.php';
    include '../class/jadwal.php';

    $jadwal = new jadwal;
    $jdwl = $_GET['jadwal'];
    
    $jadwal->slotKursi($conn,$jdwl);
?>