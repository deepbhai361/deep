<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adloggedin"]) || $_SESSION["adloggedin"] !== true){
    header("location: adlogin");
    exit;
}
require_once "config.php";
  $username=$_GET['un'];
  $amount=$_GET['am'];
  $utr=$_GET['utr'];
  $first=0;


$opt="SELECT COUNT(*) as total FROM `recharge` WHERE username='$username' AND status='Success'";
$optres=$conn->query($opt);
$sum= mysqli_fetch_assoc($optres);
if($sum['total']=="" or $sum['total']<=2){
   
          if($sum['total']==1 && $amount >=600){
                $bonus=150;
              }elseif($sum['total']==2 && $amount >=1000){
                  $bonus=200;
              }else{
                  $bonus=100;
              }
            
        
   
     
          
    $win="select refcode FROM `users` WHERE  username='$username' ";
$result3 =$conn->query($win);
$row3 = mysqli_fetch_assoc($result3);
$refcode=$row3['refcode'];
$adb="UPDATE users SET bonus= bonus +$bonus WHERE usercode='$refcode'";
$conn->query($adb);
 $transquery="INSERT INTO trans (username,reason,amount) VALUES ('$refcode' ,'CheckIn Bonus',$bonus)";
	$conn->query($transquery);
$addbrec="INSERT INTO bonus (giver,usercode,amount,level) VALUES ('$username','$refcode','$bonus','1')";
$conn->query($addbrec);
    
}

$addwin00="UPDATE recharge SET status='Success' WHERE username='$username' AND recharge='$amount' AND utr='$utr'";
$conn->query($addwin00);
 $transquery="INSERT INTO trans (username,reason,amount) VALUES ('$username', 'Recharge',$amount)";
	$conn->query($transquery);

if($conn->query($addwin00)){
    
    
    $addwin0="UPDATE users SET balance= balance +($amount) WHERE username='$username'";
   
    if($conn->query($addwin0)){
        header("location: rechargeRequests");
    }
}else{
    echo"FAILED";
}
?>