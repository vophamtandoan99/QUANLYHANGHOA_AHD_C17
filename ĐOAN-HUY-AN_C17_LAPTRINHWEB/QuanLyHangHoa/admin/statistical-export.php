<?php
	session_start();
	$fullname =  $_SESSION['profile']['fullname'];
	$username =  $_SESSION['profile']['username'];
?>

<?php
	require_once('../database/database.php');
    $sqlIP = "select * from export";
    $dataListIP = $db->getData($sqlIP);
    $dem = count($dataListIP);
			$sum = "0";
			foreach($dataListIP as $tl){
				$sum += $tl['tonggia'];
			}$sum;
	// $dem = "";
	// $sum = "";
	$tuNgay = "";
	$denNgay = "";
?>
<?php
	$error = false;
	if(isset($_POST['timkiem'])){
		$tuNgay = $_POST['tungay'];
		$denNgay = $_POST['denngay'];
		$tkcheck = $_POST['selectStatus'];
		if(empty($tuNgay) && empty($denNgay) && empty($tkcheck)){
			$sqlIP = "SELECT * FROM export";
			$dataListIP = $db->getData($sqlIP);
			$dem = count($dataListIP);
			$sum = "0";
			foreach($dataListIP as $tl){
				$sum += $tl['tonggia'];
			}$sum;
		}else if(empty($tkcheck)){
			$sqlIP = "SELECT * FROM export WHERE `ngayxuat` >= '$tuNgay' and `ngayxuat` <= '$denNgay'";
			$dataListIP = $db->getData($sqlIP);
			$dem = count($dataListIP);
			$sum = "0";
			foreach($dataListIP as $tl){
				$sum += $tl['tonggia'];
			}$sum;
		}else if(empty($tuNgay) && empty($denNgay)){
			$sqlIP = "SELECT * FROM export WHERE status = $tkcheck"; 
			$dataListIP = $db->getData($sqlIP);
			$dem = count($dataListIP);
			$sum = "0";
			foreach($dataListIP as $tl){
				$sum += $tl['tonggia'];
			}$sum;
		}else if($tuNgay > $denNgay){
			$loie = "Chọn ngày không hợp lệ!";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Thống Kê Phiếu Xuất</title>
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

				<li class="sidebar__nav--item"><a href="admin.php"
					class="sidebar__nav--link ">
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
							<!-- <li class="sub__menu--item"><a
								class="sidebar__nav--link acitve" href="${StatisticalURL }">
									<div class="sidebar__nav--icon">
										<i class="fas fa-cart-plus"></i>
									</div> <span>Nhập </span>
							</a></li> -->
							
							<li class="sub__menu--item"><a class="sidebar__nav--link"
								href="statistical-import.php">
									<div class="sidebar__nav--icon">
										<i class="fas fa-file-export"></i>
									</div> <span>Nhập</span>
							</a></li>
							<li class="sidebar__nav--item"><a
								class="sidebar__nav--link acitve">
								<div class="sidebar__nav--icon">
									<i class="fa fa-users" aria-hidden="true"></i>
								</div> <span>Xuất</span>
							</a></li>
						</ul>
					</div></li>
			</ul>
		</div>
		<div class="table">
			<div class="table__txt d-flex">
				<div class="table__txt--title">
					<h2>Thống kê phiếu xuất</h2>
				</div>
			</div>
			<div class="table__top  d-flex" style="justify-content: none;">
				<div>
				<form action="" method="POST">
					<div class="table__top--filter">
						<label style="font-size: 1.6rem;margin-right: 13px;color: black;">Từ ngày</label>
						<input style="width: 300px; height: 20px;" type="date"
							name="tungay" >
						<button name="timkiem"><i class="fas fa-search"></i></button>
						<div class="table__search" style="margin: 1rem 0;">
							<label style="font-size: 1.6rem;margin-right: 13px;color: black;">Đến ngày</label>
							<input style="width: 300px; height: 20px;" type="date"
								name="denngay" >
							<select name="selectStatus"  aria-placeholder="Trạng thái">
								<option value="0">--Chọn trạng thái--</option>
								<option value="1">Đã thanh toán</option>
								<option value="2">Chưa thanh toán</option>
							</select>
						</div>
						<div class="signup__main--btn"><span style="color: red; font-size:14px;"><?php if(isset($loie)) echo $loie;?></span></div>
					</div>
				</form>

				</div>
				<div>
						<div class="table__top--filter"
							style="display: flex; align-items: center; padding: 2.3rem 6rem;">
							<ul style="margin-right: 2rem;">
								<li><label
									style="font-size: 1.6rem; margin-right: 13px; color: black;">Số
										hóa đơn: </label><span> <label
										style="font-size: 1.6rem; margin-right: 13px; color: black;"><?php echo $dem;?></label><span>
									</span></li>
								<li><label
									style="font-size: 1.6rem; margin-right: 13px; color: black;">Tổng
										tiền: </label><span> <label
										style="font-size: 1.6rem; margin-right: 13px; color: black;"><?php echo $sum;?>
								VNĐ </label><span> </span></li>
							</ul>
							<ul style="margin-left: 1rem;">
								<li>
									<label
									style="font-size: 1.6rem; margin-right: 13px; color: black;">Từ
										ngày: </label> <span> <label
										style="font-size: 1.6rem; margin-right: 13px; color: black;"><?php echo $tuNgay;?>
									</label><span>
									<label
										style="font-size: 1.6rem; margin-right: 13px; color: black;">Đến
										ngày: </label> <span> <label
										style="font-size: 1.6rem; margin-right: 13px; color: black;"><?php echo $denNgay;?>
										</label><span>
								</li>
								
							</ul>
						</div>
				</div>


			</div>

			<div class="table__main">
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên hàng</th>
							<th>Tên nhà cung cấp</th>
							<th>Tên kho</th>
							<th>Giá nhập</th>
							<th>Số Lượng</th>
							<th>Tổng giá</th>
							<th>Ngày nhập</th>
							<th>Người nhập</th>
							<th>status</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach($dataListIP as $row){
						?>
							<tr>
								<td><?php echo $row["id"]; ?></td>
								<td><?php 
									$idHH= $row['tenhangid'];
									$sqliTH = "SELECT * FROM hanghoa WHERE id = $idHH";
									$kqTH = $db->query($sqliTH);
									$rowTH = mysqli_fetch_array($kqTH);
									echo $rowTH["tenHang"];
								?></td>
								<td><?php 
									$idHH= $row['nccid'];
									$sqliTH = "SELECT * FROM nhacungcap WHERE id = $idHH";
									$kqTH = $db->query($sqliTH);
									$rowTH = mysqli_fetch_array($kqTH);
									echo $rowTH["tenNCC"];
								?></td>
								<td><?php 
									$idHH= $row['tenkhoid'];
									$sqliTH = "SELECT * FROM kho WHERE id = $idHH";
									$kqTH = $db->query($sqliTH);
									$rowTH = mysqli_fetch_array($kqTH);
									echo $rowTH["tenkho"];
								?></td>
								<td><?php echo $row["giaxuat"]; ?></td>
								<?php $rt = $row["soluong"]; ?>
								<?php if($rt <0){?>
									<td>0</td>
									<?php } else{?>
									<td><?php echo $rt;?></td>
								<?php } ?>
								<td><?php echo $row["tonggia"]; ?></td>
								<td><?php $date = date_create($row['ngayxuat']); echo date_format($date,'d-m-Y');?></td>
								<?php
									$idnl= $row['ngxuat'];
									$sqlinl = "SELECT * FROM user WHERE id = $idnl";
									$kqnl = $db->query($sqlinl);
									$rownl = mysqli_fetch_array($kqnl);
									$rt = $rownl["fullname"];
								?>
								<td><?php echo $rt;?></td>
								<?php if($row["status"] == 1){ ?>
									<td>Đã thanh toán</td>
									<?php } elseif($row["status"] == 2){?>
									<td>Chưa thanh toán</td>
								<?php } ?>
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