<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>后台管理</title>
    <base href="<?php echo base_url() . 'admin/views/'; ?>;"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<div class="login">
    <?php echo validation_errors(); ?>
    <?php echo form_open('login/check'); ?>
    <ul>
        <li>
            <?php echo form_label('User:'); ?>
            <?php echo form_input('username', set_value('username')); ?>
        </li>
        <li>
            <?php echo form_label('Password:'); ?>
            <?php echo form_password('password', set_value('password')); ?>
        </li>
        <li>
            <?php echo form_submit('submit', 'Login'); ?>
        </li>
    </ul>
    <?php echo form_close(); ?>


</div>

</body>
</html>