<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>后台管理</title>
<base href="<?php echo base_url().'admin/views/'; ?>;"/>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery.js"></script>

</head>
<body>
<div class="topbar">
<!--<a class="logo" href="--><?php //echo site_url('home/index');?><!--"><i class="iconfont">&#xe613;</i></a>-->
<a class="name">管理后台页面</a>
<a class="login-out" href="<?php echo site_url('login/login_out');?>"><i class="iconfont">&#xe76c;</i></a>
<a class="user">Hi,<?php echo $this->session->username;?></a>
</div>
<div class="view-body">
<div class="sidebar">

<ul>
    <li class="cate" ><a <?php if($this->uri->segment(1)=='home')?> href="<?php echo site_url('home/index');?>">首页</a></li>
<li class="cate" ><a <?php if($this->uri->segment(1)=='categoryes')?> href="<?php echo site_url('categoryes');?>">栏目管理</a></li>
<li class="cate" ><a <?php if($this->uri->segment(1)=='article')?>  href="<?php echo site_url('article/index');?>">文章管理</a></li>
<li class="cate" ><a <?php if($this->uri->segment(1)=='admin')?> href="<?php echo site_url('admin');?>">会员设置</a></li>
<li class="cate" ><a <?php if($this->uri->segment(1)=='setting')?> href="<?php echo site_url('setting');?>">网站设置</a></li>
</ul>
</div>