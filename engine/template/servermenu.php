<?php
 if(empty($templ))
	die("PERMISSIONS DENIED!");
if(strpos($_SERVER['REQUEST_URI'],'iinfo=') === false)
{
if(strpos($url, "img.php") === false)
 $w = 1200;
else
 $w = 2400; 

echo '
<div style="position: fixed; top: 0px; left: 0px; width: 100%; z-index: 10; min-width: 320px;" id="header">

<div style="border-bottom:2px solid #213949;width:100%;max-width:'.$w.'px;margin:auto;overflow:auto;position:relative;" class="wrapper">
<div style="position:absolute;left:0px;width:100%;height:50px;z-index:0;max-width:'.$w.'px;margin:auto;"></div>
';



echo '<div style="height:auto;overflow:auto;text-align:center;color:#ddd;padding:21px;background:#000000;width: 100%;font-size:12px;" class=" wrapper">';


 
if(empty($_GET['server']))
	$srvlist = 111;
else
	$srvlist = $_GET['server'];


foreach ($multi_servers_array as $arx => $f) {
	 
	 
	 if((trim($baseurlz))!=('img.php'))
	 {
						   $zx = explode("server_md5:", $arx);
						   $fld = $zx[1];
						   $p = strtok($fld, " ");
	 }
    else
     {
		 
	              //$p = clean($f);
	                $p = trim($f);
     }
	
  
// foreach ($servlisting[0] as $key) {  
//			  $f = $key->servername;
//			  $p = $key->s_port; 
 
			 
			 if((strpos(trim(clean($p)), trim(clean($srvlist))) !== false)||(strpos(trim(clean($srvlist)), trim(clean($p))) !== false))
			 {
			 echo '<div class="server_menu_selected">
	 <a href="'.$domain.'/'.$baseurlz.'?server='.urlencode($p).'" class="server_menu_image"><b>',colorize($f),'</b></a></div>';				 
			 //echo $value['s_port']; 
			 }
			 else
			 { 
		 echo '<div class="server_menu_noselected">
	 <a href="'.$domain.'/'.$baseurlz.'?server='.urlencode($p).'" class="server_menu_image"><b>',colorize($f),'</b></a></div>';
			 }
			  
            }







 

 
echo '
 
 
</div>
</div>
</div>
';
}
?>