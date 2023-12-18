<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
</head>

<body>
    <nav class="nav navbar navbar-expand-sm  navbar-dark" style="background-color:#35446d ; height: auto;">
    <div style="width: 40px;"></div>
        <div class=" container-fluid">
            <a class="navbar-brand" href=""><img src="../assets/img/Logo.png" alt="" style="height: 100px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="font collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="font navbar-nav">
                    <li class="nav-item">
                        <a class="font nav-link text-light" href="">หน้าหลัก</a>
                    </li>
                    <li class="font nav-item dropdown">
                        <a class="font nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown">รายการอาหาร</a>
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
                        <a class="font nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown">การสั่งซื้อ</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">วิธีการสั่งซื้อ</a></li>
                            <li><a class="dropdown-item" href="#">ติดตามการสั่งซื้อ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="font nav-link text-light" href="">เมนูแนะนำ</a>
                    </li>
                </ul>

                <?php if (empty($this->session->userdata['email'])) { ?>

                    <div style="margin-left:auto;">
                        <div class="font nav-item">
                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page" href="login">เข้าสู่ระบบ</a>
                            </li>
                        </div>
                    </div>
                    <div>
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="register">สมัครสมาชิก</a>
                        </li>
                    </div>
                    <div style="width: 40px;"></div>

                <?php } else { ?>
                    
                    <li class="font nav-item dropdown">
                        <a class="font nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown">
                            <img src="/assets/img/user_icon.png" alt="">
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">แก้ไขโปรไฟล์</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url() . 'logout' ?>">ออกจากระบบ</a></li>
                        </ul>
                    </li>

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