<html>
	<head>
		<title>Online Shopping</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		<script>
			function select_all_items(){
				xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						document.getElementById('sel_all_items').innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open('GET','index_process.php',true);
				xmlhttp.send();
			}
			setInterval( function(){
				select_all_items();
			},2000);
		</script>
	</head>
	<body onload="select_all_items();">
	<?php include 'includes/header.php'; ?>
		<div class="container">
			<div id="sel_all_items" class="row">
				<!-- Select * from items Ajax Code -->
			</div>
		</div><br><br><br><br>
		<div class="clearfix"></div>
		<?php include 'includes/footer.php'; ?>
	</body>
</html>