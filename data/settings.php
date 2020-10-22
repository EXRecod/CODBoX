<?php


$domain = 'http://localhost/codbx';
$top_main_total=100; //количество строк на страницу
$game_server_list_parser = 'https://zona-ato-game.ru/sourcebans/index.php?p=servers';
 


//#########   MENU 1   #########//   
 $Menu_Main = array( 
 "http://localhost/codbx/index.php" => "$menu_main",
 "http://localhost/codbx/stats.php" => "$menu_stats",
 "http://localhost/codbx/chat.php" => "$menu_chats",
 "http://localhost/codbx/img.php" => "$menu_screens"
 );    


//DATABASE SETTINGS
$host_adress = 'localhost:3306'; 
$db_name     = 'recodmod';
$db_user     = 'root';  
$db_pass     = 'rootpassword';

$sourcebans_host_adress  =  'localhost:3306'; 
$sourcebans_db_name      =  'recodmod'; 
$sourcebans_db_user      =  'root';
$sourcebans_db_pass      =  'rootpassword';
$sourcebans_charset_db   =  'utf8';

//DATABASE PLAYER STATS DAYS LIMIT
$StatsDaysLimit = 90;
 



/*#########   SERVER MENU   #########*/
$multi_servers_array = array(
 "ip:46.174.54.24 port:28968 rcon:123 server_md5:28961" => "^3|^1EUR^3|^5KILLHOUSE",
 "ip:91.240.86.167 port:28962 rcon:123 server_md5:28962" => "War HighXP",
 "ip:91.240.86.167 port:28963 rcon:123 server_md5:28963" => "Sab Privat",
 "ip:91.240.86.167 port:28964 rcon:123 server_md5:28964" => "HardCore",
 "ip:91.240.86.167 port:28965 rcon:123 server_md5:28965" => "New Weapon",
 "ip:91.240.86.167 port:28966 rcon:123 server_md5:28966" => "Crossfire",
 "ip:91.240.86.167 port:28967 rcon:123 server_md5:28967" => "Gun Games",
 "ip:91.240.86.167 port:28968 rcon:123 server_md5:28968" => "Killhouse",
 "ip:91.240.86.167 port:28969 rcon:123 server_md5:28969" => "Nuketown",
 "ip:91.240.86.167 port:28960 rcon:123 server_md5:28960" => "CTF HighXP",
 
 "ip:91.240.86.167 port:28971 rcon:123 server_md5:28971" => "2 Dom HighXP",
 "ip:91.240.86.167 port:28972 rcon:123 server_md5:28972" => "2 War HighXP",
 "ip:91.240.86.167 port:28973 rcon:123 server_md5:28973" => "2 Sab Privat",
 "ip:91.240.86.167 port:28974 rcon:123 server_md5:28974" => "2 HardCore",
 "ip:91.240.86.167 port:28975 rcon:123 server_md5:28975" => "2 New Weapon",
 "ip:91.240.86.167 port:28976 rcon:123 server_md5:28976" => "2 Crossfire",
 "ip:91.240.86.167 port:28977 rcon:123 server_md5:28977" => "2 Gun Games",
 "ip:91.240.86.167 port:28978 rcon:123 server_md5:28978" => "2 Killhouse",
 "ip:91.240.86.167 port:28979 rcon:123 server_md5:28979" => "2 Nuketown",
 "ip:91.240.86.167 port:28970 rcon:123 server_md5:28970" => "2 CTF HighXP"
 );
  
 



//#####  SCREENSHOTS  #####//
$screenshotsZ_page = 60; //количество картинок на страницу
//сервер 1 
$screenshots[1]['web_url'] = "/a/"; 
$screenshots[1]['folder'] = "C:\\wamp64\\www\\a\\"; 
//сервер 2   
$screenshots[2]['web_url'] = "/b/"; 
$screenshots[2]['folder'] = "C:\\wamp64\\www\\b\\";





//#########   CHAT   #########// 
  $soob_na_page=70; //количество строк сообшений на страницу
  $cache_folder = "cache/"; // Адрес нахождения папки var/www/site/cache/
  $raznica_vremya = '0'; // +1 час // -1 час и т.д.
  
   
   
   
   
   
   
   
   
   
   
   
   
// то что ниже в конец файла добавить нужно
 

/*#########   STEAM   #########*/
 $steamkey = 'Ваш Steam Key'; 
 
 $steam_users_id = array(
 "124yt124124" => "Админ",
 "f124y12y412" => "Admin",  
 "7124y214y21y4" => "Admin2", 
 "92d4ece3e2bc14fdeaeb97ed99ebbbab0bfda47f71df7d8538242fa32ade08d7" => "Laroxxx",
 "1234456546457575755" => "Guest15163",
 "1eyey25215" => "Vip",
 "213123124124" => "Moderator"
 );	
 
   
//№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№  
 $Menu_Main_admin = array( 
"http://localhost/codbx/admin/login.php" => "$menu_enter"
 );    
//№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№  
   
   
//№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№
//    УПРАВЛЕНИЕ ЛОГИНАМИ И ПАРОЛЯМИ  
// 
//   $codbx_users[] = "LOGIN;PASSWORD";
//№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№№  

$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";
$codbx_users[] = "admin;admin";   