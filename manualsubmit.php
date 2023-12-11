<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
require_once "config.php";
$sql = "SELECT  upi FROM notice WHERE id='1'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$upi=$row[upi];
$a=array($upi);
$random_keys=array_rand($a,1);
$upiid= $a[$random_keys];
$am=$_GET['am'];
$user= $_GET['user'];
if($_SERVER["REQUEST_METHOD"] == "POST"){
$amount = $_POST['amount'];
$utr = $_POST['utr']; 
$upi = $_POST['upi']; 
$query1 = "SELECT * FROM `recharge` WHERE utr='$utr' ";
$result1 = mysqli_query($conn, $query1);
$utrcount = mysqli_num_rows($result1); 

if($utrcount==0){
    
 
$sql1 = "INSERT INTO recharge (username, recharge,status,upi,utr) VALUES ('$user', '$amount','wait','$upi','$utr')";
                
$conn->query($sql1);

if ($conn->query($sql) == TRUE) {
    header("location: /#/rechargerecord");
} else {
  header("location: /#/rechargerecord");
}
              
                





}else{
      echo "<script>
     document.addEventListener('DOMContentLoaded', function(event) { 
     
                 document.getElementById('copied').innerHTML='UTR Already Submited';
                 x=document.getElementById('copied');
           x.className = 'show';
        setTimeout(function () { x.className = x.className.replace('show', ''); }, 3000);
 
});
                
     
                </script>";
}

$conn->close();
}
?>


