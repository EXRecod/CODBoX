<?php
if(!empty($_GET['f']))
{
$file = base64_decode($_GET['f']);
if(file_exists($file))
{
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$ext = pathinfo($file, PATHINFO_EXTENSION);
$basename = pathinfo($file, PATHINFO_BASENAME);

header("Content-type: application/".$ext);
// tell file size
header('Content-length: '.filesize($file));
// set file name
header("Content-Disposition: attachment; filename=\"$basename\"");
readfile($file);
// Exit script. So that no useless data is output.
exit;
}}
?>