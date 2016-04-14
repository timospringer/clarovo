<?php

class Dozent
{
    public $id;
    public $login;
    public $vorname;
    public $nachname;
    public $hash;

    function __construct($data=null) {
        if (is_array($data)) {
            if (isset($data['id'])) $this->id = $data['id'];
            
            $this->login = $data['login'];
            $this->vorname = $data['vorname'];
            $this->nachname = $data['nachname'];
            $this->hash = $data['hash'];
        }
    }
    
    public function __toString() {
        return $this->login." ".$this->vorname." ".$this->nachname." ".$this->hash;
    }
}