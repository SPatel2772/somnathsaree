<?php

session_start();

session_unset();
session_destroy();

header ("location: Log_in.php");
exit;
?>