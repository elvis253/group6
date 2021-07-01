<?php
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

    
    include "validate_admin.php";
    include "header.php";
     include "connect.php";
    include "user_navbar.php";
    include "admin_sidebar.php";
    include "session_timeout.php";

    
        $sql0 = "SELECT * FROM news ";
        //$newbody="SELECT * FROM news_body";
    

    // Recive sort variables as $_GET
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="transactions_style.css">
</head>

<body>
    <div class="search-bar-wrapper">
        <div class="search-bar" id="the-search-bar">
            <div class="flex-item-search-bar" id="fi-search-bar">
                <h1>POSTED NEWS</h1>

                <div class="flex-item-by">
                    
                </div>

                <div class="flex-item-search-by">
                    
                </div>

            </div>
        </div>
    </div>

    <div id="id01" class="modal">

      <form class="modal-content animate" action="" method="post">
        <div class="imgcontainer">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Filter">&times;</span>
        </div>

        <div class="container">
            
          <div class="duration-container">
              <div class="date-container">
                 
              </div>
              <p id="minus">&minus;<b></p>
              <div class="date-container">
                 
              </div>
          </div>


          
        </div>

      </form>
    </div>

    <div class="flex-container">
        
    </div>

    <div class="flex-container">

        <?php
            $result = $conn->query($sql0);
            //$result1=$conn->query($newbody);

            if ($result->num_rows > 0) {
                
                 ?>
                 <form action="admin_posted_newaction.php" method="post">
                    <center><input type="submit" name="submit" value=delete style="background-color: orange;color:green;width:50px;height:50px"></center>
                <table id="transactions">
                    <tr><th>select</th>
                        
                        <th>Date & Time </th>
                        <th>Title</th>
                        <th>body </th>
                        
                    </tr>
        <?php
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $numberofrows=mysqli_num_rows($result);
               ?>
               
                
                    <tr><td>
                       <?php 
                       $repid=$row['id']; ?>
                       <input type="checkbox" name='subject[]' value= "<?php echo $repid ;?>"> 
                      
                           
                       
                        <td>
                            <?php
                                $time = strtotime($row["created"]);
                                $sanitized_time = date("d/m/Y, g:i A", $time);
                                echo $sanitized_time;
                             ?>
                        </td>
                        <td><?php echo $row["title"]; ?></td>
                        <td><?php echo $row["body"]; ?></td>
                    
                        
                    </tr>
            <?php } ?>
            </table>
            </form>
            <?php
            }else {  ?>
                <p id="none"> No results found :(</p>
            <?php }
            $conn->close(); ?>

    </div>

    <script>
    // Sticky search-bar
    $(document).ready(function() {
        var curr_scroll;

        $(window).scroll(function () {
            curr_scroll = $(window).scrollTop();

            if ($(window).scrollTop() > 120) {
                $("#the-search-bar").addClass('search-bar-fixed');

              if ($(window).width() > 855) {
                  $("#fi-search-bar").addClass('fi-search-bar-fixed');
              }
            }

            if ($(window).scrollTop() < 121) {
                $("#the-search-bar").removeClass('search-bar-fixed');

              if ($(window).width() > 855) {
                  $("#fi-search-bar").removeClass('fi-search-bar-fixed');
              }
            }
        });

        $(window).resize(function () {
            var class_name = $("#fi-search-bar").attr('class');

            if ((class_name == "flex-item-search-bar fi-search-bar-fixed") && ($(window).width() < 856)) {
                $("#fi-search-bar").removeClass('fi-search-bar-fixed');
            }

            if ((class_name == "flex-item-search-bar") && ($(window).width() > 855) && (curr_scroll > 120)) {
                $("#fi-search-bar").addClass('fi-search-bar-fixed');
            }
        });

        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });
    </script>

</body>
</html>
