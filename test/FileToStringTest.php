<?php




namespace Sem\Test;


use PHPUnit\Framework\TestCase;
use Sem\Library\FileToString;

class FileToStringTest extends TestCase
{
    public function testCheckTrue(){
        $fileToString = new FileToString(__DIR__."../public/textfile.txt", "Lorem");
        $this->assertEquals("1",$fileToString->stringInFile());
    }
}

