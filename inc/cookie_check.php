<?php

if (isset($_COOKIE["HALLO"]))
$besucht = True;
else
$besucht = False;
setcookie ("HALLO","1", time()+86400);

?>