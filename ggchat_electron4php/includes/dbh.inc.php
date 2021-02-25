<?php
namespace GGChat\includes;

use PDO;

class Dbh
{
    public function __construct()
    {
        
    }
    
    public function getDbh()
    {
        // Pour bd en local
        $dsn = 'pgsql:dbname=ggchat;host=localhost';
        $user = 'postgres';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $conn = pg_pconnect("host=localhost port=5432 dbname=ggchat user=postgres password=");
        return $dbh;
        
        /* Pour bd sur le serveur
        $dsn = 'pgsql:dbname=ggchat;host=192.99.151.9';
        $user = 'postgres';
        $password = 'pol5050';
        $dbh = new PDO($dsn, $user, $password);
        $conn = pg_pconnect("host=192.99.151.9 port=5432 dbname=ggchat user=postgres password=pol5050");
        return $dbh;
        */
    }
}