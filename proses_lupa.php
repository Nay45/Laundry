<?php 
    if($_POST){
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(empty($username)){
            echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
        } else {
            include "koneksi.php";
            $insert_login=mysqli_query($conn,"update user set password = '".md5($password)."' where username = '".$username."'");
            if($insert_login){
                echo "<script>alert('Sukses Ganti Pass');location.href='login.php';</script>";
            } else {
                echo "<script>alert('Maaf Gagal');location.href='login.php';</script>";
            }
        }
    }
?>