<?php  
if(empty($countsc))
	$countsc = 60;
  
echo "<script>  
        function show_".md5($guidxx)."()  
        {  
            $.ajax({  
                url: \"$domain/engine/ajax_data/url_parser_db_get.php?guid=".trim($guidxx)."&ip=".trim($ip)."&count=".$countsc."\",  
                cache: false,  
                success: function(html){  
                    $(\"#contentcod_".md5($guidxx)."\").html(html);  
                }  
            });  
        }  
        $(document).ready(function(){  
            show_".md5($guidxx)."();  
            setInterval('show_".md5($guidxx)."()',160000);  
        });  
</script>";
?>