<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/lupa_password.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
    <?php
        include "koneksi.php";
    ?>
    <div id = "particles-js">
    <div class="center">
      <h1>Lupa Password</h1>
      <form action="proses_lupa.php" method="post">
        <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label><i class="fas fa-user"></i>&nbsp;Username</label>
        </div>

        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label><i class="fas fa-user"></i>&nbsp;New Password</label>
        </div>
        
        <input type="submit" name="lupa" value="Next">
        <div class="signup_link">
          Kembali Ke <a href="login.php">Login Page</a>
        </div>
      </form>
    </div>
    </div>
    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>
</body>
</html>