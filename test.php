<?php

ini_set('display_errors', 1); 
ini_set('log_errors', 1); 
ini_set('error_log', dirname(__FILE__) . '/error_log.txt'); 
error_reporting(E_ALL);

echo "Hello World!";
echo "php is working";
php_info();

//this should generate an error--->
echo $unknown_var;
    ?>
    <html>
    Html is working
    </html>