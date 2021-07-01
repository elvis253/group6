<?php
    include "connect.php";
    include "validate_customer.php";
    #include "connect.php";

    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['loggedIn_cust_id'])) {
        $id=$_SESSION['loggedIn_cust_id'];
        
        $sql0 = "SELECT * FROM customer WHERE cust_id=".$_SESSION['loggedIn_cust_id'];
        $sqlmessage = "SELECT * FROM adminreplies WHERE cust_id=$id";
        $sqlnews = "SELECT * FROM news";
         $resultnews = $conn->query($sqlnews);
         $resultmessage = $conn->query($sqlmessage);
            //$result1=$conn->query($newbody);

            if ($resultnews->num_rows > 0) {
                 $_SESSION['news_number_of_rows']=mysqli_num_rows( $resultnews);
             }
             //else{
             // $_SESSION['news_number_of_rows']=0;

            // }
            //$result1=$conn->query($newbody);

            if ($resultmessage->num_rows > 0) {
                $_SESSION['messnumber_of_rows']=mysqli_num_rows(  $resultmessage );
            }
            //else{
              // $_SESSION['messnumber_of_rows']=0;

            //}

        $result = $conn->query($sql0);
        $row = $result->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user_navbar_style.css">
    <script src="jquery-3.2.1.min.js"></script>
</head>

<body>
    <div class="nav-wrapper"> 
        <div class="topnav" id="theTopNav"> 
            <a href="javascript:void(0);" class="icon" onclick="openNav()" id="hamburger">
                &#9776;
            </a>
            <a id="user">Welcome, &nbsp<?php echo $row["first_name"]; ?> !</a>
            <a id="logout" href="./logout_action.php" onclick="return confirm('Are you sure?')">Logout</a>
            <a id="profile" href="./customer_profile.php">My Profile</a>
            <a href="customer_news.php" id="label"  ><img class="blink-image" src="images/new.jpg" width="100" height="50"><sup style="color:red"><blink> <?php if(isset(  $_SESSION['news_number_of_rows'])){
              
              echo $_SESSION['news_number_of_rows'];}?>
                 </blink></sup></a>
                  <a href="./delete_messages.php" id="label"><img src="images/mess.jpg" width="100" height="50"><sup style="color:red"><blink><?php if(isset( $_SESSION['messnumber_of_rows'])){echo  $_SESSION['messnumber_of_rows'];}?></blink></sup></a>
        </div>
    </div>

<script>
// Function below is jquery-3 function used for making the navbar sticky
$(document).ready(function() {
  $(window).scroll(function () {
    if ($(window).scrollTop() > 120) {
      $("#theTopNav").addClass('navbar-fixed');
    }
    if ($(window).scrollTop() < 121) {
      $("#theTopNav").removeClass('navbar-fixed');
  }
  });
});
</script>

</body>
</html>
