<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <title>SignIn</title>
  </head>
  <body>
  	
  	<div class="signin-form">
    <form action="" method="post">
    	<div class="form-header">
    		<h1>Sign In</h1>
    		<p>Login to my Chatroom</p>
    	</div>
      <div class="form-group">
       <label for="email">Email</label>
       <input type="email" name="email" class="form-control" id="email" placeholder="example@gmail.com" auto-complete="off" required>
      </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="Password" name="password" class="form-control" id="Password" placeholder="Password" auto-complete="off" required>
  </div>
  <div class="small">Forgot Password?<a href="Forgot_pass.php">Click here</a></div><br>
  <div class="form-group">
  <button type="submit" class="btn btn-primary btn-block btn-log" name="sign_in">Submit</button>
</div>
<?php include("signin_user.php");?>
</form>
<div class="text-center small" style="color:#674288">Don't have an account?<a href="signup.php">Create One</a></div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>