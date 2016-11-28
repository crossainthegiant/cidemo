<?php $this->load->view('header');?>
<meta http-equiv="refresh" content="<?php echo $refreshTime?>;url=<?php echo site_url($url);?>"/> 

<div class="contents">
<h1>信息提示！ </h1>
 <div class="section">
        <div class="formTips-mod" >
			<h3><?php echo $Tips;?></h3>
			<p><?php echo $refreshTime?>秒后系统将自动跳转</p>
				<p><a href="<?php echo site_url($url);?>">返回</a></p>
		</div>
 </div>

</div>		
<?php $this->load->view('footer');?>