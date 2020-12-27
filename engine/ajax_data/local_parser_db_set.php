<?php
function get_local_source_db($url_source,$time){     
global $downloadx;
$return = "<div id=\"loading\"><div class=\"loadingd\">
<center><b class=\"pulser\" style=\"font-size:25px;font-family: 'Impact',Fantasy;\"> ".$downloadx."... </b></center></div></div>
<div id=\"contentcod_".md5($url_source)."\"></div>
<script>  
        function show_".md5($url_source)."()  
        {  
            $.ajax({  
                url: \"".$url_source."\",  
                cache: false,  
                success: function(html){  
                    $(\"#contentcod_".md5($url_source)."\").html(html);  
                }  
            });  
        }  
        $(document).ready(function(){  
            show_".md5($url_source)."();  
            setInterval('show_".md5($url_source)."()',".$time.");  
        });
		
$(document).ajaxStart(function() {
  $(\"#loading\").show();
}).ajaxStop(function() {
  $(\"#loading\").hide();
});	
	
</script>";
return $return;
}
?>