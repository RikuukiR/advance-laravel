<?php
$date = new DateTime();
echo $date->format('Y-m-d H:i:s');

echo '<br>';

$date = new DateTime('1999-11-02 05:27:42');
echo $date->format('Y-m-d H:i:s');
