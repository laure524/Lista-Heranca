<?php

class Veiculo {
    public $marca;
    public $modelo;
    public $ano;

    public function __construct($marca, $modelo, $ano) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
    }

    public function exibirDados() {
        echo "Marca: {$this->marca} | Modelo: {$this->modelo} | Ano: {$this->ano}\n";
    }
}

class Carro extends Veiculo {
    public $quantidadePortas;

    public function __construct($marca, $modelo, $ano, $quantidadePortas) {
        parent::__construct($marca, $modelo, $ano);
        $this->quantidadePortas = $quantidadePortas;
    }

    public function exibirDados() {
        parent::exibirDados();
        echo "Quantidade de portas: {$this->quantidadePortas}\n";
    }
}

class Moto extends Veiculo {
    public $cilindradas;

    public function __construct($marca, $modelo, $ano, $cilindradas) {
        parent::__construct($marca, $modelo, $ano);
        $this->cilindradas = $cilindradas;
    }

    public function exibirDados() {
        parent::exibirDados();
        echo "Cilindradas: {$this->cilindradas} cc\n";
    }
}

// --- 1. Criando um objeto de cada subclasse com dados diferentes ---
$carro = new Carro("Toyota", "Corolla", 2022, 4);
$moto = new Moto("Honda", "CB 500", 2023, 500);

// --- 2. Executando exibirDados() nos dois objetos ---
echo "=== DADOS DO CARRO ===\n";
$carro->exibirDados();

echo "\n=== DADOS DA MOTO ===\n";
$moto->exibirDados();


// --- 3. Identificação de atributos herdados e específicos (Item 3) ---
/*
==================================================
IDENTIFICAÇÃO DE ATRIBUTOS:
==================================================
1. Atributos herdados (presentes na classe base 'Veiculo' e compartilhados pelas subclasses):
   - $marca
   - $modelo
   - $ano

2. Atributos específicos (declarados exclusivamente em cada subclasse):
   - Na classe Carro: $quantidadePortas
   - Na classe Moto: $cilindradas
*/