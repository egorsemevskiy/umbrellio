<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ('../vendor/autoload.php');

use Sem\Library\SearchController;


$search = new SearchController('string', "textfile.txt", "Proin porta");


