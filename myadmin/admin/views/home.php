
<?php $this->load->view('header');?>

<div class="contents">
<p><h1>欢迎来到后台首页！
<a href="<?php echo site_url('article/create')?>">添加文章</a><span>/</span>
 <a href="<?php echo site_url('categoryes/create')?>">添加栏目</a></p>
<dl><dt>环境配置信息</dt>
<dd>PHP版本：<?php echo PHP_VERSION;?></dd>
<dd>服务器端信息：<?PHP echo $_SERVER['SERVER_SOFTWARE']; ?></dd>
<dd>服务器操作系统： <?PHP echo PHP_OS; ?></dd>
<dd>运行环境：<?php echo $_SERVER['SERVER_SOFTWARE'];?></dd>
<dd>ip地址：<?php echo $_SERVER['SERVER_ADDR'];?></dd>
<dd>服务器时间：<?php echo date("Y-m-d H:i:s",time());?></dd>
</dl>

<div class="calendar">
<?php echo $this->calendar->generate();?>
</div>

<?php $this->load->view('footer');?>