<?php


namespace Sem\Library;


abstract class Search
{
    protected $type = null;


    public function getType()
    {
        return $this->type;
    }
}