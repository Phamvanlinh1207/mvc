<?php
session_start();

require_once './Controller/Controller.php';
require_once './Helpers/functions.php';

$controller = new Controller();
$controller->invoke();