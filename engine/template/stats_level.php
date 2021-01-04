<?php



$geoinff = '';
require $cpath.'/engine/geoip_bases/class.iptolocation.php';
$db = new \IP2Location\Database($cpath.'/engine/geoip_bases/IP2LOCATION-LITE-DB3.BIN', \IP2Location\Database::FILE_IO);
	

		if (!empty($xplayerip)) {
				$record = $db->lookup($xplayerip, \IP2Location\Database::ALL);
				if (!empty($record)) {
					
					
				if (isLoginUser()) {	
					
						$flg = $record['countryCode'];
						$flag = $flg;
						$cn_nm = $record['countryName'];
						$geoinff = "🅲🅾🆄🅽🆃🆁🆈:".$record['countryName']." \n\n  🆁🅴🅶🅸🅾🅽:".$record['regionName']." \n\n  🅲🅸🆃🆈:".$record['cityName'];
						
				}
				else
				{
					
						$flg = $record['countryCode'];
						$flag = $flg;
						$cn_nm = $record['countryName'];
						$geoinff = geosorting($flag);
					
				}
				
						
						
				}
				else {
						$flag = '';
						$cn_nm = '';
				}
		}
		else if (!empty($geo)) {
				$flag = $geo;
				$cn_nm = '';
		}
		else {
				$flag = '';
				$cn_nm = '';
		}
		

if(empty($_GET['server']))
	$srvlist = 111;
else
	$srvlist = $_GET['server'];
	
 
 

echo '<div id="screeen">';

echo '<div style="height:auto;overflow:auto;-webkit-justify-content: space-between;
    justify-content: space-between;" class="content_block">
	
<div style="width:62px;overflow:hidden;text-align:center;margin:0 10px;text-align:center;flex-grow:0;position:relative;display:none;float:left;">
	
<div style="width:40px;height:40px;
  background: radial-gradient(#11111155 52%, #52bafe 100%), radial-gradient(#111 50%, #52bafe11 60%), conic-gradient(
    #52bafe  1014.5454545455deg, #44444455 0deg);
  border-radius: 50%;border:1px solid #333;
  position:relative;padding:10px;">
  
<div style="position:absolute;left:0px;top:0px;width:100%;height:45px;text-align:center;font-weight:900;"></br>
  
<div style="line-height:50px;font-size:24px;">'.$rankxx.'</div>
  </div>
  </div>
  
<div style="width:62px;top:37px;font-size:12px;text-transform:uppercase;position:absolute;">'.$lvlvs.'</div>
  </div>
   
<div style="width:62px;overflow:hidden;text-align:center;margin:0 0px;text-align:center;flex-grow:0;position:relative;float:left;" class="flexer">	
<div style="width:60px;height:60px;padding:0px;">
<div style="">

<img src="'.$domain.'/inc/images/ranks/'.$rankimg.'" style="filter: grayscale(100%);height:60px;" alt="'.$rankname.'" title="'.$rankname.'">
 

</div>
  </div>   
<div style="position:absolute;left:0px;top:2px;width:100%;height:45px;text-align:center;font-weight:900;" class="shad0">  
<div style="line-height:50px;font-size:20px;">'.$rankxx.'
<div style="width:100%;top:17px;font-size:10px;text-transform:uppercase;position:absolute;">'.$lvlvs.'</div>
  </div>
  </div>
  </div>
  
   
<div style="text-align:center;line-height:20px;margin-top:10px;font-size:25px;font-weight:900;float:left;max-width:333px;float:left;" class="wrapper flexer">
 
<div style="text-align:left;">

<div style="display:inline-block;"> '.colorize($nickname).'  <img src="'.$domain.'/inc/images/flags-mini/'.$flag.'.png" alt="'.$geoinff.'" title="'.$geoinff.'" style="height:18px;"></div>
<div style="font-size:12px;color:#aaa;">'.$guid.'</div>'; 

 
 
 
   echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a href="' . $domain . '/stats.php" target="_blank" style="float:right;margin-top:-35px;" onclick=\'screenshot();\'>';
    echo '<img style="width:40px;height:40px;" src="' . $domain . '/inc/images/camera.png">';	
echo '&emsp;</a>'; 
 
 
 
 
 
echo '
<div style="font-size:12px;margin-left:4px;color:#aaa;margin-top:4px;"></div>
</div> 
</div>  
  
  
</div>  
';


/*
echo '
<div style="height:auto;overflow:auto;" class="content_block">


<div style="font-size:12px;float:right;min-width:280px;line-height:30px;">

<div style="padding:0 5px;color:#222;font-weight:bold;background:#fff;width:100px;text-align:center;cursor:pointer;cursor:hand;float:right;margin-left:10px;" onclick=\'ajax(1,"drnachoo",2,1);\'>Update Stats</div>

<div style="display:inline-block;" id="last_updated">Stats was updated 139 hours ago</div>
</div>

 </div>

';
*/
  
?>  
  
  