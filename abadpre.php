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
$optp="SELECT period,nxt FROM `abperiod`";
$optresp=$conn->query($optp);
$sump= mysqli_fetch_assoc($optresp);
if($sump['nxt']=="0"){
    $pre="Not set";
    
}elseif($sump['nxt']=="1"){
    $pre="Andhar";
}elseif($sump['nxt']=="2"){
    $pre="Bahar";
}elseif($sump['nxt']=="3"){
    $pre="Tie";
}
$opt="SELECT SUM(amount) as total FROM `abbetting` WHERE status='pending' AND ans='A'";
$optres=$conn->query($opt);
$sum= mysqli_fetch_assoc($optres);
$red=round($sum['total'],2);

$optg="SELECT SUM(amount) as total FROM `abbetting` WHERE status='pending' AND ans='B'";
$optresg=$conn->query($optg);
$sumg= mysqli_fetch_assoc($optresg);
$green=round($sumg['total'],2);

$optv="SELECT SUM(amount) as total FROM `abbetting` WHERE status='pending' AND ans='T'";
$optresv=$conn->query($optv);
$sumv= mysqli_fetch_assoc($optresv);
$violet=round($sumv['total'],2);


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

 <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="admin" class="active" >Admin</a>
   <a href="users"  >Users</a>
  <a href="adduser">add User</a>
  <a href="inviterec">Invite Record</a>
  <a href="adpass">Password Change </a>
  <a href="adwith">Withdraw Requests</a>
  <a href="adpre">Next Predition</a>
  <a href="adreward">Reward Management</a>
  <a href="rechargeRequests">Recharge Requests</a>
  <a href="delete">Delete User</a>
  <a href="adlogout">Log Out</a>


</div>

<div>
     <h2 style="font-size:20px;padding:10px; color:grey;text-align:center;" onclick="window.location.href='adpre'">FastParity</h2>
     <h2 style="font-size:20px;padding:10px; color:grey; text-align:center;"  onclick="window.location.href='emredadpre'">Parity</h2>
     <h2 style="font-size:20px;padding:10px;color:grey; text-align:center;" onclick="window.location.href='sapreadpre'">Sapre</h2>
     <h2 style="font-size:20px;padding:10px; color:grey; text-align:center;" onclick="window.location.href='beconeadpre'">Dice</h2>
     <h2 style="font-size:20px;padding:10px;  text-align:center;" onclick="window.location.href='abadpre'">AndharBahar</h2>
     <h2 style="font-size:20px;padding:10px; color:grey; text-align:center;" onclick="window.location.href='wheeladpre'">Wheelocity</h2>
      <h2 style="font-size:20px;padding:10px;color:grey; text-align:center; color:green">Total User balance : <?php echo $balance; ?> </h2>
       <h2 style="font-size:20px;padding:10px; text-align:center;color:red">PERIOD: <?php echo $sump['period']  ?> </h2>
          <h2 id="demo" style="font-size:20px;padding:10px; text-align:center;color:red"> </h2>
       <h2 style="font-size:20px;padding:10px; text-align:center;color:red">Next prediction: <?php echo $pre; ?>  </h2>
     
     
 
 <div data-v-309ccc10="" class="recharge">
        <div data-v-309ccc10="" class="recharge_box">
             <h1>Andhar:₹&nbsp<?php echo $red;?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span>Bahar:₹&nbsp<?php echo $green;?></span></h1><br>
             <h1>Tie:₹&nbsp<?php echo $violet;?></h1><br>
      <h1>1---ANDHAR</h1><br>
      <h1>2---BAHAR</h1><br>
      <h1>3---TIE</h1><br>
      
        <form action="abpre" id="pre" method="POST" class="form-signup">
                 <h2 style="padding:10px;">Next Prediction</h2>
            <div data-v-309ccc10="" class="input_box"><img data-v-309ccc10=""
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAB00lEQVRoQ+1asS4EURQ97xc0lNSEQqKmp7QNX0CiMTdKq5QzGglfQGNLeltLFISaksYvPJndnWTDbN59s29iJHfaOe/MPWfOnJ3MWwflISKnANaU8BSwB5JHWiKnAWZZduyc62qwKTHe+26e5ycaTpUQEXkBsKghTIx5Jbmk4dQK8RqyEjPJyTp3lqRqRhVIRKKEjAT1K8SvxxhSYNsgJHbmSnyTQh6997dJpqwgcc5tAVgtTzUlpE9yoykRJa+I3AMYxLARITF1OI3Y8VIwIVVOlq1ldyQyZxatkGEWrZBDE85btELGWbRCDlm0fjsQ9RpvP4iREbPWChlmrRVyyFrLWmv4FcXqN/JZsfoNGWb1G3LI6tfq1+q31lNi9Ruyzeo35JDV7/T1e5nn+X5No9XLsiy7cM7tNbY/MprkzHt/p54qEuic2wRwWC5rZH8kcqYk8LYIGd/Zjd7RbTpaWqd7JDslWERuAGxrF7clWp8k534OLSIfAGZjxPx1tJ5JrlQIeQKw/J+EFLN2SPbGolXEqohX1JH6jrwBmI+aYAgeiBGRWiIAvJNc0FxX+xH7CsCOhjAx5prkroZTJaQgGr1aHwCY0RBPifny3p9r/6tVXOsbCz8HUf9wHDEAAAAASUVORK5CYII="
                    alt=""><input data-v-309ccc10="" type="text"  name="username" id="next"
                    placeholder="Enter a number from 1-3"><span data-v-309ccc10="" class="tips_span">Next perdiction</span></div>
           
            <div data-v-309ccc10="" class="input_box_btn"><button data-v-309ccc10="" type="button" onclick="sub()"
                    class="login_btn ripple">Confirm Next Prediction</button></div>
                   
                    
                    </form>
                     <div id="copied">Enter a number from 1-3</div>
            <div data-v-309ccc10="" class="input_box_btn">
                <div data-v-309ccc10="" class="two_btn"></div>
            </div>
        </div>
</div>

<script>
 function func() {
                      
    
                var countDownDate = Date.parse(new Date) / 1e3;
  var now = new Date().getTime();
  var distance = 60 - countDownDate % 60;
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
  if(distance==60){
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
    }else if(1<p && p<4){
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

</body>
</html>