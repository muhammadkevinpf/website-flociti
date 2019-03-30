<?php
    class validation {
        protected $id;
        protected $nama;
        protected $telp;
        protected $email;
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

        public function setEmail($email){
            $this->email = $email;
        }
        public function getEmail(){
            return $this->email;
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
                if($email == 'admin@flociti.com'){
                    echo '<meta http-equiv="refresh" content="0;url=/flocity/admin/page/dashboard.php" />';
                }else{
                    $row = $res->fetch_assoc();
                    $this->setNama($row['nama']);
                    $this->setId($row['id']);
                    $this->setTelp($row['telp']);
                    $this->setEmail($row['email']);
                    echo '<meta http-equiv="refresh" content="0;url=/flocity/" />';
                }
            }else{
                echo "<div class='alert alert-danger'>Email/Password anda salah 
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span></button></div>";
            }
        }
    }
?>