<?php
	session_start();
	$fullname =  $_SESSION['profile']['fullname'];
	$username =  $_SESSION['profile']['username'];
?>
<?php 
	require_once("../../database/database.php");
	$sql 		= "SELECT * FROM import WHERE id = '$_GET[id]'";   
	$dateimport = $db->getData($sql);

	$tenhang 	= $dateimport[0]["tenhang"];
	$tenkho 	= $dateimport[0]["tenkho"];
	$tenncc 	= $dateimport[0]["tenncc"];
	$soluong 	= $dateimport[0]["soluong"];
	$gianhap 	= $dateimport[0]["gianhap"];
	$tonggia 	= $dateimport[0]["tonggia"];
	$nguoilap 	= $dateimport[0]["nguoilap"];
	$trangthai 	= $dateimport[0]["status"];
	$dateimport = $dateimport[0]["dateimport"];
?>
<?php
	$sqlop = "SELECT us.fullname FROM user AS us INNER JOIN import ip ON us.id = ip.nguoilap WHERE ip.id = '$_GET[id]'";
	$dlkq = $db->query($sqlop);
	$kqe = mysqli_fetch_assoc($dlkq);
	$namemm = $kqe['fullname'];

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Nhập hàng</title>
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
			<li class="nav__right--item"><a class="nav__right--link"><?php echo $fullname;?></a></li>
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
			<li class="sidebar__nav--item"><a class="sidebar__nav--link"
					href="../staff.php">
						<div class="sidebar__nav--icon">
							<i class="fas fa-user-circle" aria-hidden="true"></i>
						</div> <span>Trang chủ</span>
				</a></li>
				<li class="sidebar__nav--item" data-block="id1"><a
					class="sidebar__nav--link">
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
										<i class="fas fa-cart-plus"></i>
									</div>
									<span>Sản phẩm</span>
							</a></li>
							<li class="sidebar__nav--item"><a
							class="sidebar__nav--link acitve">
								<div class="sidebar__nav--icon">
									<i class="fas fa-user-circle" aria-hidden="true"></i>
								</div>
								<span>Nhập</span>
							</a></li>
							<li class="sub__menu--item"><a class="sidebar__nav--link"
								href="../export.php">
									<div class="sidebar__nav--icon">
										<i class="fas fa-file-export"></i>
									</div>
									<span>Xuất</span>
							</a></li>							
						</ul>
					</div></li>
			</ul>
		</div>
		<div class="table">
			<div class="table__txt d-flex">
				<div class="table__txt--title">
					<h2>Thông tin cơ bản</h2>
				</div>

			</div>
			<div class="table__top ">
				<h2 style="text-align: center;">Thông tin chi tiết phiếu nhập</h2>
				<div class="table__items"
					style="display: flex; align-items: center; justify-content: space-around;">
					<div class="col-10 col-lg-7" style="margin: 0 auto;">
						<div class="form-group" style="display: flex; justify-content: space-between;align-items: center;" >
							<div class="item-table">
							<label  for="" class="item__table" style="margin-right: 2rem;">Tên
								hàng:</label>
								<div class="input-items" >
							<input type="text" class="item-input" value="<?php 
									$sqliTH = "SELECT * FROM hanghoa WHERE id = $tenhang";
									$kqTH = $db->query($sqliTH);
									$rowTH = mysqli_fetch_array($kqTH);
									echo $rowTH["tenHang"];
								?>" disabled>
							</div>
						</div>
						<div class="item-table" >
							<label for="" class="item__table" style="margin-right: 2rem;text-align: right;">Tên
								kho:</label>
								<div class="input-items">
							<input type="text" value="<?php 
									$sqliTH = "SELECT * FROM kho WHERE id = $tenkho";
									$kqTH = $db->query($sqliTH);
									$rowTH = mysqli_fetch_array($kqTH);
									echo $rowTH["tenkho"];
								?>" class="item-input"  disabled>
							</div>
						</div>
						</div>
						<div class="item-table" >
							<label for="" class="item__table" style="margin-right: 2rem;text-align: right;">Tên
								nhà cung cấp:</label>
								<div class="input-items">
							<input type="text" value="<?php 
									$sqliTH = "SELECT * FROM nhacungcap WHERE id = $tenncc";
									$kqTH = $db->query($sqliTH);
									$rowTH = mysqli_fetch_array($kqTH);
									echo $rowTH["tenNCC"];
								?>" class="item-input" disabled>
							</div>
						</div>
						<div class="item-table">
							<label for="" class="item__table" style="margin-right: 2rem;text-align: right;">Số lượng
								:</label>
								<div class="input-items">
							<input type="text"  value="<?php echo $soluong;?> " class="item-input" disabled>
							</div>
						</div>
						<div class="item-table" >
							<label for="" class="item__table" style="margin-right: 2rem;">Giá nhập
								:</label>
								<div class="input-items">
							<input type="text" value="<?php echo $gianhap;?>" class="item-input" disabled>
							</div>
						</div>
						<div class="item-table" >
							<label for="" class="item__table" style="margin-right: 2rem;">Tổng giá
								:</label>
								<div class="input-items">
							<input type="text" value="<?php echo $tonggia;?>" class="item-input" disabled>
							</div>
						</div>
						<div class="item-table" >
							<label for="" class="item__table" style="margin-right: 2rem;">Ngày nhập
								:</label>
								<div class="input-items">
							<input type="date" value="<?php echo $dateimport;?>" class="item-input" disabled>
							</div>
						</div>
						<div class="item-table" >
							<label for="" class="item__table" style="margin-right: 2rem;">Người nhập
								:</label>
								<div class="input-items">
							<input type="text" value="<?php echo $namemm;?>" class="item-input" disabled>
							</div>
						</div>
						<div class="item-table" >
							<label for="" class="item__table" style="margin-right: 2rem;">Tình trạng
								:</label>
								<div class="input-items">
								<input type="text" value="<?php 
								if($trangthai == 1){
									echo "Đã thanh toán";
									}else{
										echo "Chưa thanh toán";
								};?>" class="item-input" disabled>
								</div>								
						</div>
					
				</div>
		<div style="margin: 20px; position:absolute;right: 0; bottom: 10px;" class="table--result" >
									<button id="back" class="btn btn-link3 result_link"
										style="width: 13rem;"><a href="../import.php">Trở lại</a></button>
								</div>
			</div>
		</div>
		<script src="../../static/js/btndel.js"></script>
		<script src="../../static/js/sidebar.js"></script>
		<script src="../../static/js/sub_active.js"></script>
		<script src="../../static/js/active.js"></script>
</body>
</html>

