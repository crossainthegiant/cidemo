
<?php $this->load->view('header');?>

<div class="contents">
<h1>密码管理 </h1>
<?php echo form_open('admin/update_pwd');?>
<ul class="create-cate">
 <li><?php echo form_label('旧密码:');?>
 <?php echo form_input('prior_password');?></li>
  <li><?php echo form_label('新密码:');?>
 <?php echo form_password('news_password');?></li>
 <li> <?php echo form_label('重输新密码:');?>
 <?php echo form_password('news_password_again');?></li>
 <li><?php echo form_submit('submit','保存');?></li>
 </ul>
 <?php echo form_close();?>
</div>
<?php $this->load->view('footer');?>