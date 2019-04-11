<?php
    class saldo{
        protected $saldo;
        public function setSaldo($saldo){
            $this->saldo = $saldo;
        }
        public function getSaldo(){
            return $this->saldo;
        }
        public function getProfile($conn,$id){
        $sql = "SELECT p.saldo from payment as p inner join users as u on u.id = p.idUser where idUser = '{$id}'";
            $res = $conn->query($sql);
            $row = $res->fetch_assoc();
            $this->setSaldo($row['saldo']);
        }
        public function rupiah($angka){
            $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
            return $hasil_rupiah;
        }
        public function getOrder($conn,$id){
            $sql = "SELECT o.id, j.berangkat, r.dari,r.ke, o.tanggal, o.jumlah, o.status FROM orderuser as o
            INNER JOIN users AS u ON u.id = o.idUser
            INNER JOIN rute AS r ON r.id = o.idRute
            INNER JOIN jadwal AS j ON j.id = o.idJadwal
            where o.idUser = '{$id}' ORDER BY o.id desc";
            $res = $conn->query($sql);
            while($row = $res->fetch_assoc()){
                $total = 17000 * $row['jumlah'];
                echo "<tr class='text-center'>
                <td class='text-capitalize'>".$row['id']."</td>
                <td>".$row['dari'].' - '.$row['ke']."</td>
                <td>".$row['berangkat']."</td>
                <td>".$row['tanggal']."</td>
                <td>".number_format($total,'0',',','.')."</td>";
                if($row['status'] == "Belum Bayar"){
                    echo "<td><a href='#modalBayar' data-toggle='modal'>Belum Dibayar</a></td>";
                }else{
                    echo "<td>Sudah Bayar</td>";
                }
                "</tr>";
            }
        }
        public function insertSaldo($conn,$jumlah,$id){
        $total = $this->getSaldo() + $jumlah;
        $sql = "UPDATE payment set saldo = '{$total}' where idUser='{$id}'";
        $res = $conn->query($sql);
            if($res){
                echo "$('#modalKu').modal('show');";
            }
        }
    }

?>