<head>
        <meta name="msapplication-TileColor" content="#6600AC">
    <meta name="theme-color" content="#6600AC">
    <meta name="msapplication-navbutton-color" content="#6600AC">
    <meta name="apple-mobile-web-app-status-bar-style" content="#6600AC">   
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
    <meta http-equiv="expires" content="1">
    <link rel="stylesheet" href="https://ekywin.com/assets/pr/bootstrap/css/bootstrap.min.css">
    <link href="https://ekywin.com/assets/css/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://ekywin.com/assets/pr/pr/css/light.css">
    <link rel="stylesheet" href="https://ekywin.com/assets/pr/dropzone/css/dropzone.css">
    <link rel="stylesheet" href="https://ekywin.com/assets/pr/custom.css">
    <script type="text/javascript" src="https://ekywin.com/assets/pr/popper/popper.min.js"></script>
    <script type="text/javascript" src="https://ekywin.com/assets/pr/jquery/jquery.min.js"></script>
    <script src="https://ekywin.com/assets/web/js/jquery.min.js"></script>
    <script type="text/javascript" src="https://ekywin.com/assets/pr/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ekywin.com/assets/pr/dropzone/js/dropzone.js"></script>
     <script type="text/javascript" href="https://ekywin.com/assets/Aditi/main-model.js"></script>   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.4/sweetalert2.all.min.js" integrity="sha512-aE/WWAoHkQZnPvRxpkvO3+nYiosvBZTv9AJB/quwn6ETQjQOSpNpaiIhmzbMl4RxVQ1QAGQgbZg2dLLVwf4Dug==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><style>.swal2-popup.swal2-toast{box-sizing:border-box;grid-column:1/4!important;grid-row:1/4!important;grid-template-columns:1fr 99fr 1fr;padding:1em;overflow-y:hidden;background:#fff;box-shadow:0 0 1px rgba(0,0,0,.075),0 1px 2px rgba(0,0,0,.075),1px 2px 4px rgba(0,0,0,.075),1px 3px 8px rgba(0,0,0,.075),2px 4px 16px rgba(0,0,0,.075);pointer-events:all}.swal2-popup.swal2-toast>*{grid-column:2}.swal2-popup.swal2-toast .swal2-title{margin:.5em 1em;padding:0;font-size:1em;text-align:initial}.swal2-popup.swal2-toast .swal2-loading{justify-content:center}.swal2-popup.swal2-toast .swal2-input{height:2em;margin:.5em;font-size:1em}.swal2-popup.swal2-toast .swal2-validation-message{font-size:1em}.swal2-popup.swal2-toast .swal2-footer{margin:.5em 0 0;padding:.5em 0 0;font-size:.8em}.swal2-popup.swal2-toast .swal2-close{grid-column:3/3;grid-row:1/99;align-self:center;width:.8em;height:.8em;margin:0;font-size:2em}.swal2-popup.swal2-toast .swal2-html-container{margin:.5em 1em;padding:0;font-size:1em;text-align:initial}.swal2-popup.swal2-toast .swal2-html-container:empty{padding:0}.swal2-popup.swal2-toast .swal2-loader{grid-column:1;grid-row:1/99;align-self:center;width:2em;height:2em;margin:.25em}.swal2-popup.swal2-toast .swal2-icon{grid-column:1;grid-row:1/99;align-self:center;width:2em;min-width:2em;height:2em;margin:0 .5em 0 0}.swal2-popup.swal2-toast .swal2-icon .swal2-icon-content{display:flex;align-items:center;font-size:1.8em;font-weight:700}.swal2-popup.swal2-toast .swal2-icon.swal2-success .swal2-success-ring{width:2em;height:2em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line]{top:.875em;width:1.375em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left]{left:.3125em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]{right:.3125em}.swal2-popup.swal2-toast .swal2-actions{justify-content:flex-start;height:auto;margin:0;margin-top:.5em;padding:0 .5em}.swal2-popup.swal2-toast .swal2-styled{margin:.25em .5em;padding:.4em .6em;font-size:1em}.swal2-popup.swal2-toast .swal2-success{border-color:#a5dc86}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line]{position:absolute;width:1.6em;height:3em;transform:rotate(45deg);border-radius:50%}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=left]{top:-.8em;left:-.5em;transform:rotate(-45deg);transform-origin:2em 2em;border-radius:4em 0 0 4em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=right]{top:-.25em;left:.9375em;transform-origin:0 1.5em;border-radius:0 4em 4em 0}.swal2-popup.swal2-toast .swal2-success .swal2-success-ring{width:2em;height:2em}.swal2-popup.swal2-toast .swal2-success .swal2-success-fix{top:0;left:.4375em;width:.4375em;height:2.6875em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line]{height:.3125em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=tip]{top:1.125em;left:.1875em;width:.75em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=long]{top:.9375em;right:.1875em;width:1.375em}.swal2-popup.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-tip{-webkit-animation:swal2-toast-animate-success-line-tip .75s;animation:swal2-toast-animate-success-line-tip .75s}.swal2-popup.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-long{-webkit-animation:swal2-toast-animate-success-line-long .75s;animation:swal2-toast-animate-success-line-long .75s}.swal2-popup.swal2-toast.swal2-show{-webkit-animation:swal2-toast-show .5s;animation:swal2-toast-show .5s}.swal2-popup.swal2-toast.swal2-hide{-webkit-animation:swal2-toast-hide .1s forwards;animation:swal2-toast-hide .1s forwards}.swal2-container{display:grid;position:fixed;z-index:1060;top:0;right:0;bottom:0;left:0;box-sizing:border-box;grid-template-areas:"top-start     top            top-end" "center-start  center         center-end" "bottom-start  bottom-center  bottom-end";grid-template-rows:minmax(-webkit-min-content,auto) minmax(-webkit-min-content,auto) minmax(-webkit-min-content,auto);grid-template-rows:minmax(min-content,auto) minmax(min-content,auto) minmax(min-content,auto);height:100%;padding:.625em;overflow-x:hidden;transition:background-color .1s;-webkit-overflow-scrolling:touch}.swal2-container.swal2-backdrop-show,.swal2-container.swal2-noanimation{background:rgba(0,0,0,.4)}.swal2-container.swal2-backdrop-hide{background:0 0!important}.swal2-container.swal2-bottom-start,.swal2-container.swal2-center-start,.swal2-container.swal2-top-start{grid-template-columns:minmax(0,1fr) auto auto}.swal2-container.swal2-bottom,.swal2-container.swal2-center,.swal2-container.swal2-top{grid-template-columns:auto minmax(0,1fr) auto}.swal2-container.swal2-bottom-end,.swal2-container.swal2-center-end,.swal2-container.swal2-top-end{grid-template-columns:auto auto minmax(0,1fr)}.swal2-container.swal2-top-start>.swal2-popup{align-self:start}.swal2-container.swal2-top>.swal2-popup{grid-column:2;align-self:start;justify-self:center}.swal2-container.swal2-top-end>.swal2-popup,.swal2-container.swal2-top-right>.swal2-popup{grid-column:3;align-self:start;justify-self:end}.swal2-container.swal2-center-left>.swal2-popup,.swal2-container.swal2-center-start>.swal2-popup{grid-row:2;align-self:center}.swal2-container.swal2-center>.swal2-popup{grid-column:2;grid-row:2;align-self:center;justify-self:center}.swal2-container.swal2-center-end>.swal2-popup,.swal2-container.swal2-center-right>.swal2-popup{grid-column:3;grid-row:2;align-self:center;justify-self:end}.swal2-container.swal2-bottom-left>.swal2-popup,.swal2-container.swal2-bottom-start>.swal2-popup{grid-column:1;grid-row:3;align-self:end}.swal2-container.swal2-bottom>.swal2-popup{grid-column:2;grid-row:3;justify-self:center;align-self:end}.swal2-container.swal2-bottom-end>.swal2-popup,.swal2-container.swal2-bottom-right>.swal2-popup{grid-column:3;grid-row:3;align-self:end;justify-self:end}.swal2-container.swal2-grow-fullscreen>.swal2-popup,.swal2-container.swal2-grow-row>.swal2-popup{grid-column:1/4;width:100%}.swal2-container.swal2-grow-column>.swal2-popup,.swal2-container.swal2-grow-fullscreen>.swal2-popup{grid-row:1/4;align-self:stretch}.swal2-container.swal2-no-transition{transition:none!important}.swal2-popup{display:none;position:relative;box-sizing:border-box;grid-template-columns:minmax(0,100%);width:32em;max-width:100%;padding:0 0 1.25em;border:none;border-radius:5px;background:#fff;color:#545454;font-family:inherit;font-size:1rem}.swal2-popup:focus{outline:0}.swal2-popup.swal2-loading{overflow-y:hidden}.swal2-title{position:relative;max-width:100%;margin:0;padding:.8em 1em 0;color:inherit;font-size:1.875em;font-weight:600;text-align:center;text-transform:none;word-wrap:break-word}.swal2-actions{display:flex;z-index:1;box-sizing:border-box;flex-wrap:wrap;align-items:center;justify-content:center;width:auto;margin:1.25em auto 0;padding:0}.swal2-actions:not(.swal2-loading) .swal2-styled[disabled]{opacity:.4}.swal2-actions:not(.swal2-loading) .swal2-styled:hover{background-image:linear-gradient(rgba(0,0,0,.1),rgba(0,0,0,.1))}.swal2-actions:not(.swal2-loading) .swal2-styled:active{background-image:linear-gradient(rgba(0,0,0,.2),rgba(0,0,0,.2))}.swal2-loader{display:none;align-items:center;justify-content:center;width:2.2em;height:2.2em;margin:0 1.875em;-webkit-animation:swal2-rotate-loading 1.5s linear 0s infinite normal;animation:swal2-rotate-loading 1.5s linear 0s infinite normal;border-width:.25em;border-style:solid;border-radius:100%;border-color:#2778c4 transparent #2778c4 transparent}.swal2-styled{margin:.3125em;padding:.625em 1.1em;transition:box-shadow .1s;box-shadow:0 0 0 3px transparent;font-weight:500}.swal2-styled:not([disabled]){cursor:pointer}.swal2-styled.swal2-confirm{border:0;border-radius:.25em;background:initial;background-color:#7066e0;color:#fff;font-size:1em}.swal2-styled.swal2-confirm:focus{box-shadow:0 0 0 3px rgba(112,102,224,.5)}.swal2-styled.swal2-deny{border:0;border-radius:.25em;background:initial;background-color:#dc3741;color:#fff;font-size:1em}.swal2-styled.swal2-deny:focus{box-shadow:0 0 0 3px rgba(220,55,65,.5)}.swal2-styled.swal2-cancel{border:0;border-radius:.25em;background:initial;background-color:#6e7881;color:#fff;font-size:1em}.swal2-styled.swal2-cancel:focus{box-shadow:0 0 0 3px rgba(110,120,129,.5)}.swal2-styled.swal2-default-outline:focus{box-shadow:0 0 0 3px rgba(100,150,200,.5)}.swal2-styled:focus{outline:0}.swal2-styled::-moz-focus-inner{border:0}.swal2-footer{justify-content:center;margin:1em 0 0;padding:1em 1em 0;border-top:1px solid #eee;color:inherit;font-size:1em}.swal2-timer-progress-bar-container{position:absolute;right:0;bottom:0;left:0;grid-column:auto!important;height:.25em;overflow:hidden;border-bottom-right-radius:5px;border-bottom-left-radius:5px}.swal2-timer-progress-bar{width:100%;height:.25em;background:rgba(0,0,0,.2)}.swal2-image{max-width:100%;margin:2em auto 1em}.swal2-close{z-index:2;align-items:center;justify-content:center;width:1.2em;height:1.2em;margin-top:0;margin-right:0;margin-bottom:-1.2em;padding:0;overflow:hidden;transition:color .1s,box-shadow .1s;border:none;border-radius:5px;background:0 0;color:#ccc;font-family:serif;font-family:monospace;font-size:2.5em;cursor:pointer;justify-self:end}.swal2-close:hover{transform:none;background:0 0;color:#f27474}.swal2-close:focus{outline:0;box-shadow:inset 0 0 0 3px rgba(100,150,200,.5)}.swal2-close::-moz-focus-inner{border:0}.swal2-html-container{z-index:1;justify-content:center;margin:1em 1.6em .3em;padding:0;overflow:auto;color:inherit;font-size:1.125em;font-weight:400;line-height:normal;text-align:center;word-wrap:break-word;word-break:break-word}.swal2-checkbox,.swal2-file,.swal2-input,.swal2-radio,.swal2-select,.swal2-textarea{margin:1em 2em 3px}.swal2-file,.swal2-input,.swal2-textarea{box-sizing:border-box;width:auto;transition:border-color .1s,box-shadow .1s;border:1px solid #d9d9d9;border-radius:.1875em;background:inherit;box-shadow:inset 0 1px 1px rgba(0,0,0,.06),0 0 0 3px transparent;color:inherit;font-size:1.125em}.swal2-file.swal2-inputerror,.swal2-input.swal2-inputerror,.swal2-textarea.swal2-inputerror{border-color:#f27474!important;box-shadow:0 0 2px #f27474!important}.swal2-file:focus,.swal2-input:focus,.swal2-textarea:focus{border:1px solid #b4dbed;outline:0;box-shadow:inset 0 1px 1px rgba(0,0,0,.06),0 0 0 3px rgba(100,150,200,.5)}.swal2-file::-moz-placeholder,.swal2-input::-moz-placeholder,.swal2-textarea::-moz-placeholder{color:#ccc}.swal2-file:-ms-input-placeholder,.swal2-input:-ms-input-placeholder,.swal2-textarea:-ms-input-placeholder{color:#ccc}.swal2-file::placeholder,.swal2-input::placeholder,.swal2-textarea::placeholder{color:#ccc}.swal2-range{margin:1em 2em 3px;background:#fff}.swal2-range input{width:80%}.swal2-range output{width:20%;color:inherit;font-weight:600;text-align:center}.swal2-range input,.swal2-range output{height:2.625em;padding:0;font-size:1.125em;line-height:2.625em}.swal2-input{height:2.625em;padding:0 .75em}.swal2-file{width:75%;margin-right:auto;margin-left:auto;background:inherit;font-size:1.125em}.swal2-textarea{height:6.75em;padding:.75em}.swal2-select{min-width:50%;max-width:100%;padding:.375em .625em;background:inherit;color:inherit;font-size:1.125em}.swal2-checkbox,.swal2-radio{align-items:center;justify-content:center;background:#fff;color:inherit}.swal2-checkbox label,.swal2-radio label{margin:0 .6em;font-size:1.125em}.swal2-checkbox input,.swal2-radio input{flex-shrink:0;margin:0 .4em}.swal2-input-label{display:flex;justify-content:center;margin:1em auto 0}.swal2-validation-message{align-items:center;justify-content:center;margin:1em 0 0;padding:.625em;overflow:hidden;background:#f0f0f0;color:#666;font-size:1em;font-weight:300}.swal2-validation-message::before{content:"!";display:inline-block;width:1.5em;min-width:1.5em;height:1.5em;margin:0 .625em;border-radius:50%;background-color:#f27474;color:#fff;font-weight:600;line-height:1.5em;text-align:center}.swal2-icon{position:relative;box-sizing:content-box;justify-content:center;width:5em;height:5em;margin:2.5em auto .6em;border:.25em solid transparent;border-radius:50%;border-color:#000;font-family:inherit;line-height:5em;cursor:default;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.swal2-icon .swal2-icon-content{display:flex;align-items:center;font-size:3.75em}.swal2-icon.swal2-error{border-color:#f27474;color:#f27474}.swal2-icon.swal2-error .swal2-x-mark{position:relative;flex-grow:1}.swal2-icon.swal2-error [class^=swal2-x-mark-line]{display:block;position:absolute;top:2.3125em;width:2.9375em;height:.3125em;border-radius:.125em;background-color:#f27474}.swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left]{left:1.0625em;transform:rotate(45deg)}.swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]{right:1em;transform:rotate(-45deg)}.swal2-icon.swal2-error.swal2-icon-show{-webkit-animation:swal2-animate-error-icon .5s;animation:swal2-animate-error-icon .5s}.swal2-icon.swal2-error.swal2-icon-show .swal2-x-mark{-webkit-animation:swal2-animate-error-x-mark .5s;animation:swal2-animate-error-x-mark .5s}.swal2-icon.swal2-warning{border-color:#facea8;color:#f8bb86}.swal2-icon.swal2-warning.swal2-icon-show{-webkit-animation:swal2-animate-error-icon .5s;animation:swal2-animate-error-icon .5s}.swal2-icon.swal2-warning.swal2-icon-show .swal2-icon-content{-webkit-animation:swal2-animate-i-mark .5s;animation:swal2-animate-i-mark .5s}.swal2-icon.swal2-info{border-color:#9de0f6;color:#3fc3ee}.swal2-icon.swal2-info.swal2-icon-show{-webkit-animation:swal2-animate-error-icon .5s;animation:swal2-animate-error-icon .5s}.swal2-icon.swal2-info.swal2-icon-show .swal2-icon-content{-webkit-animation:swal2-animate-i-mark .8s;animation:swal2-animate-i-mark .8s}.swal2-icon.swal2-question{border-color:#c9dae1;color:#87adbd}.swal2-icon.swal2-question.swal2-icon-show{-webkit-animation:swal2-animate-error-icon .5s;animation:swal2-animate-error-icon .5s}.swal2-icon.swal2-question.swal2-icon-show .swal2-icon-content{-webkit-animation:swal2-animate-question-mark .8s;animation:swal2-animate-question-mark .8s}.swal2-icon.swal2-success{border-color:#a5dc86;color:#a5dc86}.swal2-icon.swal2-success [class^=swal2-success-circular-line]{position:absolute;width:3.75em;height:7.5em;transform:rotate(45deg);border-radius:50%}.swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=left]{top:-.4375em;left:-2.0635em;transform:rotate(-45deg);transform-origin:3.75em 3.75em;border-radius:7.5em 0 0 7.5em}.swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=right]{top:-.6875em;left:1.875em;transform:rotate(-45deg);transform-origin:0 3.75em;border-radius:0 7.5em 7.5em 0}.swal2-icon.swal2-success .swal2-success-ring{position:absolute;z-index:2;top:-.25em;left:-.25em;box-sizing:content-box;width:100%;height:100%;border:.25em solid rgba(165,220,134,.3);border-radius:50%}.swal2-icon.swal2-success .swal2-success-fix{position:absolute;z-index:1;top:.5em;left:1.625em;width:.4375em;height:5.625em;transform:rotate(-45deg)}.swal2-icon.swal2-success [class^=swal2-success-line]{display:block;position:absolute;z-index:2;height:.3125em;border-radius:.125em;background-color:#a5dc86}.swal2-icon.swal2-success [class^=swal2-success-line][class$=tip]{top:2.875em;left:.8125em;width:1.5625em;transform:rotate(45deg)}.swal2-icon.swal2-success [class^=swal2-success-line][class$=long]{top:2.375em;right:.5em;width:2.9375em;transform:rotate(-45deg)}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-line-tip{-webkit-animation:swal2-animate-success-line-tip .75s;animation:swal2-animate-success-line-tip .75s}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-line-long{-webkit-animation:swal2-animate-success-line-long .75s;animation:swal2-animate-success-line-long .75s}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-circular-line-right{-webkit-animation:swal2-rotate-success-circular-line 4.25s ease-in;animation:swal2-rotate-success-circular-line 4.25s ease-in}.swal2-progress-steps{flex-wrap:wrap;align-items:center;max-width:100%;margin:1.25em auto;padding:0;background:inherit;font-weight:600}.swal2-progress-steps li{display:inline-block;position:relative}.swal2-progress-steps .swal2-progress-step{z-index:20;flex-shrink:0;width:2em;height:2em;border-radius:2em;background:#2778c4;color:#fff;line-height:2em;text-align:center}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step{background:#2778c4}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step{background:#add8e6;color:#fff}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step-line{background:#add8e6}.swal2-progress-steps .swal2-progress-step-line{z-index:10;flex-shrink:0;width:2.5em;height:.4em;margin:0 -1px;background:#2778c4}[class^=swal2]{-webkit-tap-highlight-color:transparent}.swal2-show{-webkit-animation:swal2-show .3s;animation:swal2-show .3s}.swal2-hide{-webkit-animation:swal2-hide .15s forwards;animation:swal2-hide .15s forwards}.swal2-noanimation{transition:none}.swal2-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}.swal2-rtl .swal2-close{margin-right:initial;margin-left:0}.swal2-rtl .swal2-timer-progress-bar{right:0;left:auto}@-webkit-keyframes swal2-toast-show{0%{transform:translateY(-.625em) rotateZ(2deg)}33%{transform:translateY(0) rotateZ(-2deg)}66%{transform:translateY(.3125em) rotateZ(2deg)}100%{transform:translateY(0) rotateZ(0)}}@keyframes swal2-toast-show{0%{transform:translateY(-.625em) rotateZ(2deg)}33%{transform:translateY(0) rotateZ(-2deg)}66%{transform:translateY(.3125em) rotateZ(2deg)}100%{transform:translateY(0) rotateZ(0)}}@-webkit-keyframes swal2-toast-hide{100%{transform:rotateZ(1deg);opacity:0}}@keyframes swal2-toast-hide{100%{transform:rotateZ(1deg);opacity:0}}@-webkit-keyframes swal2-toast-animate-success-line-tip{0%{top:.5625em;left:.0625em;width:0}54%{top:.125em;left:.125em;width:0}70%{top:.625em;left:-.25em;width:1.625em}84%{top:1.0625em;left:.75em;width:.5em}100%{top:1.125em;left:.1875em;width:.75em}}@keyframes swal2-toast-animate-success-line-tip{0%{top:.5625em;left:.0625em;width:0}54%{top:.125em;left:.125em;width:0}70%{top:.625em;left:-.25em;width:1.625em}84%{top:1.0625em;left:.75em;width:.5em}100%{top:1.125em;left:.1875em;width:.75em}}@-webkit-keyframes swal2-toast-animate-success-line-long{0%{top:1.625em;right:1.375em;width:0}65%{top:1.25em;right:.9375em;width:0}84%{top:.9375em;right:0;width:1.125em}100%{top:.9375em;right:.1875em;width:1.375em}}@keyframes swal2-toast-animate-success-line-long{0%{top:1.625em;right:1.375em;width:0}65%{top:1.25em;right:.9375em;width:0}84%{top:.9375em;right:0;width:1.125em}100%{top:.9375em;right:.1875em;width:1.375em}}@-webkit-keyframes swal2-show{0%{transform:scale(.7)}45%{transform:scale(1.05)}80%{transform:scale(.95)}100%{transform:scale(1)}}@keyframes swal2-show{0%{transform:scale(.7)}45%{transform:scale(1.05)}80%{transform:scale(.95)}100%{transform:scale(1)}}@-webkit-keyframes swal2-hide{0%{transform:scale(1);opacity:1}100%{transform:scale(.5);opacity:0}}@keyframes swal2-hide{0%{transform:scale(1);opacity:1}100%{transform:scale(.5);opacity:0}}@-webkit-keyframes swal2-animate-success-line-tip{0%{top:1.1875em;left:.0625em;width:0}54%{top:1.0625em;left:.125em;width:0}70%{top:2.1875em;left:-.375em;width:3.125em}84%{top:3em;left:1.3125em;width:1.0625em}100%{top:2.8125em;left:.8125em;width:1.5625em}}@keyframes swal2-animate-success-line-tip{0%{top:1.1875em;left:.0625em;width:0}54%{top:1.0625em;left:.125em;width:0}70%{top:2.1875em;left:-.375em;width:3.125em}84%{top:3em;left:1.3125em;width:1.0625em}100%{top:2.8125em;left:.8125em;width:1.5625em}}@-webkit-keyframes swal2-animate-success-line-long{0%{top:3.375em;right:2.875em;width:0}65%{top:3.375em;right:2.875em;width:0}84%{top:2.1875em;right:0;width:3.4375em}100%{top:2.375em;right:.5em;width:2.9375em}}@keyframes swal2-animate-success-line-long{0%{top:3.375em;right:2.875em;width:0}65%{top:3.375em;right:2.875em;width:0}84%{top:2.1875em;right:0;width:3.4375em}100%{top:2.375em;right:.5em;width:2.9375em}}@-webkit-keyframes swal2-rotate-success-circular-line{0%{transform:rotate(-45deg)}5%{transform:rotate(-45deg)}12%{transform:rotate(-405deg)}100%{transform:rotate(-405deg)}}@keyframes swal2-rotate-success-circular-line{0%{transform:rotate(-45deg)}5%{transform:rotate(-45deg)}12%{transform:rotate(-405deg)}100%{transform:rotate(-405deg)}}@-webkit-keyframes swal2-animate-error-x-mark{0%{margin-top:1.625em;transform:scale(.4);opacity:0}50%{margin-top:1.625em;transform:scale(.4);opacity:0}80%{margin-top:-.375em;transform:scale(1.15)}100%{margin-top:0;transform:scale(1);opacity:1}}@keyframes swal2-animate-error-x-mark{0%{margin-top:1.625em;transform:scale(.4);opacity:0}50%{margin-top:1.625em;transform:scale(.4);opacity:0}80%{margin-top:-.375em;transform:scale(1.15)}100%{margin-top:0;transform:scale(1);opacity:1}}@-webkit-keyframes swal2-animate-error-icon{0%{transform:rotateX(100deg);opacity:0}100%{transform:rotateX(0);opacity:1}}@keyframes swal2-animate-error-icon{0%{transform:rotateX(100deg);opacity:0}100%{transform:rotateX(0);opacity:1}}@-webkit-keyframes swal2-rotate-loading{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@keyframes swal2-rotate-loading{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@-webkit-keyframes swal2-animate-question-mark{0%{transform:rotateY(-360deg)}100%{transform:rotateY(0)}}@keyframes swal2-animate-question-mark{0%{transform:rotateY(-360deg)}100%{transform:rotateY(0)}}@-webkit-keyframes swal2-animate-i-mark{0%{transform:rotateZ(45deg);opacity:0}25%{transform:rotateZ(-25deg);opacity:.4}50%{transform:rotateZ(15deg);opacity:.8}75%{transform:rotateZ(-5deg);opacity:1}100%{transform:rotateX(0);opacity:1}}@keyframes swal2-animate-i-mark{0%{transform:rotateZ(45deg);opacity:0}25%{transform:rotateZ(-25deg);opacity:.4}50%{transform:rotateZ(15deg);opacity:.8}75%{transform:rotateZ(-5deg);opacity:1}100%{transform:rotateX(0);opacity:1}}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown){overflow:hidden}body.swal2-height-auto{height:auto!important}body.swal2-no-backdrop .swal2-container{background-color:transparent!important;pointer-events:none}body.swal2-no-backdrop .swal2-container .swal2-popup{pointer-events:all}body.swal2-no-backdrop .swal2-container .swal2-modal{box-shadow:0 0 10px rgba(0,0,0,.4)}@media print{body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown){overflow-y:scroll!important}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown)>[aria-hidden=true]{display:none}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) .swal2-container{position:static!important}}body.swal2-toast-shown .swal2-container{box-sizing:border-box;width:360px;max-width:100%;background-color:transparent;pointer-events:none}body.swal2-toast-shown .swal2-container.swal2-top{top:0;right:auto;bottom:auto;left:50%;transform:translateX(-50%)}body.swal2-toast-shown .swal2-container.swal2-top-end,body.swal2-toast-shown .swal2-container.swal2-top-right{top:0;right:0;bottom:auto;left:auto}body.swal2-toast-shown .swal2-container.swal2-top-left,body.swal2-toast-shown .swal2-container.swal2-top-start{top:0;right:auto;bottom:auto;left:0}body.swal2-toast-shown .swal2-container.swal2-center-left,body.swal2-toast-shown .swal2-container.swal2-center-start{top:50%;right:auto;bottom:auto;left:0;transform:translateY(-50%)}body.swal2-toast-shown .swal2-container.swal2-center{top:50%;right:auto;bottom:auto;left:50%;transform:translate(-50%,-50%)}body.swal2-toast-shown .swal2-container.swal2-center-end,body.swal2-toast-shown .swal2-container.swal2-center-right{top:50%;right:0;bottom:auto;left:auto;transform:translateY(-50%)}body.swal2-toast-shown .swal2-container.swal2-bottom-left,body.swal2-toast-shown .swal2-container.swal2-bottom-start{top:auto;right:auto;bottom:0;left:0}body.swal2-toast-shown .swal2-container.swal2-bottom{top:auto;right:auto;bottom:0;left:50%;transform:translateX(-50%)}body.swal2-toast-shown .swal2-container.swal2-bottom-end,body.swal2-toast-shown .swal2-container.swal2-bottom-right{top:auto;right:0;bottom:0;left:auto}</style>
    <script src="https://ekywin.com/assets/web/js/custom.js"></script>
    <script src="https://ekywin.com/assets/js/jquery.showLoading.min.js"></script>
    <script src="https://ekywin.com/assets/js/custom/common.js"></script>
    <script src="https://ekywin.com/assets/js/validate.js"></script>
    <script src="https://ekywin.com/assets/js/validateadditional.js"></script>
    
    
     <script>
        $(document).ready(function() {

            $.ajaxSetup({
                cache: false,
            });

        });
    </script>
    <style>
@media only screen and (max-width: 360px) {
  .recordres {
   width:350px !important;
   padding-right:0px !important;
   padding-left:0 px !important;
   margin-left:-41px !important;
   
  }
}
#modalOverlay {
			position: fixed;
			top: 0;
			left: 0;
			background: rgba(0, 0, 0, 0.5);
			z-index: 99999;
			height: 100%;
			width: 100%;
	}
