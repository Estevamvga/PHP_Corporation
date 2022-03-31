<?php
require_once dirname( __FILE__ )."/Funcionario.class.php";

class Operador extends Funcionario {
    protected $funcao;

    public function __construct(
        $matricula = null,
        $nome = null,
        $cpf = null,
        $salario = null,
        $funcao = null
    )
    {
        parent::__construct($matricula, $nome, $cpf, $salario);
        $this->funcao = $funcao;
    }

    public function toArray() {
        return [$this->matricula, $this->nome, $this->cpf, $this->salario, $this->funcao];
    }
}