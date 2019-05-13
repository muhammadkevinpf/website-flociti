<?php

header('Content-Type: application/json');
include '../config/conn.php';

if(!$conn){
    die('Connection Error'.$conn->error);
}

$query = sprintf("select distinct tanggal from orderuser");
$res = $conn->query($query);

$tanggal = array();
foreach($res as $row){
    $tanggal[] = $row;
}
$data = array();
for($i = 0; $i < count($tanggal); $i++){
    $total = 0;
    $query2 = "select sum(jumlah) as 'total' from orderuser where tanggal = '{$tanggal[$i]['tanggal']}'";
    $res2 = $conn->query($query2);
    $row2 = $res2->fetch_assoc();
    $total = $row2['total'];
    $data[] = ["total" => $total, "tanggal" => $tanggal[$i]['tanggal']];
}
// print_r($tanggal);
// $res->close();
// $conn->close();

print json_encode($data);