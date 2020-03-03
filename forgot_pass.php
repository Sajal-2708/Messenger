<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <title>Forgot Password</title>
  </head>
  <body>
    
    <div class="signin-form">
    <form action="" method="post">
        <div class="form-header">
            <h1>Forgot password</h1>
            <p>Login to my Chatroom</p>
        </div>
      <div class="form-group">
       <label for="email">Email</label>
       <input type="email" class="form-control" name='email' placeholder="example@gmail.com" auto-complete="off" required>
      </div>
  <div class="form-group">
    <label for="Number">Phone Number</label>
    <input type="text" name="No" class="form-control" placeholder="Phone No." auto-complete="off" required>
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-primary btn-block btn-log" name="submit">Submit</button>
</div>
</form>
<div class="text-center small" style="color:#674288">Back to signin page?<a href="signin.php">Click Here</a></div>
</div>
    <?php 
     session_start();
     include("include/connection.php");
       if(isset($_POST['submit'])){
          $email=htmlentities( mysqli_real_escape_string($conn,$_POST['email']));
          $recovery_account=htmlentities( mysqli_real_escape_string($conn,$_POST['No']));
          $select="select * from signup where user_email='$email' and forgotten_answer='$recovery_account'";
          $query=mysqli_query($conn,$select);
          $check_user=mysqli_num_rows($query);
          if($check_user==1){
          $_SESSION['user_email']=$email;
          echo "<script type='text/javascript'>window.open('create_pass.php','_self')</script>";
      }else{
      echo "<script type='text/javascript'>alert('Wrong Phone Number!')</script>";
      echo "<script type='text/javascript'>window.open('forgot_pass.php','_self')</script>";
  }
   }
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>