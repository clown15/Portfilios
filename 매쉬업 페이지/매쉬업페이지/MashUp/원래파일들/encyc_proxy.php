<?php
header("Content-Type: text/html; charset=UTF-8");

$bus = new Bus();

echo $bus->getBusTime($_POST['query']);
?>