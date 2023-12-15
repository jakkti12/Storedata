<!DOCTYPE html>
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
</html>