<!DOCTYPE html>
<html>
<head>
    <title>Ubah User</title>
    <link rel="stylesheet" href="css/ubah_member_user.css">
</head>
<body>
    <?php
    include "header.php";
    if ($_SESSION['role'] == 'admin'){
    include "koneksi.php";
    $qry_get_user = mysqli_query($conn,"select * from user where id_user = '".$_GET['id_user']."'");
    $dt_user=mysqli_fetch_array($qry_get_user);
    ?>
    <div class="main_content">
    <div class="header"><h3>Ubah user</h3></div>
    <div class="info">
    <form action="proses_ubah_user.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_user" value= "<?=$dt_user['id_user']?>">
        Nama User :
        <input type="text" name="nama" value=   "<?=$dt_user['nama']?>"> <br>
        Username : 
        <input type="text" name="username" value="<?=$dt_user['username']?>"> <br>
        Password : 
        <input type="password" name="password" value=""> <br>
        Role :
        <?php 
        $arr_role=array('admin'=>'Admin','kasir'=>'Kasir');
        ?>
        <select name="role" class="form-control">
            <option></option>
            <?php foreach ($arr_role as $key_role => $val_role):
                if($key_role==$dt_user['role']){
                    $selek="selected";
                } else {
                    $selek="";
                }
             ?>
        <option value="<?=$key_role?>" <?=$selek?>><?=$val_role?></option>
            <?php endforeach ?>
        </select> <br>
        <div class="mb-2">
                    <label for="formFile" class="form-label">Foto Produk :</label>
                    <div>
                        <img src="img/<?php echo $dt_produk['foto']; ?>" width="100px">
                    </div>
                </div>
                <!-- Foto Produk -->
                <div class="mb-4">
                    <label for="formFile" class="form-label">Ubah Foto Produk :</label>
                    <input class="form-control" type="file" name="foto">
                </div>
        <input class = "submit" type="submit" name="simpan" value="Ubah User">
    </form>
    </div>
    </div>
    <?php
        } else {
            echo "<script>alert('Oops');location.href='home.php';</script>";
        }
    ?>
</body>
</html>