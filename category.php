<html>
	<head>
		<title>Online Shopping</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body>
	<?php include 'includes/header.php'; ?>
		<div class="container">
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<?php 
						if(isset($_GET['cat_slug']) ){
							$cat_slug = ucwords($_GET['cat_slug']);
							echo "
							<li class='active'>$cat_slug</li>
							";
						
					?>
				</ol>
			</div>
			<div class="row">
			<?php 
				$sql = "SELECT * FROM items WHERE item_cat='$_GET[cat_slug]' ";
				$run = mysqli_query($conn, $sql);
				while($rows = mysqli_fetch_assoc($run)){
					$discount = $rows['item_price'] - $rows['item_discount'];
					echo "
							<div class='col-md-3'>
								<div class='col-md-12 single-item noPadding'>
									<div class='top'><a href='product.php?item_id=$rows[item_id]&cat_slug=$rows[item_cat]'><img src='$rows[item_image]'></a></div>
									<div class='bottom'>
										<h3 class='item-title'><a href='product.php?item_id=$rows[item_id]&cat_slug=$rows[item_cat]'>$rows[item_title]</a></h3>
										<div class='pull-right text-muted cutted-price'><del>$$rows[item_price]/=</del></div>
										<div class='clearfix'></div>
										<div class='pull-right discounted-price'>$$discount/=</div>
									</div>
								</div>
							</div>				
					";
				}
						}
			?>
			</div>
		</div><br><br><br><br><br>
		<div class="clearfix"></div>
		<?php include 'includes/footer.php'; ?>
	</body>
</html>