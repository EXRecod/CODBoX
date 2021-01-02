<?php
 if(empty($templ))
	die("PERMISSIONS DENIED!");
$urlmd = $_SERVER["REQUEST_URI"];
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "https://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<head>  
<link rel="shortcut icon" href="'.$domain.'/favicon.ico" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0"><title>'.$nickname.' '.$domainname.' | COD Stats </title>
<meta name="description" content="'.$nickname.' Profile Call of Duty: Modern Warfare stats. Learn Profile stats for this COD player.">

<script type="text/javascript" src="'.$domain.'/inc/consoles.js"></script>
<link rel="stylesheet" href="'.$domain.'/inc/xstyle.css?'.md5(getUserIP()).'">';
if($baseurlz=='img.php')
{
echo '<link rel="stylesheet" href="'.$domain.'/inc/xstylestwenty.css?'.md5(getUserIP()).'">	
<link rel="stylesheet" href="'.$domain.'/inc/inc_screenshots/style.css">	 
<script type="text/javascript" src="'.$domain.'/inc/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="'.$domain.'/inc/fresco.js"></script>
<link rel="stylesheet" type="text/css" href="'.$domain.'/inc/fresco/fresco.css" />	

<script language=JavaScript> document.addEventListener("contextmenu", function(e){
    if (e.target.nodeName === "IMG") {
        e.preventDefault();
    }
}, false);</script>'; 
}
else
{
echo '
<link rel="stylesheet" href="'.$domain.'/inc/xstyles.css?'.md5(getUserIP()).'">	
<script type="text/javascript" src="'.$domain.'/inc/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="'.$domain.'/inc/jquery.js"></script>';

}

if(($baseurlz=='img.php')||($baseurlz=='stats.php'))
{
echo '	 
<script type="text/javascript" src="'.$domain.'/inc/inc_screenshots/html2canvas.min.js"></script>
<script type="text/javascript" src="'.$domain.'/inc/inc_screenshots/canvas2image.js"></script>
';  
}
 
if($baseurlz=='geo.php')
echo '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>'; 
echo '</head>
<body>
<link href="https://fonts.googleapis.com/css?family=Open+Sans%7CRoboto:400,600,700,900&amp;display=swap" rel="stylesheet">
<script src="'.$domain.'/inc/script2.js"></script>';
  if($baseurlz=='index.php')
 echo '<canvas id="q"></canvas>'; 