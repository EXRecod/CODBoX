<?php
 if(empty($templ))
	die("PERMISSIONS DENIED!");
/*
if(empty($_SESSION['codbxuser'])){
if(empty($_SESSION['codbxpasssteam'])){	
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(empty($_GET['syea']))	
 echo "
<script>
// Check browser support
if (typeof(Storage) !== \"undefined\") {
  // Retrieve
if (localStorage.getItem(\"codbxpasssteam\") !== null) {  
  var aux = localStorage.getItem(\"codbxpasssteam\");
  document.location.href='".$actual_link."?syea=aux'; 
} 
} else {
  document.getElementById(\"resultxi\").innerHTML = \"Sorry, your browser does not support Web Storage...\";
}
</script>";
if(!empty($_GET['syea']))
$_SESSION['codbxpasssteam'] = $_GET['syea'];
}} 
*/


if(isLoginUser()){
	
echo '<div style="padding:0px;background:#000000aa;	font-size:15px;" class="content_block wrapper">';
 echo '<div style="height:26px;overflow:auto;float:left;text-align:left;padding: 2px 15px;display:inline-block;flex-grow: 1;min-width:190px;">
 <div style="float:RIGHT;TEXT-ALIGN:RIGHT;color:#fff;padding:2px;line-height:20px;min-width:290px;overflow:auto;display:inline-block;flex-grow: 1;">'; 

if(!empty($_SESSION['codbxpasssteam']))
$byWhois = isLoginUserWHO($_SESSION['codbxpasssteam']);
else if(!empty($_COOKIE['user_online_login']))
$byWhois = isLoginUserWHO($_COOKIE['user_online_login']);
else if(!empty($_COOKIE['user_online_key']))
$byWhois = isLoginUserWHO($_COOKIE['user_online_key']);
else
	$byWhois = '';

if(!empty($_SESSION['codbxuser']))
 $codbxuser = $_SESSION['codbxuser'];

 $cstyle = 'style="color:orange;font-size:15px;"';
 
$realip = getUserIP(); 
 
if(!empty($byWhois))
echo "<b $cstyle> User: </b>  <div id=\"resultxi\" style=\"display:inline-block;\"></div> <b $cstyle> IP: </b>$realip";
else if(!empty($codbxuser))
echo "<b $cstyle> User: </b>  <div id=\"resultxi\" style=\"display:inline-block;\"></div> <b $cstyle> IP: </b>$realip";

echo '</div>'; 
echo '</div>';
echo '</div>';



if(!empty($_SESSION['codbxuser']))
{
 echo '
<script>
// Check browser support
if (typeof(Storage) !== "undefined") {
  // Store
  localStorage.setItem("codbxuser", "'.$codbxuser.'");
  // Retrieve
  document.getElementById("resultxi").innerHTML = localStorage.getItem("codbxuser");
} else {
  document.getElementById("resultxi").innerHTML = "Sorry, your browser does not support Web Storage...";
}
</script>';
}
 else if(!empty($byWhois))
echo '
<script>
// Check browser support
if (typeof(Storage) !== "undefined") {
  // Store
  localStorage.setItem("codbxpasssteam", "'.$byWhois.'");
  // Retrieve
  document.getElementById("resultxi").innerHTML = localStorage.getItem("codbxpasssteam");
} else {
  document.getElementById("resultxi").innerHTML = "Sorry, your browser does not support Web Storage...";
}
</script>';




}


echo '<div style="height:auto;overflow:auto;text-align:center;padding:0px;background:#000000aa;	font-size:12px;" class="content_block wrapper">';
 if(isLoginUser())
	{
//#########   MENU 1 admin  #########//   
 $cMenu_Main = array( 
 "$domain/admin/index.php" => " ✔ CP ✔ ",
 "$domain/list.php" => " ✔ List ✔ ",
 "$domain/list_ip_ban.php" => " ✔ IP $menu_banlist ✔ ",
 "https://zona-ato-game.ru/sourcebans/index.php?p=banlist" => " ✔ Sourcebans $menu_banlist ✔ "
 //"$domain/admin/mamba.php" => " | MBM| ",
 //"$domain/admin/settings.php" => " | SET | ",
 );    
    
$Menu_Main = array_merge($Menu_Main,$cMenu_Main,$Menu_Main_admin);
	}
	else
		$Menu_Main = array_merge($Menu_Main,$Menu_Main_admin);
	
foreach ($Menu_Main as $arxx => $namessylka) {
 
if(strpos($arxx, "login.php") !== false)
{ 
	if(isLoginUser())
	{
      $arxx = str_replace("login.php", "logout.php", $arxx);
      $namessylka = str_replace($menu_enter, " ✔ $menu_out ✔ ", $namessylka);	  
	}
	
}


 if(strpos($namessylka, "Sourcebans") !== false)
 $rc = 	'target="_blank"';
 else
 $rc = 	'';

if((trim($baseurlz))==(trim(basename($arxx))))
   echo '<div class="profile_menu_active">

<a href="'.$arxx.'" 
style="color:#000;
text-shadow: 
0 0 1px #fff, 
0 0 2px #fff, 
0 0 30px #fff, 
0 0 4px #FFF, 
0 0 7px #068399, 
0 0 18px #068399, 
0 0 40px #068399, 
0 0 65px #068399;" '.$rc.'>'.$namessylka.'</a>';   
else
   echo '<div class="profile_menu">
<a href="'.$arxx.'" style="color:#000;
text-shadow: 
0 0 1px #fff, 
0 0 2px #fff, 
0 0 30px #fff, 
0 0 4px #FFF, 
0 0 7px #068399, 
0 0 18px #068399, 
0 0 40px #068399, 
0 0 65px #068399;" '.$rc.'>'.$namessylka.'</a>';   
	

echo '</div>';
}

  
echo '</div>';
?>