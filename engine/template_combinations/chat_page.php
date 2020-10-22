<?php

/*
select s_kills,s_deaths,s_pg, ROUND(s_kills/s_deaths, 2) AS kdratio
FROM db_stats_1 where s_kills > 1000
ORDER BY kdratio DESC
*/

/*
$curl_handle = curl_init();
curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_handle, CURLOPT_URL,trim($game_server_list_parser));
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
//curl_setopt($curl_handle, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
curl_setopt($curl_handle, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
$query = curl_exec($curl_handle);
curl_close($curl_handle);   
preg_match_all('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}:\d{3,5}/',$query,$a);
var_dump($a);
*/

 
 
 
  
 
	 
 if (!empty($search))
 $reponse = 'SELECT id,ip,nickname,servername,s_port,guid,text,geo,time,t FROM chat where guid like "'.$search.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
else if (!empty($nicknameSearchguid)) 
 $reponse = 'SELECT id,ip,nickname,servername,s_port,guid,text,geo,time,t FROM chat where nickname LIKE :keyword and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;	
else if (!empty($nicknameSearch))	
 $reponse = 'SELECT id,ip,nickname,servername,s_port,guid,text,geo,time,t FROM chat where guid LIKE :keyword and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;	
else if (!empty($server))
 $reponse = 'SELECT id,ip,nickname,servername,s_port,guid,text,geo,time,t FROM chat where s_port="'.$server.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;	 
else if (!empty($statusx1))
 $reponse = 'SELECT id,ip,nickname,servername,s_port,guid,text,geo,time,t FROM chat where st1="'.$statusx1.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;	 
else if (!empty($timeq))
 $reponse = 'SELECT id,ip,nickname,servername,s_port,guid,text,geo,time,t FROM chat where timeh="'.$timeq.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total; 	
else if (!empty($geosearch))
 $reponse = 'SELECT id,ip,nickname,servername,s_port,guid,text,geo,time,t FROM chat where geo="'.$geosearch.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
else
 $reponse = 'SELECT id,ip,nickname,servername,s_port,guid,text,geo,time,t FROM chat where t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
 
  
 
  //ZAPROS NR - 2
  if (!empty($nicknameSearch)) 
	  $xz = dbSelectALLbyKey('', $reponse, trim($nicknameSearch));
  else if (!empty($nicknameSearchguid)) 
	  $xz = dbSelectALLbyKey('', $reponse, trim($nicknameSearchguid));
  else 
	  $xz = dbSelectALL('', $reponse);
 


include $cpath . "/engine/template/header.php";
include $cpath . "/engine/template/servermenu.php";
include $cpath . "/engine/template/search.php";
include $cpath . "/engine/template/menu.php";
  
include $cpath . "/engine/template/chat.php";

include $cpath . "/engine/template/footer.php";
?>
