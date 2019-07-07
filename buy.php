<?php 
			include 'includes/db.php'; 
			session_start();
			if(isset($_GET['item_id'])){
				$date = date('Y-m-d h:i:s');
				$random_num = mt_rand();
				if(isset($_SESSION['ref']) ){
					
				}
				else {
						$_SESSION['ref'] = $date.'_'.$random_num;
				}
				$default_qty = 1;
				$chk_sql = "INSERT INTO checkout (chk_item, chk_ref, chk_timing, chk_qty) VALUES ('$_GET[item_id]', '$_SESSION[ref]', '$date', '$default_qty')";
				if(mysqli_query($conn,$chk_sql)){
					?> 
						<script>window.location = "buy.php";</script>
					<?php
				}
				
			}
			
			if(isset($_POST['submit_order'])){
				$name = mysqli_real_escape_string($conn,strip_tags($_POST['name']));
				$email = mysqli_real_escape_string($conn,strip_tags($_POST['email']));
				$contact_number = mysqli_real_escape_string($conn,strip_tags($_POST['contact_number']));
				$city = mysqli_real_escape_string($conn, strip_tags($_POST['city']));
				$delivery_address = mysqli_real_escape_string($conn,strip_tags($_POST['address']));
				
				$order_sql = "INSERT INTO orders (order_name, order_email, order_contact_number, order_city, order_delivery_address, chk_session_ref, chk_total_price) VALUES ('$name', '$email', '$contact_number', '$city', '$delivery_address', '$_SESSION[ref]', '$_SESSION[grand_total]')";
				$order_run = mysqli_query($conn,$order_sql);
			}
?>
<html>
	<head>
		<title>Shopping Cart</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/all.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		<style>
			.btn {
				border-radius: 0;
			}
		</style>
		<script>
			function ajax_func(){
				xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						document.getElementById('buy_process').innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open('GET','buy_process.php',true);
				xmlhttp.send();
			}
			function del_func(chk_id){
				xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						document.getElementById('buy_process').innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open('GET','buy_process.php?del_id='+chk_id,true);
				xmlhttp.send();
			}
			function qty_func(chk_id, qty_value){
				xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						document.getElementById('buy_process').innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open('GET','buy_process.php?qty_id='+chk_id+'&qty_value='+qty_value,true);
				xmlhttp.send();
			}
		</script>
	</head>
	<body onload="ajax_func();">
		<?php include 'includes/header.php'; ?>
		<div class="container">
			<div class="page-header">
				<h2 class="pull-left">Checkout</h2>
				<button class="btn btn-success pull-right" data-toggle="modal" data-target="#proceed_modal" data-backdrop="static" data-keyboard="false">proceed</button>
				<div class="clearfix"></div>
			</div>
			<div id="proceed_modal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form method="post">
								<div class="form-group">
									<label for="name">Name</label>
									<input id="name" type="text" name="name" class="form-control" placeholder="Full Name" required>
								</div>
								<div class="form-group">
									<label for="email">Email Address</label>
									<input id="email" type="email" name="email" class="form-control" placeholder="Email Address" required>
								</div>
								<div class="form-group">
									<label for="conatct_number">Contact Number</label>
									<input id="contact_number" type="text" name="contact_number" class="form-control" placeholder="Contact Number" required>
								</div>
								<div class="form-group">
									<label for="cities">City</label>
									<input list="city_list" id="city" name="city" class="form-control" placeholder="City" required>
									<datalist id="city_list">
										<option>Damascus</option>
										<option>Homs</option>
										<option>Hama</option>
										<option>Halab</option>
										<option>Latakia</option>
									</datalist>
								</div>
								<div class="form-group">
									<label for="address">Delivery Address</label>
									<textarea id="address" class="form-control" name="address" placeholder="Delivery Address" required></textarea>
								</div>
								<div class="form-group">
									<input class="btn btn-danger btn-lg btn-block" type="submit" name="submit_order">
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button class="btn btn-default" data-dismiss="modal">close</button>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Order Detail</div>
				<div class="panel-body">
					<div id="buy_process">
						<!-- The Buy Process Code -->
					</div>
				</div>
			</div>
		</div>
		<br><br><br><br><br>
		<?php include 'includes/footer.php' ?>
	</body>
</html>