<?php
$datetime1 = new DateTime('2015-06-01');
$datetime2 = new DateTime();
$interval = $datetime1->diff($datetime2);
echo $interval->format('%a days');
?>