<?php
require './config/conn.php';
error_reporting(0);
session_start();
$file = $_FILES['userFile'];
$e_id=$_POST['e_id'];
$user_id=$_POST['user_id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$dob = $_POST['dob'];
$pan = $_POST['pan'];
$mobile = $_POST['mobile'];
$location = $_POST['location'];
$designation = $_POST['designation'];
$supervisor = $_POST['supervisor'];
$salary = $_POST['salary'];
$addr1 = $_POST['addr1'];
$addr2 = $_POST['addr2'];
$city = $_POST['city'];
$country = $_POST['country'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode'];
$fullname = $fname . ' ' . $lname;
$address = $addr1 . ',' . $addr2 .','.  $city . '-' . $zipcode.','.  $state . ',' . $country;
// $name = md5($fname+ $lname);
// $address =md5($addr1+$addr2+$city+$country+$state+$zipcode);

   $name1="";
	$name1= $fname;
	$info = pathinfo($_FILES['userFile']['name']);
	$ext1 = $info['extension']; // get the extension of the file
	//echo $ext1;
	if(strcmp($ext1,'psd')==0)
	{
		echo "<script>window.alert('File Format Error, Use only JPG or PNG formats')</script>";
	}
	else
	{
		//echo "<script>window.alert('File format OK')</script>";
		$ext ="jpg";
		$newname = "$name1.".$ext; 
		echo $target = 'images/'.$newname;
		
	
		if(file_exists($newname)) 
		{
			//chmod('your-filename.ext',0755); //Change the file permissions if allowed
			unlink($newname); //remove the file
		}
		move_uploaded_file( $_FILES['userFile']['tmp_name'], $target);
	}
    $ext ="jpg";
	$newname = "$name1.".$ext; 
	
  $insertQ = "UPDATE employee_details set name='$fullname',mobile='$mobile',dob='$dob',
  pan='$pan',address='$address',location='$location', photo_path= '$newname' where e_id='$e_id' ";
  $insertR = mysqli_query($connect,$insertQ);
  
  if ($insertR) {
    
	$paymentsql = "UPDATE users set name='$fullname' where user_id ='$user_id'";
	$paymentResult = mysqli_query($connect,$paymentsql);


    // If successful, display a success message using JavaScript
    echo "<script>alert('Record inserted successfully');</script>";
    echo "<script>window.location.href='addProfile.php'</script>";
  } else {
    // If not successful, display an error message using JavaScript
    echo "<script>alert('Error inserting record: " . mysqli_error($con) . "');</script>";
  }
?>