<?php
 if(empty($templ))
	die("PERMISSIONS DENIED!");
$urlmd = $_SERVER["REQUEST_URI"];

$serachdata = "";
if(!empty($_GET['nicknameSearch']))
{
	$serachdata .= $i_searchG.": ";
	$serachdata .= " ".$_GET['nicknameSearch'];
}
if(!empty($_GET['nicknameSearchguid']))
{
	$serachdata .= $i_searchn.": ";
	$serachdata .= " ".$_GET['nicknameSearchguid'];
}


echo '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "https://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<head>  
<link rel="shortcut icon" href="'.$domain.'/favicon.ico" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0"><title>'.$serachdata.' '.$nickname.' '.$domainname.' | COD Stats </title>
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
<script src="'.$domain.'/inc/chartkick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.bundle.js"></script> 
';  
}
 
if($baseurlz=='geo.php')
echo '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>'; 

if($baseurlz=='list.php')
{
?>

<!-- ideally at the bottom of the page -->
<!-- also works in the <head> -->
<script src="<?php echo $domain; ?>/inc/alertify.js-0.3.11/lib/alertify.min.js"></script>

 
<!-- include the core styles -->
<link rel="stylesheet" href="<?php echo $domain; ?>/inc/alertify.js-0.3.11/themes/alertify.core.css" />
<!-- include a theme, can be included into the core instead of 2 separate files -->
<link rel="stylesheet" href="<?php echo $domain; ?>/inc/alertify.js-0.3.11/themes/alertify.default.css" id="toggleCSS" />

<?php
}

echo '</head>
<body>
<link href="https://fonts.googleapis.com/css?family=Open+Sans%7CRoboto:400,600,700,900&amp;display=swap" rel="stylesheet">
<script src="'.$domain.'/inc/script2.js"></script>';
  if($baseurlz=='index.php')
 echo '<canvas id="q"></canvas>'; 

if(!empty($serachdata))
{
if($baseurlz=='list.php')
{
?>
	
<script>  
		function reset () {
			$("#toggleCSS").attr("href", <?php echo '"'.$domain.''; ?>/inc/alertify.js-0.3.11/themes/alertify.bootstrap.css");
			alertify.set({
				labels : {
					ok     : "OK",
					cancel : "Cancel"
				},
				delay : 5000,
				buttonReverse : false,
				buttonFocus   : "ok"
			});
		}

        $( document ).ready(function() {
			reset();
			alertify.alert(<?php echo '"'.$serachdata.'"'; ?>);
			return false;
		});

		//alert(<?php echo '"'.$serachdata.'"'; ?>);  
		</script>	
	
<?php
}
}



if($baseurlz=='list.php')
{
?>


<script src="<?php echo $domain; ?>/inc/alertify.js-0.3.11/lib/alertify.min.js"></script>


<?php
}