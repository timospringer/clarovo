<?php

class Vorlesung
{
    public $id;
    public $name;
    public $id_dozent;

    function __construct($data=null) {
        if (is_array($data)) {
            if (isset($data['id'])) $this->id = $data['id'];
            
            $this->name = $data['name'];
            $this->id_dozent = $data['id_dozent'];
        }
    }
}