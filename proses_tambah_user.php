<?php
if($_POST){
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password= $_POST['password'];
    $role=$_POST['role'];
    if(empty($nama)){
        echo "<script>alert('nama user tidak boleh kosong');location.href='tambah_user.php';</script>";
 
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_user.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='tambah_user.php';</script>";
    } elseif(empty($role)){
        echo "<script>alert('role tidak boleh kosong');location.href='tambah_user.php';</script>";
    } else {
        include "koneksi.php";

        #file name with a random number so that similar dont get replaced
        $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
 
        #temporary file name to store file
        $tname = $_FILES["file"]["tmp_name"];
   
        #upload directory path
        $uploads_dir = 'img';
        
        #TO move the uploaded file to specific location
        move_uploaded_file($tname, $uploads_dir.'/'.$pname);

        $insert=mysqli_query($conn,"insert into user (nama, username, password, role, foto) value ('".$nama."', '".$username."','".md5($password)."','".$role."','".$pname."')") or die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('Sukses menambahkan user');location.href='user.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan user');location.href='tambah_user.php';</script>";
        }
    }
}
?>