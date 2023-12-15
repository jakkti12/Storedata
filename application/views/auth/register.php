<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sign up - Workshop For Beginners</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700;800;900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row text-center mt-1">
            <div class="col">
                <div class="w-100 p-1">
                    <img style="width: 300px" src="../assets/img/Logo.png" />
                </div>
            </div>
        </div>
        <div class="row  justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card" style="border-radius: 50px;">
                    <div class="card-body" style="margin: 50px;">
                        <div style="position:relative; top:-20px;" class="text-end">
                            <a href="<?php echo base_url(''); ?>">
                                <img src="../../../assets/img/close.png" alt="" style="width: 15px;">
                            </a>
                        </div>
                        <h4 class="text-center" style="color:#35446D; margin-top: -40px;
                            font-family: 'Inter', sans-serif; 
                             font-weight: 800;">สมัครสมาชิก
                        </h4>


                        <br>
                        <form action="register" method="post">
                            <div class=" mb-2">
                                <input type="text" name="user" value="<?php echo set_value('user') ?>" class="form-control" id="inputFirstname" aria-describedby="emailHelp" placeholder="ชื่อผู้ใช้" style="border-radius: 15px; background-color:#f8f9fa; border: none;" />
                                <div style="color: red;">
                                    <?php echo form_error('user') ?>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="inputEmail" class="form-label"></label>
                                <input type="email" name="email" value="<?php echo set_value('email') ?>" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Email" style="border-radius: 15px; background-color:#f8f9fa; border: none;" />
                                <div style="color: red;"> <?php echo form_error('email') ?> </div>
                            </div>
                            <div class="mb-2">
                                <label for="inputPassword" class="form-label"></label>
                                <input type="text" name="phone" value="<?php echo set_value('phone') ?>" class="form-control" id="telephone" placeholder="เบอร์โทรศัพท์" style="border-radius: 15px; background-color:#f8f9fa; border: none;" />
                                <div style="color: red;"> <?php echo form_error('phone') ?> </div>
                            </div>
                            <div class="mb-2">
                                <label for="inputConfirmPassword" class="form-label"></label>
                                <input type="password" name="password" value="<?php echo set_value('password') ?>" class="form-control" id="inputConfirmPassword" placeholder="รหัสผ่าน" style="border-radius: 15px; background-color:#f8f9fa; border: none;" />
                                <div style="color: red;"> <?php echo form_error('password') ?> </div>

                                <div class="mb-2">
                                    <label for="inputConfirmPassword" class="form-label"></label>
                                    <input type="password" name="passconf" value="<?php echo set_value('passconf') ?>" class="form-control" id="inputConfirmPassword" placeholder="ยืนยันรหัสผ่าน" style="border-radius: 15px; background-color:#f8f9fa; border: none;" />
                                    <div style="color: red;"> <?php echo form_error('passconf') ?> </div>
                                    <br>
                                    <center>
                                        <button type="submit" class="btn btn w-50 text-light" style="background-color: #35446D; border-radius: 20px; font-family: 'Inter', sans-serif; font-weight: 100px;">
                                            ตกลง
                                        </button>
                                    </center>
                        </form>
                        <div class="pt-3"><center>
                            <a>เป็นสมาชิกแล้วหรือไม่? </a>
                            <a href="<?php echo base_url('auth/login'); ?>" style="font-weight: 600; text-decoration:none; color:black">เข้าสู่ระบบ</a>
                        </div></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>