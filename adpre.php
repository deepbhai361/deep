<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adloggedin"]) || $_SESSION["adloggedin"] !== true){
    header("location: adlogin");
    exit;
}
require_once "config.php";
$optb="SELECT SUM(balance) as total FROM `users`";
$optresb=$conn->query($optb);
$sumb= mysqli_fetch_assoc($optresb);
if($sumb['total']==""){
    $balance=0;
    
}else{
    $balance=round($sumb['total'],2);
}
$optp="SELECT period,nxt FROM `period`";
$optresp=$conn->query($optp);
$sump= mysqli_fetch_assoc($optresp);
if($sump['nxt']=="11"){
    $pre="Not set";
    
}else{
    $pre=$sump['nxt'];
}
$opt="SELECT SUM(amount) as total FROM `betting` WHERE status='pending' AND ans='red'";
$optres=$conn->query($opt);
$sum= mysqli_fetch_assoc($optres);
$red=round($sum['total'],2);

$optg="SELECT SUM(amount) as total FROM `betting` WHERE status='pending' AND ans='green'";
$optresg=$conn->query($optg);
$sumg= mysqli_fetch_assoc($optresg);
$green=round($sumg['total'],2);

$optv="SELECT SUM(amount) as total FROM `betting` WHERE status='pending' AND ans='violet'";
$optresv=$conn->query($optv);
$sumv= mysqli_fetch_assoc($optresv);
$violet=round($sumv['total'],2);

$opt0="SELECT SUM(amount) as total FROM `betting` WHERE status='pending' AND ans='0'";
$optres0=$conn->query($opt0);
$sum0= mysqli_fetch_assoc($optres0);
$zero=round($sum0['total'],2);

$opt1="SELECT SUM(amount) as total FROM `betting` WHERE status='pending' AND ans='1'";
$optres1=$conn->query($opt1);
$sum1= mysqli_fetch_assoc($optres1);
$one=round($sum1['total'],2);

$opt2="SELECT SUM(amount) as total FROM `betting` WHERE status='pending' AND ans='2'";
$optres2=$conn->query($opt2);
$sum2= mysqli_fetch_assoc($optres2);
$two=round($sum2['total'],2);

$opt3="SELECT SUM(amount) as total FROM `betting` WHERE status='pending' AND ans='3'";
$optres3=$conn->query($opt3);
$sum3= mysqli_fetch_assoc($optres3);
$three=round($sum3['total'],2);

$opt4="SELECT SUM(amount) as total FROM `betting` WHERE status='pending' AND ans='4'";
$optres4=$conn->query($opt4);
$sum4= mysqli_fetch_assoc($optres4);
$four=round($sum4['total'],2);

$opt5="SELECT SUM(amount) as total FROM `betting` WHERE status='pending' AND ans='5'";
$optres5=$conn->query($opt5);
$sum5= mysqli_fetch_assoc($optres5);
$five=round($sum5['total'],2);

$opt6="SELECT SUM(amount) as total FROM `betting` WHERE status='pending' AND ans='6'";
$optres6=$conn->query($opt6);
$sum6= mysqli_fetch_assoc($optres6);
$six=round($sum6['total'],2);

$opt7="SELECT SUM(amount) as total FROM `betting` WHERE status='pending' AND ans='7'";
$optres7=$conn->query($opt7);
$sum7= mysqli_fetch_assoc($optres7);
$seven=round($sum7['total'],2);

$opt8="SELECT SUM(amount) as total FROM `betting` WHERE status='pending' AND ans='8'";
$optres8=$conn->query($opt8);
$sum8= mysqli_fetch_assoc($optres8);
$eight=round($sum8['total'],2);

$opt9="SELECT SUM(amount) as total FROM `betting` WHERE status='pending' AND ans='9'";
$optres9=$conn->query($opt9);
$sum9= mysqli_fetch_assoc($optres9);
$nine=round($sum9['total'],2);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ADMIN</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="admincss/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="admincss/style.css" rel="stylesheet">



