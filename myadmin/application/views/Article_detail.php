<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $article['title'];?></title>

	
</head>
<body>

<div id="container">
	<h1><?php echo $article['title'];?></h1>

	<div id="body">
<?php echo $article['contents'];?>
	</div>


	</div>

</body>
</html>