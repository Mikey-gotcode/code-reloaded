/*<?php
//include('dbcon.php');
//include('adminhome.php');
error_reporting(0);

$query = "SELECT * FROM `company`";
$result = mysqli_query($con, $query);


//method 2
$result2 = mysqli_query($con, $query);

$options = "";

while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[1]</option>";
}

?>*/


<html>
<html lang="en">
<head>
<link rel="stylesheet" type="css" href="style.css">
</head>
<style>
table
{
    width: 600px;
    height: 200px;
    position: absolute;
    top: 15%;
    left: 10%;
    border-radius: 10px;
    color:black;
    border : 0;
    background-color:;
    align: center;  
    font-size: 15px;
    font-weight: 600;
    border-collapse: separate;
    border-spacing: 0 15px;
}
.Button
{
     position: absolute;
     background: #337ab7;
     font-size: 20px;
     font-weight: 600;
     color: #fff;
     -webkit-appearance: button;
     -moz-appearance: button;
     appearance: button;
    
}
.Button:hover
{
     background-color: #1d1f77;
}
.form-wrsignup 
{
    position: absolute;
     background:#f9f9fa;
     top: 70px;
     left: 250px;
     height: 83%;
     width:77%;
     padding: 15px 25px;
     box-shadow: 0px 1px 0px rgba(36, 39, 219, 0.6),inset 0px 1px 0px rgba(255,255,255,0.04);
     font-size: 15px;
     font-weight: 600;
     color: #fff;
}
.form
{
    position: absolute;
     background:  White;
     top: 40px;
     left:20px;
     height: 83%;
     width:80%;
     padding: 15px 25px;
 
 
}
h2
{
     color:black;
}
input[type=text] 
{
    width: 100%;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        background-color: white;
        background-position: 10px 10px; 
        background-repeat: no-repeat;
        padding: 12px 20px 12px 40px;
}
</style>
<body>
<div class="form-wrsignup">
<h2>Add Product Details</h2>
<form action="#" method="post">
<table cellspacing ="20" >
<tr>
<td> Product ID</td>
<td><input type="text" name="id" required="required" value="<?php echo "$id";?>" placeholder="Id" autofocus required></input></td>
</tr> 
<tr>
<td> Medicine Nmae</td>
<td><input type="text" name="name" required="required" value="<?php echo "$_GET[mn]";?>" placeholder="Medicine Name"  autofocus required></input></td>
</tr>  
<tr>
<td>Company Name</td>
<td><select id="" name="companyname">
            <?php echo $options;?>
        </select></td>
        </tr>
        
<tr>
<td>Quantity</td>
<td><input type="text" name="quantity" required="required" value="<?php echo "$qt";?>" placeholder="Quantity" required></input></td>
        </tr>
        
<tr>
<td>Price perunit</td>
<td><input type="text" name="price" required="required" value="<?php echo "$rs";?>" placeholder="Price per unit" required></input></td>
</tr>
<tr>
<td>Expiry date</td>
<td><input type="date" name="date" required="required" value="<?php echo "$_GET[ed]"; ?>" placeholder="Expiry Date" required></input></td>
        </tr>
        <tr>
		<td colspan="2" align ="center"><input type="submit"  class="Button" title="update" name="update" value="Add"></input></td>
   </tr> 
    </table>
  </form>
/*<?php
    if(isset($_POST['update']))
    {
    $id = $_POST['id'];
    $Medicine_Name = $_POST['name'];
    $Company_Name = $_POST['companyname'];
    $Quantity = $_POST['quantity'];
    $Price = $_POST['price'];
    $Expiry_Date = date('Y-m-d', strtotime($_POST['date']));
	   
       
        if($id != " "&& $Medicine_Name!= " "&& $Company_Name!= " "&& $Quantity != " "&&  $Price != " "&& $Expiry_Date != " ")
        {
            $query = "INSERT INTO stock VALUES('$id','$Medicine_Name','$Company_Name',' $Quantity','$Price','$Expiry_Date')";
            $data= mysqli_query($con,$query);
            if($data)
            { 
                ?>
    
                <script> 
                alert("Add New Stock Successfully");
                </script>
                <?php
            }
            else{
                ?>
               <script> 
                alert("Could not add Stock");
                </script>
                <?php
            }
        }
    }
        ?>*/

</body>
</html>