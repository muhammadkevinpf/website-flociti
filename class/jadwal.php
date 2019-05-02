<?php
class jadwal{
    protected $jumlah;
    public $counter = 1;
    public function setJumlah($jumlah){
        $this->jumlah = $jumlah;
    }
    public function getJumlah(){
        return $this->jumlah;
    }

    public function selectJam($conn){
        ini_set('date.timezone', 'Asia/Jakarta');
        $realtime = date("H:i:s");
        $sql = "select * from jadwal where berangkat > '{$realtime}'";
        $res = $conn->query($sql);
        if(mysqli_num_rows($res) > 0){
            while($row = $res->fetch_assoc()){
                echo "<option value='".$row['id']."'>".$row['berangkat']."</option>";
            }
        }else{
            echo "<option>Jadwal Kosong</option>";
        }
        
    }

    public function insertOrder($conn,$idNama,$telp,$tanggal,$jam,$rute,$jumlah){
        $counter = 1;
        $q = "select * from orderuser where tanggal = '{$tanggal}'";
        $res = $conn->query($q);
        if(mysqli_num_rows($res) < 1){
            $date = str_replace("-","",$tanggal).'1';
        }else if(mysqli_num_rows($res) > 0){
            while($res->fetch_assoc()){
                $counter++;
            }
            $date = str_replace("-","",$tanggal).''.$counter;
        }
        $sql = "insert into orderuser values ('{$date}','{$idNama}','{$jam}','{$rute}','{$tanggal}','{$jumlah}','{$telp}','Belum Bayar')";
        $res = $conn->query($sql);
        if($res){
            echo "$('#modalku').modal('show');";
        }
    }
    public function selectOrder($conn,$tanggal){
        $sql = "select * from orderuser where tanggal = '{$tanggal}' order by id desc";
        $res = $conn->query($sql);
        $row = $res->fetch_assoc();
        echo $row['id'];
    }
    public function selectJadwal($conn,$jadwal){
        $sql = "select * from jadwal where id='{$jadwal}'";
        $res = $conn->query($sql);
        while($row = $res->fetch_assoc()){
            echo "<td class='text-center'>".$row['berangkat']."</td>";
        }
    }
    public function selectRute($conn,$rute){

        $sql = "select * from rute where id='{$rute}'";
        $res = $conn->query($sql);
        while($row = $res->fetch_assoc()){
            echo "<tr class='baris' id='baris{$this->counter}'>
            <td>".$row['ke']."</td>
            ";
            $this->counter++;
        }
    }
    public function slotKursi($conn,$rute){
        $jam = date("H:i:s");
        $this->countJumlah($conn);
        $sisaKursi = 17 - $this->getJumlah();
            for($j = 1; $j <= 16; $j++){
                $totalkursi = 14;
                $isi = 0;
                $sql = "SELECT j.berangkat, o.jumlah from orderuser as o 
                inner join jadwal as j on o.idJadwal = j.id
                inner join rute as r on o.idRute = r.id
                where j.id = '{$j}' and o.idRute = '{$rute}' and o.tanggal = CURDATE()";
                $res = $conn->query($sql);
                while($row = $res->fetch_assoc()){
                    $isi += $row['jumlah'];
                }
                $this->selectRute($conn,$rute);
                $totalkursi = $totalkursi - $isi;
                $this->selectJadwal($conn,$j);

                if($totalkursi == 0){
                    echo "
                    <td class='text-center' id='col".$j."'>{$totalkursi}</td></tr><script>
                        $('#baris'+".$j.").addClass('text-danger');
                    </script>";
                }else{
                    echo "<td class='text-center' id='col".$j."'>{$totalkursi}</td></tr>";
                }
                
            }
    }

    public function countJumlah($conn){
        date_default_timezone_set('Asia/Jakarta');
        $jam = date('H:i:s');
        $sql = "select count(id) as jumlah from jadwal where berangkat > '{$jam}'";
        $res = $conn->query($sql);
        $row = $res->fetch_assoc();
        $this->setJumlah($row['jumlah']);
    }

}

?>