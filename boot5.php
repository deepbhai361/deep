
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


$sql3 = "SELECT period,nxt FROM vipperiod WHERE id='1'";
$result3 =$conn->query($sql3);
$row3 = mysqli_fetch_assoc($result3);
$period=$row3['period'];
$next=$row3['nxt'];



function generateRes($fres){
    echo"overresult";
   if($fres=="redlion"){
     $even=array(28);
       $random_keys=array_rand($even,1);
       $master=$even[$random_keys];
    
        return $master;
   }elseif($fres=="redelephant"){
     $even=array(9);
       $random_keys=array_rand($even,1);
       $master=$even[$random_keys];
    
        return $master;
   }elseif($fres=="yellowlion"){
         $odd=array(26,29,31,33,35);
       $random_keys=array_rand($odd,1);
        $master=$odd[$random_keys];
       
        return $master;
   }elseif($fres=="yellowking"){
         $odd=array(37);
       $random_keys=array_rand($odd,1);
        $master=$odd[$random_keys];
       
        return $master;
   }elseif($fres=="yellowelephant"){
         $odd=array(1,3,5,7,10,12);
       $random_keys=array_rand($odd,1);
        $master=$odd[$random_keys];
       
        return $master;
   }elseif($fres=="yellowcow"){
         $odd=array(14,16,18,20,22,24);
       $random_keys=array_rand($odd,1);
        $master=$odd[$random_keys];
       
        return $master;
   }elseif($fres=="greenlion"){
         $odd=array(25,27,30,32,34,36);
       $random_keys=array_rand($odd,1);
        $master=$odd[$random_keys];
       
        return $master;
   }elseif($fres=="greenking"){
         $odd=array(0);
       $random_keys=array_rand($odd,1);
        $master=$odd[$random_keys];
       
        return $master;
   }elseif($fres=="greenelephant"){
         $odd=array(2,4,6,8,11);
       $random_keys=array_rand($odd,1);
        $master=$odd[$random_keys];
       
        return $master;
   }elseif($fres=="greencow"){
         $odd=array(13,15,17,19,21,23);
       $random_keys=array_rand($odd,1);
        $master=$odd[$random_keys];
       
        return $master;
   }
}

if($next==0){
    echo"start";
     $opt1="SELECT SUM(amount) as total1 FROM vipbetting WHERE ans='red' AND status='pending'";
    $opt1res=$conn->query($opt1);
    $sum1 = mysqli_fetch_assoc($opt1res);
    if($sum1['total1']==null){
       $red=0;
    }else{
      $red=$sum1['total1']*3;  
    }
    
    
    $opt0="SELECT SUM(amount) as total0 FROM vipbetting WHERE ans='yellow' AND status='pending'";
    $opt0res=$conn->query($opt0);
    $sum0 = mysqli_fetch_assoc($opt0res);
    
    if($sum0['total0']==null){
       $yellow=0;
    }else{
      $yellow=$sum0['total0']*5;  
    }
    
    $opt2="SELECT SUM(amount) as total2 FROM vipbetting WHERE ans='green' AND status='pending'";
    $opt2res=$conn->query($opt2);
    $sum2 = mysqli_fetch_assoc($opt2res);
    
    if($sum2['total2']==null){
       $green=0;
    }else{
      $green=$sum2['total2']*2;  
    }
    
    
    $opt3="SELECT SUM(amount) as total3 FROM vipbetting WHERE ans='lion' AND status='pending'";
    $opt3res=$conn->query($opt3);
    $sum3 = mysqli_fetch_assoc($opt3res);
    
    if($sum3['total3']==null){
       $lion=0;
    }else{
      $lion=$sum3['total3']*50;  
    }
    
     $opt4="SELECT SUM(amount) as total4 FROM vipbetting WHERE ans='king' AND status='pending'";
    $opt4res=$conn->query($opt4);
    $sum4 = mysqli_fetch_assoc($opt4res);
    
    if($sum4['total4']==null){
       $king=0;
    }else{
      $king=$sum4['total4']*50;  
    }
    
     $opt5="SELECT SUM(amount) as total5 FROM vipbetting WHERE ans='elephant' AND status='pending'";
    $opt5res=$conn->query($opt5);
    $sum5 = mysqli_fetch_assoc($opt5res);
    
    if($sum5['total5']==null){
       $elephant=0;
    }else{
      $elephant=$sum5['total5']*50;  
    }
    
    
     $opt6="SELECT SUM(amount) as total6 FROM vipbetting WHERE ans='cow' AND status='pending'";
    $opt6res=$conn->query($opt6);
    $sum6 = mysqli_fetch_assoc($opt6res);
    
    if($sum6['total6']==null){
       $cow=0;
    }else{
      $cow=$sum6['total6']*50;  
    }
    
    $a = [];
$a[0] = $red*18+$lion*3;
$a[1] = $red*18+$elephant*3;
$a[2] = $green*2+$lion*3;
$a[3] = $green*2+$king*3;
$a[4] = $green*2+$elephant*3;
$a[5] = $green*2+$king*18;
$a[6] = $yellow*2+$lion*3;
$a[7] = $yellow*2+$elephant*3;
$a[8] = $yellow*2+$king*18;
$a[9] = $yellow*2+$cow*3;






$colors=array('redlion','redelephant','greenlion','greenking','greenelephant','greenking','yellowlion','yellowelephant','yellowking','yellowcow');

$min_val = min($a);

$min_indexes = [];
foreach($a as $i => $val){
    if($val == $min_val) $min_indexes[] = $i;
}


$index= $min_indexes[rand(0,count($min_indexes)-1)];
       
    

  
      
 $nextres=$colors[$index];
$nclo=generateRes($nextres);
 $clo=$nextres;
  echo $clo;
  
    $num=rand(40000,50000);
    $ans=4.73+($nclo*9.47);
       
        
    }else{
        
     
if($next==1){
    $nextres='redlion';
}elseif($next==2){
     $nextres='redelephant';
}elseif($next==3){
     $nextres='greenking';
}elseif($next==4){
     $nextres='greencow';
}elseif($next==5){
     $nextres='greenelephant';
} elseif($next==6){
     $nextres='greenlion';
} elseif($next==7){
     $nextres='yellowking';  
} elseif($next==8){
     $nextres='yellowcow';  
} elseif($next==9){
     $nextres='yellowelephant'; 
} elseif($next==10){
     $nextres='yellowlion';      
}
     
echo $nextres;
$nclo=generateRes($nextres);
 $clo=$nextres;
  echo $clo;
  
    $num=rand(40000,50000);
    $ans=3.33+($nclo*6.66);    
    }



   




