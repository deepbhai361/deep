
<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'Cashwin-35303135d381');
define('DB_PASSWORD', 'Fkt7wyav');
define('DB_NAME', 'Cashwin-35303135d381');
// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}
$current = strtotime(date("Y-m-d 00:00:00"));
$now = strtotime(date("Y-m-d H:i:s"));
$firstperiodid=date('Ymd',strtotime("+1 days")).sprintf("%03d",480);
$lastperiodid=date('Ymd').sprintf("%03d",1);


$sql3 = "SELECT period,nxt FROM beconeperiod WHERE id='1'";
$result3 =$conn->query($sql3);
$row3 = mysqli_fetch_assoc($result3);
$period=$row3['period'];
$next=$row3['nxt'];
echo"$next <br>";

if($next==0){
    $opt1="SELECT MAX(ans) as max FROM beconebetting WHERE status='pending'";
    $opt1res=$conn->query($opt1);
    $sum1 = mysqli_fetch_assoc($opt1res);
    if($sum1['max']==null){
        $sum1['max']=4;
    }
   $n= rand($sum1['max'],92);
  
    $x=rand(40000,50000);
    $y= $x % 100;
    $num=($x-$y)+$n;
   
       
        
    }else{
        $x=rand(40000,50000);
       $y= $x % 100;
      $num=($x-$y)+$next;
    }

$price=$num;

$prices= $num % 100;
$ans=$prices;
   







if($next==0){
   echo"working";
$rec="INSERT INTO beconebetrec (period,ans,num) VALUES ($period,$ans,$num)";
$conn->query($rec);

$addwin00="UPDATE beconebetting SET res='fail',price=$num,number=$prices WHERE period=$period ";
$conn->query($addwin00);


}else{
    
    
$addwin00="UPDATE beconebetting SET res='fail',price=$num,number=$prices WHERE period=$period ";
$conn->query($addwin00);

     $bet0="SELECT username,amount FROM beconebetting WHERE status='pending' ";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
 $b1=(40/100)*((2/100)*$fbets0);
    $b2=(20/100)*((2/100)*$fbets0);
    $b3=(10/100)*((2/100)*$fbets0);
    $uc="SELECT refcode,refcode1,refcode2 FROM users WHERE username='$winner0'";
    $ucc=$conn->query($uc);
    $getuc= mysqli_fetch_assoc($ucc);
    $r=$getuc['refcode'];
    $r1=$getuc['refcode1'];
    $r2=$getuc['refcode2'];
    if($r!=""){
        $addb1="UPDATE users SET bonus=bonus +$b1 WHERE usercode='$r'";
        $conn->query($addb1);
        $recb1="INSERT INTO bonus (giver,usercode,amount,level) VALUES ('$winner0','$r','$b1','1')";
        $conn->query($recb1);
       
        if($r1!=""){
            $addb2="UPDATE users SET bonus=bonus +$b2 WHERE usercode='$r1'";
            $conn->query($addb2);
            $recb2="INSERT INTO bonus (giver,usercode,amount,level) VALUES ('$winner0','$r1','$b2','2')";
            $conn->query($recb2);
            
        }
    }
    }







    echo"start";
$bet2="SELECT username,amount,ans FROM beconebetting WHERE status='pending' AND ans>$ans";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
     echo"end";
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$fans= $row2['ans'];
$winamount2= ($fbets2-(2/100)*$fbets2)*(95 / $fans);
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$addfairwin2="UPDATE beconebetting SET res='success' WHERE username=$winner2 AND period=$period AND ans=$fans";
$conn->query($addfairwin2);
   
}







$rec="INSERT INTO beconebetrec (period,ans,num) VALUES ($period,$ans,$num)";
$conn->query($rec);

}

 





















$suc="UPDATE beconebetting SET status='sucessful' WHERE status='pending'";
$conn->query($suc);

$checkperiod_Query=mysqli_query($conn,"select * from `period` order by id desc limit 1");
$periodRow=mysqli_num_rows($checkperiod_Query);
$periodidRow=mysqli_fetch_array($checkperiod_Query);


if($lastperiodid==$periodidRow['period'])
{
  $truncateQuery=mysqli_query($conn,"TRUNCATE TABLE `period`");
  $truncateResultQuery=mysqli_query($conn,"TRUNCATE TABLE `period`");
    $sql19=mysqli_query($conn,"INSERT INTO `period` (`period`,`nxt`) VALUES ('".$firstperiodid."','0')");  
}elseif($periodRow=='' OR $periodRow=='0')
{
$sql19=mysqli_query($conn,"INSERT INTO `period` (`period`,`nxt`) VALUES ('".$firstperiodid."','0')");
	

}else 
{
$sql4 = "UPDATE beconeperiod SET period= period + 1 ,nxt='0' WHERE id='1'";
$conn->query($sql4);
	}

$sql1="DELETE FROM beconebet WHERE id='1'";
$sql = "INSERT INTO bet (id) VALUES ('1')";
                
$conn->query($sql1);
 
                
$conn->query($sql);



$conn->close();
?>