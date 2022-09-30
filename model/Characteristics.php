<?php

class Characteristics {
    private $insole;
    private $midsole;
    private $sole;
    private $tongue; /* lingua */
    private $liningMaterial; /* material do forro*/
    private $typeMooring; /* tipo de amarração */

    public function setInsole ($insole) {
        return $this->insole = $insole;
    }
    public function getInsole () {
        return $this->insole;
    }

    public function setMidsole ($midsole) {
        return $this->midsole = $midsole;
    }
    public function getMidsole () {
        return $this->midsole;
    }

    public function setSole ($sole) {
        return $this->sole = $sole;
    }
    public function getSole () {
        return $this->sole;
    }

    public function setTongue ($tongue) {
        return $this->tongue = $tongue;
    }
    public function getTongue () {
        return $this->tongue;
    }

    public function setLiningMaterial ($liningMaterial) {
        return $this->liningMaterial = $liningMaterial;
    }
    public function getLiningMaterial () {
         return $this->liningMaterial;
    }

    public function setTypeMooring ($typeMooring) {
        return $this->typeMooring = $typeMooring;
    }
    public function getTypeMooring () {
        return $this->typeMooring;
    }
}