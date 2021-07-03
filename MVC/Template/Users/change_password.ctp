<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
		<meta name="author" content="GeeksLabs">
		<meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
		<link rel="shortcut icon" href="/Demo/cakephp_3_2/img/favicon.png">
		<title>Admin | CakePHP 3.2</title>
		<?php echo $this->Html->css(['bootstrap.min','bootstrap-theme','elegant-icons-style','font-awesome','style','style-responsive']); ?>
		<style>
		.error  {
			color:red;
		}
		.login-img1 {
			font-size: 30px;
			font-weight: normal;
			color: #34aadc;
			align: center;
			margin-left: 15%;
			margin-buttom: 15%;
		}
		</style>
	</head>
	<body class="login-img3-body">
		<div class="container">
			
			<?= $this->Form->create(null,['class'=>'login-form form-validate']) ?>
			
				<div class="login-wrap">			
<h3 class="login-img1">Change Password</h3>				
					<?= $this->Flash->render('flash'); ?>
					<div class="input-group">
						<span class="input-group-addon"><i class="icon_key_alt"></i></span>
						<input type="text" class="form-control" placeholder="Old Password" name="email" autofocus required>
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="icon_key_alt"></i></span>
						<input type="password" class="form-control" placeholder="New Password" name="password" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="icon_key_alt"></i></span>
						<input type="password" class="form-control" placeholder="New Password" name="password" required>
					</div>
					<button class="btn btn-primary btn-lg btn-block" type="submit">Save</button>
					<button class="btn btn-info btn-lg btn-block" type="clear">Clear</button>
				</div>
			<?= $this->Form->end() ?>
		</div>
			<?php echo $this->HTML->script(['jquery','jquery-ui-1.10.4.min','jquery-1.8.3.min','jquery-ui-1.9.2.custom.min','bootstrap.min','jquery.scrollTo.min','jquery.nicescroll','jquery.sparkline','owl.carousel','fullcalendar.min','calendar-custom','jquery.rateit.min','jquery.customSelect.min','scripts','sparkline-chart','jquery-jvectormap-1.2.2.min','jquery-jvectormap-world-mill-en','xcharts.min','jquery.autosize.min','jquery.placeholder.min','gdp-data','morris.min','sparklines','jquery.slimscroll.min','jquery.validate.min','form-validation-script']); ?>   
	</body>
</html>