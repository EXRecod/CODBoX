<?php
$i = 0;
foreach($screenshots as $image => $r)
{ 
  foreach($r as $k => $g)
     { 
	if(!empty($r['folder']))
		{
		 $fold = $r['folder'];
	     $images = getDirContents($fold);

usort($images, function ($a, $b) {
   return filemtime($b) - filemtime($a);
});
		 
		}
		
	if(!empty($r['web_url']))
		 $foldweb_url = $r['web_url'];	 
	   
	if(!empty($foldweb_url))
		if(!empty($images))
	if(is_array($images))
	{
	foreach($images as $image)
     { $image = basename($image);
	   $tu = check_meta($fold.''.$image);
	   ++$i;
	   $screenDatas[$i]['date'][$tu[2]]['web_url'][$foldweb_url]['folder'][$fold] = $image;
}}}}

 
/*
/////////////////////////////////////////////////////////////////// 
usort($screenDatas, function($a, $b) {
    return strtotime($a['date']) - strtotime($b['date']);
});
*/


	
 $cf = array_chunk($screenDatas, $screenshotsZ_page);
 $nb_pages =  count($cf); 
 $pager =  array_slice($screenDatas, $page, $screenshotsZ_page); 
  
  
  
	  
echo ' 
<div class="content_block" style="margin-top:0px;min-height:;">
<div class="title"><div class="text">Screenshots</div></div>
 <div class="image-grid">';
 
if(!empty($pager)) 
foreach($pager as $image => $k)
{	   
foreach($k['date'] as $time => $r)
      { 	
  foreach($r['web_url'] as $foldweb_url => $n)
     { 
	foreach($n['folder'] as $fold => $image)
     {  
 
	 $tu = check_meta($fold.''.$image);
	 
if(!empty($_GET['server']))	
{	
$ah = (strpos(trim(clean($server)), trim(clean($tu[3]))) !== false);
if(!$ah)
    $ah = (strpos(trim(clean($tu[3])), trim(clean($server))) !== false);
}
else if (!empty($_GET['search'])) 
$ah = (strpos($search, $tu[0]) !== false);
else	
$ah = true;	

if($ah)
{
	
	echo '<div class="gallery-item">
			
			<a href="'.$foldweb_url.'/'.$image.'" class="swipebox" title="'.clean($tu[1]).' | '.$tu[0].'">
               
			   <span class="gallery-icon lazy" style="display:inline-block;background-size: 100% 100%; background-repeat: no-repeat; background-image: url('.$foldweb_url.'/'.$image.');"></span>
			 </a>
			
			<div class="caption" id="galerry_'.md5($tu[3]).'">	
				<span class="name"><a href="'.$domain.'/img.php?search=' . $tu[0] .'" style="color:#fff;">'.colorize($tu[1]).'</a></span> 
				<span class="guid"> | <a href="'.$domain.'/img.php?search=' . $tu[0] .'" style="color:#fff;">'.$tu[0].'</a></span> 
				  
				  <p class="name"><a href="'.$domain.'/img.php?server=' . clean($tu[3]) .'">'.colorize($tu[3]).'</a></p>
';
				
				
echo  '
<div style="position:absolute;float:left;">	  
	  <a href="'.$domain.'/redirect.php?chnick='.$tu[1].'&chguid='.$tu[0].'&xurl='.urlencode($foldweb_url.'/'.$image).'&sservv='.urlencode($tu[3]).'" class="name" target="_blank"> 
	  &emsp;<img style="width:40px;height:40px;margin-top:-30px;" title="Ban" src="'.$domain.'/inc/images/ban.png"></b></a>
	  
	  <a href="'.$domain.'/stats.php?brofile='.$tu[0].'&s='.urlencode($tu[3]).'" class="name" target="_blank"> 
	  <img style="width:40px;height:40px;margin-top:-25px;" title="Stats" src="'.$domain.'/inc/images/statics.png"></b></a>	  
</div>';				
				
				echo '
				<p class="date">'.$tu[2].'</p>
				
				
				
				
				
			</div>

		</div>
';
}

   
}	 }   }   }
	 
	  
	echo '</div></div> 
	 
