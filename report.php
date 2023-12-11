<?php
// Initialize the session
session_start();

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adloggedin"]) || $_SESSION["adloggedin"] !== true){
    header("location: adlogin");
    exit;
}


 require_once "config.php";
 
 $username=$_GET["user"];
 
  $optrec="SELECT SUM(recharge) as total1 FROM `recharge` WHERE username='$username' AND status='successfull'";
$optresrec=$conn->query($optrec);
$sumrec= mysqli_fetch_assoc($optresrec);
if($sumrec['total1']==""){
    $recbal=0;
    
}else{
    $recbal=$sumrec['total1'];
}
  $optwith="SELECT SUM(withdraw) as total11 FROM `record` WHERE username='$username' AND status='Withdrawing'";
$optreswith=$conn->query($optwith);
$sumwith= mysqli_fetch_assoc($optreswith);
if($sumwith['total11']==""){
    $withbal=0;
    
}else{
    $withbal=$sumwith['total11'];
} 
 
 $sql = "SELECT balance,usercode,refcode FROM users WHERE username='$username'";
$resultu = $conn->query($sql);
$rowu = mysqli_fetch_array($resultu);
$usercode=$rowu[usercode];
$refcode=$rowu[refcode];
$balance=$rowu[balance];
 
 
 
 
$opt="SELECT count(*) as total FROM `users` WHERE refcode='$usercode' ";
$optres=$conn->query($opt);
$sum= mysqli_fetch_assoc($optres);
if($sum['total']==""){
    $users="0";
    
}else{
    $users=$sum['total'];
}
 $aopt="SELECT count(*) as atotal FROM `users` WHERE refcode='$usercode' AND balance>0 ";
$aoptres=$conn->query($aopt);
$asum= mysqli_fetch_assoc($aoptres);
if($asum['atotal']==""){
    $ausers="0";
    
}else{
    $ausers=$asum['atotal'];
}

$opt1="SELECT SUM(balance) as total1 FROM `users` WHERE refcode='$usercode'";
$optres1=$conn->query($opt1);
$sum1= mysqli_fetch_assoc($optres1);
if($sum1['total1']==""){
    $tbal=0;
    
}else{
    $tbal=$sum1['total1'];
} 



  
$query = "SELECT *FROM users WHERE refcode='$usercode'  ORDER BY id DESC ";  
$result = mysqli_query($conn, $query);  
  
//display the retrieved result on the webpage  
while ($row2 = mysqli_fetch_array($result)) {
    $date=date( 'd-m-Y',strtotime($row2[5]));
        $opt13="SELECT SUM(recharge) as total1 FROM `recharge` WHERE username='$row2[1]' AND status='successfull'";
$optres13=$conn->query($opt13);
$sum13= mysqli_fetch_assoc($optres13);
if($sum13['total1']==""){
    $st="Not Recharged";
    
}else{
    $st="Recharged";
} 
    $dataRow = $dataRow."
             <tr>
                        <td>$row2[4]</td>
                        <td>91$row2[1]</td>
                        <td>$st</td>
                        <td>$date</td>
                    </tr>
             

";
    
}


$query8 = "SELECT *FROM users WHERE  refcode1='$usercode' ORDER BY id DESC ";  
$result8 = mysqli_query($conn, $query8);  
  
//display the retrieved result on the webpage  
while ($row28 = mysqli_fetch_array($result8)) {
    $date=date( 'd-m-Y',strtotime($row28[5]));
        $opt138="SELECT SUM(recharge) as total1 FROM `recharge` WHERE username='$row28[1]' AND status='successfull'";
$optres138=$conn->query($opt138);
$sum138= mysqli_fetch_assoc($optres138);
if($sum138['total1']==""){
    $st="Not Recharged";
    
}else{
    $st="Recharged";
} 
    $dataRow8 = $dataRow8."
             <tr>
                        <td>$row28[4]</td>
                        <td>91$row28[1]</td>
                        <td>$st</td>
                        <td>$date</td>
                    </tr>
             

";
    
}

 
$query = "SELECT *FROM users WHERE refcode='$usercode' ORDER BY id DESC ";  
$result = mysqli_query($conn, $query);  
  
//display the retrieved result on the webpage  
while ($row2 = mysqli_fetch_array($result)) {
    $user=$row2[1];
    $opt1="SELECT SUM(recharge) as total1 FROM `recharge` WHERE username='$user' AND status='successfull'";
$optres1=$conn->query($opt1);
$sum1= mysqli_fetch_assoc($optres1);
if($sum1['total1']==""){
    $rbal=0;
    
}else{
    $rbal=$sum1['total1'];
} 
    $data = $data+"$rbal
            
             

";
    
}



$query5 = "SELECT *FROM users WHERE refcode='$usercode' ORDER BY id DESC ";  
$result5 = mysqli_query($conn, $query5);  
  
//display the retrieved result on the webpage  
while ($row25 = mysqli_fetch_array($result5)) {
    $user=$row25[1];
    $opt15="SELECT SUM(withdraw) as total1 FROM `record` WHERE username='$user' AND status='Withdrawing'";
$optres15=$conn->query($opt15);
$sum1= mysqli_fetch_assoc($optres15);
if($sum1['total1']==""){
    $wbal=0;
    
}else{
    $wbal=$sum1['total1'];
} 
    $data5 = $data5+"$wbal
            
             

";
    
}

$optu="SELECT SUM(amount) as total FROM `betting`  WHERE username='$username'";
$optresu=$conn->query($optu);
$sumu= mysqli_fetch_assoc($optresu);
$red=round($sumu['total'],2);

