<?php
if($_POST){
    $id_user=$_POST['id_user'];
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $role=$_POST['role'];   
    $file_tmp = $_FILES['foto']['tmp_name'];
        $file_name=rand(0,9999).$_FILES['foto']['name'];
        $file_size= $_FILES['foto']['size'];
        $file_type= $_FILES['foto']['type'];
        $folder="img/";

        include "koneksi.php";
        $sql=mysqli_query($conn, "select * from user where id_user='$id_user'");
        $user=mysqli_fetch_array($sql);
        $path=$folder.$user["foto"];
        if(file_exists($path)){
            unlink($path); 
        }    if($file_size < 2048000 and ($file_type == "image/jpeg" or $file_type== "image/png")){
            move_uploaded_file($file_tmp, $folder.$file_name);
            if (empty($file_name)){
                $update= mysqli_query ($conn, "update user set nama='".$nama."',username='".$usernamei."', password='".$password.", role='".$role."' where id_user='".$id_user."' ") or die (mysqli_error($conn));
                if ($update) {
                    echo "<script> alert ('Sukses update user'); location.href='user.php' ; </script>";  
                }else{
                    echo "<script> alert ('Gagal update user'); location.href='user.php' ; </script>";
                } 
            }else{
                $update= mysqli_query ($conn, "update user set nama='".$nama."',username='".$username."', password='".$password."', role='".$role."' , foto='".$file_name."' where id_user='".$id_user."' ") or die (mysqli_error($conn));
                if ($update) {
                    echo "<script> alert ('Sukses update user'); location.href='user.php' ; </script>";  
                }else{
                    echo "<script> alert ('Gagal update user'); location.href='user.php' ; </script>";
                } 
            }
           
        }else{
            echo "<script>alert('file tidak sesuai');location.href='user.php'
            </script>";
        }
    }
    
?>