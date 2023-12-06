<?php 
include("connection.php");
?>
<?php 
if(isset($_POST['searchdata']))
{
	$search = $_POST['search'];

	$query = "SELECT * from form where id = '$search' ";
	$data = mysqli_query($conn,$query);
	$result = mysqli_fetch_assoc($data);
	//$name = $result['emp_name'];
	//echo "$name";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Employee Management System</title>

<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div class="center">
	<form action="#" method="POST">
	<h1>Employee Management System</h1>
	<div class="form">
	<input type="text" name="search" class="textfield" placeholder="Search ID" value="<?php if(isset($_POST['searchdata'])){echo $result['id'];}?>">
	<input type="text" name="name" class="textfield" placeholder="Employee Name"value="<?php if(isset($_POST['searchdata'])){echo $result['emp_name'];}?>">
	<select class="textfield" name="gender">
		<option value="Not Selected"> Select Gender</option>
		<option value="Male"
		<?php if($result['emp_gender']=='Male')
		{
			echo "selected";
		}
		?>> Male</option>
		<option value="Female"
		<?php if($result['emp_gender']=='Female')
		{
			echo "selected";
		}
		?>
		> Female</option>
		<option value="Others"<?php if($result['emp_gender']=='Others')
		{
			echo "selected";
		}
		?>> Others</option>
	</select>
	<input type="text" name="email" class="textfield" placeholder="Email Address" value="<?php if(isset($_POST['searchdata'])){echo $result['emp_email'];}?>">
	<select class="textfield" name="department">
		<option value="Not Selected"> Select Department</option>
		<option value="Hr"<?php if($result['emp_department']=='Hr')
		{
			echo "selected";
		}
		?>> Hr</option>
		<option value="Sales"<?php if($result['emp_department']=='Sales')
		{
			echo "selected";
		}
		?>> Sales</option>
		<option value="Technical"<?php if($result['emp_department']=='Technical')
		{
			echo "selected";
		}
		?>> Technical</option>
		<option value="Admin"<?php if($result['emp_department']=='Admin')
		{
			echo "selected";
		}
		?>> Admin</option>
		<option value="Accounts"<?php if($result['emp_department']=='Accounts')
		{
			echo "selected";
		}
		?>> Accounts</option>
		<option value="Branding"<?php if($result['emp_department']=='Branding')
		{
			echo "selected";
		}
		?>> Branding</option>
	</select>
	<textarea placeholder="Address" name="address"><?php if(isset($_POST['searchdata'])){echo $result['emp_address'];}?></textarea>
	<input type="submit" value="Search" name="searchdata" class="btn">
	<input type="submit" value="Add" name="add" class="btn" style="background-color: green;">
	<input type="submit" value="Update" name="update" class="btn"style="background-color: chocolate;">
	<input type="submit" value="Remove" name="remove" class="btn" style="background-color: darkred;" onclick="return checkdelete()">
	<input type="reset" value="Clear" name="" class="btn" style="background-color: blue;">		
	</div>
	</form>
</div>
</body>
</html>

<script>
	function checkdelete()
{
	return confirm('Are you sure you want to delete this record');
}
</script>

<?php 
if (isset($_POST['add']))
{
	$name 			= $_POST['name'];
	$gender 		= $_POST['gender'];
	$email 			= $_POST['email'];
	$department 	= $_POST['department'];
	$address 		= $_POST['address'];

	$query = "INSERT INTO FORM (emp_name,emp_gender,emp_email,emp_department,emp_address) VALUES('$name','$gender','$email','$department','$address')";
	$data = mysqli_query($conn,$query);

	if ($data) 
	{
		echo "<script> alert('Successfully Saved to Database') </script>";
	}
	else 
	{
		echo "<script> alert('Failed to insert data') </script>";
	}
}
?>
<?php
if(isset($_POST['remove']))
{
	$id = $_POST['search'];
	$query = "DELETE From form WHERE id = '$id' ";
	$data = mysqli_query($conn, $query);
	if($data)
	{
	echo "<script> alert('Record Deleted') </script>";
	}
	else
	{
	echo "<script> alert('Failed to delete') </script>";
	}
}
?>

<?php
if(isset($_POST['update']))
{
	$id 			= $_POST['search'];
	$name 			= $_POST['name'];
	$gender 		= $_POST['gender'];
	$email 			= $_POST['email'];
	$department 	= $_POST['department'];
	$address 		= $_POST['address'];

	$query = "UPDATE form SET emp_name = '$name',emp_gender='$gender',emp_email='$email',emp_department='$department',emp_address='$address' WHERE id='$id'";
	$data = mysqli_query($conn,$query);

	if ($data) 
	{
		echo "<script> alert('Record updated') </script>";
	}
	else 
	{
		echo "<script> alert('Failed to update') </script>";
	}

}
?>