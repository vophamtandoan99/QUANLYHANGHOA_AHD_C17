<?php
	session_start();
	$fullname =  $_SESSION['profile']['fullname'];
	$username =  $_SESSION['profile']['username'];
?>
<?php
	require_once('../database/database.php');
    $sql = "select * from daily where status = 1";
    $dataListHH = $db->getData($sql);
    $numHH = count($dataListHH);
?>
<?php
	 $sqlQQ = "select * from daily where status = 2";
	 $dataListHHQQ = $db->getData($sqlQQ);
	 $numHHQQ = count($dataListHHQQ);
?>
<?php
	$error = false;
	if(isset($_POST['timkiem'])){
		$tkma = $_POST['matk'];
		$tkt = $_POST['tentk'];
		$tkcheck = $_POST['trangthaitk'];
		if(empty($tkma) && empty($tkt) && empty($tkcheck)){
			$sql = "SELECT * FROM daily";
			$dataListHH = $db->getData($sql);
		}else if(empty($tkma) && empty($tkt)){
			$sql = "SELECT * FROM daily WHERE status = '$tkcheck'";
			$dataListHH = $db->getData($sql);
		}else if(empty($tkt) && empty($tkcheck)){
			$sql = "SELECT * FROM daily WHERE maDL LIKE '%$tkma%'";
			$dataListHH = $db->getData($sql);
		}else if(empty($tkma) && empty($tkcheck)){
			$sql = "SELECT * FROM daily WHERE tenDL LIKE '%$tkt%'";
			$dataListHH = $db->getData($sql);
		}else if(empty($tkma)){
			$sql = "SELECT * FROM daily WHERE tenDL LIKE '%$tkt%' AND status = $tkcheck";
			$dataListHH = $db->getData($sql);
		}else if(empty($tkt)){
			$sql = "SELECT * FROM daily WHERE maDL LIKE '%$tkma%' AND status = $tkcheck";
			$dataListHH = $db->getData($sql);
		}else if(empty($tkcheck)){
			$sql = "SELECT * FROM daily WHERE maDL LIKE '%$tkma%' AND tenDL LIKE '%$tkt%'";
			$dataListHH = $db->getData($sql);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Quản Lý Đại Lý</title>
<!--Style CSS-->
<link rel="stylesheet" type="text/css"
	href="../static/css/main.css">
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
						<li class="dropdown__menu--item"><a href=".././Login/logout.php"
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

				<li class="sidebar__nav--item"><a
					class="sidebar__nav--link acitve">
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
								href="productstock.php">
									<div class="sidebar__nav--icon">
										<i class="fab fa-product-hunt"></i>
									</div> <span>Sản Phẩm </span>
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
					<h2>Danh sách Đại Lý</h2>
				</div>
				<ul class="table__txt--link">
					<li class="table__txt--item"><a style="font-size: 16px; color: black;" href="customer.php">Đang giao dịch <?php echo $numHH;?>/</a></li></br>
					<li class="table__txt--item"><a style="font-size: 16px; color: black;" href="customer.php">Ngừng giao dịch <?php echo $numHHQQ;?></a></li>
				</ul>
			</div>
			<div class="table__top d-flex">
			<form action="" method="POST">
					<div class="table__top--filter">
						<input style="width: 300px; height: 20px;" type="text"
							name="matk" value="" placeholder="Nhập mã đại lý">
						<div class="table__search" style="margin: 1rem 0;">
							<input style="width: 300px; height: 20px;" type="text"
								name="tentk" value="" placeholder="Nhập tên đại lý">
								<select name="trangthaitk" id="" aria-placeholder="Trạng thái">
								<option value="0">-Chọn trạng thái-</option>
								<option value="1">Đang giao dịch</option>
								<option value="2">Ngừng giao dịch</option>
							</select>
							<button name="timkiem" style="color: red;">
							<i class="fa fa-search" aria-hidden="true"></i>
							</button>
							<span style="color: red; font-size:14px;"><?php if(isset($loi)) echo $loi;?></span>
						</div>
					</div>
				</form>
				<div class="table__top--add">
					<i class="fa fa-plus-circle" aria-hidden="true"></i><a
						class="btn btn-link1" href="./customer/add-customer.php">Tạo mới</a>
				</div>
			</div>
			<div class="table__main">
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>Mã đại lý</th>
							<th>Tên đại lý</th>
							<th>Địa chỉ</th>
							<th>Số điện thoại</th>
							<th>Trạng thái</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($dataListHH as $row){?>
							<tr>
								<td><?php echo $row['id'];?></td>
								<td><?php echo $row['maDL'];?></td>
								<td><?php echo $row['tenDL'];?></td>
								<td><?php echo $row['diachi'];?></td>
			 					<?php $f=$row['sdt'];?>
								<td><?php echo "0"."$f";?></td>
								<?php if($row["status"] == 1){ ?>
									<td>Đang giao dịch</td>
									<?php } elseif($row["status"] == 2){?>
									<td>Ngừng giao dịch</td>
								<?php } ?>
								<td class="edit"><a href="./customer/edit-customer.php?id=<?php echo $row['id'];?>">
										<button id="edit">Sửa</button>
								</a></td>
								<td class="delete"><a 
								href="./customer/delete-customer.php?id=<?php echo $row['id'];?>"
								onclick="return window.confirm('Bạn có muốn xóa <?php echo $row['tenDL'];?> không?');">
										<button id="delete">Xóa</button>
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
	<script>
</script>
</body>
</html>