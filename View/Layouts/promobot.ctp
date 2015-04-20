<?php
$page_title = __('PROMOBOT NICARAGUA');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $page_title ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon',$this->Html->url('/favicon.ico'));

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- 	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'> -->
	<!--[if lt IE 9]> <script src="/js/vendor/html5shiv.js"></script> <script src="/js/vendor/respond.min.js"></script> <![endif]-->
</head>
<body data-spy="scroll" data-target="#nav" class="pattern">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
</body>
</html>
