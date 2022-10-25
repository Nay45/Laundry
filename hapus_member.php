<?php
session_start();
if ($_SESSION['role'] == 'admin'){
    if($_GET['id_member']){
        include "koneksi.php";
        $qry_hapus=mysqli_query($conn,"delete from member where id_member='".$_GET['id_member']."'");
        $AI_member=mysqli_query($conn,"alter table member auto_increment = 1");
        if($qry_hapus and $AI_member){
            echo "<script>alert('Sukses hapus member');location.href='member.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus member');location.href='member.php';</script>";
        }
    }
} else {
    echo "<script>alert('Oops');location.href='home.php';</script>";
}
?>