<?php 



function get_url_sourcebans_db($url_sourcebans_db,$guid,$ip){ 
$url = '';$offf = 0;
foreach ($url_sourcebans_db as $url){
	$content = 'x';$host = 'x';$urlresult = '';
	if($offf == 0)
	{
                                $uhost = parse_url($url);
                                $host     = isset($uhost['host']) ? $uhost['host'] : '';
								// Fetch The Result
                                $timeout                    = 1;
                                $curl                       = curl_init();
                                curl_setopt($curl, CURLOPT_URL, $url);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($curl, CURLOPT_POST, true);
                                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
                                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
                                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
                                $content = curl_exec($curl);
                                curl_close($curl);
								
              $host = str_replace("www.", "", $host);	
              $host = str_replace(".ru", "", $host);	
              $host = str_replace(".com", "", $host);	
              $host = str_replace(".net", "", $host);	
              $host = str_replace(".org", "", $host);	
              $host = str_replace(".kz", "", $host);
								
	if(((((strpos($content, "_".$guid)) !== false)&&((strpos($url, "cyberpub")) !== false))&&((strpos($content, "Permanent")) !== false))
		||((((strpos($content, " ".$guid)) !== false)&&((strpos($url, "cyberpub")) !== false))&&((strpos($content, "Permanent")) !== false))
		||((((strpos($content, $ip)) !== false)&&((strpos($url, "cod4narod")) !== false))&&((strpos($content, "Навсегда")) !== false)))
{	
			$pattern = "/([a-fA-F0-9]{16,32})/";
			
			if (preg_match($pattern, $content, $sb)) {


if((((strpos($content, $ip)) !== false)&&((strpos($url, "cod4narod")) !== false))&&((strpos($content, "Навсегда")) !== false))
$hostbasename = $ip;

                 $hostbasename =  basename($host);	
                 $resultbyguid = $sb[0];
                 $urlresult  = '<a href="'.$url.'" style="color: #fff;text-shadow: 3px 3px 10px #f61212,-2px 1px 20px #f61212;" target="_blank">'.$hostbasename.'</a>';	
                 $offf = 1;
                 echo $urlresult. ' : '.$guid;				 
				
			}
	     }	
		}	
	}
}


?>