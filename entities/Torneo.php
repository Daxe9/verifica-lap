<?php
class Torneo {
    public $codice;
    public $data;
    public $sede;
    public $elenco;

    public function __construct($id, $data, $sede, $elenco) {
        $this->codice = $id;
        $this->data = $data;
        $this->sede = $sede;
        $this->elenco = $elenco;
    }

    public function getPartite() {
        return $this->elenco;
    }

    public function getOnePartita($id) {
        foreach($this->elenco as $partita) {
            if($partita->id == $id) {
                return $partita;
            }
        }        

        return null;
    }

    public function getPartiteDisputate() {
        $list = array();
        foreach ($this->elenco as $partita) {
            if ($partita->conclusa) {
                array_push($list, $partita);
            }
        }
        return $list;
    }
    public function getPartiteDaDisputare() {
        $list = array();
        foreach ($this->elenco as $partita) {
            if (!$partita->conclusa) {
                array_push($list, $partita);
            }
        }
        return $list;
    }

    public function isEnded() {
        foreach ($this->elenco as $partita) {
            if (!$partita->conclusa) {
                return false;
            }
        }
        return true;
    }

    private function getWinners() {
        $list = array();

        // lista dei vincitori
        foreach ($this->elenco as $partita) {
            array_push($list, $partita->getWinner());
        }
        $result = array();

        // associare la squadra al punteggio ottenuto
        foreach($list as $res) {
            if (!isset($result[$res])) {
                $result[$res] = 1;
            } else {
                $result[$res] += 1;
            }
        }
        return $result;
    }

    public function getClassifica() {
        $lista_punteggi = $this->getWinners();
        return $lista_punteggi;
    }

}