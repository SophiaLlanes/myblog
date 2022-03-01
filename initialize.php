<?php
ob_start();
session_start();



require_once 'query_functions.php';
require_once 'validation_functions.php';
require_once 'functions.php';
require_once 'database.php';
require_once 'auth_functions.php';
$db = db_connect();
$errors = [];