<?php

require_once __DIR__ . "/Squadra.php";

class SquadraM extends Squadra {
    public $csen;
    public $piva;

    public function __construct($id, $nome, $colore, $csen, $piva) {
        parent::__construct($id, $nome, $colore, "maschile");
        $this->csen = $csen;
        $this->piva = $piva;
    }
}