.modalPopup {
			position: absolute;
			top: 30%;
			left: 50%;
			transform: translate(-50%, -50%);
			background: #fff;
			width: 280px;
			padding: 0 0 30px;
			-webkit-box-shadow: 0 2px 10px 3px rgba(0,0,0,.2);
			-moz-box-shadow: 0 2px 10px 3px rgba(0,0,0,.2);
			box-shadow: 0 2px 10px 3px rgba(0,0,0,.2);
	}
.modalContent {padding: 0 2em;}
    </style>
    <style>
        .recordres{
            /*margin-left:0px !important;*/
            /*margin-right: 0px !important;*/
            /*padding-right: 0px !important;*/
            /*padding-left: 0px !important;*/
        }
        .buttonStyle {
	border: transparent;
    border-radius: 0;
    background: #6d6d6d;
    color: #eee !important;
    cursor: pointer;
    font-weight: bold;
    font-size: 14px;
    text-transform: uppercase;
    padding: 5px 11px;
    text-decoration: none;
    -webkit-transition: all 1s ease;
    -moz-transition: all 1s ease;
    -ms-transition: all 1s ease;
    -o-transition: all 1s ease;
    transition: all 1s ease;
    border-radius: 25px;
	}
	.buttonStyle:hover {
		background: #1e1e1e;
		color: #fff;
	}
	
	.rc-wal1{
	    background: linear-gradient(48deg, rgba(172,34,195,1) 0%, rgba(121,45,253,1) 100%);
	    text-align: center;
    line-height: 40px;
    color: #fff;
    height: 40px;
    width: 100px;
    border-radius: 15px;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
	}
	
	.wd-bal1{
	    text-align: center;
    line-height: 40px;
    color: #575252;
    height: 40px;
    width: 100px;
    border-radius: 15px;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    background-color: #ededed;
    margin-top: 10px;
    background: #ededed;
    box-shadow: none;
    pointer-events: none;
	}
	
	
	.nav-top{
	    background: #6600AC;
    
	}
	
	.nav-top span{
	    color:#ffffff;
	}
	
	.taskR1 {
	    position:relative;
	    left:15px;
	    bottom:15px;
	    
	    float:left;
	}
	
	.CheckR2{
	    position:relative;
	    right:45px;
	    bottom:15px;
	    
	    float:right;
	}

	
    </style>
    <title>0076</title>
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="0076">
<meta name="twitter:site" content="0076">
<meta name="twitter:description" content="Earn & Grow With Us">
<meta name="twitter:image" content="/logo.png">
<meta property="og:title" content="vipmall.buzz/">
<meta property="og:type" content="website">
<meta property="og:site_name" content="0076">
<meta property="og:url" content="https://www.vipmall.buzz">
<meta name="msapplication-TileImage" content="/logo.png">
<meta property="og:image" content="/logo.png">
<meta property="og:description" content="Earn & Grow With Us">
<meta property="url" content="https://www.vipmall.buzz">
<meta property="type" content="website">
<meta property="title" content="0076">
<meta property="description" content="Earn & Grow With Us">
<meta property="image" content="/logo.png">
</head>
    
    
    
 <style>
    .utrfield{
    border-radius: 1px;
    width: 200px;
    height: 40px;
    border:none;
    background:#f5f5f5;
}
.utrbtn{
    background-color: green;
    color: white;
    /* width: 74px; */
    border-radius: 5px;
    height: 31px;
    border:0px !important;
}
.nodis{
    display:none!important;
}

