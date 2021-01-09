<?php
	session_start();
	$fullname =  $_SESSION['profile']['fullname'];
	$username =  $_SESSION['profile']['username'];
?>
<?php
	require_once('../database/database.php');
    $sql = "select u.id, u.gender, u.username, u.password, u.address, u.fullname, u.phone, u.dateofbirth, u.status , r.name from user as u inner join role r on u.roleid = r.id where status = 1";
    $dataListHH = $db->getData($sql);
    $numHH = count($dataListHH);
?>
<?php
	 $sqlQQ = "select * from user where status = 2";
	 $dataListHHQQ = $db->getData($sqlQQ);
	 $numHHQQ = count($dataListHHQQ);
?>
<?php 
	// $sqlrole = "";
	// $kqrole = $db->query($sqlrole);
	// $rowrolekl = mysqli_fetch_assoc($kqrole);

?>
<?php
	$error = false;
	if(isset($_POST['timkiem'])){
		$tkma = $_POST['matk'];
		$tkt = $_POST['tentk'];
		$tkcheck = $_POST['trangthaitk'];
		if(empty($tkma) && empty($tkt) && empty($tkcheck)){
			$sql = "SELECT * FROM user";
			$dataListHH = $db->getData($sql);
		}else if(empty($tkma) && empty($tkt)){
			$sql = "SELECT * FROM user WHERE status = '$tkcheck'";
			$dataListHH = $db->getData($sql);
		}else if(empty($tkt) && empty($tkcheck)){
			$sql = "SELECT * FROM user WHERE username LIKE '%$tkma%'";
			$dataListHH = $db->getData($sql);
		}else if(empty($tkma) && empty($tkcheck)){
			$sql = "SELECT * FROM user WHERE fullname LIKE '%$tkt%'";
			$dataListHH = $db->getData($sql);
		}else if(empty($tkma)){
			$sql = "SELECT * FROM user WHERE fullname LIKE '%$tkt%' AND status = $tkcheck";
			$dataListHH = $db->getData($sql);
		}else if(empty($tkt)){
			$sql = "SELECT * FROM user WHERE username LIKE '%$tkma%' AND status = $tkcheck";
			$dataListHH = $db->getData($sql);
		}else if(empty($tkcheck)){
			$sql = "SELECT * FROM user WHERE username LIKE '%$tkma%' AND fullname LIKE '%$tkt%'";
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
<title>Quản Lý Nhân Viên</title>
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
						<c:url value="/logout" var="LogoutURL"></c:url>
						<li class="dropdown__menu--item"><a
							class="dropdown__menu--link" href=".././Login/logout.php">
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
							<i class="fa fa-truck" aria-hidden="true"></i>
						</div> <span>Quản Lý Đại Lý</span>
				</a></li>
				<c:url value="/admin/supplier" var="SupplierURL"></c:url>
				<li class="sidebar__nav--item"><a class="sidebar__nav--link"
					href="supplier.php">
						<div class="sidebar__nav--icon">
							<i class="fab fa-staylinked"></i>
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
					<h2>Danh sách NV</h2>
				</div>
				<ul class="table__txt--link">
					<li class="table__txt--item"><a style="font-size: 16px; color: black;" href="user.php">Đang hoạt động <?php echo $numHH;?>/</a></li></br>
					<li class="table__txt--item"><a style="font-size: 16px; color: black;" href="user.php">Ngừng hoạt động <?php echo $numHHQQ;?></a></li>
				</ul>
			</div>
			<div class="table__top d-flex">
			<form action="" method="POST">
					<div class="table__top--filter">
						<input style="width: 300px; height: 20px;" type="text"
							name="matk" value="" placeholder="Nhập tên tài khoản">
						<div class="table__search" style="margin: 1rem 0;">
							<input style="width: 300px; height: 20px;" type="text"
								name="tentk" value="" placeholder="Nhập tên nhân viên">
								<select name="trangthaitk" id="" aria-placeholder="Trạng thái">
								<option value="0">-Chọn trạng thái-</option>
								<option value="1">Đang hoạt động</option>
								<option value="2">Ngừng hoạt động</option>
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
						class="btn btn-link1" href="./user/add-user.php">Tạo mới</a>
				</div>
			</div>
			<div class="table__main">
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên đăng nhập</th>
							<th>Họ và tên</th>
							<th>Giới tính</th>
							<th>Địa chỉ</th>
							<th>Số điện thoại</th>
							<th>Phân quyền</th>
							<th>Ngày sinh</th>
							<th>Trạng thái</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($dataListHH as $row){?>
							<tr>
								<td><?php echo $row['id'];?></td>
								<td><?php echo $row['username'];?></td>
								<td><?php echo $row['fullname'];?></td>
								<?php if($row["gender"] == 1){ ?>
									<td>Nam</td>
									<?php } elseif($row["gender"] == 2){?>
									<td>Nữ</td>
								<?php } ?>
								<td><?php echo $row['address'];?></td>
								<?php $tr = $row['phone'];?>
								<td><?php echo "0"."$tr";?></td>
								<td><?php echo $row['name']; ?></td>
								<td><?php $date = date_create($row['dateofbirth']); echo date_format($date,'d-m-Y');?></td>
								<?php if($row["status"] == 1){ ?>
									<td>Đang hoạt động</td>
									<?php } elseif($row["status"] == 2){?>
									<td>Ngừng hoạt động</td>
								<?php } ?>
								<td class="edit"><a href="./user/edit-user.php?id=<?php echo $row['id'];?>">
										<button id="edit">Sửa</button>
								</a></td>
								<td class="delete"><a 
								href="./user/delete-user.php?id=<?php echo $row['id'];?>"
								onclick="return window.confirm('Bạn có muốn xóa <?php echo $row['username'];?> không?');">
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