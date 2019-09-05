<?php

namespace Sem\Library;


class SearchString extends Search
{
    private $count;
    private $line;
    private $lineNumber;
    private $string;
    private $fileToString;
    protected $type = 'string';



    public function  __construct(string $fileToString,string $string)
    {
        $this->string = $string;

        $this->fileToString = new FileToString($fileToString);

        $count = 0;
        while (($this->line = fgets($this->fileToString->handle, 4096)) !== FALSE && !$this->lineNumber) {
            $count++;
            $this->lineNumber = (strripos($this->line,$this->string) !== FALSE) ? $count : $this->lineNumber;
            if((strripos($this->line,$this->string)) !== FALSE){
                echo "Строка " . $this->lineNumber . " " ;
                echo 'Символ ' . (strripos($this->line,$this->string) . "<br>");
            }

        }


    }


}