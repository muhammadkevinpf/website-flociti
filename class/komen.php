<?php
    class komen{
        public function insertKomen($conn,$nama,$email,$pesan){
            $sql = "insert into kontak values(null,'{$nama}','{$email}','{$pesan}')";
            $conn->query($sql);
        }
    }
?>