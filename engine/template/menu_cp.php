<?php
 if(empty($templ))
	die("PERMISSIONS DENIED!");
 if(isLoginUser())
	{
echo '<div style="height:auto;overflow:auto;text-align:center;padding:0px;background:#000000aa;	font-size:12px;" class="content_block wrapper">';

 $cMenu_Main = array( 
 "$domain/admin/index.php?iinfo=rcons" => " $menu_rcon ",
 "$domain/admin/index.php?iinfo=demos" => " ".$lang['demo_auto_record']." ",
 "$domain/admin/index.php?iinfo=activ" => " $menu_activity "
 );

foreach ($cMenu_Main as $arxx => $namessylka) {

 $rc = 	'target="_self"';
 

if((strpos($arxx, $_SERVER['REQUEST_URI']) !== false)&&(strpos($_SERVER['REQUEST_URI'],'iinfo=') !== false))
{	
echo '<div class="profile_menu_active">
<a href="'.$arxx.'" class="menu_head_cp" '.$rc.'>'.$namessylka.'</a>';
}   
else
{
   echo '<div class="profile_menu">
<a href="'.$arxx.'" class="menu_head_cp" '.$rc.'>'.$namessylka.'</a>';   

}
echo '</div>';
}

  
echo '</div>';
	}
?>