$exist="SELECT COUNT(*) as betnum FROM vipbetting WHERE status='pending'";
$existres=$conn->query($exist);
$exists= mysqli_fetch_assoc($existres);


if( $exists['betnum']==0){
   echo"working";
$rec="INSERT INTO vipbetrec (period,ans,num,clo) VALUES ($period,$ans,$num,'$clo')";
$conn->query($rec);




}else{
     
      echo"start";  
    
$addwin00="UPDATE vipbetting SET res='fail',fres='$clo' WHERE period=$period ";
$conn->query($addwin00);

     $bet0="SELECT username,amount FROM vipbetting WHERE status='pending' ";
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








    if($clo=="redlion" ){
        $bet2="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='lion' ";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
     echo"end";
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$winamount2= ($fbets2-(2/100)*$fbets2)*3;
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$addfairwin2="UPDATE vipbetting SET res='success' WHERE ans='lion'  AND username=$winner2 AND period=$period  ";
$conn->query($addfairwin2);
   
}

$bet0="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='red' ";
     $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*18;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
       $clowin="UPDATE vipbetting SET res='success' WHERE ans='green'  AND username=$winner0 AND period=$period ";
    
    if ($conn->query($clowin) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
   
 
    }echo 'redlion';
    }else  if($clo=="redelephant" ){
        $bet2="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='elephant' ";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
     echo"end";
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$winamount2= ($fbets2-(2/100)*$fbets2)*3;
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$addfairwin2="UPDATE vipbetting SET res='success' WHERE ans='elephant'  AND username=$winner2 AND period=$period  ";
$conn->query($addfairwin2);
   
}

$bet0="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='red' ";
     $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*18;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
       $clowin="UPDATE vipbetting SET res='success' WHERE ans='green'  AND username=$winner0 AND period=$period ";
    
    if ($conn->query($clowin) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
   
 
    }
    }else  if($clo=="greenking" ){
        $bet2="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='king' ";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
     echo"end";
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$winamount2= ($fbets2-(2/100)*$fbets2)*18;
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$addfairwin2="UPDATE vipbetting SET res='success' WHERE ans='king'  AND username=$winner2 AND period=$period  ";
$conn->query($addfairwin2);
   
}

$bet0="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='green' ";
     $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*2;
    echo $winner0;
    echo $period;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
       $clowin="UPDATE vipbetting SET res='success' WHERE ans='green'  AND username=$winner0 AND period=$period ";
    
    if ($conn->query($clowin) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
   
    }
    }else if($clo=="greencow" ){
        $bet2="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='cow' ";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
     echo"end";
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$winamount2= ($fbets2-(2/100)*$fbets2)*3;
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$addfairwin2="UPDATE vipbetting SET res='success' WHERE ans='cow'  AND username=$winner2 AND period=$period  ";
$conn->query($addfairwin2);
   
}

