<?php 

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


//if(strpos($namessylka, "✔") !== false)
// $rc = 	'target="_blank"';
//else
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