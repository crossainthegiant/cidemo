
<?php $this->load->view('header');?>

<div class="contents">
<h1>站点设置 </h1>
<?php echo form_open('setting/site_update');?>
<ul class="create-article">
 <li><?php echo form_label('站点名称:');?>
 <?php echo form_input('sitename',$setting['sitename']);?></li>
  <li><?php echo form_label('站点地址:');?>
 <?php echo form_input('siteurl',$setting['siteurl']);?></li>
 <li> <?php echo form_label('Keywords:');?>
 <?php echo form_input('keywords',$setting['keywords']);?></li>
  <li> <?php echo form_label('Description:');?>
 <?php echo form_textarea('description',$setting['description']);?></li>
 <li><?php echo form_submit('submit','保存');?></li>
 </ul>
 <?php echo form_close();?>
</div>


<?php $this->load->view('footer');?>