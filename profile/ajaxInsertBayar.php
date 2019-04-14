<?php
    session_start();
    require '../config/conn.php';
    include '../class/saldo.php';
    $saldo = new saldo;
    $id =  $_POST['id'];
    $saldo->getProfile($conn,$_SESSION['id']);
    $total = str_replace('.','',$_POST['bayar']);
    
    $dec = $saldo->getSaldo() - $total;
    if($saldo->getSaldo() > $total){
        $sql = "UPDATE orderuser set status = 'Sudah Bayar' where id='{$id}'";
        $conn->query($sql);
        $sql2 = "UPDATE payment set saldo = '{$dec}' where idUser='".$_SESSION['id']."'";
        $conn->query($sql2);
        echo "berhasil";
    }else{
        
    }
?>