<?php

namespace taskForce\classes\utils;

class DataLoader extends Data
{
    private $filename;
    private $columns;
    private $fp;


    private $fileArray = [];
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


    public function scanDirectory($path){
        $iterator = new \DirectoryIterator($path);
        while($iterator->valid()) {
            $file = $iterator->current();
            if ($file != "." && $file != "..") {
                $this->fileArray [] = $path . "/" . $file->getFilename();
            }
            $iterator->next();
        }
        return $this->fileArray;
    }

    public function toSql():void {
        $fileArray = $this->fileArray;
        foreach ($fileArray as $item) {
            $this->convertFromCsvToSql($item);
        }
    }


    protected function convertFromCsvToSql($path):void
    {
        if(empty($path)) {
            throw new \Exception('не указан путь для файла');
        }
        $file = new \SplFileObject($path);


        $catName = basename($path, '.csv');

        $openFileSql = new \SplFileObject($catName . ".sql", "w+");

        $file->setFlags(\SplFileObject::SKIP_EMPTY | \SplFileObject::DROP_NEW_LINE | \SplFileObject::READ_AHEAD | \SplFileObject::READ_CSV);

        // получаем первую строку
        $firstLine = "INSERT INTO " . $catName . "(" . implode(", ", $file->current()) . ")" . "\n\t" . "VALUES" . "\n";

        // записываем в файл первую строку с именами полей
        $openFileSql->fwrite($firstLine);

        // записываем остальные строки с данными, перебирая построчно в цикле
        while (!$file->eof()) {

            $line = $file->fgetcsv();
            //продолжаем цикл, если в нем есть перенос строки
            if ($line === null) {
                continue;
            }

            // склеиваем в строку данные массива
            $data = implode("\",\"", $line);

            // записываем данные запросов
            $queryData = "\t" . "(\"" . $data . "\")" . "," . "\n";

            $openFileSql->fwrite($queryData);
        }
        //открываем для очистки от пустых строк и переносов
        $r = new \SplFileObject($catName . '.sql', "r+");

        //открываем файл для перезаписи
        $reWriteFile = new \SplFileObject($catName . '.sql', "c");

        $fileToString = '';

        while (!$r->eof()) {
            $fileToString .= $r->fgets();
        }
        //удаляем перенос в конце последней строки
        $trimBrake = rtrim($fileToString, "\n");
        // удаляем запятую в конце последней строки
        $trimColon = substr($trimBrake, 0, -1);
        // перезаписываем файл, добавляя в конце ";"
        $reWriteFile->fwrite($trimColon . ";");


        // перемещаем все файлы в отдельную папку
        $folder = "queries";

        // проверяем, существует ли папка. Если нет, то создаем
        if (!is_dir($folder)) {
            mkdir($folder);
        }

        $movedFile = $catName . '.sql';

        chmod($folder, 0777);

        $new_file = $folder . "/" . $movedFile;

        // копируем
        copy($movedFile, $new_file);

        // удаляем
        unlink($movedFile);
    }


    public function getData()
    {
        return $this->result;
    }

}
