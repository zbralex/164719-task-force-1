<?php

class SomeClass {
public $a = 5;
public $c = 0;
public $b = 0;
public function __construct($a, $c)
{
    $this->a = $a;
    $this->b = $c;
}

    public function counter() {
    for ($i = 0; $i <= $this->a; $i++) {
        $this->c = $i;
    }
    return $this->c;
}
}
