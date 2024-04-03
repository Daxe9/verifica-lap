<?php

require_once __DIR__ . "/Squadra.php";

class SquadraF extends Squadra {
    public $categoria;

    public function __construct($id, $nome, $colore, $categoria) {
        parent::__construct($id, $nome, $colore, "femminile");
        $this->categoria = $categoria;
    }
}