<?php

require_once __DIR__ . "/Torneo.php";
require_once __DIR__ . "/Partita.php";
require_once __DIR__ . "/SquadraM.php";
require_once __DIR__ . "/SquadraF.php";

class Gioco {
    public $tornei = null;
    public $squadre = null;
    public function __construct() {
        $this->squadre = array(
            new SquadraM(1, "GiovaniFiorentina", "viola", "123", "123"),
            new SquadraM(2, "Prato1", "giallo", "124", "124"),
            new SquadraF(3, "Prato2", "giallo", "u18"),
            new SquadraF(4, "MonteCatini", "verde", "u16"),
        );


        $this->tornei = array(
            new Torneo(1, "03/04/24", "Firenze", array(
                new Partita(1, 1, 2, 0, 1, true),
                new Partita(2, 1, 3, 2, 1, true),
                new Partita(3, 1, 4, 0, 0, true),
                new Partita(4, 2, 3, null, null, false),
                new Partita(5, 2, 4, null, null, false),
                new Partita(6, 3, 4, null, null, false),

            )),
            new Torneo(2, "02/04/24", "Bagno a Ripoli", array(
                new Partita(7, 1, 2, 2, 0, true),
                new Partita(8, 1, 3, 0, 4, true),
                new Partita(9, 1, 4, 2, 3, true),
                new Partita(10, 2, 3, 2, 1, true),
                new Partita(11, 2, 4, 1, 2, true),
                new Partita(12, 3, 4, 5, 4, true),
            ))
        );
    }

    public function getOneTorneo($codice) {
        foreach ($this->tornei as $torneo) {
            if ($torneo->codice == $codice) {
                return $torneo;
            }
        }

        return null;
    }

    public function getAllSquadre() {
        return $this->squadre;   
    }

    public function getOneSquadra($id) {
        foreach ($this->squadre as $squadra) {
            if ($squadra->id == $id) {
                return $squadra;
            }
        }

        return null;
    }
}