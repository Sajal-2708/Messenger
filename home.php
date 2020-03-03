<!DOCTYPE html>
<?php
    include("include/session_duration.php");
    include("include/connection.php");
    if(!isset($_SESSION['user_email'])){
      header("location:signin.php");
    }
    else{
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>
  </head>
  <body>
  	<div class="main">
    <div class="row">
         <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
           <div class="input-group searchbox">
           <div class="input-group-btn">
            <center><a href="include/find_friends.php"><button class="btn btn-default search-icon" name="serach_user" type="submit">Add new user</button></a></center>
         </div>
    </div>
    <div class="left-chat">
      <ul>
        <?php 
         $user=$_SESSION['user_email'];
        include("include/get_users_data.php"); ?>
      </ul>
    </div>
  </div>
  <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
    <div class="row">
    <!--Getting the information who is logged in--> 
     <?php
           $user=$_SESSION['user_email'];
           $get_user="SELECT * from signup where user_email='$user'";
            $run_user=mysqli_query($conn,$get_user);
             $row=mysqli_fetch_array($run_user);
             $user_name=$row['user_name'];//sender
             $_SESSION['user1']=$user_name;
             ?>
             <!--getting the user information whom you are chatting with-->
             <?php
                   if(isset($_GET['user_name'])){
                     global $conn;
                     $get_username=$_GET['user_name'];
                     $get_user="SELECT * from signup where user_name='$get_username'";
                     $run_user=mysqli_query($conn,$get_user);
                     $row_user=mysqli_fetch_array($run_user);
                     $username=$row_user['user_name'];//receiver
                     $_SESSION['user2']=$username;
                     $user_profile_image=$row_user['user_profile']; 
    
                 $total_messages="SELECT * from users_chat where (sender_username='$user_name' AND receiver_username='$username') or (sender_username='$username' AND receiver_username='$user_name')";
                 $run_messages=mysqli_query($conn,$total_messages);
                 $total=mysqli_num_rows($run_messages);             
             ?>
           <div class="col-md-12 right-header">
           <div class="right-header-img">
            <img src=<?php echo $user_profile_image;?>>
         </div>
         <div class="right-header-detail">
            <form method="post">
           <p style="color:red;"> <?php echo "$username"; ?></p>
           <span><?php echo $total; ?> messages </span>&nbsp &nbsp
           <button name="logout" class="btn btn-danger" style="margin-left:500px;">Logout</button>
            </form>
          <?php
              if(isset($_POST['logout'])){
                  $update_msg=mysqli_query($conn, "UPDATE signup SET log_in='Offline' WHERE user_name='$user_name'");
                  header("location:logout.php");
                  exit();
           }
          ?>
         </div>
       </div>
     </div>
     <div class="row">
       <div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
        <?php
             $update_msg=mysqli_query($conn,"UPDATE users_chat SET msg_status='read' WHERE sender_username='$username' AND receiver_username='$user_name'");
             $sel_msg="SELECT * FROM users_chat WHERE (sender_username='$user_name' AND receiver_username='$username') OR 
             (sender_username='$username' AND receiver_username='$user_name') ORDER BY 1 ASC";
           $run_msg=mysqli_query($conn,$sel_msg);
           while($row=mysqli_fetch_array($run_msg)){
                     $sender_username=$row['sender_username'];
                     $receiver_username=$row['receiver_username'];
                     $msg_content=$row['msg_content'];
                     $msg_date=$row['msg_date'];
            ?>
        <ul>
        <?php
                if($user_name==$sender_username AND $username==$receiver_username){
                       echo "
                       <li>
                           <div class='rightside-right-chat'>
                           <span> $user_name <small> $msg_date </small></span><br><br>
                           <p>$msg_content</p>
                           </div>
                       </li>
                       ";
                }
                 else if($user_name==$receiver_username AND $username==$sender_username){
                       echo "
                       <li>
                           <div class='rightside-left-chat'>
                           <span> $username <small> $msg_date </small></span><br><br>
                           <p>$msg_content</p>
                           </div>
                       </li>
                       ";
                }
        ?>
          
        </ul>
        <?php 
             }
        ?>
       </div> 
     </div>
     <div class="row">
            <div class="col-md-12 right-chat-textbox">
              <form method="post" action="insert.php">
                <input autocomplete="off" type="text" name="msg_cont"  id='msg' placeholder="Write your message........">
                <button class="btn" name="submit" style="margin-bottom: 4px;">send<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
              </form>
             </div>
    </div>
  </div>
</div>

    <!-- Optional JavaScrip t -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $('#scrolling_to_bottom').animate({
      scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight},1000);
</script>
<script type="text/javascript">
     $(document).ready(function(){
          var height=$(window).height();
          $('.left-chat').css('height',(height-92) + 'px');
          $('.right-header-contentChat').css('height',(height-163) + 'px');
     });
</script>
  </body>
</html>           
<?php
} 
} ?>