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
                        echo "Неверный путь к файлу<br/>\n";
                    }
                } else {
                    echo "слишком большой файл<br/>\n";
                }
            } else {
                echo "Не тот mime type<br/>\n";
            }
        }else {
            echo "Файл не найден";
        }

    }

    public function __destruct()
    {
        fclose($this->handle);
        echo 'Файл закрыт';
    }


}