<?php include '../includes/db.php'; ?>
<?php 
	if(isset($_REQUEST['del_id']) ){
		$del_sql = "DELETE FROM items WHERE item_id = '$_REQUEST[del_id]'";
		mysqli_query($conn, $del_sql);
	}
	
	if(isset($_REQUEST['edit_id']) ){
		
		$edit_id = $_REQUEST['edit_id'];
		
		$edit_title = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_title']) );
		$edit_category = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_category']) );
		//$edit_description = mysqli_real_escape_string($conn, $_REQUEST['edit_description'] );
		$edit_qty = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_qty']) );
		$edit_cost = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_cost']) );
		$edit_price = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_price']) );
		$edit_discount = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_discount']) );
		$edit_delivery = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_delivery']) );
		
		
		
		$edit_sql = "UPDATE items SET item_title = '$edit_title', item_qty='$edit_qty', item_cost='$edit_cost', item_price='$edit_price', item_discount='$edit_discount', item_cat='$edit_category', item_delivery='$edit_delivery' WHERE item_id ='$edit_id' ";
		
		if(mysqli_query($conn,$edit_sql) ){
			?>
			<script>window.location="item_list.php";</script>
			<?php
		}
		
	}
?>
<table class="table table-bordered table-striped admin_table">
	<thead class="admin_table_head">
		<tr>
			<th>S.no</th>
			<th>Image</th>
			<th>Title</th>
			<th>Description</th>
			<th>Category</th>
			<th>Cost</th>
			<th>Qty</th>
			<th>Discount</th>
			<th>Price</th>
			<th>Delivery</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<tbody>
		<?php 
			$counter = 1;
			$sel_sql = "SELECT * FROM items";
			$sel_run = mysqli_query($conn,$sel_sql);
			while($sel_rows = mysqli_fetch_assoc($sel_run)){
				$item_description = strip_tags($sel_rows['item_description']);
				$item_discount = $sel_rows['item_price'] - $sel_rows['item_discount'];
				$item_edit_id = $sel_rows['item_id'];
				echo "
					<tr>
						<td class='admin_table_counter'>$counter</td>
						<td><img src='../$sel_rows[item_image]' style='width: 100px;'></td>
						<td>$sel_rows[item_title]</td>
						<td>$item_description</td>
						<td>$sel_rows[item_cat]</td>
						<td>$sel_rows[item_cost]</td>
						<td>$sel_rows[item_qty]</td>
						<td>$sel_rows[item_discount]</td>
						<td>$item_discount/$sel_rows[item_price]</td>
						<td>$sel_rows[item_delivery]</td>
						<td>
							<div class='dropdown'>
								<button class='btn btn-danger dropdown-toggle' data-toggle='dropdown'>Actions <span class='caret'></span></button>
								<ul class='dropdown-menu dropdown-menu-right'>
									<li><a href='#edit_modal$item_edit_id' data-toggle='modal' data-backdrop='static' data-keyboard='false'>Edit</a></li>
									<li><a href='javascript:;' onclick='del_func($sel_rows[item_id]);'>Delete</a></li>
								</ul>
							</div>
						</td>
					</tr>
					<!-- edit modal -->
					<div class='modal fade' id='edit_modal$item_edit_id'>
						<div class='modal-dialog'>
							<div class='modal-content'>
								<div class='modal-header'>
									<button class='close' data-dismiss='modal'>&times;</button>
									<br>
									<h4 class='modal-title'>Edit Item</h4>
								</div>
								<div class='modal-body'>
									<div>
										<div class='form-group'>
											<label for='edit_title$item_edit_id'>Item Title</label>
											<input id='edit_title$item_edit_id' name='edit_title$item_edit_id' type='text' value='$sel_rows[item_title]' class='form-control'>
										</div>
										<div class='form-group'>
											<label for='edit_description$item_edit_id'>Item Description</label>
											<textarea id='edit_description$item_edit_id' name='edit_description$item_edit_id' class='tinymce form-control'>$sel_rows[item_description]</textarea>
										</div>
										<div class='form-group'>
											<label for='edit_category$item_edit_id'>Item Category</label>
											<select name='edit_category$item_edit_id' id='edit_category$item_edit_id' class='form-control'>";
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
												if($cat_slug == $sel_rows['item_cat']){
													echo "
													<option selected value='$cat_slug'>$cat_name</option>
													";
												} else{
													echo "
														<option value='$cat_slug'>$cat_name</option>
													";
												}
											}
								echo "
											</select>
										</div>
										<div class='form-group'>
											<label for='edit_qty$item_edit_id'>Item QTY</label>
											<input type='number' name='edit_qty$item_edit_id' id='edit_qty$item_edit_id' value='$sel_rows[item_qty]' class='form-control' min='0'>
										</div>
										<div class='form-group'>
											<label for='edit_cost$item_edit_id'>Item Cost</label>
											<input type='number' name='edit_cost$item_edit_id' id='edit_cost$item_edit_id' value='$sel_rows[item_cost]' class='form-control' min='0'>
										</div>
										<div class='form-group'>
											<label for='edit_price$item_edit_id'>Item Price</label>
											<input type='number' name='edit_price$item_edit_id' id='edit_price$item_edit_id' class='form-control' value='$sel_rows[item_price]' min='0'>
										</div>
										<div class='form-group'>
											<label for='edit_discount$item_edit_id'>Item Discount</label>
											<input type='number' min='0' name='edit_discount$item_edit_id' id='edit_discount$item_edit_id' class='form-control' value='$sel_rows[item_discount]'>
										</div>
										<div class='form-group'>
											<label for='edit_delivery$item_edit_id'>Delivery Charges</label>
											<input type='number' min='0' class='form-control' name='edit_delivery$item_edit_id' id='edit_delivery$item_edit_id' value='$sel_rows[item_delivery]'>
										</div>
										<div class='form-group'>
											<button class='btn btn-primary btn-lg btn-block' data-dismiss='modal' onclick='edit_func($item_edit_id);'>Done Editing</button>
										</div>
									</div>
								</div>
								<div class='modal-footer'>
									<button class='btn btn-danger' data-dismiss='modal'>close</button>
								</div>
							</div>
						</div>
					</div>
				";
				$counter++;
			}
		?>
		</tbody>
	</tbody>
</table>