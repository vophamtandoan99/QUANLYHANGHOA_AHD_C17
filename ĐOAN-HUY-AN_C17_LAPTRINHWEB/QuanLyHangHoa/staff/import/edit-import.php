<?php
	session_start();
	$fullname =  $_SESSION['profile']['fullname'];
	$username =  $_SESSION['profile']['username'];
?>
<?php
	 include('../../database/database.php');
	 //getData
	 $sql = "SELECT * FROM import WHERE id = '$_GET[id]'";
	 $result = $db->query($sql);
	 $row = mysqli_fetch_assoc($result);
	 $slcu = $row['soluong'];
	 $idncc = $row['tenncc'];
	 $idhang = $row['tenhang'];
	 $idkho = $row['tenkho'];
	 $th = $row['status'];
?>
<?php
	$sqltenfull = "SELECT * FROM user WHERE fullname = '$fullname'";
	$kqten = $db->query($sqltenfull);
	$rowtenfull = mysqli_fetch_assoc($kqten);
	$tenfull = $rowtenfull['id'];
?>
<?php
	$errro = false;
	if(isset($_POST['editIP'])){
		$ncc = $_POST['selectNCC'];
		$hanghoa = $_POST['selectHang'];
		$kho = $_POST['selectKho'];
		$gianhap = $_POST['txtImportPrice'];
		$sluong = $_POST['txtSoluong'];
		$date = $_POST['Date'];
		$sum = $_POST['tongtien'];
		$totalPrice = $sluong * $gianhap;
		$check = $_POST['status'];
		if(empty($ncc) || empty($hanghoa) || empty($kho) || empty($gianhap) || empty($sluong)|| empty($date) || empty($sluong) || empty($check)){
			$loi = "Dữ liệu nhập vào không hợp lệ!";
			$errro = true;
		}else{
			if($sluong <= 0 || $gianhap <=0){
				$loii = "Số lượng hoặc giá nhập phải lớn hơn 0!";
			}else{ 
				if($idhang == $hanghoa && $idncc == $ncc && $idkho == $kho){
					$sqlUQ = "UPDATE `import` SET `tenhang` = '$hanghoa', `tenncc` = '$ncc', `tenkho` = '$kho',
					`gianhap` = '$gianhap', `soluong` = '$sluong', `tonggia` = $totalPrice, `dateimport` = '$date',
					`status` = '$check' WHERE id = '$_GET[id]'";
					$db->query($sqlUQ);
					echo '<script>alert("Sửa phiếu nhập thành công"); window.location="../import.php";</script>';
					//sản phẩm
					$ktsp = "SELECT * FROM `sanpham` WHERE tenhangid = '$hanghoa' and tennccid = '$ncc' and 
					tenkhoid = '$kho'"; 
					$result1 = $db->query($ktsp);
					$fetch = mysqli_fetch_assoc($result1);
					$rowSP = mysqli_num_rows($result1);
					if($rowSP > 0){
						// có trong sp thì update
						$tong = $fetch['soluong'] - $slcu + $sluong;//lấy số lượng trong sp - số lượng trong import + số lượng mới
						$sqll ="UPDATE sanpham SET soluong = '$tong', giaxuat = '$gianhap'WHERE tenhangid = '$hanghoa' and tennccid = '$ncc' and 
						tenkhoid = '$kho'";
						$db->query($sqll);
					}
				}
				else{
						$quantity = $slcu - $sluong;
						$sqlUPL = "UPDATE `import` SET  `soluong` = '$quantity', `tonggia` = $totalPrice WHERE id = '$_GET[id]'";
						$db->query($sqlUPL);
						//
						$sqlIPN = "INSERT INTO `import` (`tenncc`, `tenhang`, `tenkho`, `gianhap`, `soluong`, `tonggia`, `dateimport`, `status`, `nguoilap`)
						VALUES ('$ncc', '$hanghoa', '$kho', '$gianhap', '$sluong', '$sum', '$date', '$check', '$tenfull')";
						$resultIPN = $db->query($sqlIPN);
						echo '<script>alert("Sửa phiếu nhập thành công"); window.location="../import.php";</script>';
						
						$ktsp = "SELECT * FROM `sanpham` WHERE tenhangid = '$idhang' and tennccid = '$idncc' and 
						tenkhoid = '$idkho'"; 
						$result1 = $db->query($ktsp);
						$fetch = mysqli_fetch_assoc($result1);
						$rowSP = mysqli_num_rows($result1);
						if($rowSP > 0){
							// có trong sp thì update
							$tong1 = $fetch['soluong'] - $sluong;//lấy số lượng trong sp - số lượng trong import + số lượng mới
							$sqll1 ="UPDATE sanpham SET soluong = '$tong1' WHERE tenhangid = '$idhang' and tennccid = '$idncc' and 
							tenkhoid = '$idkho'";
							$db->query($sqll1);
							echo '<script>alert("Sửa phiếu nhập thành công"); window.location="../import.php";</script>';
							//
								$sqlSP = "SELECT * FROM `sanpham` WHERE tenhangid = '$hanghoa' and tennccid = '$ncc' and 
								tenkhoid = '$kho' and giaxuat = '$gianhap'";
								$resultSP = $db->query($sqlSP);
								$fetch = mysqli_fetch_assoc($resultSP);
								$rowdem = mysqli_num_rows($resultSP);
								if($rowdem > 0 ){
									$tong = $fetch['soluong'] + $sluong;
									$sqlSUP ="UPDATE sanpham SET soluong = '$tong' WHERE tenhangid = '$hanghoa' and tennccid = '$ncc' and 
									tenkhoid = '$kho' and giaxuat = '$gianhap'";
									$db->query($sqlSUP);
								}else{
									$sqlISPP = "INSERT INTO `sanpham` (`tenhangid`, `tennccid`, `tenkhoid`, `soluong`, `giaxuat`) 
									VALUES ('$hanghoa', '$ncc', '$kho', '$sluong', '$gianhap')";
									$db->query($sqlISPP);}
					}
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
			<div class="table__top d-flex">
				<h2>Sửa phiếu nhập</h2>
			</div>
			<form action="" method="post">
				<div class="table__main" style="margin-top: 2rem">
					<div class="row">
						<div class="col-12 col-lg-4 col-md-12">
							<div class="table__block">
								<div class="table__block--input">
									<div class="table--item">
										<!-- <input name="id" type="hidden" value="<?php //echo $row['id'];?>"> -->
										<lable>Nhà Cung Cấp <br>
										</lable>
										<select name="selectNCC">
										<?php
											$sqliTH = "SELECT * FROM nhacungcap";
											$kqTH = $db->getData($sqliTH);
										?>
										<?php foreach($kqTH as $rowTH) {?>
											<option value="<?php echo $rowTH['id'];?>"
											<?php if($rowTH['id'] == $idncc){echo "selected";}?>>
											<?php echo $rowTH['tenNCC'];?></option>
										<?php } ?>
										</select>
									</div>
									<div class="table--item">
										<lable>Hàng Hóa <br>
										</lable>
										<select name="selectHang">
											<?php
												$sqliHH = "SELECT * FROM hanghoa";
												$kqHH = $db->getData($sqliHH);
											?>
											<?php foreach($kqHH as $rowHH) {?>
												<option value="<?php echo $rowHH['id'];?>"
												<?php if($rowHH['id'] == $idhang){echo "selected";}?>>
												<?php echo $rowHH['tenHang'];?></option>
											<?php } ?>
										</select>
									</div>
									<div class="table--item">
										<lable>Kho <br>
										</lable>
										<select name="selectKho">
											<?php
												$sqliK = "SELECT * FROM kho";
												$kqK = $db->getData($sqliK);
											?>
											<?php foreach($kqK as $rowK) {?>
												<option value="<?php echo $rowK['id'];?>"
												<?php if($rowK['id'] == $idkho){echo "selected";}?>>
												<?php echo $rowK['tenkho'];?></option>
											<?php } ?>
										</select>
									</div>
									<div class="table--item">
										<lable>Giá Nhập <br>
										</lable>
										<input type="text" name="txtImportPrice" value="<?php echo $row['gianhap'];?>" id="txtImportPrice"
											placeholder="Giá Nhập" required="required">
									</div>
									<div class="table--item">
										<lable>Số Lượng <br>
										</lable>
										<input type="text" name="txtSoluong" id="txtSoluong"
											placeholder="Số Lượng" value="<?php echo $row['soluong'];?>" required="required">
									</div>
									<div class="table--item">
										<lable>Ngày Tháng <br>
										</lable>
										<input type="date" name="Date" value="<?php echo $row['dateimport'];?>" placeholder="Ngày Tháng"
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
											value="<?php echo $row['tonggia'];?>" name="tongtien" type="text"
											placeholder="Thành Tiền">
									</div>
									<div
										style="margin-top: 30px; display: flex; align-items: center;">
										<lable for="complete"
											style="font-size:2rem;margin-right:2rem;">Xác nhận
										thanh toán</lable>
										<select name="status">
										<?php if($th == 1){ ?>
											<option value="1">Đã thanh toán</option>
											<option value="2">Chưa thanh toán</option>
											<?php } elseif($th == 2){?>
											<option value="2">Chưa thanh toán</option>
											<option value="1">Đã thanh toán</option>
										<?php }		
										?>
										</select>
									</div>
									<div class="signup__main--btn">
									<span style="color: red; font-size:14px;"><?php if(isset($loi)) echo $loi; if(isset($loii)) echo $loii; if(isset($loisoluong)) echo $loisoluong?>
									</span>
									</div>
								</div>
								<div style="margin: 10px" class="table--result">
									<button class="btn btn-link3 result_link"
										style="width: 13rem;" name="editIP">Cập nhật</button>
										<button class="btn btn-link3 result_link"
										style="width: 13rem;"><a href="../import.php">Trở lại</a></button>
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

