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
	<title>Change Password</title>
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
       
       $user_pass=$row['user_pass'];
            ?>
        <div class="col-sm-8">
            <form action="" method="post">
                <table class="table table-bordered table-hover">
                    <tr align="center">
                        <td colspan="6" class="active"><h2>Change Passoerd</h2></td>
                    </tr>
                    <tr>
                    <td style="font-weight: bold;">Current Password</td>
                    <td>
                        <input type="password" name="current_pass" id="mypass" class="form-control" required placeholder="Current password">
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">New Password</td>
                    <td>
                        <input type="password" name="u_pass1"id="mypass" class="form-control" required placeholder="New password">
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Confirm Password</td>
                    <td>
                        <input type="password" name="u_pass2"id="mypass" class="form-control" required placeholder="
                      Confirm Password">
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="6">
                        <input type="submit" name="change" value="change" class="btn btn-info">
                    </td>
                </tr>
                </table>
            </form>
            <?php 
               if(isset($_POST['change'])){
                      $c_pass=$_POST['current_pass'];
                      $pass1=$_POST['u_pass1'];
                      $pass2=$_POST['u_pass2'];
                      $user=$_SESSION['user_email'];
                      $get_user="select * from signup where user_email='$user'";
                      $run=mysqli_query($conn,$get_user);
                      $row=mysqli_fetch_array($run);
                      $user_password=$row['user_pass'];
                      if($c_pass!=$user_password){
                        echo "<div class='alert alert-danger'>
                              <strong>current password is incorrect</strong>
                        </div>";
                      }
                       if($pass1!=$pass2){
                        echo "<div class='alert alert-danger'>
                              <strong>Your New password didn't match with confirm password</strong>
                        </div>";
                      }
                      if(strlen($pass1)<9 and strlen($pass2)<9){
                         echo "<div class='alert alert-danger'>
                              <strong>Use 9 or more than 9 characters for password</strong>
                        </div>";
                      }
                      if($pass1==$pass2 and $c_pass==$user_password and strlen($pass1)>=9){
                             $run=mysqli_query($conn,"update signup set user_pass='$pass1' where user_email='$user'");                     echo "<div class='alert alert-success'>
                              <strong>Your password is changed</strong>
                        </div>";              
                      }
               }
            ?>
        </div>
        <div class="col-sm-2">
            
        </div>
    </div>
</body>
</html>
<?php } ?>