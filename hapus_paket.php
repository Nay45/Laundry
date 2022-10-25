<?php
session_start();
if ($_SESSION['role'] == 'admin'){
    if($_GET['id_paket']){
        include "koneksi.php";
        $qry_hapus=mysqli_query($conn,"delete from paket where id_paket='".$_GET['id_paket']."'");
        $AI_paket=mysqli_query($conn,"alter table paket auto_increment = 1");
        if($qry_hapus and $AI_paket){
            echo "<script>alert('Sukses hapus paket');location.href='paket.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus paket');location.href='paket.php';</script>";
        }
    }
} else {
    echo "<script>alert('Oops');location.href='home.php';</script>";
}
?>