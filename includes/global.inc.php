<?php

require_once 'config.php';
require_once 'classes/DB.class.php';
require_once 'classes/User.class.php';

$db = new DB();
$user = new User($db);