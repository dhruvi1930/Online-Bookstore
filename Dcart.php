<?php
session_start();
include "connection.php";
$q="select * from book where b_id='".$b_id."'";
$res=mysqli_query($conn,$q);

 while($row=mysqli_fetch_array($res))
     {
if(isset($_POST["add_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$b_id = array_column($_SESSION["shopping_cart"], "b_id");
		if(!in_array($_GET["b_id"], $b_id))
		{
		$count = count($_SESSION["shopping_cart"]);
		$item_array = array(
		'b_id'			=>	$_GET["b_id"],
		'b_name'		=>	$row["b_name"],
		'b_price'		=>	$row["b_price"],
		'b_genre'		=>	$row["b_genre"],
		'b_author'     	=>  $row["b_author"]
		'quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
		echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
		'b_id'			=>	$_GET["b_id"],
		'b_name'		=>	$row["b_name"],
		'b_price'		=>	$row["b_price"],
		'b_genre'		=>	$row["b_genre"],
		'b_author'     	=>  $row["b_author"]
		'quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}
 
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
		if($values["b_id"] == $_GET["b_id"])
		{
		unset($_SESSION["shopping_cart"][$keys]);
		echo '<script>alert("Item Removed")</script>';
		echo '<script>window.location="Cart.php"</script>';
		}
		}
	}
}
 }
?>
?>


<!-----------------table----------------->
<?php
		if(!empty($_SESSION["shopping_cart"]))
		{
		$total = 0;
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
		?>
		<tr>
		<td><?php echo $values["b_name"]; ?></td>
		<td><?php echo $values["b_author"]; ?></td>
		<td>$ <?php echo $values["b_genre"]; ?></td>
		<td>$ <?php echo number_format($values["quantity"] * $values["b_price"], 2);?></td>
		<td><a href="Cart.php?action=delete&b_id=<?php echo $values["b_id"]; ?>"><span class="text-danger">Remove</span></a></td>
		</tr>
		<?php
		$total = $total + ($values["quantity"] * $values["b_price"]);
		}
		?>
		<tr>
		<td colspan="3" align="right">Total</td>
		<td align="right">$ <?php echo number_format($total, 2); ?></td>
		<td></td>
		</tr>
		<?php
		}
		?>