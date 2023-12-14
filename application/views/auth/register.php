<div>
    <?php $fattr = array('class' => 'form-signin');
    echo form_open(site_url() . 'register', $fattr); ?>
    <input type="text" name="fristname" placeholder="Frist Name">
    <input type="text" name="lastname" placeholder="Last Name">
    <input type="submit">
</div>