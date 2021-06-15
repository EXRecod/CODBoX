<?php 
session_start();
header("Expires: Mon, 26 Jul 1995 05:00:00 GMT"); # Date In The Past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); # Always Modified
header("Cache-Control: no-store, no-cache, must-revalidate"); # HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); # HTTP/1.0
 
session_destroy();
setcookie("codbx_u", ".", time() - 36000000);
setcookie("codbx_p", ".", time() - 36000000);
setcookie("user_online_key", ".", time() - 36000000);
setcookie("user_online_login", ".", time() - 36000000);
 
$tag = str_replace("admin/logout.php", "index.php", $_SERVER['REQUEST_URI']); 
?>
<script>window.location.replace(<?php echo '"',$tag,'"';?>);</script>
<?php
?>