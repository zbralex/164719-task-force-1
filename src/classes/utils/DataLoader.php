<?php

namespace taskForce\classes\utils;

class DataLoader extends Data
{
    private $filename;
    private $columns;
    private $fp;

    private $result = [];
    private $error = null;

    public function __construct($filename, $columns)
    {
        $this->filename = $filename;
        $this->columns = $columns;
    }

    public function import()
    {
        if (!$this->validateColumns($this->columns)) {
            throw new \Exception("Заданы неверные заголовки столбцов");
        }

        if (!file_exists($this->filename)) {
            throw new \Exception("Файл не существует");
        }

        $this->fp = fopen($this->filename, 'r');

        if (!$this->fp) {
            throw new \Exception("Не удалось открыть файл на чтение");
        }

        $header_data = $this->getHeaderData();

        if ($header_data !== $this->columns) {
            throw new \Exception("Исходный файл не содержит необходимых столбцов");
        }

        while ($line = $this->getNextLine()) {
            $this->result[] = $line;
        }
    }

    public function validateColumns($columns)
    {
        $result = true;

        if (count($columns)) {
            foreach ($columns as $column) {
                if (!is_string($column)) {
                    $result = false;
                }
            }
        } else {
            $result = false;
        }

        return $result;
    }

    public function getHeaderData()
    {
        rewind($this->fp);
        $data = fgetcsv($this->fp);

        return $data;
    }

    public function getNextLine()
    {
        $result = false;

        if (!feof($this->fp)) {
            $result = fgetcsv($this->fp);
        }

        return $result;
    }

    public function parseFromCsvToSql(string $path) {
        $file = new \SplFileObject($path);

        $file->setFlags(\SplFileObject::DROP_NEW_LINE | \SplFileObject::READ_AHEAD | \SplFileObject::SKIP_EMPTY | \SplFileObject::READ_CSV);

        // получаем первую строку
        $firstLine = "INSERT INTO " . "(" . implode(", ", $file->current()) . ")" ."\n\t". "VALUES";

        print_r($firstLine); print "<br>";


        while (!$file->eof()) {
            var_dump($file->fgetcsv());
            print "<br>";
        }

    }


    public function getData()
    {
        return $this->result;
    }

}
