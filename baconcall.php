<?php
 // Configuration

 // Index filename
 $bacon_indexfile = "index";

 // Responses
 $bacon_errors = [
    "Baconcall: BACON/400 (Bad Request)",
   	"Baconcall: BACON/405 (Internal error)",
    "Baconcall: BACON/403 (Forbidden)",
    "Baconcall: BACON/404 (Not Found)"
 ];
 // Root dir (/etc/bacon/)
 $bacon_baconfiles = "/etc/bacon/";
 header("Content-type: text/plain");
 if (@$_GET["bid"]=="") {                                              // If you specify no BID
   if (is_file($bacon_baconfiles.$bacon_indexfile)) {                  // See if index exists
   	  echo(file_get_contents($bacon_baconfiles.$bacon_indexfile));     // Serve index
   } else {                                                            // Otherwise
 	    echo($bacon_errors[0]);                                          // Serve fake 400
   }                                                                   // </if>
 } else if (is_dir($bacon_baconfiles) === false) {                     // If /etc/bacon doesn't exist
    echo($bacon_errors[2]);                                            // Serve fake 500
 } else if (strpos($_GET["bid"], '..') !== false) {                    // If you're trying out of /etc/bacon
  	echo($bacon_errors[3]);                                             // Serve fake 403
 } else if (strpos($_GET["bid"], '/') !== false) {                     // If you're trying to get to root
  	echo($bacon_errors[3]);                                             // Serve fake 403
 } else if (is_file($bacon_baconfiles.$_GET["bid"]) === false) {       // If file does not exist
  	echo($bacon_errors[4]);                                             // Serve fake 404
 } else {                                                              // If everything works
   echo(file_get_contents($bacon_baconfiles.$_GET["bid"]));            // Serve txt file
 }
?>
