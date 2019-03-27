<?php
    class validation {
        protected $id;
        protected $nama;
        protected $telp;
        public function setID($id){
            $this->id = $id;
        }
        public function getID(){
            return $this->id;
        }
        public function setNama($nama){
            $this->nama = $nama;
        }
        public function getNama(){
            return $this->nama;
        }

        public function setTelp($telp){
            $this->telp = $telp;
        }
        public function getTelp(){
            return $this->telp;
        }

        public function register($conn,$nama,$email,$password,$telp){
            $sql = "insert into users values(null,'{$nama}','{$email}','{$password}','{$telp}')";
            echo "<script>alert(".$sql.")</script>";
            $conn->query($sql);
        }
        public function login($conn,$email,$password){
            $sql = "select * from users where email = '{$email}' and password = '{$password}'";
            $res = $conn->query($sql);
            if(mysqli_num_rows($res) > 0){
                $row = $res->fetch_assoc();
                $this->setNama($row['nama']);
                $this->setId($row['id']);
                $this->setTelp($row['telp']);
                echo '<meta http-equiv="refresh" content="0;url=/flocity/" />';
            }
        }
    }
?>