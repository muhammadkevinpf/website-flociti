<?php
class order{
    public function getOrder($conn){
        $no = 1;
        $sql = "SELECT u.nama, j.berangkat,o.status, r.dari, o.tanggal, o.jumlah, o.telp FROM orderuser as o
        INNER JOIN users AS u ON u.id = o.idUser
        INNER JOIN rute AS r ON r.id = o.idRute
        INNER JOIN jadwal AS j ON j.id = o.idJadwal ORDER BY o.id desc";
        $res = $conn->query($sql);
        while($row = $res->fetch_assoc()){
            echo "<tr>
            <td>{$no}</td>
            <td class='text-capitalize'>".$row['nama']."</td>
            <td>".$row['dari']."</td>
            <td>".$row['berangkat']."</td>
            <td>".$row['tanggal']."</td>
            <td>".$row['jumlah']."</td>
            <td>".$row['telp']."</td>
            <td>".$row['status']."</td>
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