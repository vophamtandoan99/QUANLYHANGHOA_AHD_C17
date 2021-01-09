<?php
         session_start();
         require_once('../database/database.php');
         $isError = false;
         if(isset($_POST['btn_login'])){
            $username = $_POST['txtusername'];
            $pass     = $_POST['txtpassword'];
            $sqlLogin = "SELECT * FROM user WHERE username = '$username' AND password = '$pass'";
            $resultLogin = $db->query($sqlLogin);
             if (mysqli_num_rows($resultLogin)){
                 $rown = mysqli_fetch_assoc($resultLogin);
                 $_SESSION['profile'] = $rown;
                 $roleid = $_SESSION['profile']['roleid'];
                 if($roleid == 1){
                   echo '<script>alert("Đăng nhập thành công!"); window.location="../admin/admin.php";</script>';
                 }else{
                  echo '<script>alert("Đăng nhập thành công!"); window.location="../staff/staff.php";</script>';
                 }
             }else{
              $loi = "Tài khoản hoặc mật khẩu không đúng!";
             }
         }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <!--Style CSS-->
    <link rel="stylesheet" type="text/css" href="../static/css/main.css">
    <!--Font Avesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--FontFamily-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&amp;display=swap">
    <!--Plugin-->
    <link rel="stylesheet" href="../static/css/_grid.css">
    <link rel="stylesheet" href="../static/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../static/css/owl.theme.default.min.css">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/58c378b9ed.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <wraper>
      <selection class="signup">
        <div class="container">
          <div class="signup__main">
            <div class="signup__main--logo"><img src="../static/images/8.jpg"></div>
            <form action="" method="POST">
              	<div class="signup__main--form">
	              <h2>Đăng nhập</h2>
	              <span> <label
							style="font-size: 1.6rem; margin-right: 13px; color: black;">
						</label>
						</span>
	              <div class="signup__main--input">
	                <lable for="your_name"><i class="fa fa-user" aria-hidden="true"></i></lable>
	                <input type="text" name="txtusername" value="" placeholder="Your Name">
	              </div>
	              <div class="signup__main--input">
	                <lable for="your_pass"><i class="fa fa-key" aria-hidden="true"></i></lable>
	                <input type="password"name="txtpassword" value="" placeholder="Your Pass">
	              </div>
                <div class="signup__main--btn"><button name="btn_login" class="signup__main--link">Đăng nhập</button></div>
	              <ul class="signup__list">
	                <li><a><i class="fab fa-facebook"></i></a></li>
	                <li><a><i class="fab fa-instagram-square"></i></a></li>
                  <li><a><i class="fab fa-twitter"></i></a></li>
                </ul>
                <div class="signup__main--btn"><span style="color: red; font-size: 14px;"><?php if(isset($loi)) echo $loi;?></span></div>
	            </div>
            </form>
            
          </div>
        </div>
      </selection>
    </wraper>
  </body>
</html>