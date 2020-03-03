<!DOCTYPE html> 
<?php
    session_start();
    include("include/connection.php");
    include("include/header.php");
    if(!isset($_SESSION['user_email'])){
      header("location:signin.php");
    }
    else {
?>
<html>
<head>
	<title>Account Settings</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/find_friends.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
    body{
        overflow-x: hidden;
    }
</style>
</head>
<body>
	<div class="row">
	   <div class="col-sm-2">
	    </div>
       <?php
	   $user=$_SESSION['user_email'];
	   $get_user ="select * from signup where user_email='$user'";
	   $run_user=mysqli_query($conn,$get_user);
	   $row=mysqli_fetch_array($run_user);
	   
       $user_name=$row['user_name'];
       $user_pass=$row['user_pass'];
       $user_email=$row['user_email'];
       $user_profile=$row['user_profile'];
       $user_country=$row['user_country'];
       $user_gender=$row['user_gender'];
	   ?>
	<div class="col-sm-8">
    <form action="" method="post" enctype="mutipart-form-data">
    	<table class="table table-bordered table-hover">
    		<tr align="center">
                 <td colspan="6" class="active"><h2>Change Account Settings</h2></td>
    		</tr>  
    		<tr>
    			<td style="font-weight:bold;">Change Your Username </td>
    			<td>
    				<input type="text" name="u_name" class="form-control" required value="<?php echo $user_name;?>" >
    			</td>
    		</tr>
            <tr>
            	<td></td>
            	<td><a class="btn btn-default" style="text-decoration:none; font-size: 15px;" href="upload.php"><i class="fa fa-user" aria-hidden="true"></i>Change Profile</a></td>
            </tr>
            <tr>
    			<td style="font-weight:bold;">Change Your Email</td>
    			<td>
    				<input type="email" name="u_email" class="form-control" required value="<?php echo $user_email;?>" >
    			</td>
    		</tr>
            <tr>
                <td style="font-weight: bold">Country</td>
                <td>
                    <select class="form-control" name="u_country">
                        <option><?php echo $user_country;?></option>
                        <option>USA</option>
                        <option>UK</option>
                        <option>UAE</option>
                        <option>AUCKLAND</option>
                        <option>SWITZERLAND</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold">Gender</td>
                <td>
                    <select class="form-control" name="u_gender">
                        <option><?php echo $user_gender;?></option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>
                    </select>
                </td>
            </tr>
            <tr>
               <td style="font-weight: bold;">Forgot Password</td>
               <td>
                   <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Additonal detail</button>
            <div id="myModal" class="modal fade" role="dialog">
                 <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <form action="recovery.php?id=<?php echo $user_id; ?>" method="post" id="f">
                    <strong>What is your Phone Number?</strong>
                   <input tyoe="text" class="form-control" name="num" placeholder="Enter Number"><br>
                   <input class="btn btn-default" type="submit" name="sub"
                   value="Submit" style="width:100px;"><br><br>
                   <pre>Answer the above question we will ask you,if you forgot your password
                   </pre>
                </form>
                <?php
                   if(isset($_POST['sub'])){
                    $bfn=htmlentities($_POST['num']);
                    if($bfn==''){
                         echo "<script>alert('Please enter something.')</script>";
                         echo "<script>window.open('account_settings.php','_self')</script>";
                         exit();
                      }
                      else{
                           $update="update signup set forgotten_answer='$bfn' where user_email='$user'";
                           $run=mysqli_query($conn,$update);
                           if($run){
                                 echo "<script>alert('Working....')</script>";
                         echo "<script>window.open('account_settings.php','_self')</script>";  
                           }
                           else{
                             echo "<script>alert('Error while updating Info!')</script>";
                         echo "<script>window.open('account_settings.php','_self')</script>";
                      }
                   }
               }
                   ?>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
       </div>
    </div>
</div>
        </td> 
            </tr>
            <tr><td></td><td><a class="btn btn-default" style="text-decoration: none;font-size: 15px;" href="change_password.php"><i class="fa fa-key fa-fw" aria-hidden="true"></i>Change Password</a></td></tr>
    	<tr align="center">
        <td colspan="6">
            <input type="submit" value="Update" name="update" class="btn btn-info">
        </td>
        </tr>
</table>
</form>
<?php 
      if(isset($_POST['update'])){
        $user_name=htmlentities($_POST['u_name']);
        $email=htmlentities($_POST['u_email']);
        $u_country=htmlentities($_POST['u_country']);
        $u_gender=htmlentities($_POST['u_gender']);
        $update="update signup set user_name='$user_name',user_email='$email',user_country='$u_country',user_gender='$u_gender' where user_email='$user'";
        $run=mysqli_query($conn,$update);
        if($run){
            echo "<script>alert('information updated successfully!!')</script";
            echo "<script>window.open('account_settings.php','_self')</script>"; 
      }
  }
?>
	</div>
    <div class="col-sm-2">
    </div>
</div>
<!-- Optional JavaScrip t -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<?php } ?> 