<?php
	session_start();
	$fullname =  $_SESSION['profile']['fullname'];
	$username =  $_SESSION['profile']['username'];
?>
<?php
	include('../database/database.php');
    $sqlSP = "select * from sanpham";
    $dataListSP = $db->getData($sqlSP);
    $numSP = count($dataListSP);
?>
<?php
	if(isset($_POST['timkiem'])){
		$tkma = $_POST['selecthanghoa'];
		$tkncc = $_POST['selectNCC'];
		$tkkho = $_POST['selectKho'];
		if(empty($tkma) && empty($tkncc) && empty($tkkho)){
			$sqlSP = "SELECT * FROM sanpham";
			$dataListSP = $db->getData($sqlSP);
		}else if(empty($tkma) && empty($tkncc)){
			$sqlSP = "SELECT * FROM sanpham WHERE tenkhoid = '$tkkho'";
			$dataListSP = $db->getData($sqlSP);
		}else if(empty($tkncc) && empty($tkkho)){
			$sqlSP = "SELECT * FROM sanpham WHERE tenhangid LIKE '$tkma'";
			$dataListSP = $db->getData($sqlSP);
		}else if(empty($tkma) && empty($tkkho)){
			$sqlSP = "SELECT * FROM sanpham WHERE tennccid LIKE '$tkncc'";
			$dataListSP = $db->getData($sqlSP);
		}else if(empty($tkma)){
			$sqlSP = "SELECT * FROM sanpham WHERE tennccid LIKE '$tkncc' AND tenkhoid = $tkkho";
			$dataListSP = $db->getData($sqlSP);
		}else if(empty($tkncc)){
			$sqlSP = "SELECT * FROM sanpham WHERE tenhangid LIKE '$tkma' AND tenkhoid = $tkkho";
			$dataListSP = $db->getData($sqlSP);
		}else if(empty($tkkho)){
			$sqlSP = "SELECT * FROM sanpham WHERE tenhangid LIKE '$tkma' AND tennccid LIKE '$tkncc'";
			$dataListSP = $db->getData($sqlSP);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sản phẩm trong kho</title>
	<!--Style CSS-->
	<link rel="stylesheet" type="text/css" href="../static/css/main.css">
	<!--Font Avesome-->
	<link rel="stylesheet"
		href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--FontFamily-->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&amp;display=swap">
	<!--Plugin-->
	<link rel="stylesheet"
		href="../static/css/_grid.css">
	<link rel="stylesheet"
		href="../static/css/owl.carousel.min.css">
	<link rel="stylesheet"
		href="../static/css/owl.theme.default.min.css">
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
					class="nav__right--link dropdown1"><i class="fa fa-user" aria-hidden="true"></i></a>
					<ul class="user--menu ax">
						<li class="dropdown__menu--item"><a
							class="dropdown__menu--link">
								<div class="item__dropdown">
									<i class="fa fa-user-circle" aria-hidden="true"></i>
								</div>
								<span><?php echo $username;?></span>
						</a></li>
						<li class="dropdown__menu--item"><a href="../Login/logout.php"
							class="dropdown__menu--link">
								<div class="item__dropdown">
									<i class="fa fa-sign-in" aria-hidden="true"></i>
								</div>
								<span style="color: blue;">Thoát</span>
						</a></li>
					</ul></li>
			</ul>
		</div>
		<div class="sidebar">
			<ul class="sidebar__nav">
				<li class="sidebar__nav--item"><a class="sidebar__nav--link"
					href="admin.php">
						<div class="sidebar__nav--icon">
							<i class="fas fa-user-circle" aria-hidden="true"></i>
						</div> <span>Trang chủ</span>
				</a></li>
				<li class="sidebar__nav--item"><a class="sidebar__nav--link"
					href="goods.php">
						<div class="sidebar__nav--icon">
							<i class="fa fa-american-sign-language-interpreting"
								aria-hidden="true"></i>
						</div> <span>Quản Lý Hàng Hóa</span>
				</a></li>
				<li class="sidebar__nav--item"><a class="sidebar__nav--link"
					href="warehouse.php">
						<div class="sidebar__nav--icon">
							<i class="fa fa-archive" aria-hidden="true"></i>
						</div> <span>Quản Lý Kho</span>
				</a></li>
				<li class="sidebar__nav--item"><a class="sidebar__nav--link"
					href="customer.php">
						<div class="sidebar__nav--icon">
							<i class="fa fa-truck" aria-hidden="true"></i>
						</div> <span>Quản Lý Đại Lý</span>
				</a></li>
				<li class="sidebar__nav--item"><a class="sidebar__nav--link"
					href="supplier.php">
						<div class="sidebar__nav--icon">
							<i class="fab fa-staylinked"></i>
						</div> <span>Quản Lý Nhà C.Cấp</span>
				</a></li>
				<li class="sidebar__nav--item"><a class="sidebar__nav--link"
					href="user.php">
						<div class="sidebar__nav--icon">
							<i class="fab fa-staylinked"></i>
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
						<li class="sidebar__nav--item"><a
							class="sidebar__nav--link acitve">
								<div class="sidebar__nav--icon">
									<i class="fa fa-users" aria-hidden="true"></i>
								</div> <span>Sản phẩm</span>
							</a></li>
							<li class="sub__menu--item"><a class="sidebar__nav--link"
								href="import.php">
									<div class="sidebar__nav--icon">
										<i class="fas fa-cart-plus"></i>
									</div> <span>Nhập </span>
							</a></li>
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
								href="statistical-import.php">
									<div class="sidebar__nav--icon">
										<i class="fas fa-cart-plus"></i>
									</div> <span>Nhập </span>
							</a></li>
							<li class="sub__menu--item"><a class="sidebar__nav--link"
								href="statistical-export.php">
									<div class="sidebar__nav--icon">
										<i class="fas fa-file-export"></i>
									</div> <span>Xuất</span>
							</a></li>
						</ul>
					</div></li>
			</ul>
		</div>
		<div class="table">
			<div class="table__txt d-flex">
				<div class="table__txt--title">
					<h2>Sản phẩm trong kho</h2>
				</div>
				<ul class="table__txt--link">
					<li class="table__txt--item"><a class="acitve">Hiện có <?php echo $numSP;?> </a></li>
					<li class="table__txt--item"><a>sản phẩm trong kho</a></li>
				</ul>
			</div>
			<div class="table__top d-flex">
				<form action="productstock.php" method="POST">
						<div class="d-flex">
							<div class="table__search" style="margin: 1rem 0;">
							<select name="selecthanghoa" id="" aria-placeholder="Kho">
								<option value="0">---Chọn Hàng---</option>
								<?php
										$sqliHH = "SELECT * FROM hanghoa";
										$kqHH = $db->getData($sqliHH);
								?>
								<?php foreach($kqHH as $rowHH) {?>
										<option value="<?php echo $rowHH['id'];?>">
										<?php echo $rowHH['tenHang'];?>
										</option>
								<?php } ?>
							</select>
						</div>
							
						<div class="d-flex">
							<div class="table__search" style="margin: 1rem 0;">
							<select name="selectKho" id="" aria-placeholder="Kho">
								<option value="0">---Chọn Kho---</option>
								<?php
										$sqliK = "SELECT * FROM kho";
										$kqK = $db->getData($sqliK);
								?>
								<?php foreach($kqK as $rowK) {?>
										<option value="<?php echo $rowK['id'];?>">
										<?php echo $rowK['tenkho'];?>
										</option>
								<?php } ?>
							</select>
						</div>
						<div class="table__search" style="margin: 1rem 0;">
							<select name="selectNCC" id="" aria-placeholder="Nhà cung cấp">
								<option value="0">--Chọn nhà cung cấp--</option>
								<?php
										$sqliNCC = "SELECT * FROM nhacungcap";
										$kqNCC = $db->getData($sqliNCC);
								?>
								<?php foreach($kqNCC as $rowNCC) {?>
										<option value="<?php echo $rowNCC['id'];?>">
										<?php echo $rowNCC['tenNCC'];?>
										</option>
								<?php } ?>
							</select>
						</div>
						<button name="timkiem" style="color: red;">
							<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</form>

			</div>
			<div class="table__main">
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên Hàng</th>
							<th>Tên nhà cung cấp</th>
							<th>Tên kho</th>
							<th>Số lượng</th>
							<th>Giá xuất</th>
							<th>Trạng thái</th>

						</tr>
					</thead>
					<tbody>
						<?php
							foreach($dataListSP as $rowSP){
						?>
							<tr>
								<td><?php echo $rowSP['id'];?></td>
								<td><?php 	
									$idHH = $rowSP['tenhangid'];
									$sqliTH = "SELECT * FROM hanghoa WHERE id = $idHH";
									$kqTH = $db->query($sqliTH);
									$rowTH = mysqli_fetch_array($kqTH);
									echo $rowTH["tenHang"];
								?>
								</td>
								<td><?php
									$idHH=$rowSP['tennccid'];
									$sqliTH = "SELECT * FROM nhacungcap WHERE id = $idHH";
									$kqTH = $db->query($sqliTH);
									$rowTH = mysqli_fetch_array($kqTH);
									echo $rowTH["tenNCC"];
								?></td>
								<td><?php
									$idHH = $rowSP['tenkhoid'];
									$sqliTH = "SELECT * FROM kho WHERE id = $idHH";
									$kqTH = $db->query($sqliTH);
									$rowTH = mysqli_fetch_array($kqTH);
									echo $rowTH["tenkho"];
								?></td>
								<?php $rt = $rowSP["soluong"]; ?>
								<?php if($rt <0){?>
									<td>0</td>
									<?php } else{?>
									<td><?php echo $rt;?></td>
								<?php } ?>
								<td><?php echo $rowSP['giaxuat'];?></td>
								<?php
									$soluong = $rowSP['soluong'];
									if($soluong <= 0){?>
										<td>Hết hàng</td>
									<?php }else{?>
										<td>Còn hàng</td>
								<?php } ?>
								<td class="edit"><a href="./productstock/view-productstock.php?id=<?php echo $rowSP['id'];?>">
										<button id="edit">Xem</button>
								</a></td>
								<td class="delete"><a href="./export/add-export.php?id=<?php echo $rowSP['id'];?>">
										<button id="delete">Xuất</button>
								</a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script src="../static/js/sidebar.js"></script>
	<script src="../static/js/sub_active.js"></script>
	<script src="../static/js/active.js"></script>
</body>
</html>
	