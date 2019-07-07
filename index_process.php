<?php include 'includes/db.php'; ?>
<?php 
				$sql = "SELECT * FROM items";
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
			?>