<?php
include 'SmallCalendar.php';
$env = new SmallCalendar($_GET);
$env = $env->Enterprise();
$today = new DateTime();
$today = $today->format('H:i');
include 'calendar.html';
?>
