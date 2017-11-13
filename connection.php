<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'provaPhp');
define('DB_PORT', '3306');
define('DB_PASSWORD', 'password');
define('DB_DATABASE', 'accesso');
define('DB_SQLite' , 'artisti.sqlite');
$db_mysql = new PDO('mysql:host = ' . DB_SERVER . '; db:name = ' . DB_DATABASE . '; port = ' . DB_PORT, DB_USERNAME, DB_PASSWORD);
//$db_mysql = new PDO('mysql:host = localhost; dbname = accesso; port = 3306', 'provaPhp' , 'password');
$db_sqlite = new PDO('sqlite:' . DB_SQLite);
$db_mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db_sqlite->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);