<link href="css/app.46643acf.css" rel="preload" as="style">
<link href="css/chunk-vendors.cf06751b.css" rel="preload" as="style">
<link href="js/chunk-vendors.824d6eef.js" rel="preload" as="script">
<link href="css/chunk-vendors.cf06751b.css" rel="stylesheet">
<link href="css/app.46643acf.css" rel="stylesheet">
<style>
   #copied{
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 50px;
            font-size: 17px;
        }

       

        #copied.show {
            visibility: visible;
            margin-bottom: 205px;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }
     
body {
    font-family: "Lato", sans-serif;
  }
  
  .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
  }
  
  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
  }
  
  .sidenav a:hover {
    color: #f1f1f1;
  }
  
  .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }
  
  #main {
    transition: margin-left .5s;
    padding: 16px;
  }
  
  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }

</style>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>ADMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="admincss/male-09.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"style="
    color: #fff;
">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="admin" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="users" class="nav-item nav-link"><i class="fa fa-th me-2"></i>users</a>
                    <a href="adpre" class="nav-item nav-link active"><i class="fa fa-chart-bar me-2"></i>Next Prediction</a>
                    <a href="adreward" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Add Reward</a>
                    <a href="inviterec" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Invite Record</a>
                    <a href="adwith" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Withdraw Req</a>
                    <a href="rechargeRequests" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Recharge Req</a>
                    <a href="upi" class="nav-item nav-link"><i class="fa fa-table me-2"></i>upi change</a>
                     <a href="adduser" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Add User</a>
                    <a href="notice" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Notice change</a>
                    
                    <a href="delete" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Delete User</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0" style="background-color: #071251 !important;">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                   
                
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="admincss/male-09.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                           
                            <a href="/logout" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


