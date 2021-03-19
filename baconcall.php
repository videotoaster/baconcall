<?php
 header("Content-type: text/plain");
 if (@$_GET["bid"]=="") {                                               // If you specify no BID
   if (is_file("/etc/bacon/index")) {                                   // See if index exists
   	  echo(file_get_contents("/etc/bacon/index"));                      // Serve index
   } else {                                                             // Otherwise
 	  echo("Baconcall: BACON/404 (Not Found)");                         // Serve fake 404
   }                                                                    // </if>
 } else if (is_dir("/etc/bacon/") === false) {                          // If /etc/bacon doesn't exist
    echo("Baconcall: BACON/500 (No bacon dir/internal server error");   // Serve fake 500
 } else if (strpos($_GET["bid"], '..') !== false) {                     // If you're trying out of /etc/bacon
  	echo("Baconcall: BACON/403 (Naughty request/forbidden)");           // Serve fake 403
 } else if (strpos($_GET["bid"], '/') !== false) {                      // If you're trying to get to root
  	echo("Baconcall: BACON/403 (Naughty request/forbidden)");           // Serve fake 403
 } else if (is_file("/etc/bacon/".$_GET["bid"]) === false) {            // If file does not exist
  	echo("Baconcall: BACON/404 (Not Found)");                           // Serve fake 404
 } else {                                                               // If everything works
    echo(file_get_contents("/etc/bacon/".$_GET["bid"]));                // Serve txt file
 }
?>
