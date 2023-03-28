<?php

// Define a classe Pessoa para representar um indivíduo
class Pessoa
{
    private $nome;
    private $altura;
    private $peso;
    
    public function __construct($nome, $altura, $peso)
    {
        $this->nome = $nome;
        $this->altura = $altura;
        $this->peso = $peso;
    }

    // Calcula o IMC com base na altura e peso da pessoa
    public function calcularIMC()
    {
        return $this->peso / ($this->altura * $this->altura);
    }

    // Retorna a classificação da pessoa com base em seu IMC
    public function getClassificacao()
    {
        $imc = $this->calcularIMC();
        if ($imc < 18.5) {
            return 'Magreza';
        } else if ($imc < 25) {
            return 'Normal';
        } else if ($imc < 30) {
            return 'Sobrepeso';
        } else {
            return 'Obesidade';
        }
    }

    public function calcularPesoIdeal()
    {
        $pesoIdeal = 24.9 * ($this->altura * $this->altura);
        return round($pesoIdeal, 2);
    }

}
