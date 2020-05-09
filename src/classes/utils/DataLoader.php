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

    public function mergeArrays($path)
    {

        $catName = basename($path, ".csv");
        $openFile = fopen($catName . ".sql", "w+");

        $handle = fopen($path, "r"); //открываем файл для чтения

        $data = fgetcsv($handle, 0, ",");
        $queryColumnNames = '';
        $colon = ', ';
        for ($i = 0; $i < count($data); $i++) {

            if (array_key_last($data) == $i) {
                $colon = '';
            }

            $queryColumnNames .= $data[$i] . $colon;
        }

        $firstQueryLine = 'INSERT INTO ' . $catName . '(' . $queryColumnNames . ')' ."\n\t". 'VALUES' . "\n";

        fwrite($openFile, $firstQueryLine);


        while (($data = fgetcsv($handle, 0, ',')) !== FALSE) {
            $ar = join("','", $data);
            $queryData = "\t" . "('" . $ar . "')" . "," . "\n";
            fwrite($openFile, $queryData);

        }

        $a = fopen($catName . ".sql", "r+");
        $n = file_get_contents($catName . ".sql");
        $r = rtrim($n, "\n");
        $v = substr($r, 0, -1) . ';';

        fwrite($a, $v);

        fclose($handle);
    }

    public function getData()
    {
        return $this->result;
    }

}