$optg="SELECT SUM(amount) as total FROM `beconebetting`  WHERE username='$username'";
$optresg=$conn->query($optg);
$sumg= mysqli_fetch_assoc($optresg);
$green=round($sumg['total'],2);

$optv="SELECT SUM(amount) as total FROM `saprebetting`  WHERE username='$username'";
$optresv=$conn->query($optv);
$sumv= mysqli_fetch_assoc($optresv);
$violet=round($sumv['total'],2);

$opt0="SELECT SUM(amount) as total FROM `emredbetting` WHERE username='$username'";
$optres0=$conn->query($opt0);
$sum0= mysqli_fetch_assoc($optres0);
$zero=round($sum0['total'],2);


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arbutus" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Report</title>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: 'handlers/l1UserListHandler',
                success: function (data) {
                    $("#users").html(data);
                }
            })
        });
    </script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #248f24;
            height: 3.5em;
            color: aliceblue;
            opacity: 0.9;
            display: flex;
            align-items: center;
        }

        .container {
            width: 100%;
            display: grid;
            grid-template-columns: auto auto
        }

        .box {
            width: 99%;
            height: 100px;
            border: 2px solid black;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 55px;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
            display: flex;
            overflow-x: auto;
        }

        .nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 55px;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
            display: flex;
            overflow-x: auto;
        }

        .nav__link {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
            min-width: 50px;
            overflow: hidden;
            white-space: nowrap;
            font-family: sans-serif;
            font-size: 13px;
            color: #444444;
            text-decoration: none;
            -webkit-tap-highlight-color: transparent;
            transition: background-color 0.1s ease-in-out;
        }

        .nav__link:hover {
            background-color: rgba(196, 194, 194, 0.514);
        }

        .nav__link--active {
            color: #009578;
        }


        .nav__icon {
            font-size: 18px;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            color: grey;
            text-decoration: none;
        }
    </style>
    <style type="text/css">
        @font-face {
            font-family: Roboto;
            src: url("chrome-extension://mcgbeeipkmelnpldkobichboakdfaeon/css/Roboto-Regular.ttf");
        }
    </style>
</head>

<body onselectstart="return false">
    <div class="header">
        <span onclick="window.location.href='getdetails#'" style="margin-left:35px; "
            class="material-icons-outlined">arrow_back</span>
        <div style="margin-left:9px; font-size:19px; font-weight: bold;">Total Report</div>
    </div>
    <br>
    <h3 style="
    text-align: center;
">Report for User:<span style="color:red;"><?php echo $username;?></span></h3>
    <h3 style="
    text-align: center;
">usercode:<span style="color:red;"><?php echo $usercode;?></span></h3>
<h3 style="
    text-align: center;
">UP Line ID:<span style="color:red;"><?php echo $refcode;?></span></h3>
 <h3 style="
    text-align: center;
">User Balance:<span style="color:green;">₹ <?php echo $balance;?></span></h3>
    <div class="container">
        <div class="box" id="box1">
            <span class=""><?php echo $users;?></span>
            <span class="key">Total Users</span>
        </div>
        <div class="box" id="box2">
            <span class=""><?php echo $ausers;?></span>
            <span class="key">Active Users</span>
        </div>
        <div style="margin-top:2px" class="box" id="box3">
            <span class=""><?php echo $data;?></span>
            <span class="key">Team Recharge Amount</span>
        </div>
           <div style="margin-top:2px" class="box" id="box3">
            <span class=""><?php echo $recbal;?></span>
            <span class="key">User Recharge Amount</span>
        </div>
        <div style="margin-top:2px" class="box" id="box4">
            <span class=""><?php echo $data5;?></span>
            <span class="key">Team Withdraw Amount.</span>
        </div>
            <div style="margin-top:2px" class="box" id="box4">
            <span class=""><?php echo $withbal;?></span>
            <span class="key">User Withdraw Amount</span>
        </div>
        <div style="margin-top:2px" class="box" id="box5">
            <span class=""><?php echo $tbal;?></span>
            <span class="key">Team Balance</span>
        </div>
        <div style="margin-top:2px" class="box" id="box5">
            <span class=""><?php echo $red;?></span>
            <span class="key">User Parity Betting</span>
        </div>
        <div style="margin-top:2px" class="box" id="box5">
            <span class=""><?php echo $green;?></span>
            <span class="key">User Spare Betting</span>
        </div>
        <div style="margin-top:2px" class="box" id="box5">
            <span class=""><?php echo $violet;?></span>
            <span class="key">User Bcone Betting</span>
        </div>
        <div style="margin-top:2px" class="box" id="box5">
            <span class=""><?php echo $zero;?></span>
            <span class="key">User Emred Betting</span>
        </div>
    </div>
    <br><br>
    
<h2>LEVEL 1 Users</h2>
    <div id="users">
        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                    <tr>

                        <th>
                            ID
                        </th>

                        <th>
                            Phone
                        </th>

                        <th>
                            Recharge Status
                        </th>

                        <th>
                            Join Date
                        </th>

                    </tr>
                </thead>
                <tbody>
                  
                <?php echo $dataRow;?>
                    
                </tbody>
            </table>
        </div>
    </div>
    
    <br><br>
    <h2>LEVEL 2 Users</h2>
    <div id="users">
        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                    <tr>

                        <th>
                            ID
                        </th>

                        <th>
                            Phone
                        </th>

                        <th>
                            Recharge Status
                        </th>

                        <th>
                            Join Date
                        </th>

                    </tr>
                </thead>
                <tbody>
                  
                <?php echo $dataRow8;?>
                    
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>