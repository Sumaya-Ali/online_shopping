<?php include 'db.php' ?>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a href="./index.php" class="navbar-brand">Online Shopping</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="./index.php">Home</a></li>
			<?php 
				$cat_sql = "SELECT * FROM item_cat";
				$cat_run = mysqli_query($conn,$cat_sql);
				while ($cat_rows = mysqli_fetch_assoc($cat_run)){
					if($cat_rows['cat_slug']==''){
						$cat_slug = $cat_rows['cat_name'];
					}
					else {
						$cat_slug = $cat_rows['cat_slug'];
					}
					$cat_title = ucwords($cat_slug);
					echo "
						<li><a href='category.php?cat_slug=$cat_slug'>$cat_title</a></li>
					";
				}
			?>
		</ul>
		<ul class="nav navbar-nav navbar-right">
		<!--	<li><a href="#">Log Out</a></li> -->
			<li><a href="./buy.php">Order List</a></li>
		</ul>
	</div>
</nav>