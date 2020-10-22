<?php
 
 
dbSelectALL('', "delete from x_up_players where ip = 'bot<=>(null)'");
dbSelectALL('', "delete from x_db_players where x_db_ip = 'bot<=>(null)'");
 
 
 
 if (!empty($nicknameSearch))	
$reponse = 'SELECT 
       t0.x_db_ip,t0.x_db_name,t0.x_db_guid,t0.s_port,t0.x_db_conn,t0.x_db_date,t0.x_date_reg, 
	   t1.ip, t1.name, t1.guid	   
FROM x_db_players t0 
JOIN 
       ( 
              SELECT ip,guid,name FROM x_up_players
       ) t1 ON  t0.x_db_guid = t1.guid where t0.x_db_guid LIKE :keyword ORDER BY (x_db_date+0) desc, t0.x_db_name DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
 
else if (!empty($nicknameSearchguid))
$reponse = 'SELECT 
       t0.x_db_ip,t0.x_db_name,t0.x_db_guid,t0.s_port,t0.x_db_conn,t0.x_db_date,t0.x_date_reg, 
	   t1.ip, t1.name, t1.guid	   
FROM x_db_players t0 
JOIN 
       ( 
              SELECT ip,guid,name FROM x_up_players
       ) t1 ON  t0.x_db_guid = t1.guid where t0.x_db_name LIKE :keyword ORDER BY (x_db_date+0) desc, t0.x_db_name DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
else if (!empty($nicknameSearch))	
$reponse = 'SELECT 
       t0.x_db_ip,t0.x_db_name,t0.x_db_guid,t0.s_port,t0.x_db_conn,t0.x_db_date,t0.x_date_reg, 
	   t1.ip, t1.name, t1.guid	   
FROM x_db_players t0 
JOIN 
       ( 
              SELECT ip,guid,name FROM x_up_players
       ) t1 ON  t0.x_db_guid = t1.guid where t0.x_db_guid LIKE :keyword ORDER BY (x_db_date+0) desc, t0.x_db_name DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
else
$reponse = 'SELECT 
       t0.x_db_ip,t0.x_db_name,t0.x_db_guid,t0.s_port,t0.x_db_conn,t0.x_db_date,t0.x_date_reg, 
	   t1.ip, t1.name, t1.guid	   
FROM x_db_players t0 
JOIN 
       ( 
              SELECT ip,guid,name FROM x_up_players
       ) t1 ON  t0.x_db_guid = t1.guid 
	   where t1.ip != 0 and t0.x_db_guid GROUP BY t1.guid ORDER BY (x_db_date+0) desc, t0.x_db_name DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
 
 
 
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
  
  
  
include $cpath . "/engine/template/index_list.php";



include $cpath . "/engine/template/footer.php";
?>
