<?php
 // Configuration

 // Index filename
 $bacon_indexfile = "index";

 // Responses
 $bacon_errors = [
    "Baconcall: BACON/400 (Bad Request)",
   	"Baconcall: BACON/500 (Internal error)",
    "Baconcall: BACON/403 (Forbidden)",
    "Baconcall: BACON/404 (Not Found)"
 ];
 // Root dir (/etc/bacon/)
 $bacon_baconfiles = "/etc/bacon/";
 header("Content-type: text/plain");
 // If you specify no BID
 if (@$_GET["bid"]=="") {
   // See if index exists 
   if (is_file($bacon_baconfiles.$bacon_indexfile)) {
      // Serve index
      echo(file_get_contents($bacon_baconfiles.$bacon_indexfile));
   } else {
      // Otherwise, serve 400
      echo($bacon_errors[0]);
   }
 // If /etc/bacon doesn't exist, serve 500
 } else if (is_dir($bacon_baconfiles) === false) {
   echo($bacon_errors[2]);
  
 // FUN GAME TO PLAY: Comment out the next section and see how long it is until someone requests /etc/passwd
 
  // If you're trying out of /etc/bacon, serve 403
 } else if (strpos($_GET["bid"], '..') !== false) {
  	echo($bacon_errors[3]);
 } else if (strpos($_GET["bid"], '/') !== false) {
   // If you're trying to get to root, serve 403
   echo($bacon_errors[3]);
 } else if (is_file($bacon_baconfiles.$_GET["bid"]) === false) {
   // If file does not exist, serve 404
  	echo($bacon_errors[4]);
 } else {
   // If everything is A-OK, serve requested file
   echo(file_get_contents($bacon_baconfiles.$_GET["bid"]));
 }
?>
