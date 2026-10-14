<?php

class Entrega {
    public $codigo;
    public $destino;
    public $distancia; // em km

    public function __construct($codigo, $destino, $distancia) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->distancia = $distancia;
    }

    public function exibirDados() {
        echo "Código: {$this->codigo} | Destino: {$this->destino} | Distância: {$this->distancia} km\n";
    }
}

class EntregaMoto extends Entrega {
    public $placaMoto;
    public $nomeMotoboy;

    public function __construct($codigo, $destino, $distancia, $placaMoto, $nomeMotoboy) {
        parent::__construct($codigo, $destino, $distancia);
        $this->placaMoto = $placaMoto;
        $this->nomeMotoboy = $nomeMotoboy;
    }

    public function realizarEntrega() {
        echo "Entrega de moto iniciada para {$this->destino} por {$this->nomeMotoboy} (Moto: {$this->placaMoto}).\n";
    }
}

class EntregaDrone extends Entrega {
    public $modeloDrone;
    public $bateriaPercentual;

    public function __construct($codigo, $destino, $distancia, $modeloDrone, $bateriaPercentual) {
        parent::__construct($codigo, $destino, $distancia);
        $this->modeloDrone = $modeloDrone;
        $this->bateriaPercentual = $bateriaPercentual;
    }

    public function realizarEntrega() {
        // Item 1: Impedir entregas por drone com distância superior a 20 km
        if ($this->distancia > 20) {
            echo "Falha: A distância de {$this->distancia} km excede o limite máximo de 20 km para entregas por drone.\n";
            return false;
        }

        echo "Drone ({$this->modeloDrone}) voando com sucesso para {$this->destino} ({$this->distancia} km).\n";
        return true;
    }
}

// --- Testes ---
echo "=== TESTE MOTO ===\n";
$entregaMoto = new EntregaMoto("M-100", "Bairro Boa Vista", 15.0, "XYZ-9876", "Marcos Paulo");
$entregaMoto->exibirDados();
$entregaMoto->realizarEntrega();

// --- 2. Teste do Drone: 8 km (válido) e 25 km (inválido) ---
echo "\n=== TESTE DRONE - 8 KM (VÁLIDO) ===\n";
$droneValido = new EntregaDrone("D-201", "Centro", 8.0, "DJI Air 3", 90);
$droneValido->exibirDados();
$droneValido->realizarEntrega();

echo "\n=== TESTE DRONE - 25 KM (INVÁLIDO) ===\n";
$droneInvalido = new EntregaDrone("D-202", "Zona Rural", 25.0, "DJI Matrice", 100);
$droneInvalido->exibirDados();
$droneInvalido->realizarEntrega();


// --- 3. Hierarquia e Identificação (Item 3) ---
/*
==================================================
DIAGRAMA DA HIERARQUIA:
==================================================
           [Entrega] (Classe Base)
           /       \
[EntregaMoto]     [EntregaDrone] (Subclasses)

==================================================
IDENTIFICAÇÃO DE MEMBROS:
==================================================
1. Membros da classe base (Entrega):
   - Atributos herdados: $codigo, $destino, $distancia.
   - Métodos herdados: __construct(), exibirDados().

2. Membros específicos da subclasse EntregaMoto:
   - Atributos específicos: $placaMoto, $nomeMotoboy.
   - Métodos específicos: realizarEntrega().

3. Membros específicos da subclasse EntregaDrone:
   - Atributos específicos: $modeloDrone, $bateriaPercentual.
   - Métodos específicos: realizarEntrega() (com validação de distância).
*/