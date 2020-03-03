<?php
session_start();

include("include/connection.php");

if(isset($_POST['sign_in'])){
       $email=htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
       $pass=htmlentities(mysqli_real_escape_string($conn,$_POST['password']));
       $sql="select * from signup where user_email='$email' and user_pass='$pass'"; 
       $result=mysqli_query($conn,$sql);
       $row=mysqli_num_rows($result);
       if($row==1) {
             $_SESSION['user_email']=$email;
             $update_msg=mysqli_query($conn,"update signup set log_in='Online' where user_email=
             	'$email'");
             $user=$_SESSION['user_email'];
             $get_user="select * from signup where user_email='$user'";
             $run_user=mysqli_query($conn,$get_user);
             $row=mysqli_fetch_array($run_user);
             $user_name=$row['user_name'];
             echo "<script>window.open('home.php','_self')</script>";
    }else{
    	echo "<div class='alert alert-danger'>
    	<strong>Email Id or Password is Wrong!!</strong>
    	</div>";
    }
}
  mysqli_close($conn);
?>