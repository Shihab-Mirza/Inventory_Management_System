<?php
include('db.php');
?>

<!DOCTYPE html>
<html>
<head>

<title>Inventory Management System</title>

<style>
body
{
font-family:Arial;
font-size:14px;
padding:50px;
}
.editbox
{
display:none
}
td
{
padding:8px;
border-left:1px solid #2f4f4f;
border-bottom:1px solid #2f4f4f;
}
table{
border-right:1px #2f4f4f;
}

.edit_tr:hover
{
background:url(edit.png) right no-repeat #80C8E5;
cursor:pointer;
}
.edit_tr
{
background:  #f2f3f4 ;
}
th
{
font-weight:bold;
text-align:left;
padding:7px;
border:1px solid #2f4f4f;
border-right-width: 0px;
}
.head
{
background: none repeat scroll 0 0 #f5f5dc;
color:#00000;

}

</style>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />


</head>
 
<h1>Inventory Management System</h1>
<ol id="toc">
    <li><a href="#inventory"><span>Inventory</span></a></li>
	<li><a href="#addproitem"><span>Update item Quantity</span></a></li>
    <li><a href="#editprice"><span>Update Price</span></a></li>
	<li><a href="index.php"><span>Logout</span></a></li>
</ol>

<div class="content" id="inventory">
<br><br>
<table width="100%">
<tr class="head">
<th>Date</th>
<th>Item</th>
<th>Quantity Left</th>
<th>price </th>


</tr>
<?php
$da=date("Y-m-d");

$sql=mysqli_query($conn,"select * from inventory");
$i=1;
while($row=mysqli_fetch_array($sql))
{
$id=$row['id'];
// $date=$row['date'];
$item=$row['item'];
$qtyleft=$row['qtyleft'];
$price=$row['price'];


if($i%2)
{
?>
<tr id="<?php echo $id; ?>" class="edit_tr">
<?php } else { ?>
<tr id="<?php echo $id; ?>" bgcolor="#f5f5dc" class="edit_tr">
<?php } ?>
<td class="edit_td">
<span class="text"><?php echo $da; ?></span> 
</td>
<td>
<span class="text"><?php echo $item; ?></span> 
</td>
<td>
<span class="text"><?php echo $qtyleft; ?></span>
</td>

<td>
<span id="first_<?php echo $id; ?>" class="text"><?php echo $price; ?></span>
<input type="text" value="<?php echo $price; ?>" class="editbox" id="first_input_<?php echo $id; ?>" />
</td>

</tr>

<?php
$i++;
}
?>

</table>

<br />
© project by Shihab Mirza
	    <b></b><br /><br />

</div>
<div class="content" id="alert">
	<ul>
	
</div>

<div class="content" id="addproitem">
<form action="updateproduct.php" method="post">
	<div style="margin-left: 48px;">
	Product name:<?php
	$name= mysqli_query($conn,"select * from inventory");
	
	echo '<select name="ITEM" id="user" class="textfield1">';
	 while($res= mysqli_fetch_assoc($name))
	{
	echo '<option value="'.$res['id'].'">';
	echo $res['item'];
	echo'</option>';
	}
	echo'</select>';
	?>
	</div>
	<br />
	Quantity to add:<input name="itemnumber" type="text" /><br />
	<div style="margin-left: 127px; margin-top: 14px;"><input name="" type="submit" value="Add" /></div>
</form>
</div>
<div class="content" id="addpro">
<form action="saveproduct.php" method="post">
	<div style="margin-left: 48px;">
	Product name:<input name="proname" type="text" />
	</div>
	<br />
	<div style="margin-left: 97px;">
	Price:<input name="price" type="text" />
	</div>
	<br />
	<div style="margin-left: 80px;">
	Quantity:<input name="qty" type="text" />
	</div>
	<div style="margin-left: 127px; margin-top: 14px;"><input name="" type="submit" value="Add" /></div>
</form>
</div>
<div class="content" id="editprice">
<form action="updateprice.php" method="post">
	<div style="margin-left: 48px;">
	Product:<?php
	$name= mysqli_query($conn,"select * from inventory");
	
	echo '<select name="ITEM" id="user" class="textfield1">';
	 while($res= mysqli_fetch_assoc($name))
	{
	echo '<option value="'.$res['id'].'">';
	echo $res['item'];
	echo'</option>';
	}
	echo'</select>';
	?>
	</div>
	<br />
	<div style="margin-left: 97px;">New Price:<input name="itemprice" type="text" /></div>
	<div style="margin-left: 127px; margin-top: 14px;"><input name="" type="submit" value="Update" /></div>
</form>
</div>
<script src="activatables.js" type="text/javascript"></script>
<script type="text/javascript">
activatables('page', ['inventory', 'alert', 'addproitem', 'addpro', 'editprice']);
</script>
</body>
</html>
