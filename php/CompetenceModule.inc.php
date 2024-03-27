<?php

class CompetenceModule {
    private int $id_etu;
    private string $code_etu;
    private int $id_comp;
    private int $id_module;
    private float $coef;

    public function __construct(int $id_etu, string $code_etu, int $id_comp, int $id_module, float $coef) {
        $this->id_etu = $id_etu;
        $this->code_etu = $code_etu;
        $this->id_comp = $id_comp;
        $this->id_module = $id_module;
        $this->coef = $coef;
    }

    public function getIdEtu(): int { return $this->id_etu; }

    public function getCodeEtu(): string { return $this->code_etu; }

    public function getIdComp(): int { return $this->id_comp; }

    public function getIdModule(): int { return $this->id_module; }

    public function getCoef(): float { return $this->coef; }

    public function setIdEtu(int $id): void { $this->id_etu = $id; }

    public function setCodeEtu(string $code): void { $this->code_etu = $code; }

    public function setIdComp(int $id): void { $this->id_comp = $id; }

    public function setIdModule(int $id): void { $this->id_module = $id; }

    public function setCoef(float $coef): void { $this->coef = $coef; }
}