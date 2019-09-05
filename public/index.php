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
