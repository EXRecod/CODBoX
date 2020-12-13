<?php
 
 
if(strpos($url, "img.php") === false)
 $w = 1200;
else
 $w = 2400;  
 
echo '<div style="width:100%;overflow:auto;">
<div style="min-height:20px;background2:red;display:inline-block;
    position:fixed;
width:calc((100% - '.$w.'px)/2);z-index:1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
    overflow: hidden;
    height: 100%;">
<div style="margin:auto;">
 

</div>
</div>

<div class="main_content" style="overflow: hidden;z-index:2;">

<div style="background:#111;width:auto;margin:10 0px;background:#111111aa;padding:6 10 5 10px;text-transform:uppercase;overflow:auto;max-height:300px;
background:url('.$domain.'/inc/images/but_bg.png);" class="wrapper">
<h1 style="color:#fff;font-weight:600;display:inline-block;width:220px;line-height:31px;float2:left;displa2y:none;margin-top:4px;" class="flexer">
<a href="'.$domain.'/'.$baseurlz.'" style="color:white;text-shadow: rgba(192,192,192,0.5) 0px 3px 3px;">CodBox Stats</a>
</h1>

 ';
 ?>

 


<?php
echo '
<div style="margin:0px;width:calc(100% - 220px);max-width:100%;min-width:300px;padding-bottom: 40px;" class="flexer wrapper" >
<div class="search_block">

 <div style="position:absolute;display:inline-block;padding:9px;">
  
 ';
 
 
 if(strpos($url, "stats.php") !== false)
	$searchzguid = 'brofile';	 
 else
    $searchzguid = 'nicknameSearch';

 if(strpos($url, "stats.php") !== false)
	$searchznick = 'n';	 
 else
    $searchznick = 'nicknameSearchguid';

 
 if(empty($_GET['brofile'])) 
 {
	 if(strpos($url, "stats_medals.php") === false)
	 {
?> 
 

  <label class="search_block_button" for="dialog_state"><?php echo $i_search;?></label>
  
  
  
 <input type="checkbox" name="dialog_state" id="dialog_state" class="dialog_state">
<div id='dialog'>
  <label id="dlg-back" for="dialog_state"></label>
  <div id='dlg-wrap'>
    <label id="dlg-close" for="dialog_state"><i class="icon ion-ios-close-empty"></i></label>
    
    <div id='dlg-prompt'>
         
		

<div style="overflow:auto;width:100%;padding:5 10px;">
<h1><?php echo $i_search;?></h1>
</div>	
		
		
	<form autocomplete="off" action="<?php echo $domain;?>/<?php echo $baseurlz;?>" style="margin:0px;display: inline-block;">
<div style="display:inline-block;position: relative;top:8px;"> 
  <div class="autocomplete">
    <input id="myInput" type="text" name="<?php echo $searchzguid; ?>" placeholder="<?php echo $i_searchG;?>" 
	style="height:24px;background:#fff;border:0px;float:left;">
  </div>
</div>  
  <input type="submit" class="search_block_button" >
</form>



	<form autocomplete="off" action="<?php echo $domain;?>/<?php echo $baseurlz;?>" style="margin:0px;display: inline-block;">
<div style="display:inline-block;position: relative;top:8px;"> 
  <div class="autocomplete">
    <input id="myInput" type="text" name="<?php echo $searchznick; ?>" placeholder="<?php echo $i_searchn;?>" 
	style="height:24px;background:#fff;border:0px;float:left;">
  </div>
</div>  
  <input type="submit" class="search_block_button" >
</form>

	 
		 
		 
		 
    </div>
  </div>
</div>
<div id='console'></div>

  


<?php
}}

echo ' 
</div> 
</div>
</div>
'; 

 
 
 
 

 
echo '
<div style="font-size:14px;font-weight:bold;text-align:center;padding:5 5 0 5px;width:100%;text-transform:none;" id="player_search_block">
</div>
</div>
';
?>