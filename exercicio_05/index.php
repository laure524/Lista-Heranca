<?php

class ContaBancaria {
    public $titular;
    public $saldo;

    public function __construct($titular, $saldoInicial = 0.0) {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    public function depositar($valor) {
        if ($valor > 0) {
            $this->saldo += $valor;
            echo "Depósito de R$ " . number_format($valor, 2, ',', '.') . " realizado com sucesso para {$this->titular}.\n";
        } else {
            echo "Valor de depósito inválido.\n";
        }
    }

    public function sacar($valor) {
        // Item 1: Impedir saques superiores ao saldo disponível
        if ($valor > $this->saldo) {
            echo "Falha no saque: Saldo insuficiente para sacar R$ " . number_format($valor, 2, ',', '.') . ". Saldo atual: R$ " . number_format($this->saldo, 2, ',', '.') . "\n";
            return false;
        }

        if ($valor <= 0) {
            echo "Valor de saque inválido.\n";
            return false;
        }

        $this->saldo -= $valor;
        echo "Saque de R$ " . number_format($valor, 2, ',', '.') . " realizado com sucesso.\n";
        return true;
    }

    public function consultarSaldo() {
        echo "Titular: {$this->titular} | Saldo Atual: R$ " . number_format($this->saldo, 2, ',', '.') . "\n";
    }
}

class ContaCorrente extends ContaBancaria {
    public $limite;

    public function __construct($titular, $saldoInicial, $limite) {
        parent::__construct($titular, $saldoInicial);
        $this->limite = $limite;
    }

    public function usarLimite($valor) {
        // Lógica específica para uso de limite se necessário
    }
}

class ContaPoupanca extends ContaBancaria {
    public $taxaRendimento;

    public function __construct($titular, $saldoInicial, $taxaRendimento) {
        parent::__construct($titular, $saldoInicial);
        $this->taxaRendimento = $taxaRendimento;
    }

    public function aplicarRendimento() {
        $rendimento = $this->saldo * ($this->taxaRendimento / 100);
        $this->saldo += $rendimento;
        echo "Rendimento de {$this->taxaRendimento}% aplicado. Novo saldo: R$ " . number_format($this->saldo, 2, ',', '.') . "\n";
    }
}

// --- Testando os Cenários Pedidos ---

// Criando a conta com saldo inicial de R$ 1.000,00
$conta = new ContaBancaria("Carlos Eduardo", 1000.00);

echo "=== ESTADO INICIAL ===\n";
$conta->consultarSaldo();

// --- 2. Com saldo de R$ 1.000,00, deposite R$ 500,00 e saque R$ 200,00 ---
echo "\n=== PASSO 2: Depósito e Saque Válido ===\n";
$conta->depositar(500.00); // Saldo vai para 1500.00
$conta->sacar(200.00);     // Saldo vai para 1300.00
$conta->consultarSaldo();

// --- 3. Tente sacar R$ 2.000,00; comprove que foi recusada e o saldo permaneceu R$ 1.300,00 ---
echo "\n=== PASSO 3: Tentativa de Saque Acima do Saldo ===\n";
$conta->sacar(2000.00);    // Deve recusar, pois 2000 é maior que 1300

echo "\nComprovando saldo final:\n";
$conta->consultarSaldo();  // Deve exibir exatamente R$ 1.300,00