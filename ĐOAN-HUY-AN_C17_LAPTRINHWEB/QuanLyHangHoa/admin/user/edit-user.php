<?php
	session_start();
	$fullname =  $_SESSION['profile']['fullname'];
	$username =  $_SESSION['profile']['username'];
?>
<?php 
      require_once('../../database/database.php');
?>
<?php 
    $getDL = "SELECT * FROM user WHERE id = '$_GET[id]'";
    $resultDL = $db->query($getDL);
	$rowHH = mysqli_fetch_assoc($resultDL);
	  	$id = $_GET['id'];
		$usernamee = $rowHH['username'];
		$password = $rowHH['password'];
		$gender = $rowHH['gender'];
	  	$fullnamee = $rowHH['fullname'];
	  	$diachi = $rowHH['address'];
		$sdtt = $rowHH['phone'];
		$roleid = $rowHH['roleid'];
		$datetime = $rowHH['dateofbirth'];
		$status = $rowHH['status'];
?>
<?php 
	$errro = false;
	if(isset($_POST['themusser'])){
        $user     = $_POST['user'];
        $pass     = $_POST['password'];
        $fullnameh = $_POST['fullname'];
        $pay      = $_POST['pay'];
        $diachi   = $_POST['diachi'];
        $sdt      = $_POST['sdt'];
        $ngsinh   = $_POST['date'];
        $role     = $_POST['roleid'];
	
		  if(empty($user) || empty($pass) || empty($fullnameh) || empty($pay) || empty($diachi) || empty($sdt)
		  || empty($ngsinh) || empty($role)){
			$loi = "Dữ liệu không hợp lệ. Vui lòng nhập lại!";
			$errro = true;
		}else{
			$sql1 = "SELECT * FROM user WHERE username = '$user'" ;
			$kq = $db->query($sql1);
			$rowkl = mysqli_num_rows($kq);
			if($usernamee == $user ){
				$sqlEHH = "UPDATE user SET username='$user', password='$pass', fullname='$fullnameh', gender='$pay', 
				address='$diachi', phone='$sdt', roleid='$role', dateofbirth='$ngsinh', status='1' WHERE id = $id";
				$db->update($sqlEHH);
				echo '<script>alert("Sửa thành công!"); window.location="../user.php";</script>';
				}else if($rowkl > 0){
					$loii = "Tài khoản đã tồn tại";
				}else{
					$sqlEHH = "UPDATE user SET username='$user', password='$pass', fullname='$fullnameh', gender='$pay', 
					address='$diachi', phone='$sdt', roleid='$role', dateofbirth='$ngsinh', status='1' WHERE id = $id";
					$db->update($sqlEHH);
					echo '<script>alert("Sửa thành công!"); window.location="../user.php";</script>';
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
<title>Thêm Nhân Viên</title>
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
		<div class="overlay"></div>
		<div class="nav d-flex">
			<div class="nav__left d-flex">
				<div class="nav__left--icon">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</div>
				<div class="nav__left--loo" style="color: red;">AHĐ-Team</div>
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
						<c:url value="/logout" var="logoutURL"></c:url>
						<li class="dropdown__menu--item"><a href="../../Login/logout.php"
							class="dropdown__menu--link">
								<div class="item__dropdown">
									<i class="fa fa-sign-in" aria-hidden="true"></i>
								</div><span style="color: blue;">Thoát</span>
						</a></li>
					</ul></li>
			</ul>
		</div>
		<div class="sidebar">
			<ul class="sidebar__nav">
				<c:url value="/admin/admin-pages" var="AdminURL"></c:url>
				<li class="sidebar__nav--item"><a class="sidebar__nav--link"
					href="admin.php">
						<div class="sidebar__nav--icon">
							<i class="fas fa-user-circle" aria-hidden="true"></i>
						</div> <span>Trang chủ</span>
				</a></li>
				<c:url value="/admin/commodity" var="CommodityURL"></c:url>
				<li class="sidebar__nav--item"><a class="sidebar__nav--link"
					href="goods.php">
						<div class="sidebar__nav--icon">
							<i class="fa fa-american-sign-language-interpreting"
								aria-hidden="true"></i>
						</div> <span>Quản Lý Hàng Hóa</span>
				</a></li>
				<c:url value="/admin/warehouse" var="warehouseURL"></c:url>
				<li class="sidebar__nav--item"><a class="sidebar__nav--link"
					href="warehouse.php">
						<div class="sidebar__nav--icon">
							<i class="fa fa-archive" aria-hidden="true"></i>
						</div> <span>Quản Lý Kho</span>
				</a></li>
				<c:url value="/admin/customer" var="CustomerURL"></c:url>
				<li class="sidebar__nav--item"><a class="sidebar__nav--link"
					href="customer.php">
						<div class="sidebar__nav--icon">
							<i class="fab fa-staylinked"></i>
						</div> <span>Quản Lý Đại Lý</span>
				</a></li>
				<c:url value="/admin/supplier" var="SupplierURL"></c:url>
				<li class="sidebar__nav--item"><a class="sidebar__nav--link"
					href="supplier.php">
						<div class="sidebar__nav--icon">
							<i class="fa fa-truck" aria-hidden="true"></i>
						</div> <span>Quản Lý Nhà C.Cấp</span>
				</a></li>
				<li class="sidebar__nav--item"><a
					class="sidebar__nav--link acitve">
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
							<c:url value="/admin/product-stock" var="ProductStockURL"></c:url>
							<li class="sub__menu--item"><a class="sidebar__nav--link"
								href="productstock.php">
									<div class="sidebar__nav--icon">
										<i class="fab fa-product-hunt"></i>
									</div> <span>Sản Phẩm </span>
							</a></li>
							<c:url value="/admin/import" var="ImportURL"></c:url>
							<li class="sub__menu--item"><a class="sidebar__nav--link"
								href="import.php">
									<div class="sidebar__nav--icon">
										<i class="fas fa-cart-plus"></i>
									</div> <span>Nhập </span>
							</a></li>
							<c:url value="/admin/export" var="ExportURL"></c:url>
							<li class="sub__menu--item"><a class="sidebar__nav--link"
								href="export.php">
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
				<h2>Sửa nhân viên</h2>
			</div>
			<div class="table__main">
				<form action="" method="post">
					<div class="form--add">
						<div class="form">
							<div class="dflex">
								<div class="form__file">

									<lable for="txtUsername">Tên đăng nhập<br>
									</lable>
									<input type="email" id="txtUsername" name="user"
										placeholder="Tên đăng nhập" required="required"
										value="<?php echo $usernamee;?>">
								</div>
								<div class="form__file">
									<lable for="txtPassword">Mật khẩu<br>
									</lable>
									<input type="password" id="txtPassword" name="password"
										placeholder="Mật khẩu" required="required"
										value="<?php echo $password;?>">
								</div>
							</div>
							<div class="dflex">
								<div class="form__file">
									<lable for="txtFullname">Họ và tên<br>
									</lable>
									<input type="text" id="txtFullname" name="fullname"
										placeholder="Full Name" required="required" value="<?php echo $fullnamee;?>">
								</div>
								<div class="form__file">
									<lable for="selectGender">Giới tính<br>
									</lable>
									<select id="selectGender" name="pay">
									<?php if($gender == 1){ ?>
											<option value="1">Nam</option>
											<option value="2">Nữ</option>
											<?php } elseif($gender == 2){?>
											<option value="2">Nữ</option>
											<option value="1">Nam</option>
										<?php }		
										?>
									</select>
								</div>
							</div>
							<div class="form__file">
								<lable for="txtAddress">Địa chỉ<br>
								</lable>
								<input type="text" id="txtAddress" name="diachi"
									placeholder="Địa chỉ" value="<?php echo $diachi;?>">
							</div>
							<div class="form__file">
								<lable for="txtPhoneNumber">Số điện thoại<br>
								</lable>
								<input type="text" id="txtPhoneNumber" name="sdt"
									placeholder="Phone number" value="<?php echo "0"."$sdtt";?>">
							</div>
							<div class="dflex">
								<div class="form__file">
									<lable for="txtDate">Ngày tháng năm sinh<br>
									</lable>
									<input type="date" id="txtDate" name="date"
										placeholder="Date of birdth" value="<?php echo $datetime;?>">
								</div>
								<div class="form__file">
									<lable for="selectRole">Phân quyền<br>
									</lable>
									<select id="selectRole" required="required" name="roleid">
									<?php 
											$sqloop = "select * from role";
											$et = $db->getData($sqloop);
										?>
										<?php 
											foreach($et as $i){
										?>
										<option value="<?php echo $i['id']?>"
										<?php if($i['id'] == $roleid){echo "selected";}?>>
										<?php echo $i['name']?></option>
                    					<?php } ?>	
										?>
									</select>
								</div>
							</div>
							<div class="add-link">
								<button name="themusser" id="add">Thêm</button>
								<button id="cancel"><a style="color: black;" href="../user.php">Thoát</a></button>
							</div>
							<div class="signup__main--btn">
							<span style="color: red; font-size:14px;"><?php if(isset($loi)) echo $loi; if(isset($loii)) echo $loii;?></span>
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