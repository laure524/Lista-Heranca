<?php

class Funcionario {
    public $nome;
    public $cpf;
    public $salario;

    public function __construct($nome, $cpf, $salario) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->salario = $salario;
    }

    public function exibirFuncionario() {
        echo "Nome: {$this->nome} | CPF: {$this->cpf} | Salário: R$ " . number_format($this->salario, 2, ',', '.') . "\n";
    }
}

class Gerente extends Funcionario {
    public $setor;

    public function __construct($nome, $cpf, $salario, $setor) {
        parent::__construct($nome, $cpf, $salario);
        $this->setor = $setor;
    }

    public function realizarReuniao() {
        echo "{$this->nome} está realizando uma reunião no setor de {$this->setor}.\n";
    }
}

class Desenvolvedor extends Funcionario {
    public $linguagem;

    public function __construct($nome, $cpf, $salario, $linguagem) {
        parent::__construct($nome, $cpf, $salario);
        $this->linguagem = $linguagem;
    }

    public function programar() {
        echo "{$this->nome} está programando em {$this->linguagem}.\n";
    }
}

// 1 e 2. Instanciação e teste dos métodos herdados e específicos
echo "=== TESTANDO GERENTE ===\n";
$gerente = new Gerente("Ana Silva", "123.456.789-00", 9000.00, "Tecnologia");
$gerente->exibirFuncionario(); 
$gerente->realizarReuniao();   

echo "\n=== TESTANDO DESENVOLVEDOR ===\n";
$dev = new Desenvolvedor("Carlos Souza", "987.654.321-11", 6500.00, "PHP");
$dev->exibirFuncionario();     
$dev->programar();             

// 3. Teste da chamada programar() em um Gerente (deixado comentado para explicar o resultado)
/*
echo "\n=== TESTE ERRO GERENTE PROGRAMANDO ===\n";
$gerente->programar(); 
*/