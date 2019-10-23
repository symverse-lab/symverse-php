<?php
namespace Symverse\Sct;


class SctParameter{

    private $parameters;

    public function __construct(string ...$hexParam){
        $this->parameters = $hexParam;
    }

    public function get(){
        return $this->parameters;
    }

}