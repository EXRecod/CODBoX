<?php session_start();
if (empty($cpath)) { 
  $cpath = dirname(__FILE__);
  $xcpath = $cpath;
}
include($cpath ."/inc/data.php");
include($xcpath ."/core/functions.php");
include($xcpath ."/core/class.simpleSQLinjectionDetect.php");

  echo "Logout Successfully ";
  session_destroy();
  setcookie("codbx_u", "", time() - 3600);
  setcookie("codbx_p", "", time() - 3600);
  setcookie("user_online_key", "", time() - 3600);
  $_SESSION['codbxuser'] = '';
  $_SESSION['codbxpass'] = '';
  $_SESSION['codbxpasssteam'] = '';
  $baseurlz = basename(__FILE__); 
  header("Location: $domain/chat.php");
?>