<?php


namespace Sem\Library;

use Sem\Library\SearchString;

class SearchFactory
{
    public static function build($searchType,  $file, $whatToSearch)
    {
        $search = "Sem\\Library\\Search" . ucfirst($searchType);


        if (class_exists($search)) {

            return new $search($file, $whatToSearch);

        } else {
            echo "Неверный тип продукта";
        }
    }
}