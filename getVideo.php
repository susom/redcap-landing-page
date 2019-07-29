<?php 
$file 				= "stanford_drone.mp4";  //Etag = 3dd7bcaf1152c3425fcab2b327944d61
$real_path  		= realpath(__FILE__);
$script_name 		= basename(__FILE__);
$end_char 			= strpos($real_path,$script_name);
$downloads_folder 	= substr($real_path, 0 , $end_char);

ob_start(); // collect all outputs in a buffer
 /*
 put the normal PHP-Code here
 if the resulting html code ($sContent) is the same, and so the md5 hash is the same,
 it will not be sent so the client once more
 because the client already has this html page in the cache, identified by the md5 hash Etag
 */
 
// Open and output file contents
set_time_limit(0);
$fh = fopen($downloads_folder . $file, "rb");
while (!feof($fh)) {
  echo fgets($fh);
}
fclose($fh);
$sContent 	= ob_get_contents(); // collect all outputs in a variable
ob_clean();
$sEtag 		= md5($sContent); // calculate a hash for the content

if ($_SERVER['HTTP_IF_NONE_MATCH'] == $sEtag) { //browser already requested this page ?
    // Okay, the browser already has the
    // latest version of our page in his
    // cache. So just tell him that
    // the page was not modified and DON'T
    // send the content -> this saves bandwith and
    // speeds up the loading for the visitor
    header('HTTP/1.1 304 Not Modified');
    header_remove("Cache-Control"); 
    header_remove("Pragma");
} else {
	 // Set force download headers
	header('Content-Type:  video/mp4');
	header('Content-Disposition: attachment; filename="' . $file . '"');
	header('Content-Length: ' . sprintf("%u", filesize($downloads_folder . $file)));

    header('ETag: '.$sEtag);	// send a ETag with the response
    header('Cache-Control: max-age=31536000');	// send a ETag with the response
    header_remove("Pragma");
    header_remove("Expires");
    echo $sContent;
}
exit;