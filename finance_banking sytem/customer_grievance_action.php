<?php
     include "validate_customer.php";
      include "connect.php";
   include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="action_style.css">
</head>


<body>
    <div class="flex-container">
        <div class="flex-item">
            <?php
            $headline = mysqli_real_escape_string($conn, $_POST["headline"]);
            $news_details = mysqli_real_escape_string($conn, $_POST["news_details"]);
             $id = $_SESSION['loggedIn_cust_id'];
              $sql1 = "SELECT * FROM customer WHERE cust_id= $id";

    $result0 = $conn->query($sql0);
    $result1 = $conn->query($sql1);

    if ($result0->num_rows > 0) {
        // output data of each row
        while($row = $result0->fetch_assoc()) {
             $fname = $row["first_name"];
            $lname = $row["last_name"];
            $acno = $row["account_no"];
            $senderdetail=$fname." ".$lname." "."AC/NO ".$acno;

             $sql0 = "INSERT INTO grievance(cust_id,created,title,body,sender )
            VALUES( $id,NOW(),'$headline','$news_details',' $senderdetail')";

            //$sql1 = "INSERT INTO   grievance_body()
            //VALUES()"; 
             if (($conn->query($sql0) === TRUE) ) { 
                echo '<p id="info"> ';
                echo "Issue posted successfully !\n </p>";
            
            } 
    }

        }else { 
                echo '<p id="info">';
                echo "Server Error !<br>";
                echo "Error: " . $sql0 . "<br>" . $conn->error . "<br>";
                echo "Error: " . $sql1 . "<br>" . $conn->error . "<br></p>"; 
            
            }

            $conn->close();
        
    ?>

           


            
           
            
        </div>

        <div class="flex-item">
            <a href="./customer_grievance.php" class="button">Post Again</a>
        </div>

    </div>

</body>
</html>
