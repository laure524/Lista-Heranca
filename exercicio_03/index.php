<?php

class Pessoa {
    public $nome;
    public $idade;
    public $email;

    public function __construct($nome, $idade, $email) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->email = $email;
    }

    public function apresentar() {
        echo "Olá, meu nome é {$this->nome}, tenho {$this->idade} anos e meu e-mail é {$this->email}.\n";
    }
}

class Aluno extends Pessoa {
    public $matricula;
    public $curso;

    public function __construct($nome, $idade, $email, $matricula, $curso) {
        parent::__construct($nome, $idade, $email);
        $this->matricula = $matricula;
        $this->curso = $curso;
    }

    public function estudar() {
        echo "O(a) aluno(a) {$this->nome} está estudando para o curso de {$this->curso}.\n";
    }
}

class Professor extends Pessoa {
    public $especialidade;
    public $salario;

    public function __construct($nome, $idade, $email, $especialidade, $salario) {
        parent::__construct($nome, $idade, $email);
        $this->especialidade = $especialidade;
        $this->salario = $salario;
    }

    public function ministrarAula() {
        echo "O(a) professor(a) {$this->nome} está ministrando aula de {$this->especialidade}.\n";
    }
}

// --- 1. Criando dois alunos e um professor com dados diferentes ---
$aluno1 = new Aluno("Mariana Lima", 20, "mariana@email.com", "2026101", "Engenharia de Software");
$aluno2 = new Aluno("Lucas Mendes", 22, "lucas@email.com", "2026102", "Análise e Desenvolvimento de Sistemas");
$professor = new Professor("Roberto Carlos", 45, "roberto@email.com", "Banco de Dados", 7500.00);

// --- 2. Executando apresentar() e os métodos específicos de cada objeto ---
echo "=== TESTANDO ALUNO 1 ===\n";
$aluno1->apresentar();
$aluno1->estudar();

echo "\n=== TESTANDO ALUNO 2 ===\n";
$aluno2->apresentar();
$aluno2->estudar();

echo "\n=== TESTANDO PROFESSOR ===\n";
$professor->apresentar();
$professor->ministrarAula();



/*
Explicacao item 3:
O método apresentar() funciona nas subclasses (Aluno e Professor) devido ao conceito 
de herança em Programação Orientada a Objetos (POO). Quando usamos a palavra-chave 
'extends', a subclasse herda todos os atributos e métodos públicos e protegidos da 
classe pai (Pessoa). Como a classe Pessoa possui o método apresentar(), as subclasses 
Aluno e Professor ganham acesso automático a esse método, podendo executá-lo sem 
a necessidade de reescrevê-lo.
*/