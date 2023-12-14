<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="../../../assets/css/bootstrap.css" rel="stylesheet">
</head>

<body>
  <div class="container pt-2" style="position:relative; top:100px; z-index:3;">
    <?php $fattr = array('class' => 'form-signin');
    echo form_open(site_url() . 'login', $fattr); ?>

    <div class="form-group pt-2">
      <?php echo form_input(array(
        'name' => 'email',
        'id' => 'email',
        'placeholder' => 'Email',
        'class' => 'form-control',
        'value' => set_value('email')
      )); ?>
      <?php echo form_error('email') ?>
    </div>
    <div class="form-group pt-2">
      <?php echo form_password(array(
        'name' => 'password',
        'id' => 'password',
        'placeholder' => 'Password',
        'class' => 'form-control',
        'value' => set_value('password')
      )); ?>
      <?php echo form_error('password') ?>
    </div>
    <?php if ($recaptcha == 'yes') { ?>
      <div style="text-align:center;" class="form-group">
        <div style="display: inline-block;"><?php echo $this->recaptcha->render(); ?></div>
      </div>
    <?php
    }
    echo '<br/>';
    echo form_submit(array('value' => 'Login', 'class' => '')); ?>
    <?php echo form_close(); ?>
  </div>
  <div class="container" style="position: relative; top:100px; z-index:3;">
    <br>
    <a>Not registered?</a>
    <a href="register"><?php echo form_submit(array('value' => 'Register', 'class' => '')); ?></a>
    <?php echo form_close(); ?>
  </div>
</body>

</html>