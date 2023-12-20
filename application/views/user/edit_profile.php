<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/assets/css//bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title></title>
</head>

<body>
    <div class="container">
        <div class="row pt-5">
            <div class="col-md-5">
                <?php echo form_open_multipart('edit/profile'); ?>

                <?php if (empty($this->session->userdata['user_img'])) { ?>

                    <div class="text-center">
                        <img src="/assets/img/original/user.png" alt="" style="width: 400px;" />
                    </div>

                <?php } else { ?>

                    <div class="text-center">
                        <img src="<?php echo $user_img ?>" alt="" class="rounded-circle" style="width: 400px;" height="300px" />
                    </div>

                <?php } ?>

                <div class="mt-5 text-center">

                    <input type="file" name="updateprofile" size="20" style="margin-left: 40%;" /><br>
                    <input type="submit" value="เปลี่ยนรูปภาพ" class="mt-4 btn text-white w-25" style="background-color: #D5002C; border-radius: 15px;" />
                    <?php  ?>
                </div>

            </div>
            
            <div class="col-md-7">
                <div class="mb-2">
                    <label for="inputUsername" class="form-label"></label>
                    <input type="text" class="form-control" id="inputUsername" aria-describedby="userHelp" name="user" placeholder="ชื่อ" value="<?php echo $user ?>" style="border-radius: 15px; background-color: #f8f9fa; border: none;" />
                </div>

                <div class="mb-2">
                    <label for="inputEmail" class="form-label"></label>
                    <input type="text" class="form-control" id="inputEmailORTel" aria-describedby="emailHelp" name="email" placeholder="Email" value="<?php echo $email ?>" style="border-radius: 15px; background-color: #f8f9fa; border: none;" />
                </div>

                <div class="mb-4">
                    <label for="inputTel" class="form-label"></label>
                    <input type="text" class="form-control" id="inputEmailORTel" aria-describedby="emailHelp" name="phone" placeholder="เบอร์โทรศัพท์" value="<?php echo $phone_number ?>" style="border-radius: 15px; background-color: #f8f9fa; border: none;" />
                </div>

                <div class="mb-4">
                    <label for="inputPassword" class="form-label"></label>
                    <input type="password" class="form-control" name="password" id="inputPassword" placeholder="รหัสผ่าน" style="border-radius: 15px; background-color: #f8f9fa; border: none;" />
                </div>

                <div class="card">
                    <div class="card-body">
                        <p>ที่อยู่</p>
                        <img src="../assets/img/original/maps.png">
                    </div>
                </div>

                <div class="text-end mb-5">
                    <button type="submit" class="btn text-white w-25" style="background-color: #D5002C; border-radius: 15px;">ตกลง</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>