<?php
	session_start();
	$fullname =  $_SESSION['profile']['fullname'];
	$username =  $_SESSION['profile']['username'];
?>
<?php
	include('../../database/database.php');
?>
<?php
	$rt = $_GET['id'];
    $sqlVSP = "SELECT * FROM export WHERE id = $rt";
	$yl = $db->query($sqlVSP);
	$datakq = mysqli_fetch_assoc($yl);
	$slll = $datakq['soluong'];
	$giagia = $datakq['giaxuat'];
	$idkho = $datakq['tenkhoid'];
	$idncc = $datakq['nccid'];
	$idhh = $datakq['tenhangid'];
	
?>
<?php
	$sqltenfull = "SELECT * FROM user WHERE fullname = '$fullname'";
	$kqten = $db->query($sqltenfull);
	$rowtenfull = mysqli_fetch_assoc($kqten);
	$tenfull = $rowtenfull['id'];
?>
<?php
      if(isset($_POST['thanhtoan'])){
          $kho = $_POST['kho'];
          $hanghoa = $_POST['hanghoa'];
		  $ncc = $_POST['ncc'];
		  $daily = $_POST['daily'];
          $giaxuat = $_POST['giaxuat'];
          $sluong = $_POST['soluong'];
          $sum = $_POST['tongtien'];
		  $check = $_POST['status'];
		  $date = $_POST['date'];
		  $id = $_POST['id'];

			if(empty($daily) || empty($giaxuat)|| empty($sluong) || empty($date) || empty($check)){
				$loi = "Dữ liệu nhập vào không hợp lệ";
			}
			else{
				if($sluong <= 0 && $sluong > $slll || $giaxuat <= 0 && $giaxuat > $giagia){
					$loii = "Số lượng hoặc giá xuất không hợp lệ!";
				}
				else{
						// thêm phiếu xuất
						$total = ($giaxuat+($giaxuat*5/100))*$sluong;
						$sqlIPN = "UPDATE `export` SET `dailyid` = '$daily', `giaxuat` = '$giaxuat', `soluong` = '$sluong', `tonggia` = '$sum',
						 `ngayxuat` = '$date', `status` = '$check' WHERE `export`.`id` = '$rt'";
						$db->query($sqlIPN);
						echo '<script>alert("Sửa phiếu xuất thành công"); window.location="../export.php";</script>';

						//trừ số lượng update bảng sản phẩm
						$sqlSP = "SELECT * FROM sanpham WHERE tenhangid = '$idhh' and tennccid = '$idncc' and tenkhoid = '$idkho'";
						$resultSP = $db->query($sqlSP);
						$fetch = mysqli_fetch_assoc($resultSP);
						$gh = $fetch['soluong'];
						$tong = $gh + $slll - $sluong;
							if($sluong <= $gh){
								$sqlSUP ="UPDATE sanpham SET soluong = '$tong' WHERE tenhangid = '$hanghoa' and tennccid = '$ncc' and tenkhoid = '$kho' ";
								$db->query($sqlSUP);
							}else if($gh <=0){
								$loiii = "Sản phẩm đã hết hàng";
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
<title>Xuất Hàng</title>
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
							<li class="sub__menu--item"><a class="sidebar__nav--link"
								href="../import.php">
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
				<h2>Sửa phiếu xuất</h2>
			</div>
			<form action="" method="POST">
				<div class="table__main" style="margin-top: 2rem">
					<div class="row">
						<div class="col-12 col-lg-4 col-md-12">
							<div class="table__block">
								<div class="table__block--input">
									<div class="table--item">
											<lable>Kho <br>
											</lable>
											<input type="hidden" name = "id" value = "<?php echo $rt; ?>"/>
											<select name="kho">
												<?php
													$idTH = $datakq['tenkhoid'];
													$sqlK = "SELECT * FROM kho WHERE id = $idTH";
													$dataKOP = $db->query($sqlK);
													$dataK = mysqli_fetch_assoc($dataKOP);

												?>
												<option value="<?php echo $dataK['id'];?>"><?php echo $dataK["tenkho"];?></option>
											</select>
									</div>
									<div class="table--item">
										<lable>Hàng Hóa <br></lable>
										<select name="hanghoa">
											<?php
												$idHH = $datakq['tenhangid'];
												$sqlHH = "SELECT * FROM hanghoa WHERE id = $idHH";
												$resultyu = $db->query($sqlHH);
												$dataHH = mysqli_fetch_assoc($resultyu );
											?>
											<option value="<?php echo $dataHH['id'];?>">
											<?php echo $dataHH["tenHang"];?></option>
										</select>
									</div>
									<div class="table--item">
										<lable>Nhà Cung Cấp <br>
										</lable>
										<select name="ncc">
											<?php
												$idncc = $datakq['nccid'];
												$sqlNCC = "SELECT * FROM nhacungcap WHERE id = $idncc";
												$dataNCCiop = $db->query($sqlNCC);
												$dataNCC = mysqli_fetch_assoc($dataNCCiop);
											?>
											<option value="<?php echo $dataNCC['id'];?>">
											<?php echo $dataNCC["tenNCC"];?></option>
										</select>
									</div>
									<div class="table--item">
										<lable>Nhà Đại Lý<br>
										</lable>
										<select name="daily">
											<?php
												$sqlDL = "SELECT * FROM daily";
												$dataDL = $db->getData($sqlDL);
											?>
											<?php foreach($dataDL as $rowDL) {?>
												<option value="<?php echo $rowDL['id'];?>"
												<?php if($rowDL['id'] == $idkho){echo "selected";}?>>
												<?php echo $rowDL['tenDL'];?></option>
											<?php } ?>
										</select>
									</div>
									<div class="table--item">
										<lable>Giá xuất(%)<br>
										</lable>
										<input type="text" id="txtExportPrice" name="giaxuat"
											placeholder="Đơn giá" required="required" value="<?php echo $datakq['giaxuat'];?>">
										<input type="text" value="Giá nhập kho: <?php echo $datakq['giaxuat'];?>" class="item-input"  disabled>
									</div>
									<div class="table--item">
										<lable>Số Lượng <br>
										</lable>
										<input type="text" name="soluong" id="txtSoluong"
											placeholder="Số Lượng Xuất" required="required" value="<?php echo $datakq['soluong'];?>">
										<input type="text" value="Số lượng trong kho: <?php echo $datakq['soluong'];?>" class="item-input"  disabled>
									</div>
									<div class="table--item">
										<lable>Ngày Tháng <br>
										</lable>
										<input type="date" name="date" placeholder="Ngày Tháng"
											required="required" value="<?php echo $datakq['ngayxuat'];?>">
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
											value="<?php echo $datakq['tonggia'];?>" name="tongtien" type="text"
											placeholder="Thành Tiền">


									</div>
									<div
										style="margin-top: 30px; display: flex; align-items: center;">
										<lable for="complete"
											style="font-size:2rem;margin-right:2rem;">Xác nhận
										thanh toán</lable>
										<select name="status">
										<?php if($datakq['status'] == 1){ ?>
											<option value="1">Đã thanh toán</option>
											<option value="2">Chưa thanh toán</option>
											<?php } elseif($datakq['status'] == 2){?>
											<option value="2">Chưa thanh toán</option>
											<option value="1">Đã thanh toán</option>
										<?php }		
										?>
										</select>
									</div>
								</div>
								<div class="signup__main--btn"><span style="color: red; font-size:14px;"><?php if(isset($loi)) echo $loi; if(isset($loii)) echo $loii;?></span></div>

								<div style="margin: 10px" class="table--result">
									<button  name="thanhtoan" class="btn btn-link3 result_link"
										style="width: 13rem;">Thanh toán</button>
								</div>
								<div style="margin: 10px" class="table--result">
									<button class="btn btn-link3 result_link"
										style="width: 13rem;"><a href="../export.php">Trở về</a></button>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</form>
			<script type="text/javascript">
				var txtPrice = document.getElementById("txtExportPrice");
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