.main-amt{
    position:absolute;
    left:1rem;
    top:2.5rem;
    text-align: right;
    float:right;
    font-size:25px;
    
}

.spm{
    font-size:13px;
    position:relative;
    bottom:15px;
    
}

.up-id{
    position:relative;
    top:10px;
    font-size:17px;
}

.hideme{
    display:none;
}

.copy {
    border: 1px solid;
    padding: 0 3px;
    font-size: 12px;
    border-radius: 4px;
    float: center;
    height: 25px;
    line-height: 20px;
    background:green;
    position:relative;
    right:10.5rem;
    
}


.copy1{
    border: 1px solid;
    padding: 0 6px;
    font-size: 15px;
    border-radius: 4px;
    float: right;
    height: 30px;
    line-height: 26px;
}

.QR-img img{
    position:absolute;
    left:14.9rem;
    top:2rem;
    float:right;
    width:120px;
    height:120px;
    border-radius:2px;
}


.pamod{
    position:relative;
    left:16px;
    top:1.7rem;
    float:left;
    font-size:11px;
    font-weight:500;
}

.pamod img{
    position:relative;
    height:15px;
    
}




.button-row {
    position:relative;
    bottom:10px;
  display: -webkit-box;
  display: flex;
  margin-top: 15px;
  position
  
}

