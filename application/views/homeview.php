<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <h1>hello</h1>
<body>
    <?php if (empty($this->session->userdata['email'])) {
    } else { ?>
        <a href="<?php echo base_url() . 'logout' ?>">Log Out</a>
    <?php } ?>
</body>

</html>