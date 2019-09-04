<?php


namespace Sem\Library;


class SearchController
{
    public function __construct(string $searchType,string $file,string $whatToSearch)
    {
        $search =  SearchFactory::build($searchType, $file, $whatToSearch);

        return $search;
    }



}