.button {
    position:relative;
    left:15px;
    bottom:2px;
  font: sans-serif;
  font-size: 15px;
  padding: 0px 10px;
  background: #F8F8F8;
  border: 1px solid #DDD;
  height:45px;
  
}

.button:hover {
  background: #DEF;
  cursor: pointer;
}

.button.is-active {
  background: #fff;
  color: white;
}

.button-row .button {
  
}

.button-row .button:last-child {
 
}

.txn-no{
    position:relative;
    top:6px;
    color:#fffcfc;
}

.button-row img{
    height:30px;
    width:50px;
    border-radius:5px;
}


.utr-enter{
    position:relative;
   
    top:20px;
}
.btn {width:80%;max-width: 320px;height:42px;display: block;text-align: center;color: grey;padding:0;margin:10px auto 0;font-weight: 700;font-size:30px;}

.btn-sub{
    background: radial-gradient(circle, rgba(255,143,0,1) 96%, rgba(205,154,88,1) 100%);
    z-index: 99;
    position: relative;
    bottom:2px;
    height:40px;
    width:70px;
    border:none;
    color:white;
    font-weight:500;
    border-radius:5px;
    
}
.nav-top, .stick {
    position: sticky;
    border-bottom: 11px solid #20c997;
    background: #0093ff;
    z-index: 999;
    height: 33px;
    line-height: 45px;
    font-size: 16px;
    white-space: nowrap;
    top: 0;
    
}


