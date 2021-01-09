<?php
	session_start();
	$fullname =  $_SESSION['profile']['fullname'];
	$username =  $_SESSION['profile']['username'];
?>
<?php
	require_once('../../database/database.php');
?>
<?php
	$sqltenfull = "SELECT * FROM user WHERE fullname = '$fullname'";
	$kqten = $db->query($sqltenfull);
	$rowtenfull = mysqli_fetch_assoc($kqten);
	$tenfull = $rowtenfull['id'];
?>
<?php
	  $errro = false;
      if(isset($_POST['thanhtoan'])){
          $ncc = $_POST['ncc'];
          $hanghoa = $_POST['hanghoa'];
          $kho = $_POST['kho'];
          $gianhap = $_POST['gianhap'];
          $sluong = $_POST['soluong'];
          $sum = $_POST['tongtien'];
		  $check = $_POST['status'];
		  $date = $_POST['date'];
			if(empty($ncc) || empty($hanghoa) || empty($kho) || empty($gianhap) || empty($sluong)|| empty($date) || empty($sluong) || empty($check)){
				$loi = "Dữ liệu nhập vào không hợp lệ";
				$errro = true;
			}else{
				if($sluong <= 0 || $gianhap <=0){
					$loii = "Số lượng hoặc giá nhập phải lớn hơn 0!";
				}else{
						//thêm phiếu nhập
						$sqlIPN = "INSERT INTO `import` (`tenncc`, `tenhang`, `tenkho`, `gianhap`, `soluong`, `tonggia`, `dateimport`, `status`, `nguoilap`)
						VALUES ('$ncc', '$hanghoa', '$kho', '$gianhap', '$sluong', '$sum', '$date', '$check', '$tenfull')";
						$resultIPN = $db->query($sqlIPN);
						echo '<script>alert("Thêm mới phiếu nhập thành công"); window.location="../import.php";</script>';
						
						//insert update bảng sản phẩm
						$sqlSP = "SELECT * FROM `sanpham` WHERE tenhangid = '$hanghoa' and tennccid = '$ncc' and 
						tenkhoid = '$kho' and giaxuat = '$gianhap'";
						$resultSP = $db->query($sqlSP);
						$fetch = mysqli_fetch_assoc($resultSP);
						$rowdem = mysqli_num_rows($resultSP);
						if($rowdem > 0 ){
							$tong = $fetch['soluong'] + $sluong;
							$sqlSUP ="UPDATE sanpham SET soluong = '$tong' WHERE tenhangid = '$hanghoa' and tennccid = '$ncc' and 
							tenkhoid = '$kho'";
							$db->query($sqlSUP);
						}else{
							$sqlISPP = "INSERT INTO `sanpham` (`tenhangid`, `tennccid`, `tenkhoid`, `soluong`, `giaxuat`) 
							VALUES ('$hanghoa', '$ncc', '$kho', '$sluong', '$gianhap')";
							// $sqlISPP = "INSERT INTO `sanpham` (`tenhangid`, `tennccid`, `tenkhoid`, `soluong`, `giaxuat`) 
							// VALUES ('$hanghoa', '$ncc', '$kho', '$sluong', '$gianhap')";
							$db->query($sqlISPP);
						}
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
					href="../admin.php">
						<div class="sidebar__nav--icon">
							<i class="fas fa-user-circle" aria-hidden="true"></i>
						</div> <span>Trang chủ</span>
				</a></li>
				<li class="sidebar__nav--item"><a class="sidebar__nav--link"
					href="../goods.php">
						<div class="sidebar__nav--icon">
							<i class="fa fa-american-sign-language-interpreting"
								aria-hidden="true"></i>
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
						<li class="sub__menu--item"><a class="sidebar__nav--link"
								href="../productstock.php">
									<div class="sidebar__nav--icon">
										<i class="fas fa-cart-plus"></i>
									</div> <span>Sản phẩm</span>
							</a></li>
							<li class="sidebar__nav--item"><a
								class="sidebar__nav--link acitve">
								<div class="sidebar__nav--icon">
									<i class="fa fa-users" aria-hidden="true"></i>
								</div> <span>Nhập</span>
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
				<h2>Thêm phiếu nhập</h2>
			</div>
			<c:url value="/user/addimportbill" var="addimportbill"></c:url>
			<form action="add-import.php" method="POST">
				<div class="table__main" style="margin-top: 2rem">
					<div class="row">
						<div class="col-12 col-lg-4 col-md-12">
							<div class="table__block">
								<div class="table__block--input">
									<div class="table--item">
										<lable>Nhà Cung Cấp <br>
										</lable>
										<select name="ncc">
											<option value="0">--Chọn Nhà Cung Cấp--</option>
											<?php
												$sqlNCC = "select * from nhacungcap";
												$dataNCC = $db->getData($sqlNCC);
												foreach($dataNCC as $rowNCC){

											?>
											<option value="<?php echo $rowNCC['id'];?>">
											<?php echo $rowNCC['tenNCC'];?></option>
											<?php } ?>
										</select>
									</div>
									<div class="table--item">
										<lable>Hàng Hóa <br></lable>
										<select name="hanghoa">
										<option value="0">--Chọn Hàng Hóa--</option>
											<?php
												$sqlHH = "select * from hanghoa";
												$dataHH = $db->getData($sqlHH);
												foreach($dataHH as $rowHH){
											?>
											<option value="<?php echo $rowHH['id'];?>">
											<?php echo $rowHH['tenHang'];?></option>
											<?php } ?>
										</select>
									</div>
									<div class="table--item">
										<lable>Kho <br>
										</lable>
										<select name="kho">
										<option value="0">--Chọn Kho--</option>
											<?php
												$sqlK = "select * from kho";
												$dataK = $db->getData($sqlK);
												foreach($dataK as $rowK){
											?>
											<option value="<?php echo $rowK['id'];?>"><?php echo $rowK['tenkho'];?></option>
											<?php } ?>
										</select>
									</div>
									<div class="table--item">
										<lable>Giá Nhập <br>
										</lable>
										<input type="number" name="gianhap" id="txtImportPrice"
											placeholder="Giá Nhập" required="required">
									</div>
									<div class="table--item">
										<lable>Số Lượng <br>
										</lable>
										<input type="number" name="soluong" id="txtSoluong"
											placeholder="Số Lượng" required="required">
									</div>
									<div class="table--item">
										<lable>Ngày Tháng <br>
										</lable>
										<input type="date" name="date" placeholder="Ngày Tháng"
											required="required">
									</div>

								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6 col-md-12">

							<div class="table--item"
								style="display: flex; justify-content: center;">
								<div class="input__active"
									style="display: flex; flex-direction: column;">

									<div
										style="margin-bottom: 1rem; font-size: 1.2rem; font-weight: bold; display: block;">
										<lable>Thành Tiền <br>
										</lable>
										<input style="height: 30px; width: 250px" id="txtTotalPrice"
											value="" name="tongtien" type="text"
											placeholder="Thành Tiền">
									</div>
									<div
										style="margin-top: 30px; display: flex; align-items: center;">
										<lable for="complete"
											style="font-size:2rem;margin-right:2rem;">Xác nhận
										thanh toán</lable>
										<select name="status">
										<option value="0">--Chọn--</option>
											<option value="1">Đã thanh toán</option>
											<option value="2">Chưa thanh toán</option>
										</select>
									</div>

									<div class="signup__main--btn"><span style="color: red; font-size:14px;"><?php if(isset($loi)) echo $loi; if(isset($loii)) echo $loii;?></span></div>	
								</div>
								<div style="margin: 10px" class="table--result">
									<button class="btn btn-link3 result_link"
										style="width: 13rem;" name="thanhtoan">Thanh toán</button>
									<button class="btn btn-link3 result_link"
										style="width: 13rem; color: red; background: #607d8b;"><a href="../import.php">Trở lại</a></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
			<script type="text/javascript">
				var txtPrice = document.getElementById("txtImportPrice");
				var quantity = document.getElementById("txtSoluong");
				var totalPrice = document.getElementById("txtTotalPrice");
				txtPrice.addEventListener('change', function() {
					totalPrice.value = txtPrice.value * quantity.value;
				});
				quantity.addEventListener('change', function() {
					totalPrice.value = txtPrice.value * quantity.value;
				});
			</script>
			<script src="../../static/js/btndel.js"></script>
			<script src="../../static/js/sidebar.js"></script>
			<script src="../../static/js/sub_active.js"></script>
			<script src="../../static/js/active.js"></script>
</body>
</html>