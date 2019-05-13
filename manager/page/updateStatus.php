<?php
    $dbname="flociti";
    $username="root";
    $server="localhost";
    $pass = "";
    $conn = new mysqli($server,$username,$pass,$dbname);
    $aid = $_GET['id'];
    $sql = "update orderuser set status = 'Sudah Bayar' where id='{$aid}'";
    $res = $conn->query($sql);
    if($res){
        echo "berhasil";
    }else{
        echo 'lul';
    }
?>