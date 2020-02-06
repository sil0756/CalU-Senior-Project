<?php
include ("viewProductsOrders.php");
 require('db_connect.php');


?>
<!-- admin@myguitarshop.com', '6a718fbd768c2378b511f8249b54897f940e9022 -->
<!doctype html>

<html lang="en">
<head>


<link rel="stylesheet" href="css.css">
<ul>
<nav>
<li style="float:left"><a href="#">Tradewinds</a>
 <li> <a href="/wk9project_MitchZink/index.php" >Home</a></li>
 <li> <a href="/wk9project_MitchZink/productsOrders/index.php">Products & Orders</a> </li>
 <li> <a href="/wk9project_MitchZink/customers/index.php">Customers</a> </li>
 <li><a href="/wk9project_MitchZink/suppliers/index.php">Suppliers</a> </li>
 <li style="float:right"><a href="/wk9project_MitchZink/login2/login.php">Login</a> </li>
 <li style="float:right"><a href="/wk9project_MitchZink/login2/index.php" class="active">Orders & Invoices</a> </li>
</nav>
</ul>

</head>

<body>
<h1>Products Orders</h1>

<link rel="stylesheet" href="main.css">

<!-- Part 3 -->
<h4>DDL With the Names of the Categories</h4>
<form action="#" name="DDL" method="get">
<select name="cat_id_1">
<?php
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo '<option value="' . $row['categoryID'] . '">' . $row['categoryName'] . '</option>';
}
?>
 </select>
 <input type="submit" name="action" value="ListSelect">
 </form>
 <?php if(isset($cat_id_1)) { ?>	
 <h4>Products of Category</h4>

<section>
<table>
<tr>
<th>Product Name</th>
<th>Product Code</th>
<th>List Price</th>
</tr>
<?php foreach($products as $product): ?>
<tr>
<td> <?php echo $product["productName"]; ?></td>
<td> <?php echo $product["productCode"]; ?></td>
<td> <?php echo $product["listPrice"]; ?></td>

<td><form action = "index.php" method = "get">
<input type ="hidden" name = "prod_id" value = "<?php echo $product["productID"]; ?>">
<input type ="hidden" name = "cat_id_1" value = "<?php echo $product["categoryID"]; ?>">
<input type = "submit" name = "select" value = "viewOrders">
<input type = "submit" name = "select" value = "viewInvoices">

</form>
</td>
</tr>
<?php endforeach;} ?>
</table>
</section>


<?php if ($action == "viewInvoices") { ?>  
		<p></p>
		<h2>Orders Details of product: <?php echo $prodName; ?> </h2>
		
		<table>
			<tr>
				<th>Item ID</th>
				<th>Order ID</th>
				<th>Product ID</th>
				<th>Item Price</th>
				<th>Discount Amount</th>
				<th>Quantity</th>
			</tr>
		
		<tr>
		<?php if (isset($orderDetail[0])) { ?>
		<td><?php echo $orderDetail[0]["itemID"]; ?></td>
		<td><?php echo $orderDetail[0]["orderID"]; ?></td>
		<td><?php echo $orderDetail[0]["productID"]; ?></td>
		<td><?php echo $orderDetail[0]["itemPrice"]; ?></td>
		<td><?php echo $orderDetail[0]["discountAmount"]; ?></td>
		<td><?php echo $orderDetail[0]["quantity"]; ?></td>
		</tr>
		</table>
		
		<?php
    }
} ?>
<?php if($action == "viewOrders") { ?>  
<?php if(isset($prod_id)){ ?>		
		
		<p></p>
		<h2>Product Details of product: <?php echo $prodName; ?> </h2>
		

			<table>
			<tr>
			<th>orderID</th>
			<th>customerID</th>
			<th>orderDate</th>
			<th>shipAmount</th>
			<th>taxAmount</th>
			<th>shipDate</th>
			<th>shipAddressID</th>
			<th>cardType</th>
			<th>cardNumber</th>
			<th>cardExpires</th>
			<th>billingAddressID</th>
			</tr>
		
		<tr>
		<td><?php echo $orderDetail1[0]["orderID"]; ?></td>
		<td><?php echo $orderDetail1[0]["customerID"]; ?></td>
		<td><?php echo $orderDetail1[0]["orderDate"]; ?></td>
		<td><?php echo $orderDetail1[0]["shipAmount"]; ?></td>
		<td><?php echo $orderDetail1[0]["taxAmount"]; ?></td>
		<td><?php echo $orderDetail1[0]["shipDate"]; ?></td>
		<td><?php echo $orderDetail1[0]["shipAddressID"]; ?></td>
		<td><?php echo $orderDetail1[0]["cardType"]; ?></td>
		<td><?php echo $orderDetail1[0]["cardNumber"]; ?></td>
		<td><?php echo $orderDetail1[0]["cardExpires"]; ?></td>
		<td><?php echo $orderDetail1[0]["billingAddressID"]; ?></td>
		</tr>
</table>	

<?php }} ?>	


<style>

</style>

</body>
</html>