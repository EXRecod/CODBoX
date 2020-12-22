<?php session_start();
if (empty($cpath)) { 
  $cpath = dirname(__FILE__);
  $xcpath = $cpath;
}
include($cpath ."/inc/data.php");
include($xcpath ."/core/functions.php");
include($xcpath ."/core/class.simpleSQLinjectionDetect.php");
$templ = 1;
  echo "Logout Successfully ";
  session_destroy();
  setcookie("codbx_u", "", time() - 36000);
  setcookie("codbx_p", "", time() - 36000);
  setcookie("user_online_key", "", time() - 36000);
  setcookie("user_online_login", "", time() - 36000);
  $_SESSION['codbxuser'] = '';
  $_SESSION['codbxpass'] = '';
  $_SESSION['codbxpasssteam'] = '';
  $baseurlz = basename(__FILE__); 
if((strpos($_SERVER['REQUEST_URI'], $domain)) !== false) header($_SERVER['REQUEST_URI']); else header("Location:$domain/index.php");
?>