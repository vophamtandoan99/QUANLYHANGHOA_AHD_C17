<?php
	session_start();
	$fullname =  $_SESSION['profile']['fullname'];
	$username =  $_SESSION['profile']['username'];
?>
<?php 
      require_once('../../database/database.php');
?>
<?php 
      $getDL = "SELECT * FROM daily WHERE id = '$_GET[id]'";
      $resultDL = $db->query($getDL);
      $rowHH = mysqli_fetch_assoc($resultDL);
      $id = $_GET['id'];
      $maHH = $rowHH['maDL'];
      $tenHH = $rowHH['tenDL'];
      $diachi = $rowHH['diachi'];
      $sdt = $rowHH['sdt'];
      $th = $rowHH['status'];
?>
<?php 
        $errro = false;
        if(isset($_POST["btn_edit"])){
          $madl   = $_POST["maDL"];
          $tendl  = $_POST["tenDL"];
          $diachi = $_POST["diachi"];
          $sdt    = $_POST["sdt"];
          if(empty($madl) || empty($tendl) || empty($diachi) || empty($sdt)){
            $loi = "Dữ liệu không hợp lệ. Vui lòng nhập lại!";
            $errro = true;
          }else{
            $sql1 = "SELECT * FROM daily WHERE maDL = '$madl'" ;
            $kq = $db->query($sql1);
            $rowkl = mysqli_num_rows($kq);
            if($maHH == $madl ){
                $sqlEHH = "UPDATE daily SET maDL='$madl', tenDL='$tendl', diachi='$diachi', sdt='$sdt',
                status='1' WHERE id = $id ";
                $db->update($sqlEHH);
                echo '<script>alert("Sửa thành công!"); window.location="../customer.php";</script>';
              }else if($rowkl > 0){
                $loii = "Mã đại lý hàng đã tồn tại";
              }else{
                $sqlEHH = "UPDATE daily SET maDL='$madl', tenDL='$tendl', diachi='$diachi', sdt='$sdt', status='1' WHERE id = '$id'";
                $db->update($sqlEHH);
                echo '<script>alert("Sửa thành công!"); window.location="../customer.php";</script>';
              }
            }
        }	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Sửa Thông Tin Đại Lý</title>
<!--Style CSS-->
<link rel="stylesheet" type="text/css"
	href="../../static/css/main.css">
<!--Font Avesome-->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--FontFamily-->
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&amp;display=swap">
<!--Plugin-->
<link rel="stylesheet"
	href="../../static/css/_grid.css">
<link rel="stylesheet"
	href="../../static/css/owl.carousel.min.css">
<link rel="stylesheet"
	href="../../static/css/owl.theme.default.min.css">
<!--Font Awesome-->
<script src="https://kit.fontawesome.com/58c378b9ed.js"
	crossorigin="anonymous"></script>
