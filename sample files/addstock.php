<?php
include('dbcon.php');
include('adminhome.php');
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

?>
<?php
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
        ?>