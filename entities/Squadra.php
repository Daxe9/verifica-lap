<?php

class Squadra {
    public $id;
    public $nome;
    public $colore;
    public $genere;

    public function __construct($id, $nome, $colore, $genere) {
        $this->id = $id;
        $this->nome = $nome;
        $this->colore = $colore;
        $this->genere = $genere;
    }
}