</style>
<div class="col-md-6 col-lg-4 main">
	<div class="row">
		<div class="col-12 m-record">
			<div class="row nav-top auto">
				<div class="col-2 xtl"><a href="/#/recharge"><span class="nav-back"></span></a></div>
				<div class="col-8 tfw-7 tf-20 tfcdb text-white">Recharge</div>
				<div class="col-2"></div>
				<div class="col-6 xtl tf-16">
					<div class="row">
						<div class="txn-no col-12 tfcdb ">Txn ID：<span id="trid">TX3N<?php echo $am;?>MN84L</span></div>
						
						
						<div class="main-amt text-white tfw-7">₹<span class=" tfw-7" id="rmt" onclick="copyAMT()"><?php echo $am;?></span></div>
				 		</div>
				        </div>
				
			<!--<div class="up-id col-12 xtl pb-2"><span class="xic phonepe-logo" id="pmod"></span class="text-white "><span class="upi-coper ml-1 tfw-5 tf-10 upi-coper" id="upiid">BHARATPE09912040268@yesbankltd</span><span class="text-white">: Phone Pe<span class="mt-2 copy" id="cu" onclick="copyupi()">Copy UPI</span></span></div>-->
			
			
			<div class="col-12 row pamod text-white ">
			    <p>Click Below To Copy UPI ID<span> <img src="https://cdn0.iconfinder.com/data/icons/flat-round-arrow-arrow-head/512/Red_Arrow_Head_Down-2-512.png"></span></p>
			</div>
			
			<div class="button-row text-center">
			    <div class="coper-up" id="upiid" id="cu" onclick="copyupi()" ><p class="hideme"><?php echo $upiid;?></p>
  <button class="button"><img src="https://www.logo.wine/a/logo/Paytm/Paytm-Logo.wine.svg"></button></div>
  
  
  <div class="coper-up" id="upiid" id="cu" onclick="copyupi()" ><p class="hideme"><?php echo $upiid;?></p>
  <button class="button "> <img src="https://cdn.worldvectorlogo.com/logos/phonepe-1.svg"></button></div>
  
  
  
  <div class="coper-up" id="upiid" id="cu" onclick="copyupi()" ><p class="hideme"><?php echo $upiid;?></p>
  <button class="button is-active"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwCem3pbg35cqyFA89EBx7o5sMao-p82Ckqgw1vfwUXjrLyoKhfGkjCJwlJ6qXFyxZ4Fw&usqp=CAU"></button></div>
</div>

			
				
			</div>
			<form id="payment" method="post" action="">
<div class="upi-payment-step">
			<div class="row mt-4">
				<div class="col-2 xtc pa-0"><img class="dhkm" src="https://ekywin.com/assets/pr/images/tick_ac.png" height="35"></div>
				<div class="col-10 xtl tfw-7 tf-18 tfcdb pl-0 ">If you have paid, please Submit the UTR/Ref. No</div>
				
				<div class=" pt-2 zooani utr-enter col-12 xtl pb-2 gsbgi" id="utrdiv"><span class="ml-1 tfw-6" ><input type="tel"class="utrfield" id="utrfield" maxlength="12" minlength="12" onKeyPress="if(this.value.length==12) return false;" type="text" id="upi-input" value="" name="utr"  placeholder="  Enter UTR No./Ref No."/>
				
				<input id="text" type="hidden" name="upi" value="<?php echo $upiid;?>"  />