<script type="text/javascript" src="'.$domain.'/inc/inc_screenshots/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="'.$domain.'/inc/inc_screenshots/jquery.swipebox.min.js"></script>
<script type="text/javascript" src="'.$domain.'/inc/inc_screenshots/lazyload.min.js"></script>
<script type="text/javascript">

	$(function () {
		$(\'.swipebox\').swipebox();
	});

	$(function () {
		$(\'.lazy\').lazy();
	});

</script>	
	 
';

 
echo '<br/>

<div style="height:auto;overflow:auto;align-content:center;display: flex;flex-wrap: 
wrap;box-shadow: -5px -5px 30px 5px red, 5px 5px 30px 5px blue;" class="content_block">
<div style="position:relative;left:0px;top:0px;width:100%;height:50px;text-align:center;font-weight:900;">';

 
$pageskey = '<a href="'.$domain.'/img.php?server=' . clean($server) .'&search=' . $search .
'&page=';


// Проверяем нужны ли стрелки назад
if ($page != 1) $pervpage = $pageskey.'1" class="paginator">'.$t_page_first.'</a> | '.$pageskey.($page - 1).'" class="paginator">'.$t_page_pre.'</a> | ';
else $pervpage = '';
	
// Проверяем нужны ли стрелки вперед
if ($page != $nb_pages) 
	$nextpage = ' | '.$pageskey. ($page + 1) .'" class="paginator">'.$t_page_next.'</a> | '.$pageskey.$nb_pages. '" class="paginator">'.$t_page_last.'</a>';
else
	$nextpage = '';

// Находим две ближайшие станицы с обоих краев, если они есть
if((!empty($pager[$page-8]))&&($page - 8 > 0)) $page8left = ' '.$pageskey. ($page - 8) .'" class="paginator">'. ($page - 8) .'</a> | ';
else $page8left = '';
if((!empty($pager[$page-7]))&&($page - 7 > 0)) $page7left = ' '.$pageskey. ($page - 7) .'" class="paginator">'. ($page - 7) .'</a> | ';
else $page7left = '';
if((!empty($pager[$page-6]))&&($page - 6 > 0)) $page6left = ' '.$pageskey. ($page - 6) .'" class="paginator">'. ($page - 6) .'</a> | ';
else $page6left = '';
if((!empty($pager[$page-5]))&&($page - 5 > 0)) $page5left = ' '.$pageskey. ($page - 5) .'" class="paginator">'. ($page - 5) .'</a> | ';
else $page5left = '';
if((!empty($pager[$page-4]))&&($page - 4 > 0)) $page4left = ' '.$pageskey. ($page - 4) .'" class="paginator">'. ($page - 4) .'</a> | ';
else $page4left = '';
if((!empty($pager[$page-3]))&&($page - 3 > 0)) $page3left = ' '.$pageskey. ($page - 3) .'" class="paginator">'. ($page - 3) .'</a> | ';
else $page3left = '';
if($page - 2 > 0) $page2left = ' '.$pageskey. ($page - 2) .'" class="paginator">'. ($page - 2) .'</a> | ';
else $page2left = '';
if($page - 1 > 0) $page1left = $pageskey. ($page - 1) .'" class="paginator">'. ($page - 1) .'</a> | ';
else $page1left = '';



if((!empty($pager[$page+8]))&&($page + 8 <= $nb_pages)) $page8right = ' | '.$pageskey. ($page + 8) .'" class="paginator">'. ($page + 8) .'</a>';
else $page8right = '';
	
if((!empty($pager[$page+7]))&&($page + 7 <= $nb_pages)) $page7right = ' | '.$pageskey. ($page + 7) .'" class="paginator">'. ($page + 7) .'</a>';
else $page7right = ''; 
	
if((!empty($pager[$page+6]))&&($page + 6 <= $nb_pages)) $page6right = ' | '.$pageskey. ($page + 6) .'" class="paginator">'. ($page + 6) .'</a>';
else $page6right = '';

if((!empty($pager[$page+5]))&&($page + 5 <= $nb_pages)) $page5right = ' | '.$pageskey. ($page + 5) .'" class="paginator">'. ($page + 5) .'</a>';
else $page5right = '';

if((!empty($pager[$page+4]))&&($page + 4 <= $nb_pages)) $page4right = ' | '.$pageskey. ($page + 4) .'" class="paginator">'. ($page + 4) .'</a>';
else $page4right = '';

if((!empty($pager[$page+3]))&&($page + 3 <= $nb_pages)) $page3right = ' | '.$pageskey. ($page + 3) .'" class="paginator">'. ($page + 3) .'</a>';
else $page3right = '';

if((!empty($pager[$page+2]))&&($page + 2 <= $nb_pages)) $page2right = ' | '.$pageskey. ($page + 2) .'" class="paginator">'. ($page + 2) .'</a>';
else $page2right = '';

if((!empty($pager[$page+1]))&&($page + 1 <= $nb_pages)) $page1right = ' | '.$pageskey. ($page + 1) .'" class="paginator">'. ($page + 1) .'</a>';
else $page1right = '';
// Вывод меню если страниц больше одной

if ($nb_pages > 1)
{ 
echo $pervpage.$page7left.$page6left.$page5left.$page4left.$page3left.$page2left.$page1left.'
<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$page6right.$page7right.$nextpage;
echo "</div></div>";
}





?>