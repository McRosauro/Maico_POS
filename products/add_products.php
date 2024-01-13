<?php 
	include('../products/add.php');
	include '../set.php';
	?>
<!DOCTYPE html>
<html>
<head>
	<?php include('../templates/head1.php');?>
</head>
<body>
	<div class="contain h-100">
		<?php 
			include('../products/base.php');
			include('../products/alert.php');
		?>
		<div class="main">
			<div class="side">
				<h1 class="ml-4"><i class="fas fa-user-friends"></i> Product Management</h1>
				<hr>
			</div>
			<div class="first_side ml-5 mt-5 mr-3">
				<div style="border:1px dashed black; width: 250px;height: 250px;">
					<img class="img-fluid p-2 h-100 w-100" src="../images/product.png">
				</div>
			<form method="post" enctype="multipart/form-data">
				<input type="hidden" name="size" class="form-control-sm" value="1000000">
				<input class="form-control-sm" type="file" name="image" required>
				<p class="bg-danger mt-3">
			</div>
			<div class="second_side">
					<table class="table-responsive mt-5">
						<tbody>
							<tr>
								<td  valign="baseline">Product Name:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="text" name="product_name" class="form-control-sm form-control"  placeholder="Enter Product Name" required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Sell Price:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="number" name="price" step="0.01" class="form-control form-control-sm" required></td>
							</tr>
							<tr>
								<td  valign="baseline">Quantity:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="number" name="qty" class="form-control-sm form-control" required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Unit:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="text" name="unit" placeholder="Enter Unit" required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Minimum stocks:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="number" name="min_stocks" class="form-control-sm form-control" required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Remarks:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="text" name="remarks" placeholder="Enter Remarks" required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Location:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span></div><input type="text" name="location" placeholder="Enter Location" required></div></td>
							</tr>
						</tbody>
					</table>
					<div class="text-left mt-4">
						<button type="submit" name="add_products" class="btn btn-secondary"><i class="fas fa-thumbs-up"></i> Submit</button>
						<button class="btn btn-danger" onclick="window.location.href='../products/products.php'" ><i class="fas fa-ban"></i> Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="../bootstrap4/jquery/jquery.min.js"></script>
	<script src="../bootstrap4/js/bootstrap.bundle.min.js"></script>
	<script>
		$(function () {
  			$('[data-toggle="popover"]').popover()
	})
	</script>
</body>
</html>
