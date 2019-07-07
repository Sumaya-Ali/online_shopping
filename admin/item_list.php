<?php 
	include '../includes/db.php';
	
	if(isset($_POST['item_submit'])){
		$item_title = mysqli_real_escape_string($conn, strip_tags($_POST['item_title']) );
		$item_description = mysqli_real_escape_string($conn, $_POST['item_description']);
		$item_category = mysqli_real_escape_string($conn, strip_tags($_POST['item_category']));
		$item_qty = mysqli_real_escape_string($conn, strip_tags($_POST['item_qty']) );
		$item_cost = mysqli_real_escape_string($conn, strip_tags($_POST['item_cost']) );
		$item_price = mysqli_real_escape_string($conn, strip_tags($_POST['item_price']) );
		$item_discount = mysqli_real_escape_string($conn, strip_tags($_POST['item_discount']) );
		$item_delivery = mysqli_real_escape_string($conn , strip_tags($_POST['item_delivery']));
		
		if(isset($_FILES['item_image']['name'])){
			$file_name = $_FILES['item_image']['name'];
			$path_address = "../images/products/$file_name";
			$path_address_db = "images/products/$file_name";
			$file_type = pathinfo($_FILES['item_image']['name'], PATHINFO_EXTENSION);
			$img_confirm = 1;
			if($_FILES['item_image']['size'] > 2000000){
				$img_confirm = 0;
				echo "image size is Too Big";
			}
			if($file_type != 'jpg' && $file_type !='gif' && $file_type!='png'){
				$img_confirm = 0;
				echo "image type == $file_type is Not suitable";
			}
			if($img_confirm == 0){}
			else {
				if(move_uploaded_file($_FILES['item_image']['tmp_name'],$path_address) ){
					$insert_sql = "INSERT INTO items (item_image, item_title, item_description, item_qty, item_cost, item_price, item_discount, item_cat, item_delivery) VALUES ('$path_address_db', '$item_title', '$item_description', '$item_qty', '$item_cost', '$item_price', '$item_discount', '$item_category', '$item_delivery')";
					
					if(mysqli_query($conn, $insert_sql)){
						?>
							<script>window.location = "item_list.php";</script>
						<?php
					}
				}
			}
		}
		
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Items | Admin Panel</title>
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/style.css">
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../plugin/tinymce/tinymce.min.js"></script>
		<script>
			tinymce.init({
				selector: "textarea.tinymce"
			});
		</script>
		<script>
			function sel_func(){
				xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						document.getElementById('sel_items').innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open('GET','item_list_process.php',true);
				xmlhttp.send();
			}
			function del_func($item_id){
				xmlhttp.open('GET','item_list_process.php?del_id='+$item_id,true);
				xmlhttp.send();
			}
			/*
			setInterval( function(){
				sel_func();
			},2000);
			*/
			function edit_func(edit_id){
				edit_title = document.getElementById('edit_title'+edit_id).value;
				edit_description = document.getElementById('edit_description'+edit_id).value;
				edit_category = document.getElementById('edit_category'+edit_id).value;
				edit_cost = document.getElementById('edit_cost'+edit_id).value;
				edit_qty = document.getElementById('edit_qty'+edit_id).value;
				edit_price = document.getElementById('edit_price'+edit_id).value;
				edit_discount = document.getElementById('edit_discount'+edit_id).value;
				edit_delivery = document.getElementById('edit_delivery'+edit_id).value;
				
				edit_item_id = edit_id;
				
				xmlhttp.open('GET','item_list_process.php?edit_id='+edit_item_id+'&edit_title='+edit_title+'&edit_category='+edit_category+'&edit_cost='+edit_cost+'&edit_qty='+edit_qty+'&edit_price='+edit_price+'&edit_discount='+edit_discount+'&edit_delivery='+edit_delivery,true);
				
				xmlhttp.send();
			}
		</script>
	</head>
	<body onload="sel_func();">
		<?php include 'includes/header.php'; ?>
		<div class="container">
			<div class="page-header">
				<h3 class="pull-left pp-title">Items List<h3>
				<button class="btn btn-success pull-right" data-toggle="modal" data-target="#add_item" data-backdrop="static" data-keyboard="false">Add New Item</button>
				<div class="clearfix"></div>
			</div>
			<div id="add_item" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button class="close" data-dismiss="modal">&times;</button>
							<br>
							<h4 class="modal-title">Add New Item</h4>
						</div>
						<div class="modal-body">
							<form method="post" enctype="multipart/form-data"> <!-- for file type -->
								<div class="form-group">
									<label for="image">Item Image</label>
									<input name="item_image" id="image" type="file" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="title">Item Title</label>
									<input name="item_title" id="title" type="text" class="form-control" placeholder="Item Title" required>
								</div>
								<div class="form-group">
									<label>Item Description</label>
									<textarea name="item_description" class="tinymce form-control"></textarea> <!-- I couldn't put required -->
								</div>
								<div class="form-group">
									<label for="category">Item Category</label>
									<select name="item_category" id="category" class="form-control" required>
										<?php 
											$cat_sql = "SELECT * FROM item_cat";
											$cat_run = mysqli_query($conn,$cat_sql);
											while($cat_rows = mysqli_fetch_assoc($cat_run)){
												if($cat_rows['cat_slug'] == ''){
													$cat_slug = $cat_rows['cat_name'];
												}
												else {
													$cat_slug = $cat_rows['cat_slug'];
												}
												$cat_name = ucwords($cat_rows['cat_name']);
												echo "
													<option value='$cat_slug'>$cat_name</option>
												";
											}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="qty">Item QTY</label>
									<input name="item_qty" id="qty" type="number" min='0' class="form-control" placeholder="Item QTY" required>
								</div>
								<div class="form-group">
									<label for="cost">Item Cost</label>
									<input name="item_cost" id="cost" type="number" min='0' class="form-control" placeholder="Item Cost" required>
								</div>
								<div class="form-group">
									<label for="price">Item Price</label>
									<input name="item_price" id="price" type="number" min='0' class="form-control" placeholder="Item Price" required>
								</div>
								<div class="form-group">
									<label for="discount">Item Discount</label>
									<input name="item_discount" id="discount" type="number" min='0' class="form-control" placeholder="Item Discount" required>
								</div>
								<div class="form-group">
									<label for="delivery">Delivery Charges</label>
									<input name="item_delivery" id="delivery" type="number" min='0' class="form-control" placeholder="Delivery Charges">
								</div>
								<div class="form-group">
									<input type="submit" name="item_submit" class="btn btn-primary btn-lg btn-block">
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button class="btn btn-danger" data-dismiss="modal">close</button>
						</div>
					</div>
				</div>
			</div>
			<div id="sel_items">
				<!-- call sel_func() redirect to item_list_process.php for ajax items selection -->
			</div>
		</div><br><br><br><br>
		<?php include 'includes/footer.php' ?>
	</body>
</html>