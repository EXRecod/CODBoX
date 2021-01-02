<?php
 if(empty($templ))
	die("PERMISSIONS DENIED!");

echo '
<div style="position: fixed; top: 0px; left: 0px; width: 100%; z-index: 10; min-width: 320px;" id="header">

<div style="border-bottom:2px solid #213949;width:100%;max-width:1200px;margin:auto;overflow:auto;position:relative;" class="wrapper">
<div style="position:absolute;left:0px;width:100%;height:50px;z-index:0;max-width:1200px;margin:auto;"></div>
';
echo '<div style="height:auto;overflow:auto;text-align:center;color:#ddd;padding:21px;background:#000000;width: 100%;font-size:12px;" class=" wrapper">';
 
if(empty($_GET['rconserver']))
	$srvlist = 111;
else
	$srvlist = $_GET['rconserver'];


foreach ($multi_servers_array as $arx => $f) {
	 
						   $zx = explode("server_md5:", $arx);
						   $fld = $zx[1];
						   $p = strtok($fld, " ");
						   
						   $zf = explode("rcon:", $arx);
						   $rcn = $zf[1];	
						   
						   $zb = explode("port:", $arx);
						   $prt = $zb[1];
						   
						   $io = explode("ip:", $arx);
						   $ipv = $io[1];
						   
							       $server_n = $f;
								   $server_m = strtok($fld, " ");
							       $server_r = strtok($rcn, " ");
							       $server_p = strtok($prt, " ");
							       $server_i = strtok($ipv, " ");							   
						   
			 
			 if((strpos(trim(clean($p)), trim(clean($srvlist))) !== false)||(strpos(trim(clean($srvlist)), trim(clean($p))) !== false))
			 {			
				

							       $server_name = $server_n;
								   $server_md5 = $server_m;
							       $server_rconpass = $server_r;
							       $server_port = $server_p;
							       $server_ip = $server_i;	

				
			 echo '<div class="serverrconmenu_selected">
	 <a href="'.$domain.'/admin/index.php?iinfo=rcons&rconserver='.urlencode($p).'" class="server_menu_image"><b>',colorize($f),'</b></a></div>';				 
			 //echo $value['s_port']; 
			 }
			 else
			 { 
		 echo '<div class="serverrconmenu_noselected">
	 <a href="'.$domain.'/admin/index.php?iinfo=rcons&rconserver='.urlencode($p).'" class="server_menu_image"><b>',colorize($f),'</b></a></div>';
			 }
			  
            }

 
echo '
</div>
</div>
</div>

 
';
?>