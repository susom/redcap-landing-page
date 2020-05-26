<?php
/** @var \Stanford\LandingPage\LandingPage $module */

// Cache Time in Seconds
$day_cache          = 86400;
$week_cache         = 604800;
$month_cache        = 2628000;
$year_cache         = 31536000;

// GET FILE NAME OF DESIRED FILE FOR PASS THRU
$get_file           = isset($_GET['file']) ? filter_var($_GET['file'], FILTER_SANITIZE_STRING) : null;
$file               = $get_file ? $get_file : "stanford_drone.mp4";
$file               = preg_replace("/.*\/|\.{2,}/", "", $file);
$extension          = strtolower( pathinfo($file, PATHINFO_EXTENSION) );

// SETTING SUB FOLDERS TO RESTRICT FOLDER TO PICK FILES FROM
$content_type       = "text/plain";
$subfolder          = "/assets/images/";
$cache_age          = $year_cache; // Default 1 year

// SET CONTENT-TYPE
$bad_ext = false;
if($extension ==  "mp4"){
    $content_type   = "video/mp4";
    $subfolder      = "/assets/video/";
}else if( $extension == "jpg" || $extension == "jpeg" ){
    $content_type   = "image/jpeg";
}else if( $extension == "gif" ){
    $content_type   = "image/gif";
}else if($extension == "png" ){
    $content_type   = "image/png";
}else if($extension == "css" ){
    $content_type   = "text/css";
    $subfolder      = "/assets/styles/";
    $cache_age      = $month_cache;
}else if($extension ==  "js" ){
    $content_type   = "text/javascript";
    $subfolder      = "/assets/js/";
    $cache_age      = $month_cache;
}else{
    $bad_ext = true;
}

// GET ABS PATH TO FILE
/* 
double layer of protection against directory traversal
first : remove the damn ../
second : check the absolute (realpath) 

The path provided by the user is sent to the storage path. Then realpath is used to convert this path to an absolute path. If the absolute path begins with the storage path everything is okay, otherwise not.
*/

$storagePath        = dirname(__FILE__);
$filepath           = $storagePath . $subfolder . $file;
$checkpath          = realpath($filepath);

// now serve the file, if path is real, and file exists
if( strpos($checkpath, $storagePath."/assets") === 0 && file_exists($filepath) && !$bad_ext){
    //Path is okay
    ob_start(); // collect all outputs in a buffer

    // USE MODIFIED TIME AS ETag, RATHER than OPENING WHOLE FILE AND HASHING THAT
    $modified_time  = filemtime($filepath);

    set_time_limit(0);
    $fh = fopen($filepath, "rb");
    while (!feof($fh)) {
        echo fgets($fh);
    }
    fclose($fh);
    $sContent = ob_get_contents(); // collect all outputs in a variable
    ob_clean();

    // It is important to specify  Cache-Control max-age, and ETag, for all cacheable resources.
    // Set download headers MUST BE IN THIS ORDER
    header('HTTP/1.1 200 OK', true, 200);
    header('Cache-Control: max-age='.$cache_age.', public');
    header('Content-Type:  ' . $content_type);

    header('Content-Disposition: attachment; filename="' . $file . '"');
    header('Content-Length: ' . sprintf("%u", filesize($filepath)));

    header_remove("Pragma");
    header_remove("Expires");
    echo $sContent;
} else {
   //User wants to gain access into a forbidden area.
   header('HTTP/1.1 404 Not Found');
}

$module->emDebug("Inside getAsset.php:");

// exit;