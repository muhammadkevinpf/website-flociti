<?php
class order{
    public function getOrder($conn){
        $no = 0;
        $sql = "SELECT o.id,u.nama, j.berangkat,o.status, r.dari, o.tanggal, o.jumlah, o.telp FROM orderuser as o
        INNER JOIN users AS u ON u.id = o.idUser
        INNER JOIN rute AS r ON r.id = o.idRute
        INNER JOIN jadwal AS j ON j.id = o.idJadwal ORDER BY o.id desc";
        $res = $conn->query($sql);
        while($row = $res->fetch_assoc()){
            $total = $row['jumlah'] * 17000;
            echo "<tr>
            <td id='nomor".$no."'>".$row['id']."</td>
            <td class='text-capitalize'>".$row['nama']."</td>
            <td>".$row['dari']."</td>
            <td>".$row['berangkat']."</td>
            <td>".$row['tanggal']."</td>
            <td>".$row['jumlah']."</td>
            <td>{$total}</td>
            <td>".$row['telp']."</td>";
            if($row['status'] == 'Sudah Bayar'){
                echo "<td>".$row['status']."</td>";
            }else{
                echo "<td><a href='#' id='linkBayar".$no."'>".$row['status']."</td></a>";
            }
            echo "
            </tr>";
            $no++;
        }
    }
    public function getOrderManager($conn){
        $query = sprintf("select distinct tanggal from orderuser where status = 'Sudah Bayar'");
        $res = $conn->query($query);

        $tanggal = array();
        foreach($res as $row){
            $tanggal[] = $row;
        }
        $data = array();
        $no = 1;
        for($i = 0; $i < count($tanggal); $i++){
            $total = 0;
            $query2 = "select sum(jumlah) as 'total' from orderuser where tanggal = '{$tanggal[$i]['tanggal']}' and status = 'Sudah Bayar'";
            $res2 = $conn->query($query2);
            $row2 = $res2->fetch_assoc();
            $total = 17000 * $row2['total'];
            echo "<tr>
                <td>{$no}</td>
                <td>".$tanggal[$i]['tanggal']."</td>
                <td>{$total}</td>
            </tr>";
            $no++;
        }
    }
    public function getKontak($conn){
        $no = 1;
        $sql = "SELECT * FROM kontak order by id desc";
        $res = $conn->query($sql);
        while($row = $res->fetch_assoc()){
            echo "<tr>
            <td>{$no}</td>
            <td>".$row['nama']."</td>
            <td>".$row['email']."</td>
            <td>".$row['pesan']."</td>
            <td>".$row['created_at']."</td>
            </tr>";
            $no++;
        }
    }
    public function countUser($conn){
        $sql = "select count(nama) as jumlah from users where email != 'admin@flociti.com'";
        $res = $conn->query($sql);
        $row = $res->fetch_assoc();
        echo $row['jumlah'];
    }
    public function countOrder($conn){
        $sql = "select count(id) as jumlah from orderuser";
        $res = $conn->query($sql);
        $row = $res->fetch_assoc();
        echo $row['jumlah'];
    }
    public function countComment($conn){
        $sql = "select count(id) as jumlah from kontak";
        $res = $conn->query($sql);
        $row = $res->fetch_assoc();
        echo $row['jumlah'];
    }
}

?>