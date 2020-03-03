<?php
include("include/connection.php");
$name=htmlentities(mysqli_real_escape_string($conn,$_POST['name']));
$email=htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
$pass=htmlentities(mysqli_real_escape_string($conn,$_POST['password']));
$country=htmlentities(mysqli_real_escape_string($conn,$_POST['country']));
$gender=htmlentities(mysqli_real_escape_string($conn,$_POST['gender']));
if($name==''){
	 echo '<script>alert("Please fill out name!!");</script>';
	 exit();
}
if(strlen($pass)<8){
	 echo '<script>alert("Password should be atleast of 8 characters!!");</script>';
	 exit();
}
$check_email="select * from signup where user_email='$email'";
$run_email=mysqli_query($conn,$check_email);
$row=mysqli_num_rows($run_email);
if($row==1){
    echo "<script>alert('Email already exist,redirecting to signin page!!');</script>";
    echo "<script>window.open('signin.php','_self')</script>";
    exit();
}
if($gender=='Male')
	$profile_pic="images/avatar2.png";
else if($gender=='Female')
	$profile_pic="images/avatar1.png";

$insert = "insert into signup(user_name,user_pass,user_email,user_profile, user_country,user_gender) values ('$name','$pass','$email','$profile_pic',
'$country','$gender')";

$result=mysqli_query($conn,$insert);
if($result){
       echo '<script>alert("Your account has been created!!");</script>';
       echo "<script>window.open('signin.php','_self')</script>";
    }else{
    	echo '<script>alert("Something went wrong, please try again later!");</script>';
    	echo "<script>window.open('signup.php','_self')</script>";
    }
  mysqli_close($conn);
?>