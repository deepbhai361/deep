
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


$sql3 = "SELECT period,nxt,num FROM abperiod WHERE id='1'";
$result3 =$conn->query($sql3);
$row3 = mysqli_fetch_assoc($result3);
$period=$row3['period'];
$next=$row3['nxt'];
$cnum=$row3['num'];
echo"$cnum<br>";



function generateRes($abres,$cnum){
    echo"overresult";
    echo $abres;
    $ab1="23456789";
   $ab2="13456789";
   $ab3="12456789";
   $ab4="12356789";
   $ab5="12346789";
   $ab6="12345789";
   $ab7="12345689";
   $ab8="12345679";
   $ab9="12345678";
 function random_strings($length_of_string,$masterstring)
    {

        // String of all alphanumeric character
        $str_result = $masterstring;

        // Shuffle the $str_result and returns substring
        // of specified length
        return substr(
            str_shuffle($str_result),
            0,
            $length_of_string
        );
    }  
   
   
   if($abres=="A"){
     $even=array(2,3,4,6);
       $random_keys=array_rand($even,1);
       $master=$even[$random_keys];
     
       $preclo=random_strings($master,${"ab".$cnum});
        echo $cnum;
        return $preclo.$cnum;
   }elseif($abres=="B"){
         $odd=array(1,3,5,7);
       $random_keys=array_rand($odd,1);
        $master=$odd[$random_keys];
       
        $preclo=random_strings($master,${"ab".$cnum});
        echo $cnum;
        return $preclo.$cnum;
   }elseif($abres=="T"){
       $master=rand(2,8);
     $preclo=random_strings($master,${"ab".$cnum});
     echo $cnum;
        return $preclo;
   }
}

if($next==0){
    echo"start";
     $opt1="SELECT SUM(amount) as total1 FROM abbetting WHERE ans='A' AND status='pending'";
    $opt1res=$conn->query($opt1);
    $sum1 = mysqli_fetch_assoc($opt1res);
    
    
    $opt0="SELECT SUM(amount) as total0 FROM abbetting WHERE ans='B' AND status='pending'";
    $opt0res=$conn->query($opt0);
    $sum0 = mysqli_fetch_assoc($opt0res);
    
    
    
      if($sum1['total1'] =="" AND $sum0['total0'] ==""){
               $a=array("A","B","T");
    $random_keys=array_rand($a,1);
    $nextres= $a[$random_keys];       
    
    }elseif($sum1['total1']< $sum0['total0']){
   
    $nextres="A";
    }elseif($sum1['total1']> $sum0['total0']){
        
    $nextres="B" ;
  
    }
       
    

   
   

   
   

      
    $clo=generateRes($nextres,$cnum);
  
    $num=rand(40000,50000);
     $ans=$nextres;  
       
        
    }else{
        
     
if($next==1){
    $nextres='A';
}elseif($next==2){
     $nextres='B';
}else{
     $nextres='T';
}
echo $nextres;
echo $cnum;
 $clo=generateRes($nextres,$cnum);
  echo $clo;
  
    $num=rand(40000,50000);
    $ans=$nextres;    
    }



   




$exist="SELECT COUNT(*) as betnum FROM abbetting WHERE status='pending'";
$existres=$conn->query($exist);
$exists= mysqli_fetch_assoc($existres);


if( $exists['betnum']==0){
   echo"working";
$rec="INSERT INTO abbetrec (period,ans,num,clo) VALUES ($period,'$ans',$num,'$clo')";
$conn->query($rec);




}else{
      echo"start";  
    
$addwin00="UPDATE abbetting SET res='fail',number='$ans' WHERE period=$period ";
$conn->query($addwin00);

     $bet0="SELECT username,amount FROM abbetting WHERE status='pending' ";
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








    if($ans=="A" ){
        $bet2="SELECT username,amount,ans FROM abbetting WHERE status='pending' AND ans='A' ";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
     echo"end";
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$winamount2= ($fbets2-(2/100)*$fbets2)*2;
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$addfairwin2="UPDATE abbetting SET res='success' WHERE ans='A'  AND username=$winner2 AND period=$period  ";
$conn->query($addfairwin2);
   
}
    }elseif($ans=="B" ){
        $bet2="SELECT username,amount,ans FROM abbetting WHERE status='pending' AND ans='B'";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
     echo"end";
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$winamount2= ($fbets2-(2/100)*$fbets2)*2;
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$addfairwin2="UPDATE abbetting SET res='success' WHERE  ans='B' AND username=$winner2 AND period=$period  ";
$conn->query($addfairwin2);
   
}
    }else{
      $bet2="SELECT username,amount,ans FROM abbetting WHERE status='pending' AND ans='T' ";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
     echo"end";
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$winamount2= ($fbets2-(2/100)*$fbets2)*9;
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$addfairwin2="UPDATE abbetting SET res='success' WHERE  ans='T' AND username=$winner2 AND period=$period  ";
$conn->query($addfairwin2);
   
}  
    }








$rec="INSERT INTO abbetrec (period,ans,num,clo) VALUES ($period,'$ans',$num,'$clo')";
$conn->query($rec);

}

 

















$nxtnum=rand(1,9);



$suc="UPDATE abbetting SET status='sucessful' WHERE status='pending'";
$conn->query($suc);

$checkperiod_Query=mysqli_query($conn,"select * from `period` order by id desc limit 1");
$periodRow=mysqli_num_rows($checkperiod_Query);
$periodidRow=mysqli_fetch_array($checkperiod_Query);


if($lastperiodid==$periodidRow['period'])
{
  $truncateQuery=mysqli_query($conn,"TRUNCATE TABLE `period`");
  $truncateResultQuery=mysqli_query($conn,"TRUNCATE TABLE `period`");
    $sql19=mysqli_query($conn,"INSERT INTO `period` (`period`,`nxt`,num) VALUES ('".$firstperiodid."','0',$nxtnum)");  
}elseif($periodRow=='' OR $periodRow=='0')
{
$sql19=mysqli_query($conn,"INSERT INTO `period` (`period`,`nxt`,num) VALUES ('".$firstperiodid."','0',$nxtnum)");
	

}else 
{
$sql4 = "UPDATE abperiod SET period= period + 1 ,nxt='0',num=$nxtnum WHERE id='1'";
$conn->query($sql4);
	}





$conn->close();
?>