<input id="text" type="hidden" name="amount" value="<?php echo $am;?>"  />
				</span><span class="mt-2 btns copy1" style="height:44px !important; border-radius:25px !important;border:0px !important;" id="utrsubmit" class="dhkm text-white"  onclick="submit()" ><button class="btn-sub">Submit</span></div></button>
				
				
				
				<div class="col-2 xtc pa-0">
					<div class="lhsu" id="ln1"></div>
				</div>
				<div class="col-10 gsbgi">
					<div class="pt-2 pb-2" id="upifrm">
						<form class="zooani" enctype="multipart/form-data" method="POST" id="ssupload">
						    <p id="submittedutr" style="color:red; font-size:20px;"></p>
						<!--	<div class="dz-message">-->
						<!--		<div class="dropdocs"><span class="add"></span><br>Upload</div>-->
						<!--	</div>-->
						<!--	<input type="file" name="file" id="screenshot" style="width:1px !important;height:1px !important;" accept=".png,.PNG,.jpg,.jpeg,.JPG,.JPEG">-->
						<!--</form>-->
					</div>
				</div>

				<!--<div class="col-5">-->
				<!--	<div class="pt-2 pb-2" id="uimg"><img class="bodr6" id="payss" src="https://ekywin.com/assets/pr/images/sample.png" width="100%"></div>-->
				<!--</div>-->
				<div class="col-2 mt-3 xtc pa-0"><img id="rcagnt" class="dhkm" src="https://ekywin.com/assets/pr/images/tick_inac.png" height="35"></div>
				<div class="col-10 mt-4 xtl tfw-7 tf-18 tfcdb pl-0">PayU recharge agents processing</div>
				<div class="col-2 xtc pa-0">
					<div class="lhsu" id="ln2"></div>
				</div>
				<div class="col-10 xtc">
					<div class="mt-4 mb-4"> <img src="https://www.vipmall.buzz/customerService1.png" style="height:50px;width:50px"><span class="btn" id="btn"></span></div>
					<div class="mb-3" id="spuvt" onclick="telgram()"><span class="follow"></span><span id="sprt">Speed up confirmation via Telegram</span></div>
				</div>
				<div class="col-2 xtc pa-0"><img id="rccmp" class="dhkm" src="https://ekywin.com/assets/pr/images/tick_inac.png" height="35"></div>
				<div class="col-10 mt-2 xtl tfw-7 tf-18 tfcdb pl-0">Complete</div>
			</div>
			<div class="row mt-2 mb-4" id="ccomod">
				<div class="col-6">
					<div class="mt-3 btn-con rc" id="canod">Cancel</div>
				</div>
				<div class="col-6">
					<div class="mt-3 btn-con rc" id="concs" onclick="telgram()">Complaint</div>
				</div>
			</div>
		</div>

	</div>

</div>
<script>
// 	$("#upifrm").click(function() {
// 		document.getElementById("screenshot").click();
// 	});

	function copyupi() {
		var upiid = $("#upiid").text();
		var Cupid = document.createElement("textarea");
		document.body.appendChild(Cupid);
		Cupid.value = upiid;
		Cupid.focus();
		Cupid.select();
		document.execCommand("copy");
		document.body.removeChild(Cupid);
		$('#cu').text('Copied');
		alert("UPI Copied");

	};

	function rctimer() {
		var Validity = 60;
		timer = setInterval(function() {
			$('#timer').text(Validity);
			Validity -= 1;
			if (Validity < 0) {
				clearInterval(timer);
				$('#timer').text("?");
				$('#spuvt').addClass('zooani');
			}
		}, 1000);
	}
	$("#utrsubmit").click(function() {
// 		if (typeof(FileReader) != "undefined") {
// 			var image_holder = $("#uimg");
// 			image_holder.empty();
// 			var reader = new FileReader();
// 			reader.onload = function(e) {
// 				$("<img />", {
// 					"src": e.target.result,
// 					"class": 'bodr6',
// 					"width": '100%'
// 				}).appendTo(image_holder);
// 			}
// 			image_holder.show();
// 			reader.readAsDataURL($(this)[0].files[0]);
// 		} else {
// 			alert("This browser does not support FileReader.");
// 		}
var valln=$('#utrfield').val();
if(valln.length==12){
		$("#ln1").addClass("bg");
		$("#rcagnt").attr("src", "https://ekywin.com/assets/pr/images/tick_ac.png");
		rctimer();
		screeshotupload();
}else{
	Swal.fire({
			toast: true,
			icon: 'error',
			title: 'Input Valid UTR no.!',
			animation: false,
			position: 'center',
			showConfirmButton: false,
			timer: 2000,
			timerProgressBar: false,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		});
    
}
	});

	function rctimer() {
		var Validity = 60;
		timer = setInterval(function() {
			$('#timer').text(Validity);
			Validity -= 1;
			if (Validity <= 30 ) {
				$.ajax({
					url: '#',
					type: 'post',
					data: {
						'trid': 'TXNMNL1697',
					},
					success: function(response) {
						console.log(response);
						var stt=JSON.parse(response);
						if (stt.status === 'Completed') {
						    console.log(stt);
							clearInterval(timer);
							$('#timer').empty();
							$('#timer').append('<img src="https://ekywin.com/assets/pr/images/tick_ac.png" height="56">');
							$("#rccmp").attr("src", "https://ekywin.com/assets/pr/images/tick_ac.png");
							Swal.fire({
								toast: true,
								icon: 'success',
								title: 'Recharge Successfull!',
								animation: false,
								position: 'center',
								showConfirmButton: false,
								timer: 2000,
								timerProgressBar: false,
								didOpen: (toast) => {
									toast.addEventListener('mouseenter', Swal.stopTimer)
									toast.addEventListener('mouseleave', Swal.resumeTimer)
								}
							});
							setInterval(function () {window.location.href = "https://vipmall.buzz/";}, 4000);
							
						} else if (stt.status === 'Failed') {
							clearInterval(timer);
							$('#timer').empty();
							$('#timer').append('<img src="https://ekywin.com/assets/pr/images/loading-gif.gif" height="56">');
							$("#rccmp").attr("src", "https://ekywin.com/assets/pr/images/loading-gif.gif");
							Swal.fire({
								toast: true,
								icon: 'error',
								title: 'Recharge Failed!',
								animation: false,
								position: 'center',
								showConfirmButton: false,
								timer: 2000,
								timerProgressBar: false,
								didOpen: (toast) => {
									toast.addEventListener('mouseenter', Swal.stopTimer)
									toast.addEventListener('mouseleave', Swal.resumeTimer)
								}
							});
							window.location.href = "https://vipmall.buzz/";
				// 			setInterval(function () {window.location.href = "https://vipmall.buzz/";}, 4000);
						}else if (stt.status === 'Processing') {
							clearInterval(timer);
							$('#timer').empty();
							$('#timer').append('<img src="https://ekywin.com/assets/pr/images/loading-gif.gif" height="56">');
							$("#rccmp").attr("src", "https://ekywin.com/assets/pr/images/loading-gif.gif");
							Swal.fire({
								toast: true,
								icon: 'error',
								title: 'Recharge Under Process!',
								animation: false,
								position: 'center',
								showConfirmButton: false,
								timer: 2000,
								timerProgressBar: false,
								didOpen: (toast) => {
									toast.addEventListener('mouseenter', Swal.stopTimer)
									toast.addEventListener('mouseleave', Swal.resumeTimer)
								}
							});
				// 			window.location.href = "#/Recharge";
				// 			setInterval(function () {window.location.href = "/Recharge#";}, 4000);
						}
					}
				});
			};
			if (Validity < 1) {
				clearInterval(timer);
				$('#timer').empty();
				$('#timer').append('<img src="https://ekywin.com/assets/pr/images/loading-gif.gif" height="56">');
				$('#spuvt').addClass('zooani');
				$("#sprt").text('Click to Contact Support!')
			}
		}, 1000)
	};

	function telgram() {
		var telLink = "https://t.me/GracePayU";
		var Cupid = document.createElement("textarea");
		document.body.appendChild(Cupid);
		Cupid.value = 'Hello\n\n I have recharge ₹' + <?php echo $am;?> + ' via ' + 'UPI Mode' + ' and submitted utr number.\n ' + '<?php echo $utr;?>' + '\n\n Please confirm as soon as possible.';
		Cupid.focus();
		Cupid.select();
		document.execCommand("copy");
		document.body.removeChild(Cupid);
		$('#spuvt').text('Message copied');
		setTimeout(function() {
			var win = window.open(telLink);
			if (win) {
				win.focus();
			} else {
				$('#spuvt').append('<a href=' + telLink + ' target="blank"> Open Telegram</a>');
			}
		}, 2000);
	};
	$("#canod").click(function() {
		window.location.href = "https://vipmall.buzz/#/recharge#";
	})

