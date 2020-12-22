<?php
function get_local_source_db($url_source,$time){     
$return = "
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
</script>";
return $return;
}
 
?>