<?php

class CompetenceModule {
    private $id_etu;
    private $code_etu;
    private $id_comp;
    private $id_module;
    private $coef;

    public function __construct($id_etu=0, $code_etu=0, $id_comp=0, $id_module=0, $coef=0) {
        $this->id_etu = $id_etu;
        $this->code_etu = $code_etu;
        $this->id_comp = $id_comp;
        $this->id_module = $id_module;
        $this->coef = $coef;
    }

    public function getIdEtu() { return $this->id_etu; }

    public function getCodeEtu() { return $this->code_etu; }

    public function getIdComp() { return $this->id_comp; }

    public function getIdModule() { return $this->id_module; }

    public function getCoef() { return $this->coef; }

    public function setIdEtu($id) { $this->id_etu = $id; }

    public function setCodeEtu($code) { $this->code_etu = $code; }

    public function setIdComp($id) { $this->id_comp = $id; }

    public function setIdModule($id) { $this->id_module = $id; }

    public function setCoef($coef) { $this->coef = $coef; }
}
?>
