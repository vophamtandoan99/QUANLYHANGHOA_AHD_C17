<?php
	session_start();
	$fullname =  $_SESSION['profile']['fullname'];
	$username =  $_SESSION['profile']['username'];
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--FontFamily-->
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&amp;display=swap">
<!--Plugin-->
<link rel="stylesheet" href="../static/css/_grid.css">
<link rel="stylesheet" href="../static/css/owl.carousel.min.css">
	<link rel="stylesheet" href="../static/css/owl.carousel.css">
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
								</div>
								<span><?php echo $username;?></span>
						</a></li>
						<c:url value="/logout" var="logoutURL"></c:url>
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
			<li class="sidebar__nav--item"><a
				class="sidebar__nav--link acitve">
					<div class="sidebar__nav--icon">
						<i class="fas fa-user-circle" aria-hidden="true"></i>
					</div>
					<span>Trang chủ</span>
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
								href="productStock.php">
									<div class="sidebar__nav--icon">
										<i class="fab fa-product-hunt"></i>
									</div>
									<span>Sản Phẩm </span>
							</a></li>
							<c:url value="/user/import" var="ImportURL"></c:url>
							<li class="sub__menu--item"><a class="sidebar__nav--link"
								href="import.php">
									<div class="sidebar__nav--icon">
										<i class="fas fa-cart-plus"></i>
									</div>
									<span>Nhập </span>
							</a></li>
							<c:url value="/user/export" var="ExportURL"></c:url>
							<li class="sub__menu--item"><a class="sidebar__nav--link"
								href="export.php">
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
			<div class="table--main">
				<div id="team_slide " class="team_slide owl-carousel owl-loaded owl-drag">
        <div class="owl-stage-outer">
            <div class="owl-stage"
                style="transform: translate3d(-520px, 0px, 0px); transition: all 0.25s ease 0s; width: 2080px;">
              
                <div class="owl-item cloned" style="width: 250px; margin-right: 10px;">
                    <div class="block_team ">
                        <div class="img_team ">
                            <img class="pts_team " src="../static/images/an.jpg">
                            <a href="" class="link_img__team">
                                <i class="fab fa-angrycreative"></i>
                            </a>
                        </div>
                        <h6>Ngọc An</h6>
                        <h3>
                            Staff
                        </h3>
                        <div class="list_icon d-flex">
                            <a href="https://www.facebook.com/Mr.An1904"><i class="fab fa-facebook-f"></i></a>
                            <a><i class="fab fa-twitter"></i></a>
                            <a><i class="fab fa-google " ></i></a>
                              <a><i class="fa fa-info-circle " aria-hidden="true "></i></a>
                        </div>
                    </div>
                </div>
        
                <div class="owl-item active" style="width: 250px; margin-right: 10px;">
                    <div class="block_team ">
                        <div class="img_team ">
                              <img class="pts_team " src="../static/images/huy.jpg">
                            <a href="" class="link_img__team">
                              <i class="fab fa-angrycreative"></i>
                            </a>
                        </div>
                        <h6>Khắc Huy</h6>
                        <h3>
                            Admin
                        </h3>
                       <div class="list_icon d-flex">
                            <a href="https://www.facebook.com/tom.cuill"><i class="fab fa-facebook-f"></i></a>
                            <a><i class="fab fa-twitter"></i></a>
                            <a><i class="fab fa-google " ></i></a>
                              <a><i class="fa fa-info-circle " aria-hidden="true "></i></a>
                        </div>

                    </div>
                </div>
                <div class="owl-item" style="width: 250px; margin-right: 10px;">
                    <div class="block_team ">
                        <div class="img_team ">
                              <img class="pts_team " src="../static/images/doan.jpg">
                            <a href="" class="link_img__team">
                                <i class="fab fa-angrycreative"></i>
                        </div>
                        <h6>Tấn Đoan</h6>
                        <h3>
                            Admin
                        </h3>
                       <div class="list_icon d-flex">
                            <a href="https://www.facebook.com/vopham.tandoan.py"><i class="fab fa-facebook-f"></i></a>
                            <a><i class="fab fa-twitter"></i></a>
                            <a><i class="fab fa-google " ></i></a>
                              <a><i class="fa fa-info-circle " aria-hidden="true "></i></a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
       
    </div>
			</div>
		</div>
		
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js "></script>
			<script src="../static/js/slider.js"></script>
			<script src="../static/js/owl.carousel.js"></script>
			
			<script src="../static/js/sidebar.js"></script>
	<script src="../static/js/sub_active.js"></script>
	<script src="../static/js/active.js"></script>
	</div>
</body>
</html>