<?php

if (isset($_COOKIE["$voting->id"]))
$besucht = True;
else
$besucht = False;
setcookie ("$voting->id","12345", time()+86400);

?>