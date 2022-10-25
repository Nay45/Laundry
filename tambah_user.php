<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
    <link rel="stylesheet" href="css/tambah_usermember.css">
</head>
<body>
    <?php
        include "header.php";
        if ($_SESSION['role'] == 'admin'){
    ?>
    <div class="main_content">
    <div class="header"><h3>Tambah User</h3></div>
    <div class="info">
    <form action="proses_tambah_user.php" method="post" enctype="multipart/form-data">
        Nama User :
        <input type="text" name="nama" value="" > <br>
        Username : 
        <input type="text" name="username" value="" > <br>
        Password : 
        <input type="password" name="password" value="" > <br>
        Role :
        <select name="role" >
            <option></option>
            <option value="admin">Admin</option>
            <option value="kasir">Kasir</option>
        </select> <br>
        Foto :
        <input type="file" name="file" id=""> <br>
        <input class = "submit" type="submit" name="simpan" value="Tambah User">
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