$bet0="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='green' ";
     $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*2;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
       $clowin="UPDATE vipbetting SET res='success' WHERE ans='green'  AND username=$winner0 AND period=$period ";
    
    if ($conn->query($clowin) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
   
 
    }
    }else if($clo=="greenelephant" ){
        $bet2="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='elephant' ";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
     echo"end";
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$winamount2= ($fbets2-(2/100)*$fbets2)*3;
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$addfairwin2="UPDATE vipbetting SET res='success' WHERE ans='elephant'  AND username=$winner2 AND period=$period  ";
$conn->query($addfairwin2);
   
}

$bet0="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='green' ";
     $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*2;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
       $clowin="UPDATE vipbetting SET res='success' WHERE ans='green'  AND username=$winner0 AND period=$period ";
    
    if ($conn->query($clowin) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
   
 
    }echo 'greenelephant';
    }else if($clo=="greenlion" ){
        $bet2="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='lion' ";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
     echo"end";
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$winamount2= ($fbets2-(2/100)*$fbets2)*3;
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$addfairwin2="UPDATE vipbetting SET res='success' WHERE ans='lion'  AND username=$winner2 AND period=$period  ";
$conn->query($addfairwin2);
   
}

$bet0="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='green' ";
     $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*2;
    echo gettype($winner0);
    echo gettype($period);
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
      $clowin="UPDATE vipbetting SET res='success' WHERE ans='green'  AND username=$winner0 AND period=$period ";
    
    if ($conn->query($clowin) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
    }
    }else if($clo=="yellowking" ){
        $bet2="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='king' ";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
     echo"end";
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$winamount2= ($fbets2-(2/100)*$fbets2)*18;
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$addfairwin2="UPDATE vipbetting SET res='success' WHERE ans='king'  AND username=$winner2 AND period=$period  ";
$conn->query($addfairwin2);
   
}

$bet0="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='yellow' ";
     $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*2;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
       $clowin="UPDATE vipbetting SET res='success' WHERE ans='green'  AND username=$winner0 AND period=$period ";
    
    if ($conn->query($clowin) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
   
 
    }
    }else if($clo=="yellowcow" ){
        $bet2="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='cow' ";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
     echo"end";
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$winamount2= ($fbets2-(2/100)*$fbets2)*3;
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$addfairwin2="UPDATE vipbetting SET res='success' WHERE ans='cow'  AND username=$winner2 AND period=$period  ";
$conn->query($addfairwin2);
   
}

$bet0="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='yellow' ";
     $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*2;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
       $clowin="UPDATE vipbetting SET res='success' WHERE ans='green'  AND username=$winner0 AND period=$period ";
    
    if ($conn->query($clowin) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
   
 
    }
    }else if($clo=="yellowelephant" ){
        $bet2="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='elephant' ";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
     echo"end";
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$winamount2= ($fbets2-(2/100)*$fbets2)*3;
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$addfairwin2="UPDATE vipbetting SET res='success' WHERE ans='elephant'  AND username=$winner2 AND period=$period  ";
$conn->query($addfairwin2);
   
}

$bet0="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='yellow' ";
     $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*2;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
       $clowin="UPDATE vipbetting SET res='success' WHERE ans='green'  AND username=$winner0 AND period=$period ";
    
    if ($conn->query($clowin) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
   
 
    }
    }else if($clo=="yellowlion" ){
        $bet2="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='lion' ";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
     echo"end";
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$winamount2= ($fbets2-(2/100)*$fbets2)*3;
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$addfairwin2="UPDATE vipbetting SET res='success' WHERE ans='lion'  AND username=$winner2 AND period=$period  ";
$conn->query($addfairwin2);
   
}

$bet0="SELECT username,amount,ans FROM vipbetting WHERE status='pending' AND ans='yellow' ";
     $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*2;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
       $clowin="UPDATE vipbetting SET res='success' WHERE ans='green'  AND username=$winner0 AND period=$period ";
    
    if ($conn->query($clowin) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
   
 
    }
    }







$rec="INSERT INTO vipbetrec (period,ans,num,clo) VALUES ($period,$ans,$num,'$clo')";
$conn->query($rec);

}

 





$suc="UPDATE vipbetting SET status='sucessful' WHERE status='pending'";
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
$sql4 = "UPDATE vipperiod SET period= period + 1 ,nxt='0' WHERE id='1'";
$conn->query($sql4);
	}





$conn->close();
?>