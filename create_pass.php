<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <title>Create New Pass</title>
  </head>
  <body>
  	
  	<div class="signin-form">
    <form action="" method="post">
    	<div class="form-header">
    		<h1>New Password</h1>
    		<p>Login to my Chatroom</p>
    	</div>
<div class="form-group">
    <label for="Password">Enter Password</label>
    <input type="Password" name="pass1" class="form-control" id="Password" placeholder="Password" auto-complete="off" required>
  </div>
  <div class="form-group">
    <label for="Password">Confirm Password</label>
    <input type="Password" name="pass2" class="form-control" id="Password" placeholder="Password" auto-complete="off" required>
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-primary btn-block btn-log" name="change">Change</button>
</div>
</form>
   <?php
    session_start();
    include("include/connection.php");
    if(isset($_POST['change'])){
        $pass1=$_POST['pass1'];
        $pass2= $_POST['pass2']; 
        $email=$_SESSION['user_email'];
        if($pass1!=$pass2){
        echo "<div class='alert alert-danger'>
          <strong>Passwords are not Matching.</strong>
        </div>";
      } 
      if(strlen($pass1)<9 and strlen($pass2)<9){
        echo "<div class='alert alert-danger'>
          <strong>Password length is less than 9 Characters</strong>
        </div>";
    }
    if($pass1==$pass2 and strlen($pass1)>=9){
        $update_pass=mysqli_query($conn,"update signup set user_pass='$pass1' where user_email='$email'");
        session_unset();
        session_destroy();
        echo "<script type='text/javascript'>alert('Password changed succesfully!!')</script>";
        echo "<script type='text/javascript'>window.open('signin.php','_self')</script>"; 
  }
  }
    ?>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>