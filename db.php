<?php

function getPDO(): PDO
{
    // Railway env (bestaat op InfinityFree meestal NIET)
    $host = getenv('MYSQLHOST');
    $port = getenv('MYSQLPORT');
    $db   = getenv('MYSQLDATABASE');
    $user = getenv('MYSQLUSER');
    $pass = getenv('MYSQLPASSWORD');

    
    if (!$host || !$db || !$user) {

    
        $host = "sql211.infinityfree.com";
        $port = "3306";
        $db   = "if0_40857781_zara";   
        $user = "if0_40857781";
        $pass = "wzJC4ILt8aXk";

    
    }

    $dsn = "mysql:host={$host};port={$port};dbname={$db};charset=utf8mb4";

    return new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
}
