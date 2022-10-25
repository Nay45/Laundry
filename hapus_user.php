<?php
session_start();
if ($_SESSION['role'] == 'admin'){
    if($_GET['id_user']){
        include "koneksi.php";
        $qry_hapus=mysqli_query($conn,"delete from user where id_user='".$_GET['id_user']."'");
        $AI_user=mysqli_query($conn,"alter table user auto_increment = 1");
        if($qry_hapus and $AI_user){
            echo "<script>alert('Sukses hapus user');location.href='user.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus user');location.href='user.php';</script>";
        }
    }
} else {
    echo "<script>alert('Oops');location.href='home.php';</script>";
}
?>