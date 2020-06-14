<?php

namespace taskForce\classes\utils;


abstract class Data
{
    abstract public function toSql();
    abstract public function scanDirectory($path);
    abstract protected function convertFromCsvToSql($path);
}
