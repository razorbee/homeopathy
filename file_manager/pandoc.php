<?php


echo dirname(__FILE__) ;
$output = shell_exec("sh /var/www/html/pms.razorbee.com/homeopathy/file_manager/pandoc.sh files/test");
echo $output;
?>
