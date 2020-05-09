<?php

namespace taskForce\classes\utils;


abstract class Data
{
    abstract public function validateColumns($columns);
    abstract public function getHeaderData();
    abstract public function getNextLine();
}
