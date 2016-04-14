<?php

class Voting
{
    public $id;
    public $frage;
    public $a;
    public $b;
    public $c;
    public $d;
    public $id_vorlesung;

    function __construct($data=null) {
        if (is_array($data)) {
            if (isset($data['id'])) $this->id = $data['id'];
            
            $this->frage = $data['frage'];
            $this->a = $data['a'];
            $this->b = $data['b'];
            $this->c = $data['c'];
            $this->d = $data['d'];
            $this->id_vorlesung = $data['id_vorlesung'];
        }
    }
}