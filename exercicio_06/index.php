<?php

class Pessoa {
    public $nome;
    public $email;

    public function __construct($nome, $email) {
        $this->nome = $nome;
        $this->email = $email;
    }

    public function apresentar() {
        echo "Olá! Meu nome é {$this->nome} e meu e-mail é {$this->email}.\n";
    }
}

// 1. Funcionario herda de Pessoa
class Funcionario extends Pessoa {
    public $salario;
    public $matricula;

    public function __construct($nome, $email, $salario, $matricula) {
        parent::__construct($nome, $email);
        $this->salario = $salario;
        $this->matricula = $matricula;
    }

    public function trabalhar() {
        echo "O(a) funcionário(a) {$this->nome} está trabalhando (Matrícula: {$this->matricula}).\n";
    }
}

// Programador herda de Funcionario (que herda de Pessoa - 3 níveis)
class Programador extends Funcionario {
    public $linguagemPrincipal;

    public function __construct($nome, $email, $salario, $matricula, $linguagemPrincipal) {
        parent::__construct($nome, $email, $salario, $matricula);
        $this->linguagemPrincipal = $linguagemPrincipal;
    }

    public function programar() {
        echo "{$this->nome} está escrevendo códigos em {$this->linguagemPrincipal}.\n";
    }
}

// Designer herda de Funcionario (também 3 níveis)
class Designer extends Funcionario {
    public $ferramentaPrincipal;

    public function __construct($nome, $email, $salario, $matricula, $ferramentaPrincipal) {
        parent::__construct($nome, $email, $salario, $matricula);
        $this->ferramentaPrincipal = $ferramentaPrincipal;
    }

    public function criarLayout() {
        echo "{$this->nome} está criando um layout utilizando {$this->ferramentaPrincipal}.\n";
    }
}

// --- 2. Crie um Programador e execute apresentar(), trabalhar() e programar() ---
echo "=== TESTANDO O PROGRAMADOR ===\n";
$dev = new Programador("Beatriz Costa", "beatriz@email.com", 7000.00, "M-8492", "PHP");

$dev->apresentar();  // Método herdado da classe Pessoa
$dev->trabalhar();   // Método herdado da classe Funcionario
$dev->programar();   // Método específico da classe Programador


// --- 3. Identificação da classe onde cada método foi declarado ---
/*
EXPLICAÇÃO DO ITEM 3 (Onde cada método foi declarado):
1. apresentar(): Declarado na classe base 'Pessoa'. A classe 'Programador' herda 
   esse método indiretamente através da cadeia de herança (Programador -> Funcionario -> Pessoa).
2. trabalhar(): Declarado na classe intermediária 'Funcionario'. A classe 'Programador' 
   herda esse método diretamente de 'Funcionario'.
3. programar(): Declarado diretamente na própria classe 'Programador'.
*/