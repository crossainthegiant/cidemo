
<?php $this->load->view('header');?>

<div class="contents">
<h1>会员信息管理 <a href="<?php echo site_url('admin/password_admin');?>">修改管理密码</a></h1>
<?php echo form_open('admin/update_user_info');?>
<ul class="create-cate">
<li><?php echo form_label('用户名:');?>
<input type="text" disabled="true" value="<?php echo $user['username'];?>" name="username" placeholder="<?php echo $user['username'];?>" id="uname" style="cursor:not-allowed">
</li>
 <li><?php echo form_label('邮箱:');?>
 <?php echo form_input('email',$user['email']);?></li>
  <li><?php echo form_label('QQ:');?>
 <?php echo form_input('qq',$user['qq']);?></li>
 <li> <?php echo form_label('手机/电话:');?>
 <?php echo form_input('tel',$user['tel']);?></li>
 <li><?php echo form_submit('submit','保存');?></li>
 </ul>
 <?php echo form_close();?>
</div>


<?php $this->load->view('footer');?>