<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_sidebar_style.css">
    <!--<style>
        .blink-image{
            -moz-animation:blink normal 2s infinite ease-in-out;
             -webkit-animation:blink normal 2s infinite ease-in-out;
              -ms-animation:blink normal 2s infinite ease-in-out;
               animation:blink normal 2s infinite ease-in-out;
        }
        @-moz-keyframes blink{
        0%{
            
                opacity:1;
            }
             50%{
            
                opacity:1;
            }
             100%{
            
                opacity:1;
            }
    }
    @-ms-keyframes blink{
        0%{
            
                opacity:1;
            }
             50%{
            
                opacity:1;
            }
             100%{
            
                opacity:1;
            }
    }
    @keyframes blink{
        0%{
            
                opacity:1;
            }
             50%{
            
                opacity:1;
            }
             100%{
            
                opacity:1;
            }
    }
    </style>-->
</head>

<body>
    <div class="sidenav" id="theSideNav">
        <a href="javascript:void(0)" id="closebtn" style="padding: 10px 20px;"
                        onclick="closeNav()">&times;</a>
        <a href="./customer_home.php" id="label" style="color:darkred;background-color:red">Home</a>
        <a href="./customer_transactions.php">My Transactions</a>
        <a id="label" style="color:green">Send/Recieve</a>
        <a href="./beneficiary.php">Transfer Funds</a>
        <a href="./pesa_mpesa.php">Pesa M-pesa</a>
       
        
            


       
          <a href="customer_grievance.php"   ><img src="images/suggestion.png" width="100" height="50"></a>
          
       
    
          
         <a   id="label" style="color:green">HELP DESK</a>
         <a href="./contact.php" id="label"><img src="images/contact.png" width="100" height="50"></a>
         <a href="helpfile.php"   ><img src="images/help-icon.jpg" width="100" height="50"></a>
      
        
    </div>

<script>
// For-Loop below is used to create active links and accordingly color them.
// Helps in recognizing which tab is selected.
for (var i = 0; i < document.links.length; i++) {
    if (document.URL.indexOf('?') > 0) {
        sanitizedURL = document.URL.substring(0, document.URL.indexOf('?'));
    }
    else {
        sanitizedURL = document.URL;
    }
    if (document.links[i].href == sanitizedURL) {
        document.links[i].className = 'active';
    }
}

function openNav() {
    document.getElementById("theSideNav").style.width = "256px";
    var x = document.getElementById("theSideNav");
    if (x.className === "sidenav sidenav-fixed") {
        x.className += " responsive";
    }
}

// Never use get window size of jquery, in javascript, they dont work !
function closeNav() {
    if (document.documentElement.clientWidth < 856) {
        document.getElementById("theSideNav").style.width = "0";
    }
}

$(document).ready(function() {
    $(window).resize(function () {
        if ($(window).width() > 855)
            document.getElementById("theSideNav").style.width = "256px";

        if (($(window).width()) < 856){
            $('#closebtn').trigger('click');
        }
    });
});

// Function below is jquery-3 function used for making the navbar sticky
$(document).ready(function() {
    $(window).scroll(function () {
        var x1 = document.getElementById("theSideNav").style.width;

        if ($(window).scrollTop() > 120) {
          $("#theSideNav").addClass('sidenav-fixed');

            if (($(window).width()) < 856 && x1 == "256px") {
                $('#hamburger').trigger('click');
            }
        }

        if ($(window).scrollTop() < 121) {
          $("#theSideNav").removeClass('sidenav-fixed');
        }
    });
});
</script>

</body>
</html>
