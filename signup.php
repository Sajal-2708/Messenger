<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <title>Signup</title>
  </head>
  <body>
  	
  	<div class="signin-form">
    <form action="signup_user.php" method="post">
    	<div class="form-header">
    		<h1>Sign Up</h1>
    		<p>Create an Account</p>
    	</div>
      <div class="form-group">
       <label for="name">Name</label>
       <input type="text" name="name" class="form-control" id="name" placeholder="Example:Sajal" auto-complete="off" required>
      </div>
      <div class="form-group">
       <label for="email">Email</label>
       <input type="email" name="email" class="form-control" id="email" placeholder="example@gmail.com" auto-complete="off" required>
      </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" name="password" class="form-control" id="Password" placeholder="Password" required>
  </div>
   <div class="form-group">
    <label for="country">Country</label>
    <select class="form-control" id="country" name="country">
      <option disabled="">Select a Country</option>
      <option>India</option>
      <option>Pakistan</option>
      <option>Srilanka</option>
      <option>Bangladesh</option>
      <option>Nepal</option>
    </select>
  </div>
  <div class="form-group">
    <label for="gender">Gender</label>
    <select class="form-control" id="gender" name="gender">
      <option disabled="">Select a Gender</option>
      <option>Male</option>
      <option>Female</option>
      <option>Other</option>
    </select>
  </div>
  <div class="form-group"> 
  <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="terms">
  <label class="custom-control-label" for="terms">I agree the <a href="#">terms of use</a> and <a href="#">Privacy</a></label>
  </div>
</div>
  <div class="form-group">
  <button type="submit" class="btn btn-primary btn-block btn-log" name="sing_up">Signup</button>
</div>
</form>
<div class="text-center small" style="color:#674288">Already have an Account?<a href=
  "signin.php">Login</a></div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>