<?php session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('log_errors', 'On');
ini_set('error_log', 'php_errors.log');
if (empty($cpath)) {
  $cpath = dirname(__FILE__);
  $xcpath = $cpath;
}
include($cpath ."/inc/data.php");
include($xcpath ."/core/functions.php");
include($xcpath ."/core/class.simpleSQLinjectionDetect.php");
if(isLoginUser())
 {
    header("Location:index.php"); 
 }
$c = '';
if(isset($_POST['loginsteam']))
   isLoginUserSteamOpenId();
if(isset($_POST['login']))
{
     $user = $_POST['user'];
     $pass = $_POST['pass'];
 
	  if(findcodxUser($user.';'.$pass,$codbx_users))
         {   
		  $_SESSION['codbxuser'] = $user;
          $_SESSION['codbxpass'] = md5(sha1($pass)); 
          setcookie("codbx_u", $_SESSION['codbxuser'], time()+259200);
          setcookie("codbx_p", $_SESSION['codbxpass'], time()+259200);
 
         echo '<script type="text/javascript"> window.open("index.php","_self");</script>';

        }
        else
        {
            $c = "Invalid UserName or Password";        
        }
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>LogIn Form</title>
<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Hind:300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
  
<style>
html { 
  background: url(<?php echo $domain;?>/admin/inc/images/bg.webp) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  overflow: hidden;
}

img{
  display: block;
  margin: auto;
  width: 100%;
  height: auto;
}

#login-button{
  cursor: pointer;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  padding: 30px;
  margin: auto;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background: rgba(3,3,3,.8);
  overflow: hidden;
  opacity: 0.4;
  box-shadow: 10px 10px 30px #000;}

/* Login container */
#container{
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  width: 260px;
  height: 320px;
  border-radius: 5px;
  background: rgba(3,3,3,0.25);
  box-shadow: 1px 1px 50px #000;
display: none; /* */
}

.close-btn{
  position: absolute;
  cursor: pointer;
  font-family: 'Open Sans Condensed', sans-serif;
  line-height: 18px;
  top: 3px;
  right: 3px;
  width: 20px;
  height: 20px;
  text-align: center;
  border-radius: 10px;
  opacity: .2;
  -webkit-transition: all 2s ease-in-out;
  -moz-transition: all 2s ease-in-out;
  -o-transition: all 2s ease-in-out;
  transition: all 0.2s ease-in-out;
}

.close-btn:hover{
  opacity: .5;
}

/* Heading */
h1{
  font-family: 'Open Sans Condensed', sans-serif;
  position: relative;
  margin-top: 0px;
  text-align: center;
  font-size: 40px;
  color: #ddd;
  text-shadow: 3px 3px 10px #000;
}

/* Inputs */
a,
input{
  font-family: 'Open Sans Condensed', sans-serif;
  text-decoration: none;
  position: relative;
  width: 80%;
  display: block;
  margin: 9px auto;
  font-size: 17px;
  color: #fff;
  padding: 8px;
  border-radius: 6px;
  border: none;
  background: rgba(3,3,3,.1);
  -webkit-transition: all 2s ease-in-out;
  -moz-transition: all 2s ease-in-out;
  -o-transition: all 2s ease-in-out;
  transition: all 0.2s ease-in-out;
}

input:focus{
  outline: none;
  box-shadow: 3px 3px 10px #333;
  background: rgba(3,3,3,.18);
}

/* Placeholders */
::-webkit-input-placeholder {
   color: #ddd;  }
:-moz-placeholder { /* Firefox 18- */
   color: red;  }
::-moz-placeholder {  /* Firefox 19+ */
   color: red;  }
:-ms-input-placeholder {  
   color: #333;  }

/* Link */
a{
  font-family: 'Open Sans Condensed', sans-serif;
  text-align: center;
  padding: 4px 8px;
  background: rgba(107,255,3,0.3);
}

a:hover{
  opacity: 0.7;
}

#remember-container{
  position: relative;
  margin: -5px 20px;
}

.checkbox {
  position: relative;
  cursor: pointer;
	-webkit-appearance: none;
	padding: 5px;
	border-radius: 4px;
  background: rgba(3,3,3,.2);
	display: inline-block;
  width: 16px;
  height: 15px;
}

.checkbox:checked:active {
	box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px 1px 3px rgba(0,0,0,0.1);
}

.checkbox:checked {
  background: rgba(3,3,3,.4);
	box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05), inset 15px 10px -12px rgba(255,255,255,0.5);
	color: #fff;
}

.checkbox:checked:after {
	content: '\2714';
	font-size: 10px;
	position: absolute;
	top: 0px;
	left: 4px;
	color: #fff;
}


.orange-btn{
  background: rgba(87,198,255,.5);
}
</style>

<script src='<?php echo $domain;?>/admin/js/TweenMax.min.js'></script>
<script src='<?php echo $domain;?>/admin/js/jquery.min.js'></script>
  
</head>

<body>

<center><h1 style="color:red;"><?php echo $c; ?> </h1></center>

<!-- -->
<div id="login-button">
  <img src="<?php echo $domain;?>/admin/img/login-w-icon.png">
  </img>
</div>




<div id="container">
  <h1>Log In</h1>
  <span class="close-btn">
    <img src="<?php echo $domain;?>/admin/img/circle_close_delete_-128.webp"></img>
  </span>

<form action="" method="post">
    <input type="text" name="user" placeholder="E-mail">
    <input type="password" name="pass" placeholder="Password">
    <input type="submit" name="login" value="LOGIN">
</form>
<center><p>💊</p></center>
<form action="" method="post">
    <input type="submit" name="loginsteam" value="LoginSteam">
</form>
 
</div>
<!-- -->
<script>
$('#login-button').click(function(){
  $('#login-button').fadeOut("slow",function(){
    $("#container").fadeIn();
    TweenMax.from("#container", .4, { scale: 0, ease:Sine.easeInOut});
    TweenMax.to("#container", .4, { scale: 1, ease:Sine.easeInOut});
  });
});

$(".close-btn").click(function(){
  TweenMax.from("#container", .4, { scale: 1, ease:Sine.easeInOut});
  TweenMax.to("#container", .4, { left:"0px", scale: 0, ease:Sine.easeInOut});
  $("#container, #forgotten-container").fadeOut(800, function(){
    $("#login-button").fadeIn(800);
  });
});
  </script>

</body>
</html>  