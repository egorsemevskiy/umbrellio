<?php


namespace Sem\Library;


class FileToString
{
    private $file;

    public $string;

    public $handle;

    private $configYaml;

    public function __construct(string $file)
    {
        $this->file = $file;
        $this->configYaml = yaml_parse_file("../conf/config.yml");


        if(file_exists($this->file)) {
            if (mime_content_type($this->file) == $this->configYaml['fileconfig']['mime-type']) {
                if (filesize($this->file) < $this->configYaml['fileconfig']['max_size']) {

                    if ($handle = fopen($this->file, "r")) {
                        $this->handle = $handle;
                        echo "Верный путь к фалу<br/>\n";
                        return $this;


                    } else {
                        throw new \Exception("Неверный путь к файлу");
                    }
                } else {
                    throw new \Exception( "слишком большой файл");
                }
            } else {
                throw new \Exception("Не тот mime type");
            }
        }else {
            throw new \Exception("Файл не найден");
        }

    }

    public function __destruct()
    {
        fclose($this->handle);
        echo 'Файл закрыт';
    }


}