</head>
<body class="body">
	<div class="wrapper">
		<div class="nav d-flex">
			<div class="nav__left d-flex">
				<div class="nav__left--icon nav__left--icon1">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</div>
				<div class="nav__left--loo" style="color: red;">DKL Team</div>
      </div>
            <div class="nav__search">
              <input class="search" type="text"
                placeholder="What you looking for ..."><i
                class="fa fa-search" aria-hidden="true"></i>
            </div>
            <ul class="nav__right d-flex">
              <li class="nav__right--item"><a class="nav__right--link">
                  <?php echo $fullname;?></a></li>
              <li class="nav__right--item"><a class="nav__right--link"><i
                  class="fa fa-moon-o" aria-hidden="true"></i></a></li>
              <li class="nav__right--item"><a class="nav__right--link"><i
                  class="fa fa-bell" aria-hidden="true"></i></a></li>
              <li class="nav__right--item"><a
                class="nav__right--link dropdown1"><i class="fa fa-user"
                  aria-hidden="true"></i></a>
                <ul class="user--menu">
                  <li class="dropdown__menu--item"><a
                    class="dropdown__menu--link">
                      <div class="item__dropdown">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                      </div> <span><?php echo $username;?></span>
                  </a></li>
                  <li class="dropdown__menu--item"><a
                    class="dropdown__menu--link" href="../../Login/logout.php">
                      <div class="item__dropdown">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                      </div><span style="color: blue;">Thoát</span>
                  </a></li>
                </ul></li>
            </ul>
    </div>
			<div class="sidebar">
                <ul class="sidebar__nav">
                  <li class="sidebar__nav--item"><a class="sidebar__nav--link"
                    href="../admin.php">
                      <div class="sidebar__nav--icon">
                        <i class="fas fa-user-circle" aria-hidden="true"></i>
                      </div> <span>Trang chủ</span>
                  </a></li>
                  <li class="sidebar__nav--item"><a class="sidebar__nav--link"
                    href="../goods.php">
                      <div class="sidebar__nav--icon">
                        <i class="fa fa-archive" aria-hidden="true"></i>
                      </div> <span>Quản Lý Hàng Hóa</span>
                  </a></li>
                  <li class="sidebar__nav--item"><a class="sidebar__nav--link"
                    href="../warehouse.php">
                      <div class="sidebar__nav--icon">
                        <i class="fa fa-archive" aria-hidden="true"></i>
                      </div> <span>Quản Lý Kho</span>
                  </a></li>
                  <li class="sidebar__nav--item"><a class="sidebar__nav--link"
                    href="../customer.php">
                      <div class="sidebar__nav--icon">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                      </div> <span>Quản Lý Đại Lý</span>
                  </a></li>
                  <li class="sidebar__nav--item"><a class="sidebar__nav--link"
                    href="../supplier.php">
                      <div class="sidebar__nav--icon">
                        <i class="fab fa-staylinked"></i>
                      </div> <span>Quản Lý Nhà C.Cấp</span>
                  </a></li>
                  <li class="sidebar__nav--item"><a class="sidebar__nav--link"
                    href="../user.php">
                      <div class="sidebar__nav--icon">
                        <i class="fa fa-users" aria-hidden="true"></i>
                      </div> <span>Quản Lý Nhân Viên</span>
                  </a></li>
                  <li class="sidebar__nav--item" data-block="id1"><a
                    class="sidebar__nav--link ">
                      <div class="sidebar__nav--icon">
                        <i class="fas fa-store"></i>
                      </div> <span>Kho</span>
                      <div class="icon">
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                      </div>
                  </a>
                    <div class="sub__men1" id="id1">
                      <ul class="list__sub">
                        <li class="sub__menu--item"><a class="sidebar__nav--link"
                          href="../productstock.php">
                            <div class="sidebar__nav--icon">
                              <i class="fab fa-product-hunt"></i>
                            </div> <span>Sản Phẩm </span>
                        </a></li>
                        <li class="sub__menu--item"><a class="sidebar__nav--link"
                          href="../import.php">
                            <div class="sidebar__nav--icon">
                              <i class="fas fa-cart-plus"></i>
                            </div> <span>Nhập </span>
                        </a></li>
                        <li class="sub__menu--item"><a class="sidebar__nav--link"
                          href="../export.php">
                            <div class="sidebar__nav--icon">
                              <i class="fas fa-file-export"></i>
                            </div> <span>Xuất</span>
                        </a></li>
                      </ul>
                    </div></li>

                  <li class="sidebar__nav--item" data-block="id2"><a
                    class="sidebar__nav--link">
                      <div class="sidebar__nav--icon">
                        <i class="fas fa-file-signature"></i>
                      </div> <span>Thống Kê</span>
                      <div class="icon">
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                      </div>
                  </a>
                  <div class="sub__men1" id="id2">
                      <ul class="list__sub">
                        <li class="sub__menu--item"><a class="sidebar__nav--link"
                          href="../statistical-import.php">
                            <div class="sidebar__nav--icon">
                              <i class="fas fa-cart-plus"></i>
                            </div> <span>Nhập </span>
                        </a></li>
                        <li class="sub__menu--item"><a class="sidebar__nav--link"
                          href="../statistical-export.php">
                            <div class="sidebar__nav--icon">
                              <i class="fas fa-file-export"></i>
                            </div> <span>Xuất</span>
                        </a></li>
                      </ul>
                    </div></li>
                </ul>
            </div>
		<div class="table">
			<div class="table__top d-flex">
				<h2>Sửa thông tin đại lý</h2>
			</div>
			<div class="table__main">
				<form action="" method="post">
					<div class="form--add">
						<div class="form">
							<i class="fa fa-pencil" aria-hidden="true"></i>
							<div class="form__file">
								<lable for="mahang">Mã đại lý<br>
								</lable>
								<input type="hidden" id="id" name="txtId" placeholder="Mã Kho"
                  value="<?php echo $id;?>">
                  <input type="text" id="mahang"
									name="maDL" placeholder="Mã đại lý" value="<?php echo $maHH;?>" required>
							</div>
							<div class="form__file">
								<lable for="name">Tên đại lý<br>
								</lable>
								<input type="text" id="name" name="tenDL"
									placeholder="Tên đại lý" value="<?php echo $tenHH;?>"required>
							</div>
							<div class="form__file">
								<lable for="address">Địa chỉ<br>
								</lable>
								<input type="text" id="address" name="diachi"
									placeholder="Địa chỉ" value="<?php echo $diachi;?>"required>
							</div>
							<div class="form__file">
								<lable for="phone">Số điện thoại<br>
								</lable>
								<input type="number" id="phone" name="sdt"
									placeholder="Số điện thoại" value="<?php echo "0"."$sdt";?>"required>
							</div>
							<div class="add-link">
								<button name="btn_edit" id="add">Sửa</button>
								<button id="cancel"><a style="color: black;" href="../customer.php">Thoát</a></button>
              	<div class="signup__main--btn">
									<span style="color: red; font-size:14px;"><?php if(isset($loi)) echo $loi; if(isset($loii)) echo $loii;?>
									</span>
								</div>
                </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  <script src="../../static/js/sidebar.js"></script>
	<script src="../../static/js/sub_active.js"></script>
	<script src="../../static/js/active.js"></script>
  </body>
</html>