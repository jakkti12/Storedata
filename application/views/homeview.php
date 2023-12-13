<?php
echo 'hellow';
?>

<?php if (empty($this->session->userdata['email'])) {
} else { ?>
            <a href="<?php echo base_url() . 'logout' ?>">Log Out</a>
<?php } ?>
