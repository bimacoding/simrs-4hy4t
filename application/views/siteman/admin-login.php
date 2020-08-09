<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- JQUERY SCRIPTS -->
    <script src="<?=base_url()?>assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
	<style type="text/css">
		.login-box
		{
			height: 50%;
			width: 30%;
			border: 1px solid grey;
			margin-left: 35%;
			margin-top: 10%;
			position: relative;
      		box-shadow: 21px 12px 24px 10px rgba(0, 0, 0, .5);
      		background: #dadada;
		}
		.login-header
		{
			text-align: center;
			font-family: "vardhana",cursive;
			font-size: 35px;
			background: linear-gradient(to bottom, #00bfff 0%, #0000ff 100%);
			color:#fff;
			position: relative;
      		box-shadow: 1px 3px 14px  rgba(0, 0, 0, .5);
		}
		.login-body
		{
			padding: 20px;
			line-height: 2;
		}
	</style>
</head>
<body>
  <div class="login-box" >
	<div class="login-header">Login</div>
	<div class="login-body">
		<form class="form-group" method="POST" action="<?=base_url().'siteman/index'?>">
			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
			<label>Username</label>
			<input type="text" class="form-control" name="a">
			<label>Password</label>
			<input type="password" class="form-control" name="b">
			<br>
			<!-- <input type="checkbox" value="checked"><b>Remember</b> -->
			<button type="submit" name="submit" class="btn btn-success btn-block">Login</button>
		</form>
	</div>
</div>
</body>
</html>