<?php
	session_start();
	include 'includes/db.php';
	
	if(isset($_REQUEST['del_id'])){
		
		$del_sql = "DELETE FROM checkout WHERE chk_id = '$_REQUEST[del_id]'";
		$del_run = mysqli_query($conn,$del_sql);
	}
	
	if(isset($_REQUEST['qty_id']) ){
		$qty_sql = "UPDATE checkout SET chk_qty ='$_REQUEST[qty_value]' WHERE chk_id ='$_REQUEST[qty_id]'";
		$qty_run = mysqli_query($conn,$qty_sql);
	}
	echo "
		<table class='table'>
						<thead>
							<tr>
								<th>S.no</th>
								<th>Item</th>
								<th class='text-right'>qty</th>
								<th class='text-right'>Delete</th>
								<th class='text-right'>Price</th>
								<th class='text-right'>Total</th>
							</tr>
						</thead>
						<tbody>
	";
	if(isset($_SESSION['ref'])){
		$sql = "SELECT * FROM checkout c JOIN items i ON c.chk_item = i.item_id WHERE chk_ref = '$_SESSION[ref]'";
		$run = mysqli_query($conn,$sql);
		$counter = 1;
		$total = 0;
		$delivery_charges =0;
		while($rows = mysqli_fetch_assoc($run)){
			$discount = $rows['item_price']-$rows['item_discount'];
			$sub_total = $rows['chk_qty'] * $discount;
			$total += $sub_total;
			$delivery_charges +=$rows['item_delivery'];
				echo "
				<tr>
					<td>$counter</td>
					<td>$rows[item_title]</td>
					<td class='text-right'><b><input type='number' min='1' style='width: 45px;' onchange = 'qty_func($rows[chk_id]
					,this.value);' value='$rows[chk_qty]'></b></td>
					<td class='text-right'><button class='btn btn-danger btn-sm' onclick='del_func($rows[chk_id]);'>Delete</button></td>
					<td class='text-right'><b>$discount/=</b></td>
					<td class='text-right'><b>$sub_total/=</b></td>
				</tr>
		";
		$counter++;
		}
		$_SESSION['grand_total'] = $total + $delivery_charges;
		echo "
			</tbody>
				</table>
				<table class='table'>
					<thead>
						<tr>
							<th class='text-center' colspan='2'>Order Summary</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Subtotal</td>
							<td class='text-right'><b>$total/=</b></td>
						</tr>
						<tr>
							<td>Delivery Charges</td>
							<td class='text-right'><b>$delivery_charges</b></td>
						</tr>
						<tr>
							<td>Grand Total</td>
							<td class='text-right'><b>$_SESSION[grand_total]/=</b></td>
						</tr>
					</tbody>
				</table>
		";
		
	}
	
?>