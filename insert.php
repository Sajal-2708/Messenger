 <?php 
include("include/connection.php");
$msg= htmlentities($_POST['msg_cont']);
       session_start();
        $username=$_SESSION['user2'];
        $user_name=$_SESSION['user1'];
        if($msg == ""){
        ?>
          <script>alert("Message is empty");</script>
        <?php
        }
         else if(strlen($msg)>100){
          ?> 
          <script>alert("Message is too long.");</script>
        <?php }
        else{
             $insert="INSERT into users_chat(sender_username,receiver_username,msg_content,msg_status,msg_date) values('$user_name','$username','$msg','unread',NOW())";
             $run_insert=mysqli_query($conn,$insert);
        }
        header("location:home.php?user_name=$username");
?>