<?php
	session_start();
	$fullname =  $_SESSION['profile']['fullname'];
	$username =  $_SESSION['profile']['username'];
	require_once('../database/database.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Trang chủ</title>
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
		<div class="nav d-flex">
			<div class="nav__left d-flex">
				<div class="nav__left--icon nav-icon">
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
			<li class="nav__right--item"><a style="font-size: 15px;" class="nav__right--link"><?php echo $fullname;?></a></li>
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
	</div>
	<div class="sidebar">
		<ul class="sidebar__nav">
			<li class="sidebar__nav--item"><a
				class="sidebar__nav--link acitve">
					<div class="sidebar__nav--icon">
						<i class="fas fa-user-circle" aria-hidden="true"></i>
					</div>
					<span>Trang chủ</span>
			</a></li>
			<li class="sidebar__nav--item"><a class="sidebar__nav--link"
				href="goods.php">
					<div class="sidebar__nav--icon">
						<i class="fa fa-american-sign-language-interpreting"
							aria-hidden="true"></i>
					</div>
					<span>Quản Lý Hàng Hóa</span>
			</a></li>
			<li class="sidebar__nav--item"><a class="sidebar__nav--link"
				href="warehouse.php">
					<div class="sidebar__nav--icon">
						<i class="fa fa-archive" aria-hidden="true"></i>
					</div>
					<span>Quản Lý Kho</span>
			</a></li>
			<li class="sidebar__nav--item"><a class="sidebar__nav--link"
				href="customer.php">
					<div class="sidebar__nav--icon">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div>
					<span>Quản Lý Đại Lý</span>
			</a></li>
			<li class="sidebar__nav--item"><a class="sidebar__nav--link"
				href="supplier.php">
					<div class="sidebar__nav--icon">
						<i class="fab fa-staylinked"></i>
					</div>
					<span>Quản Lý Nhà C.Cấp</span>
			</a></li>
			<li class="sidebar__nav--item"><a class="sidebar__nav--link"
				href="user.php">
					<div class="sidebar__nav--icon">
						<i class="fa fa-users" aria-hidden="true"></i>
					</div>
					<span>Quản Lý Nhân Viên</span>
			</a></li>
			<li class="sidebar__nav--item" data-block="id1">
			<a
				class="sidebar__nav--link ">
					<div class="sidebar__nav--icon">
						<i class="fas fa-store"></i>
					</div>
					<span>Kho</span>
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
								</div>
								<span>Sản Phẩm </span>
						</a></li>
						<li class="sub__menu--item"><a class="sidebar__nav--link"
							href="import.php">
								<div class="sidebar__nav--icon">
									<i class="fas fa-cart-plus"></i>
								</div>
								<span>Nhập </span>
						</a></li>
						<c:url value="/admin/export" var="ExportURL"></c:url>
						<li class="sub__menu--item"><a class="sidebar__nav--link"
							href="export.php">
								<div class="sidebar__nav--icon">
									<i class="fas fa-file-export"></i>
								</div>
								<span>Xuất</span>
						</a></li>
					</ul>
				</div></li>
				
				<li class="sidebar__nav--item" data-block="id2"><a
				class="sidebar__nav--link">
					<div class="sidebar__nav--icon">
						<i class="fas fa-file-signature"></i>
					</div>
					<span>Thống Kê</span>
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
		<div class="table--main">
			<div class="row">
				<div class="col-12 col-md-6 col-lg-3">
					<div class="counter bg-primary">
						<p>
							<i class="fa fa-tasks" aria-hidden="true"></i>
						</p>
					<?php 
						 $sql = "SELECT * FROM user";
						 $data = $db->getData($sql);
						 $numNV = count($data);
					?>
						<h3><?php echo $numNV;?></h3>
						<p>Tổng nhân viên</p>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-3">
					<div class="counter bg-warning">
						<p>
							<i class="fa fa-spinner" aria-hidden="true"></i>
						</p>
						<?php 
						 $sqlSP = "SELECT * FROM sanpham";
						 $dataSP = $db->getData($sqlSP);
						 $numSP = count($dataSP);
						?>
						<h3><?php echo $numSP;?></h3>
						<p>Số sản phẩm</p>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-3">
					<div class="counter bg-sucses">
						<p>
							<i class="fa fa-snowflake-o" aria-hidden="true"></i>
						</p>
						<?php 
							$sqlIP = "SELECT * FROM import WHERE status = 2"; 
							$dataListIP = $db->getData($sqlIP);
							$dem = count($dataListIP);
							$sum = "0";
							foreach($dataListIP as $tl){
								$sum += $tl['tonggia'];
							}$sum;
						?>
						<h3><?php echo $sum;?></h3>
						<p>Tổng công nợ nhập</p>
						
					</div>
				</div>
				
				<div class="col-12 col-md-6 col-lg-3">
					<div class="counter bg-danger">
						<p>
							<i class="fa fa-bug" aria-hidden="true"></i>
						</p>
						<?php $sqlEX = "SELECT * FROM export WHERE status = 2"; 
							$dataListEX = $db->getData($sqlEX);
							$dem = count($dataListEX);
							$sumM = "0";
							foreach($dataListEX as $tlM){
								$sumM += $tlM['tonggia'];
							}$sumM;?>
						<h3><?php echo $sumM;?></h3>
						<p>Tổng công nợ xuất</p>
					</div>
				</div>
			</div>
		</div>
		<div class="chart">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card__header">			
						</div>
						<div class="card__content"></div>
						
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<script src="../static/js/chartjs.js"></script>
	<script src="../static/js/sidebar.js"></script>
	<script src="../static/js/sub_active.js"></script>
	<script src="../static/js/active.js"></script>
	<script>
				//chart data
		var chartjson = {
			"title": "Thống Kê Hàng Hóa ",
			"data": [{
				"name": "Sơn Hòa",
				"score": <?php echo 13;?>
			}, {
				"name": "Tây Hòa",
				"score": 73
			}, {
				"name": "Phú Hòa",
				"score": 20
			}, {
				"name": "Tuy Hòa",
				"score": 89
			}, {
				"name": "Đông Hòa",
				"score": 24
			}, {
				"name": "Sông Hinh",
				"score": 86
			}, {
				"name": "Sông Cầu",
				"score": 96
			}, {
				"name": "Tuy An",
				"score": 71
			}],
			"xtitle": "Secured Marks",
			"ytitle": "Marks",
			"ymax": 100,
			"ykey": 'score',
			"xkey": "name",
			"prefix": "%"
		}

		//chart colors
		var colors = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen'];

		//constants
		var TROW = 'tr',
			TDATA = 'td';

		var chart = document.createElement('div');
		//create the chart canvas
		var barchart = document.createElement('table');
		//create the title row
		var titlerow = document.createElement(TROW);
		//create the title data
		var titledata = document.createElement(TDATA);
		//make the colspan to number of records
		titledata.setAttribute('colspan', chartjson.data.length + 1);
		titledata.setAttribute('class', 'charttitle');
		titledata.innerText = chartjson.title;
		titlerow.appendChild(titledata);
		barchart.appendChild(titlerow);
		chart.appendChild(barchart);

		//create the bar row
		var barrow = document.createElement(TROW);

		//lets add data to the chart
		for (var i = 0; i < chartjson.data.length; i++) {
			barrow.setAttribute('class', 'bars');
			var prefix = chartjson.prefix || '';
			//create the bar data
			var bardata = document.createElement(TDATA);
			var bar = document.createElement('div');
			bar.setAttribute('class', colors[i]);
			bar.style.height = chartjson.data[i][chartjson.ykey] + prefix;
			bardata.innerText = chartjson.data[i][chartjson.ykey] + prefix;
			bardata.appendChild(bar);
			barrow.appendChild(bardata);
		}

		//create legends
		var legendrow = document.createElement(TROW);
		var legend = document.createElement(TDATA);
		legend.setAttribute('class', 'legend');
		legend.setAttribute('colspan', chartjson.data.length);

		//add legend data
		for (var i = 0; i < chartjson.data.length; i++) {
			var legbox = document.createElement('span');
			legbox.setAttribute('class', 'legbox');
			var barname = document.createElement('span');
			barname.setAttribute('class', colors[i] + ' xaxisname');
			var bartext = document.createElement('span');
			bartext.innerText = chartjson.data[i][chartjson.xkey];
			legbox.appendChild(barname);
			legbox.appendChild(bartext);
			legend.appendChild(legbox);
		}
		barrow.appendChild(legend);
		barchart.appendChild(barrow);
		barchart.appendChild(legendrow);
		chart.appendChild(barchart);
		document.querySelector('.card__content').innerHTML = chart.outerHTML;
	</script>

</body>
</html>