// 	function check() {
// 		$.ajax({
// 			url: '',
// 			type: 'post',
// 			data: {
// 				'trid': 'TXNMNL1697',
// 			},
// 			success: function(response) {
// 				console.log(response);
// 				if (response == 'Processing') {

// 				} else if (response == "Completed") {
// 					clearInterval(timer);
// 					$('#timer').empty();
// 					$('#timer').append('<img src="https://ekywin.com/assets/pr/images/tick_green.png" height="56">');
// 					$("#rccmp").attr("src", "https://ekywin.com/assets/pr/images/tick_ac.png");
// 					Swal.fire({
// 						toast: true,
// 						icon: 'success',
// 						title: 'Recharge Successfull!',
// 						animation: false,
// 						position: 'center',
// 						showConfirmButton: false,
// 						timer: 2000,
// 						timerProgressBar: false,
// 						didOpen: (toast) => {
// 							toast.addEventListener('mouseenter', Swal.stopTimer)
// 							toast.addEventListener('mouseleave', Swal.resumeTimer)
// 						}
// 					});
// 					window.location.href = "h/";
// 				} else if (response == "Failed") {
// 					clearInterval(timer);
// 					$('#timer').empty();
// 					$('#timer').append('<img src="https://ekywin.com/assets/pr/images/loading-gif.gif" height="56">');
// 					$("#rccmp").attr("src", "https://ekywin.com/assets/pr/images/loading-gif.gif");
// 					Swal.fire({
// 						toast: true,
// 						icon: 'error',
// 						title: 'Recharge Failed!',
// 						animation: false,
// 						position: 'center',
// 						showConfirmButton: false,
// 						timer: 2000,
// 						timerProgressBar: false,
// 						didOpen: (toast) => {
// 							toast.addEventListener('mouseenter', Swal.stopTimer)
// 							toast.addEventListener('mouseleave', Swal.resumeTimer)
// 						}
// 					});
// 					window.location.href = "/Recharge#";
// 				}
// 			}
// 		})
// 	};

	function screeshotupload() {
// 		var fd = new FormData();
// 		var files = $('#screenshot')[0].files[0];
// 		fd.append('file', files);
        var utrno=$('#utrfield').val();
		$.ajax({
			url: 'a',
			type: 'POST',
			data:{utr:utrno},
// 			contentType: false,
// 			processData: false,
			success: function(response) {
				var suc = 'success';
				// console.log(JSON.parse(response));
				var st=JSON.parse(response);
				// console.log(response);
				// return;
				if ('success' === st.status) {
				    $('#utrdiv').addClass('nodis');
				    $('#submittedutr').text(utrno);
				//     console.log(utrno);
				// 	console.log(st.status);
				} else {
					Swal.fire({
						toast: true,
						icon: 'error',
						title: 'Invalid UTR No.!',
						position: 'center',
						showConfirmButton: false,
						timer: 2000,
						timerProgressBar: false,
						didOpen: (toast) => {
							toast.addEventListener('mouseenter', Swal.stopTimer)
							toast.addEventListener('mouseleave', Swal.resumeTimer)
						}
					})
				}
			}
		})
	};
	
	
	
	$('.button-row').each( function() {
  var $buttonRow = $( this );
  var $activeButton = $buttonRow.find('.button.is-active');

  $buttonRow.on( 'click', '.button', function( event ) {
    // deactivate previous button
    $activeButton.removeClass('is-active');
    // set & activate new button
    $activeButton = $( this );
    $activeButton.addClass('is-active');
  });
});

	
	
	
	
	
	
</script>

<script type="text/javascript">
   let timerOn = true;

function timer(remaining) {
  var m = Math.floor(remaining / 200);
  var s = remaining % 60;
  
  m = m < 10 ? '0' + m : m;
  s = s < 10 ? '0' + s : s;
  document.getElementById('btn').innerHTML = m + ':' + s;
  remaining -= 1;
  
  if(remaining >= 0 && timerOn) {
    setTimeout(function() {
        timer(remaining);
    }, 1000);
    return;
  }

  if(!timerOn) {
    // Do validate stuff here
    return;
  }
  
  // Do timeout stuff here

}
timer(1800);

	function dis(sr){
	    document.getElementById("show-big-img").style.display="block";
	    document.getElementById("big-img").src=sr;
	}
    document.getElementById("close").onclick= function() {myFunction()};

function myFunction() {
   document.getElementById("show-big-img").style.display="none";
}
 function submit(){
    if(document.getElementById("upi-input").value.length<12){
        document.getElementById("error").style.display="";
        setTimeout(function error() {
            document.getElementById("error").style.display="none";
           }, 2000);
        
    }else{
        document.getElementById("payment").submit();
    }
   }
  function copyToClipboard(text) {
var inputc = document.body.appendChild(document.createElement("input"));
inputc.value =document.getElementById("id").innerHTML;
inputc.focus();
inputc.select();
document.execCommand('copy');
inputc.parentNode.removeChild(inputc);
var x = document.getElementById("copied");
        x.className = "show";
        setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);
}

</script>
</body>



</html>
