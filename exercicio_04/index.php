<?php

class Produto {
    public $nome;
    public $preco;
    public $codigo;

    public function __construct($nome, $preco, $codigo) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->codigo = $codigo;
    }

    public function exibirProduto() {
        echo "Produto: {$this->nome} | Código: {$this->codigo} | Preço: R$ " . number_format($this->preco, 2, ',', '.') . "\n";
    }

    public function aplicarDesconto($percentual) {
        // Item 3: Validação do percentual (desconto válido vs negativo)
        if ($percentual < 0) {
            echo "Aviso: O percentual de desconto ({$percentual}%) é inválido. O preço não foi alterado.\n";
            return;
        }

        $valorDesconto = $this->preco * ($percentual / 100);
        $this->preco -= $valorDesconto;
        
        echo "Desconto de {$percentual}% aplicado com sucesso!\n";
    }
}

class Livro extends Produto {
    public $autor;
    public $isbn;

    public function __construct($nome, $preco, $codigo, $autor, $isbn) {
        parent::__construct($nome, $preco, $codigo);
        $this->autor = $autor;
        $this->isbn = $isbn;
    }

    public function exibirProduto() {
        parent::exibirProduto();
        echo "Autor: {$this->autor} | ISBN: {$this->isbn}\n";
    }
}

class Eletronico extends Produto {
    public $marca;
    public $garantiaMeses;

    public function __construct($nome, $preco, $codigo, $marca, $garantiaMeses) {
        parent::__construct($nome, $preco, $codigo);
        $this->marca = $marca;
        $this->garantiaMeses = $garantiaMeses;
    }

    public function exibirProduto() {
        parent::exibirProduto();
        echo "Marca: {$this->marca} | Garantia: {$this->garantiaMeses} meses\n";
    }
}

// --- 1. Criando um Livro de R$ 100,00 e um Eletrônico de R$ 2.000,00 ---
$livro = new Livro("O Senhor dos Anéis", 100.00, "LIV-001", "J.R.R. Tolkien", "978-8595084759");
$eletronico = new Eletronico("Smartphone", 2000.00, "ELE-002", "Samsung", 12);

// --- 2. Aplicando descontos de 10% e 15% (exibindo antes e depois) ---
echo "=== TESTANDO LIVRO (Desconto de 10%) ===\n";
echo "Preço ANTES:\n";
$livro->exibirProduto();

$livro->aplicarDesconto(10);

echo "Preço DEPOIS:\n";
$livro->exibirProduto();


echo "\n=== TESTANDO ELETRÔNICO (Desconto de 15%) ===\n";
echo "Preço ANTES:\n";
$eletronico->exibirProduto();

$eletronico->aplicarDesconto(15);

echo "Preço DEPOIS:\n";
$eletronico->exibirProduto();


// --- 3. Validando percentual inválido (negativo) ---
echo "\n=== TESTE DE VALIDAÇÃO (Desconto Negativo) ===\n";
echo "Tentando aplicar -5% de desconto no livro:\n";
$livro->aplicarDesconto(-5);
echo "Preço atual do livro (deve continuar inalterado):\n";
$livro->exibirProduto();