<?php
echo '<div class="content_block"> 
<div style="overflow:auto;width:100%;padding:5 10px;">
<b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #000, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px #08e5c8, 0 0 18px #08e5c8, 0 0 40px #08e5c8, 0 0 65px #08e5c8;">
'.$x_top_maps.'</b></div> 

<div style="    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: space-between;
    justify-content: space-between;
    flex-flow: row wrap;">';

foreach ($xz as $keym => $value) {
 $port     = $value['s_port'];
 $type = $value['gametype'];
 list($gametype,$ump) = explode(';',$type);
 $mapname  = $value['name'];
 $deaths    = $value['kills'];
 $kills   = $value['deaths'];

 foreach ($multi_servers_array as $arx => $f) {
                           $zx = explode("server_md5:", $arx);
						   $fld = $zx[1];
						   $p = strtok($fld, " "); 
						   if($p==$port)
						   { 
							  $servername  = $f;
							  break;
						   }
 }



echo '<div style="padding:10px;margin:5px;width:170px;display:inline-block;min-width:20%;
flex-grow: 1;
background: -moz-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0) 99%, rgba(255,255,255,0) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%,rgba(255,255,255,0) 99%,rgba(255,255,255,0) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(135deg, rgba(77,88,99,0.1) 0%,rgba(0,0,0,0) 99%,rgba(0,0,0,0) 100%); 
background-color:#000000aa;
    border: 1px solid #222;
    border-top: 1px solid #333;"> 
	 
<div style="font-size:16px;padding:10px;background:#00000022;border:1px solid #090909;text-align:center;">'.$mapsall[$mapname].'</div>


<div style="overflow:auto;">
<div style="width:calc(100% - 20px);padding:5 10px;text-transform:uppercase;margin-bottom:10px;">
<div style="overflow:auto;font-size:16px;margin:5 0 4 0px;">
';

if(file_exists($cpath .'/inc/images/maps/'.$mapname.'.jpg'))
echo '<img src="' . $domain . '/inc/images/maps/' . $mapname . '.jpg" width="100%" >';
    else
echo '<img src="' . $domain . '/inc/images/maps/no-pic.png" width="100%">';	

 echo '
	</div></div></div>

  
<div style="overflow:auto;">
 
<div style="font-size:14px;width:calc(100% - 20px);padding:5 10px;text-transform:uppercase;">
'.$typesall[$gametype].' ('.$gametype.')
</div>
	
</div>
 
 
	
<div style="font-size: 11px;    border-top: 1px solid #222;margin-top:5px;padding-top:5px;
    color: #fff;margin:10px;
    line-height: 16px;">
	
<div class="weap_stats" style="text-align:left;">'.$t_kills.' 
<div>'.$kills.'</div></div>
	
<div class="weap_stats" style="text-align:right;">'.$t_deaths.' 
<div>'.$deaths.'</div></div>
	

	
	</div>
	
</div>

';


}
 echo '</div></div></div>';
?>