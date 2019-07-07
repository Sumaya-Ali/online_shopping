<html>
	<head>
		<title>Product Details</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/all.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/all.js"></script>
		<style>
			.btn {
					height: 70px;
					font-size: 40px;
					border-radius: 0;
				}
		</style>
	</head>
	<body>
		<?php include 'includes/header.php'; ?>
		<div class="container">
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<?php
						if(isset($_GET['item_id'])){
							$cat_slug = $_GET['cat_slug'];
							$cat_title = ucwords($cat_slug);
							$sql = "SELECT * FROM items WHERE item_id='$_GET[item_id]'";
							$run = mysqli_query($conn,$sql);
							
							while($rows = mysqli_fetch_assoc($run)) {
								echo "
									<li><a href='category.php?cat_slug=$cat_slug'>$cat_title</a></li>
									<li class='active'>$rows[item_title]</li>
								";
						
					?>
				</ol>
			</div>
			<div class="row">
			<?php
				echo "
					<div class='col-md-8'>
						<h3 class='pp-title'>$rows[item_title]</h3>
							<img src='$rows[item_image]' class='img-responsive'>
						<h4 class='pp-desc-head page-header'>Specifications</h4>
						<div class='pp-desc-detail'>$rows[item_description]</div>
					</div>
				";
					}
				}
			?>
				<aside class="col-md-4">
					<a href="buy.php?item_id=<?php echo $_GET['item_id']; ?>" class="btn btn-success btn-lg btn-block">Buy</a>
					<br>
					<ul class="list-group">
						<li class="list-group-item">
							<div class="row">
								<div class="col-md-3"><i class="fas fa-truck fa-2x"></i></div>
								<div class="col-md-9">Delivered within 5 days</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row">
								<div class="col-md-3"><i class="fas fa-sync-alt fa-2x"></i></div>
								<div class="col-md-9">Easy return in 7 days</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row">
								<div class="col-md-3"><i class="fas fa-phone-alt fa-2x"></i></div>
								<div class="col-md-9">Call at +963937823211</div>
							</div>
						</li>
					</ul>
				</aside>
			</div>
			<div class="page-header">
				<h2>Related Items</h2>
			</div>
			<div class="row">
				<?php 
					$rel_sql = "SELECT * FROM items WHERE item_cat='$_GET[cat_slug]' ORDER BY rand() LIMIT 4";
					$rel_run = mysqli_query($conn,$rel_sql);
					while($rel_rows = mysqli_fetch_assoc($rel_run)){
						$discount = $rel_rows['item_price'] - $rel_rows['item_discount'];
						echo "
							<div class='col-md-3'>
								<div class='col-md-12 single-item noPadding'>
									<div class='top'><a href='product.php?item_id=$rel_rows[item_id]&cat_slug=$rel_rows[item_cat]'><img src='$rel_rows[item_image]'></a></div>
									<div class='bottom'>
										<h3 class='item-title'><a href='product.php?item_id=$rel_rows[item_id]&cat_slug=$rel_rows[item_cat]'>$rel_rows[item_title]</a></h3>
										<div class='pull-right text-muted cutted-price'><del>$$rel_rows[item_price]/=</del></div>
										<div class='clearfix'></div>
										<div class='pull-right discounted-price'>$$discount/=</div>
									</div>
								</div>
							</div>
						";
					}
				?>
			</div>
		</div><br><br><br><br>
		<?php include 'includes/footer.php'; ?>
	</body>
</html>