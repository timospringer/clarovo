<?php

class Voting
{
    public $id;
    public $frage;
    public $a;
    public $a_vote;
    public $b;
    public $b_vote;
    public $c;
    public $c_vote;
    public $d;
    public $d_vote;
    public $id_vorlesung;

    function __construct($data=null) {
        if (is_array($data)) {
            if (isset($data['id'])) $this->id = $data['id'];
            
            $this->frage = $data['frage'];
            $this->a = $data['a'];
            $this->a_vote = $data['a_vote'];
            $this->b = $data['b'];
            $this->b_vote = $data['a_vote'];
            $this->c = $data['c'];
            $this->c_vote = $data['a_vote'];
            $this->d = $data['d'];
            $this->d_vote = $data['a_vote'];
            $this->id_vorlesung = $data['id_vorlesung'];
        }
    }
}