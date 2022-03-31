<?php
require_once dirname( __FILE__ )."/ValueObject.class.php";

abstract class Funcionario extends ValueObject {
    protected $matricula;
    protected $nome;
    protected $cpf;
    protected $salario;

    public function __construct(
        $matricula,
        $nome,
        $cpf,
        $salario)
    {
        $this->matricula = $matricula;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->salario = $salario;
    }
}