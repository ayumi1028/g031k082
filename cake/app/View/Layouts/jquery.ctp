<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
<title><?php echo $title_for_layout; ?></title>
 <meta name="viewport" content="width=device-width,minimum-scale=1">
 <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
 <script src="http://code.jquery.com/jquery-1.7.1.min.js"> </script>
 <script type="text/javascript">
 /* ajaxを無効にするための設定　*/
 $(document).bind("mobileinit",function(){
 $.mobile.ajaxEnabled=false;
 $.mobile.pushStateEnabled=false;
 });
 </script>
 <script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('board');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div data-theme="a" data-role="header">
			<h1>掲示板</h1>
			<img src="http://www.pets-hop.com/kenshuimg/shiba.JPG" alt="イラスト" width=80 height=80>
		</div>
		 <div data-role="content">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id = "right">
		
		</div>
		<div data-theme="a" data-role="footer" data-position="fixed">
			<h1>sugawara</h1>
		</div>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>