<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Account</title>
  <link href="../assets/css/bootstrap.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@900&family=Lato&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container">
    <div class="text-center">
      <img style="width: 300px" src="../assets/img/Logo.png" />
    </div>
    <form action="login" method="post">
      <div class="row mt-5 justify-content-center">
        <div class="col-md-8 col-lg-6">
          <div class="card" style="border-radius: 50px;">
            <div class="card-body" style="margin-left: 40px; margin-right: 40px;">
              <div class="row text-center">
                <div style="position:relative; top:20px;" class="text-end">
                  <a href="<?php echo base_url(''); ?>">
                    <img src="../../../assets/img/close.png" alt="" style="width: 15px;">
                  </a>
                </div>
                <h4 style="color: #35446D; font-weight: 800; font-family: 'Inter', sans-serif;
                font-family: 'Lato', sans-serif;">เข้าสู่ระบบ</h4>
              </div>
              <div class="form-group mb-2">
                <label for="inputEmail" class="form-label"></label>
                <input name="email" value="<?php echo set_value('email') ?>" type="email" class="form-control" id="inputEmailORTel" aria-describedby="emailHelp" placeholder="เบอร์โทรศัพท์ / Email" style="border-radius: 15px; background-color: #f8f9fa; border: none;" />
                <?php echo form_error('email') ?>
              </div>
              <div class="form-group mb-2">
                <label for="inputPassword" class="form-label"></label>
                <input name="password" value="<?php echo set_value('password') ?>" type="password" class="form-control" id="inputPassword" placeholder="รหัสผ่าน" style="border-radius: 15px; background-color: #f8f9fa; border: none;" />
                <?php echo form_error('password') ?>
              </div>
              <div class="text-end mb-3">
                <a href="/" class="link-primary" style="text-decoration:none;">ลืมรหัสผ่าน</a>
              </div>
              <div class="text-center">
                <?php if ($recaptcha == 'yes') { ?>
                  <div style="text-align:center;" class="form-group">
                    <div style="display: inline-block;"><?php echo $this->recaptcha->render(); ?></div>
                  </div>
                <?php
                } ?>
                <button type="submit" class="btn text-white w-25" style="background-color: #35446D; border-radius: 15px;">ตกลง</button>
                <?php echo form_close(); ?>
              </div>
              <div class="text-center mt-3">
                <p class="text-secondary">คุณมีบัญชีแล้วหรือยัง ? <a href="<?php echo base_url('auth/register'); ?>" class="link-primary" style="color: #35446D; font-weight: 800; text-decoration:none;">สมัครสมาชิก</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  </div>
  <script src="../assets/js/bootstrap.js"></script>
</body>