<div>
     <h2 style="font-size:20px;padding:10px;text-align:center;" onclick="window.location.href='adpre'">FastParity</h2>
     <h2 style="font-size:20px;padding:10px;  color:grey; text-align:center;"  onclick="window.location.href='emredadpre'">Parity</h2>
     <h2 style="font-size:20px;padding:10px;color:grey; text-align:center;" onclick="window.location.href='sapreadpre'">Sapre</h2>
     <h2 style="font-size:20px;padding:10px; color:grey; text-align:center;" onclick="window.location.href='beconeadpre'">Dice</h2>
     <h2 style="font-size:20px;padding:10px; color:grey; text-align:center;" onclick="window.location.href='abadpre'">AndharBahar</h2>
     <h2 style="font-size:20px;padding:10px; color:grey; text-align:center;" onclick="window.location.href='wheeladpre'">Wheelocity</h2>
      <h2 style="font-size:20px;padding:10px;color:grey; text-align:center; color:green">Total User balance : <?php echo $balance; ?> </h2>
       <h2 style="font-size:20px;padding:10px; text-align:center;color:red">PERIOD: <?php echo $sump['period']  ?> </h2>
          <h2 id="demo" style="font-size:20px;padding:10px; text-align:center;color:red"> </h2>
       <h2 style="font-size:20px;padding:10px; text-align:center;color:red">Next prediction: <?php echo $pre; ?>  </h2>
     
     
 
 <div data-v-309ccc10="" class="recharge">
        <div data-v-309ccc10="" class="recharge_box">
             <h1>Red:₹&nbsp<?php echo $red;?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span>Green:₹&nbsp<?php echo $green;?></span></h1><br>
             
             <div style="font-size:20px;">
             <h1>Violet:₹&nbsp<?php echo $violet;?></h1><br>
             <h1><span>zero:₹&nbsp<?php echo $zero;?>&nbsp&nbsp</span><span>one:₹&nbsp<?php echo $one;?>&nbsp&nbsp</span></h1><br>
             <h1><span>two:₹&nbsp<?php echo $two;?>&nbsp&nbsp</span><span>three:₹&nbsp<?php echo $three;?>&nbsp&nbsp</span></h1><br>
             <h1><span>four:₹&nbsp<?php echo $four;?>&nbsp&nbsp</span><span>five:₹&nbsp<?php echo $five;?>&nbsp&nbsp</span></h1><br>
             <h1><span>six:₹&nbsp<?php echo $six;?>&nbsp&nbsp</span><span>seven:₹&nbsp<?php echo $seven;?>&nbsp&nbsp</span></h1><br>
             <h1><span>eight:₹&nbsp<?php echo $eight;?>&nbsp&nbsp</span><span>nine:₹&nbsp<?php echo $nine;?>&nbsp&nbsp</span></h1><br></div>
        <form action="pre" id="pre" method="POST" class="form-signup">
                 <h2 style="padding:10px;">Next Prediction</h2>
            <div data-v-309ccc10="" class="input_box"><img data-v-309ccc10=""
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAB00lEQVRoQ+1asS4EURQ97xc0lNSEQqKmp7QNX0CiMTdKq5QzGglfQGNLeltLFISaksYvPJndnWTDbN59s29iJHfaOe/MPWfOnJ3MWwflISKnANaU8BSwB5JHWiKnAWZZduyc62qwKTHe+26e5ycaTpUQEXkBsKghTIx5Jbmk4dQK8RqyEjPJyTp3lqRqRhVIRKKEjAT1K8SvxxhSYNsgJHbmSnyTQh6997dJpqwgcc5tAVgtTzUlpE9yoykRJa+I3AMYxLARITF1OI3Y8VIwIVVOlq1ldyQyZxatkGEWrZBDE85btELGWbRCDlm0fjsQ9RpvP4iREbPWChlmrRVyyFrLWmv4FcXqN/JZsfoNGWb1G3LI6tfq1+q31lNi9Ruyzeo35JDV7/T1e5nn+X5No9XLsiy7cM7tNbY/MprkzHt/p54qEuic2wRwWC5rZH8kcqYk8LYIGd/Zjd7RbTpaWqd7JDslWERuAGxrF7clWp8k534OLSIfAGZjxPx1tJ5JrlQIeQKw/J+EFLN2SPbGolXEqohX1JH6jrwBmI+aYAgeiBGRWiIAvJNc0FxX+xH7CsCOhjAx5prkroZTJaQgGr1aHwCY0RBPifny3p9r/6tVXOsbCz8HUf9wHDEAAAAASUVORK5CYII="
                    alt=""><input data-v-309ccc10="" type="text"  name="username" id="next"
                    placeholder="Enter a number from 0-9"><span data-v-309ccc10="" class="tips_span">Next perdiction</span></div>
           
            <div data-v-309ccc10="" class="input_box_btn"><button data-v-309ccc10="" type="button" onclick="sub()"
                    class="login_btn ripple">Confirm Next Prediction</button></div>
                   
                    
                    </form>
                     <div id="copied">Enter a number from 0-9</div>
            <div data-v-309ccc10="" class="input_box_btn">
                <div data-v-309ccc10="" class="two_btn"></div>
            </div>
        </div>
</div>

<script>
 function func() {
                      
    
                var countDownDate = Date.parse(new Date) / 1e3;
  var now = new Date().getTime();
  var distance = 30- countDownDate % 30;
  //alert(distance);
  var i = distance / 60,
   n = distance % 60,
   o = n / 10,
   s = n % 10;
  var minutes = Math.floor(i);
  var seconds = ('0'+Math.floor(n)).slice(-2);
  var sec1= (seconds%100-seconds%10)/10;
var sec2=seconds%10;
  document.getElementById("demo").innerHTML = "TIME: 0 "+Math.floor(minutes)+" : "+sec1+" "+sec2+" ";
  if(distance==0){
      location.reload();
  }
   }

                    func();
                    var interval = setInterval(func, 1000);

   function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
    }

function sub(){
    var p=document.getElementById("next").value;
    if(p==''){
         
       var x = document.getElementById("copied");
        x.className = "show";
        setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000); 
    }else if(-1<p && p<10){
        console.log(p);
     document.getElementById("pre").submit();  
    }else{
         console.log("3");
        var x = document.getElementById("copied");
        x.className = "show";
        setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000); 
    }
    
}
</script>


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4"style="
    background-color: #efefef !important;
    margin-top: 101px;
    margin-right: -24px;
    margin-left: -25px;
">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="https://t.me/">Contact Developer</a>                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                           
                            Designed By <a href="#">lovely</a>
                        
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="adminjs/main.js"></script>
</body>

</html>