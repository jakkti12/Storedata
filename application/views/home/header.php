<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="/assets/css//bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/style//style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="nav navbar navbar-expand-sm  navbar-dark" style="background-color:#35446d ; height: auto;">
        <div style="width: 40px;"></div>
        <div class=" container-fluid">
            <a class="navbar-brand" href="<?php echo base_url(''); ?>"><img src="/assets/img//Logo.png" alt="" style="height: 150px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="font collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="font navbar-nav">
                    <li class="nav-item">
                        <a class="font nav-link text-light font20" href="<?php echo base_url(''); ?>">หน้าหลัก</a>
                    </li>
                    <li class="font nav-item dropdown">
                        <a class="font nav-link dropdown-toggle text-light font20" href="#" role="button" data-bs-toggle="dropdown">รายการอาหาร</a>
                        <ul class="dropdown-menu">
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
                        <a class="font nav-link dropdown-toggle text-light font20" href="#" role="button" data-bs-toggle="dropdown">การสั่งซื้อ</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">วิธีการสั่งซื้อ</a></li>
                            <li><a class="dropdown-item" href="#">ติดตามการสั่งซื้อ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="font nav-link text-light font20" href="">เมนูแนะนำ</a>
                    </li>
                </ul>

                <?php if (empty($this->session->userdata['email'])) { ?>

                    <div style="margin-left:auto;">
                        <div class="font nav-item">
                            <li class="nav-item">
                                <a class="nav-link active text-light font20" aria-current="page" href="login">เข้าสู่ระบบ</a>
                            </li>
                        </div>
                    </div>
                    <div>
                        <li class="nav-item">
                            <a class="nav-link active text-light font20" aria-current="page" href="register">สมัครสมาชิก</a>
                        </li>
                    </div>
                    <div style="width: 40px;"></div>

                <?php } else { ?>

                    <div style="margin-left:auto;" class="btn-group">
                        <li class="font nav-item navbar-nav">
                            <a class="font nav-link text-light" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-user"></i> 
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <li><a class="dropdown-item" href="edit">
                                    <img src="<?php echo $user_img ?>" class="rounded-circle" alt="" width="50px" height="40px">&nbsp;&nbsp;&nbsp;
                                    <?php
                                    echo $user;
                                    ?>
                                </a></li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo base_url() . 'logout' ?>">
                                    <img src="/assets/img/logout.png" class="rounded-circle" alt="" width="50px" height="40px">&nbsp;&nbsp;&nbsp;
                                    ออกจากระบบ</a>
                                </li>
                            </ul>
                        </li>
                    </div>
                    <div style="width: 100px;"></div>

                <?php } ?>

            </div>
        </div>
    </nav>
    <div class="text-center text-light" style="background-color: #35446d; height: 200px;">
        <h2>ร้านอาหารทะเลแซ่บ</h2>
        <h1 class="spacing">SPICY SEAFOOD</h1>
        <P>รวบรวมอาหารซีฟู้ด แสนอร่อย</P>
    </div>
</body>

</html>