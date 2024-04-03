<?php
class Partita {
    public $id;
    public $squadra1;
    public $squadra2;
    
    public $goal1;
    public $goal2;

    public $conclusa;

    public function __construct($id, $squadra1, $squadra2, $goal1, $goal2, $conclusa) {
        $this->id = $id;
        $this->squadra1 = $squadra1; 
        $this->squadra2 = $squadra2; 
        $this->goal1 = $goal1;
        $this->goal2 = $goal2;
        $this->conclusa = $conclusa;

    }

    public function getWinner() {
        if (!$this->conclusa) {
            return null;
        } 
        if ($this->goal1 > $this->goal2) {
            return $this->squadra1;
        } else {
            if ($this->goal2 == $this->goal1) {
                return 0;
            }
            return $this->squadra2;
        }
    }
}