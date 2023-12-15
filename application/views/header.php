<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Document</title>
	<link href="../../assets/js/bootstrap.js" rel="stylesheet" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
</head>

<body>
	<nav class="nav navbar navbar-expand-sm  navbar-dark" style="background-color:#35446d ; margin-top: -20px; height: auto;">
		<div class="container-fluid">
			<a class="navbar-brand" href="<?php echo base_url('') ?>"><img src="../assets/img/Logo.png" alt="" style="height: 150px;"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="font collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="font navbar-nav">
					<li class="nav-item">
						<a class="font nav-link text-light" href="<?php echo base_url('') ?>" style="font-weight:700;">หน้าหลัก</a>
					</li>
					<li class="font nav-item dropdown">
						<a class="font nav-link dropdown-toggle text-light" href="#" style="font-weight:700;" role="button" data-bs-toggle="dropdown">รายการอาหาร</a>
						<ul class="dropdown-menu" style="font-weight:700; font-size:16px;">
							<li><a class="dropdown-item" href="#">เมนู ปู</a></li>
							<li><a class="dropdown-item" href="#">เมนู กุ้ง</a></li>
							<li><a class="dropdown-item" href="#">เมนู ปลาหมึก</a></li>
							<li><a class="dropdown-item" href="#">เมนู ปลา</a></li>
							<li><a class="dropdown-item" href="#">เมนู ข้าว</a></li>
							<li><a class="dropdown-item" href="#">เมนู หอย</a></li>
							<li><a class="dropdown-item" href="#">เมนู น้ำดื่ม</a></li>
						</ul>
					</li>
					<li class="font nav-item dropdown">
						<a class="font nav-link dropdown-toggle text-light" href="#" style="font-weight:700;" role="button" data-bs-toggle="dropdown">การสั่งซื้อ</a>
						<ul class="dropdown-menu" style="font-weight:700; font-size:16px;">
							<li><a class="dropdown-item" href="#">วิธีการสั่งซื้อ</a></li>
							<li><a class="dropdown-item" href="#">ติดตามการสั่งซื้อ</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="font nav-link text-light" href="" style="font-weight:700;">เมนูแนะนำ</a>
					</li>
				</ul>
				<?php if (empty($this->session->userdata['email'])) { ?>

					<div style="margin-left:auto;">
						<div class="font nav-item">
							<li class="nav-item">
								<a class="nav-link active text-light" aria-current="page" href="<?php echo base_url('login') ?>" style="font-weight:700;">เข้าสู่ระบบ</a>
							</li>
						</div>
					</div>
					<div>
						<li class="nav-item">
							<a class="nav-link active text-light" aria-current="page" href="<?php echo base_url('register') ?>" style="font-weight:700;">สมัครสมาชิก</a>
						</li>
					</div>
				<?php } else { ?>
					<div style="margin-left:auto;">
						<div class="font nav-item">
							<li class="nav-item">
							<li class="font nav-item dropdown">
						<a class="font nav-link dropdown-toggle text-light" href="#" style="font-weight:700;" role="button" data-bs-toggle="dropdown">
							<img src="" alt="">
						</a>
						<ul class="dropdown-menu" style="font-weight:700; font-size:16px;">
							<li><a class="dropdown-item" href="#">เมนู ปู</a></li>
							<li><a class="dropdown-item" href="<?php echo base_url() . 'logout' ?>">Log Out</a></li>
						</ul>
					</li>
							</li>
						</div>
					</div>    
				<?php } ?>
			</div>
		</div>
	</nav>
	<div class="text-center text-light" style="background-color: #35446d; height: 200px;">
		<h2>ร้านอาหารทะเลแซ่บ</h2>
		<H2>SPICY SEAFOOD</H2>
		<P>รวบรวมอาหารซีฟู้ด แสนอร่อย</P>
	</div>
</body>

</html>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .font{
        font-weight: 800;
    }
</style>
<body>
    <div class="font">
        123
    </div>
    <?php if (empty($this->session->userdata['email'])) { ?>
        <a href="<?php echo base_url('auth/login') ?>">login</a>
    <?php } else { ?>
    <a class="dropdown-item" href="<?php echo base_url() . 'logout' ?>">Log Out</a>
    <?php } ?>
</body>
</html> -->