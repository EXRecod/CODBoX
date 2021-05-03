<?php
if(empty($templ))
	die("PERMISSIONS DENIED!");

if (isLoginUser()) {

 $top_main_total = 50;
 
//dbSelectALL('', "delete from x_up_players where ip = 'bot<=>(null)'");
//dbSelectALL('', "delete from x_db_players where x_db_ip = 'bot<=>(null)'");
 
 
if (!empty($nicknameSearch))
{	
 $nicknameSearchguid = $nicknameSearch;
 $nicknameSearch = '';
}
else if (!empty($nicknameSearchguid))
{	
$nicknameSearch  = $nicknameSearchguid;
$nicknameSearchguid = '';
}	
 
 if (!empty($nicknameSearch))	
$reponse = 'SELECT 
       t0.*,t1.*	   
FROM x_db_players t0 
JOIN 
       ( 
              SELECT ip,guid,name FROM x_up_players
       ) t1 ON  t0.x_db_guid = t1.guid where t0.x_db_name LIKE :keyword ORDER BY t1.name DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
else if(strpos($nicknameSearchguid, '765611') !== false)
$reponse = 'SELECT * FROM x_db_players where 
steam_id LIKE :keyword ORDER BY x_db_name DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
	  
else if(strpos($nicknameSearchguid, '231034') !== false)
$reponse = 'SELECT 
       t0.*,t1.*  
FROM x_db_players t0 
JOIN 
       ( 
              SELECT ip,guid,name FROM x_up_players
       ) t1 ON  t0.x_db_guid = t1.guid where t1.guid LIKE :keyword GROUP BY t1.ip ORDER BY t1.name DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
	     
else if (!empty($_GET['listguid']))
$reponse = 'SELECT 
       t0.*,t1.*    
FROM x_db_players t0 
JOIN 
       ( 
              SELECT ip,guid,name FROM x_up_players
       ) t1 ON  t0.x_db_guid = t1.guid where t1.guid = '.$_GET['listguid'].' and t1.ip != 0 and t1.ip != 1 GROUP BY t1.ip ORDER BY t1.name DESC LIMIT 500';	   
else if (!empty($_GET['listip']))
$reponse = "SELECT 
       t0.*,t1.*  
FROM x_db_players t0 
JOIN 
       ( 
              SELECT ip,guid,name FROM x_up_players
       ) t1 ON  t0.x_db_guid = t1.guid where t0.x_db_ip LIKE :keyword ORDER BY t0.x_db_ip DESC LIMIT ". $premierMessageAafficher*20 . ', ' . $top_main_total;
	 	 
else if (!empty($_GET['poisknickname']))
$reponse = 'SELECT 
       t0.*,t1.*  
FROM x_db_players t0 
JOIN 
       ( 
              SELECT ip,guid,name FROM x_up_players
       ) t1 ON  t0.x_db_guid = t1.guid where t1.guid = '.$_GET['poisknickname'].' or t0.x_db_guid = '.$_GET['poisknickname'].'  GROUP BY t0.x_db_name,t1.name ORDER BY t0.x_db_name,t1.name DESC LIMIT 50';	   
else if (!empty($_GET['collect']))
{
                           $reponse = array();
                           $iplgetDirContents = $cpath .'/data/cache/ajax_data/';
				           $iplayers = getDirContents($iplgetDirContents);
							if(is_array($iplayers))
							{
								
	                            foreach ($iplayers as $wpl => $imv){
								if(strpos($imv, 'url_parser_db_get_') !== false)
								{
									if(file_exists($iplgetDirContents.$imv))
									{
									if(filesize($iplgetDirContents.$imv)>1)
									{
                               $iplayersx[] = $iplgetDirContents.$imv;
	                            }}  }}									
							unset($iplayers);
					if(!empty($iplayersx)){	
					if(is_array($iplayersx)){			
             array_multisort(array_map('filemtime', ($iplayersx)), SORT_DESC, $iplayersx);

								foreach ($iplayersx as $wpl => $imv){
								if(strpos($imv, 'url_parser_db_get_') !== false)
								{				
									$pattern = "/([a-fA-F0-9]{16,32})/";
									$contentz = file_get_contents($imv);
			                    if (preg_match($pattern, $contentz, $sb))
								{
									 $guidsbl = $sb[0];
									
								     $reponse[] = array(
								 "x_db_name" => '?',
								 "s_port"  => trim($guidsbl),
								 "x_db_ip" => '?',
								 "x_db_guid" => trim($guidsbl)
								 );
								}
								 }
								}
							  }
							}
						}
}	   	   
else
/*
$reponse = 'SELECT 
       t0.x_db_ip,t0.x_db_name,t0.x_db_guid,t0.s_port,t0.x_db_conn,t0.x_db_date,t0.x_date_reg, 
	   t1.ip, t1.name, t1.guid	   
FROM x_db_players t0 
JOIN 
       ( 
              SELECT ip,guid,name FROM x_up_players
       ) t1 ON  t0.x_db_guid = t1.guid 
	   where t1.ip != 0 and t0.x_db_guid GROUP BY t1.guid ORDER BY (x_db_date+0) DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
*/

$reponse = 'SELECT *
FROM x_db_players where x_db_guid GROUP BY x_db_guid ORDER BY (x_db_date+0) DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total;
	   
	   
	   
	   
  if (!empty($nicknameSearch)) 
	  $xz = dbSelectALLbyKey('', $reponse, trim($nicknameSearch));
  else if (!empty($nicknameSearchguid)) 
	  $xz = dbSelectALLbyKey('', $reponse, trim($nicknameSearchguid));
  else if (!empty($_GET['listip'])) 
	  $xz = dbSelectALLbyKey('', $reponse, $_GET['listip']);
  else if (!empty($_GET['collect']))
	  $xz = $reponse;
  else 
	  $xz = dbSelectALL('', $reponse);
 
include $cpath . "/engine/template/header.php";
include $cpath . "/engine/template/servermenu.php";

include $cpath . "/engine/template/search.php";
include $cpath . "/engine/template/menu.php";
  if (empty($xz))
	echo '<center>'.$lang['nothing_search'].'</br></center>';
include $cpath . "/engine/template/index_list.php";

include $cpath . "/engine/template/footer.php";

}
?>
