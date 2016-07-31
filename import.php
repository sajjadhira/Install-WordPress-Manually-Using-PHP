<?php
@error_reporting(0); 
@ini_set('error_log',NULL); 
@ini_set('log_errors',0); 
@ini_set('max_execution_time',0); 
@set_time_limit(0); 
@set_magic_quotes_runtime(0); 
$wpURI = 'https://wordpress.org/latest.zip';
$file = 'wp.zip';

if(isset($_GET['import'])&&$_GET['import']=='true')
{
if(copy($wpURI,$file))
{
echo 'file imported successfully!<br/>';
echo '<a href="?extract=true">Extraact Now</a>';
}
else
{
echo 'file import error!';
exit;
}
}
else
if(isset($_GET['extract'])&&$_GET['extract']=='true')
{
$zip = new ZipArchive;
$res = $zip->open($file);
if ($res === TRUE) {
$zip->extractTo('./');
$zip->close();
echo 'zip file extracted!';
unlink($file);
} else {
echo 'ERROR: FILE NOT EXTRACTED!';
exit;
}
}
else
{
echo '<a href="?import=true">Import WordPress</a>';
}
?>
