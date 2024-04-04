<?php

class CompetenceModule {
    private $id_comp;
    private $id_module;
    private $coef;

    public function __construct($id_comp, $id_module, $coef) {
        $this->id_comp = $id_comp;
        $this->id_module = $id_module;
        $this->coef = $coef;
    }

    public function getIdComp() { return $this->id_comp; }

    public function getIdModule() { return $this->id_module; }

    public function getCoef() { return $this->coef; }

    public function setIdComp($id) { $this->id_comp = $id; }

    public function setIdModule($id) { $this->id_module = $id; }

    public function setCoef($coef) { $this->coef = $coef; }
}
?>
