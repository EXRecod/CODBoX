<?php


$domain = 'http://localhost/codbx';  //adress where codbx was placed


//DATABASE SETTINGS
$host_adress = 'localhost:3306'; 
$db_name     = 'recodmod';
$db_user     = 'root';  
$db_pass     = '260386'; //rootpassword

$sourcebans_host_adress  =  'localhost:3306'; 
$sourcebans_db_name      =  'recodmod'; 
$sourcebans_db_user      =  'root';
$sourcebans_db_pass      =  '260386';
$sourcebans_charset_db   =  'utf8';



$top_main_total = 100;               //total stats, chat, list, playlist count on front page
$game_server_list_parser = 'https://zona-ato-game.ru/sourcebans/index.php?p=servers';
 


//#########   MENU 1   #########//   
 $Menu_Main = array( 
 "http://localhost/codbx/index.php" => "$menu_main",  //main page
 "http://localhost/codbx/stats.php" => "$menu_stats", //main stats
 "http://localhost/codbx/chat.php" => "$menu_chats",  //main chat log
 "http://localhost/codbx/img.php" => "$menu_screens", //main screen shots
 "http://localhost/codbx/geo.php" => "$menu_geo",     //main players geo log
 );    



//DATABASE PLAYER STATS DAYS LIMIT
$StatsDaysLimit = 7;
 


/*#########   SERVER MENU   #########*/
/// НАЗВАНИЕ СЕРВЕРА ТАКОЙ ЖЕ КАК НА ИГРОВОМ СЕРВЕРЕ 1 В 1 ДОЛЖЕН БЫТЬ
$multi_servers_array = array(
 "ip:46.174.54.24 port:28968 rcon:123 server_md5:28961" => "^3|^1ZONA ATO^3|^5TDM ^2SOFT",
 "ip:91.240.86.167 port:28962 rcon:123 server_md5:28969" => "^3|^1ZA^3|^5SAB-MIX ^1PRIVAT",
 "ip:127.0.0.1 port:28963 rcon:1234567890 server_md5:28963" => "^1TEST^3TEST^2TEST",
 "ip:127.0.0.1 port:28962 rcon:1234567890 server_md5:28962" => "^7TEST^2TEST^3TEST",
 "ip:91.240.86.167 port:28966 rcon:123 server_md5:28966" => "Crossfire",
 "ip:91.240.86.167 port:28967 rcon:123 server_md5:28967" => "Gun Games",
 "ip:91.240.86.167 port:28968 rcon:123 server_md5:28968" => "Killhouse",
 "ip:91.240.86.167 port:28969 rcon:123 server_md5:28969" => "Nuketown",
 "ip:91.240.86.167 port:28960 rcon:123 server_md5:28960" => "CTF HighXP"
 );
  
 

//#####  SCREENSHOTS  #####//
$screenshotsZ_page = 60; //количество картинок на страницу
//сервер 1 
$screenshots[]['web_url'] = "/codbx/screenshots/galleries/1/"; 
$screenshots[]['folder'] = "C:\\wamp\\www\\codbx\\screenshots\\galleries\\1\\"; 
//сервер 2   
$screenshots[]['web_url'] = "/codbx/screenshots/galleries/2/"; 
$screenshots[]['folder'] = "C:\\wamp\\www\\codbx\\screenshots\\galleries\\2\\"; 
//сервер 3   
$screenshots[]['web_url'] = "/codbx/screenshots/galleries/3/"; 
$screenshots[]['folder'] = "C:\\wamp\\www\\codbx\\screenshots\\galleries\\3\\"; 
//сервер 4   
$screenshots[]['web_url'] = "/codbx/screenshots/galleries/4/"; 
$screenshots[]['folder'] = "C:\\wamp\\www\\codbx\\screenshots\\galleries\\4\\"; 
//сервер 5   
$screenshots[]['web_url'] = "/codbx/screenshots/galleries/5/"; 
$screenshots[]['folder'] = "C:\\wamp\\www\\codbx\\screenshots\\galleries\\5\\"; 
//сервер 6   
$screenshots[]['web_url'] = "/codbx/screenshots/galleries/6/"; 
$screenshots[]['folder'] = "C:\\wamp\\www\\codbx\\screenshots\\galleries\\6\\"; 
//сервер 7   
$screenshots[]['web_url'] = "/codbx/screenshots/galleries/7/"; 
$screenshots[]['folder'] = "C:\\wamp\\www\\codbx\\screenshots\\galleries\\7\\"; 
//сервер 8   
$screenshots[]['web_url'] = "/codbx/screenshots/galleries/8/"; 
$screenshots[]['folder'] = "C:\\wamp\\www\\codbx\\screenshots\\galleries\\8\\";
//сервер 9   
$screenshots[]['web_url'] = "/codbx/screenshots/galleries/9/"; 
$screenshots[]['folder'] = "C:\\wamp\\www\\codbx\\screenshots\\galleries\\9\\";
//сервер 10  
$screenshots[]['web_url'] = "/codbx/screenshots/galleries/10/"; 
$screenshots[]['folder'] = "C:\\wamp\\www\\codbx\\screenshots\\galleries\\10\\";
//сервер 11   
$screenshots[]['web_url'] = "/codbx/screenshots/galleries/11/"; 
$screenshots[]['folder'] = "C:\\wamp\\www\\codbx\\screenshots\\galleries\\11\\";
//сервер 12   
$screenshots[]['web_url'] = "/codbx/screenshots/galleries/12/"; 
$screenshots[]['folder'] = "C:\\wamp\\www\\codbx\\screenshots\\galleries\\12\\";
//сервер 13   
$screenshots[]['web_url'] = "/codbx/screenshots/galleries/13/"; 
$screenshots[]['folder'] = "C:\\wamp\\www\\codbx\\screenshots\\galleries\\13\\";



//#########   CHAT   #########// 
  $soob_na_page=70; //количество строк сообшений на страницу
  $cache_folder = "cache/"; // Адрес нахождения папки var/www/site/cache/
  $raznica_vremya = '0'; // +1 час // -1 час и т.д.
  
   
   
   

//ИД Яндекс метрики
//полный доступ к Яндекс метрике, нужно просто создать код, 
//уникальный ид можно найти в самом коде 
//Образец от куда ИД .......https://mc.yandex.ru/watch/67922815" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
$metrikaID = 67922815;   
   
 

// Управление ркон консолью  ......./codbx/admin/index.php?iinfo=rcons
// Для доступа - Напротив никнейма админа ставим значок ~, например ~Admin
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

//For Super Admin control use ~ , example: ~adminName

$codbx_users[] = "~admin;~admin";
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

//RCON SETTINGS
$server_timeout = 10; //10			// enter a number of seconds before connection to server times out; default=5 (try lower for increased performance, higher for troubleshooting)
$server_buffer = 1200;	//1200		// enter a number of bytes; decrease if you receive only a part of playerlist, increase to speed up
$server_buffer_results = 1800;     //1800	// enter a number of bytes; decrease if you receive only a part of returned results, increase to speed up
$server_extra_wait = true;		// true | false; if problems with receiving playerlist occur, enable
$server_extra_footer = true;	// true | false; if problems with receiving playerlist occur, enable

?>