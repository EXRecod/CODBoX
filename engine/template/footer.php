<?php
 if(empty($templ))
	die("PERMISSIONS DENIED!");
echo ' 

 
<div style="width:100%;text-align:center;margin:auto;">
</div>

<div style="height:auto;width:calc(100% - 40px);max-width:1160px;min-width:260px;margin:auto;background:#444;background:url(/inc/images/bot_bg.png);padding:20px;line-height:20px;
 overflow:auto;">
 
<div style="font-size:12px;color:#aaa;float:left;padding:0 10px;">Codbox stats.
 <a href="mailto:x.php@ya.ru" style="color:#52bafe;"><b>Contact Us</b></a>
 </div>
  
<div style="font-size:12px;color:#aaa;padding:0 10px;float:right;">'.$domainname.' &copy 2020 ;</div>
 
 </div>
'; 
if(empty($metrikaID))
	$metrikaID = 67922815;
echo '
 <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym('.$metrikaID.', "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/'.$metrikaID.'" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter --> 
 ';
echo '<script type="text/javascript">
  $(function() {
  $(window).scroll(function() {
  if($(this).scrollTop() != 0) {
  $(\'#topcodbx\').fadeIn();
  } else {
  $(\'#topcodbx\').fadeOut();
  }
  });
  $(\'#topcodbx\').click(function() {
  $(\'body,html\').animate({scrollTop:0},700);
  });
  });
  </script>
   
   <div id="topcodbx">
   <img src="'.$domain.'/inc/images/icons/20xNx40.png.pagespeed.ic.eah0H26eCi.png" 
   width="32px" height="32px" style="filter: invert(100%) drop-shadow(8px 8px 10px blue);"/></div> 
'; 
 
 echo '
</body></html>
';