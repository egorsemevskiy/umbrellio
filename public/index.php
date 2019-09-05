<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ('../vendor/autoload.php');

use Sem\Library\SearchController;


try {
    $search = new SearchController('string', "textfile.txt", "Proin porta");
} catch (\Exception $e) {
    echo "Допущена ошибка: ", $e->getMessage() ."<br>\n";
}


$host = "localhost";
$user = "postgres";
$pass = "54132817";
$db = "work";

// Open a PostgreSQL connection
$con = pg_connect("host=$host dbname=$db user=$user password=$pass")
or die ("Could not connect to server\n");

$query = 'SELECT * FROM users';
$results = pg_query($con, $query) or die('Query failed: ' . pg_last_error());

$row = pg_fetch_row($results);
echo $row[0] . "\n";
// Closing connection
pg_close($con);