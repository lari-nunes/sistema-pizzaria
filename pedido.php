<?php

require_once "itensDerivados.php";
require_once "itemCardapio.php";

class Pedido {
  private $identificador;
  private $itens = [];

  public function __construct($identificador) {
    $this->identificador = $identificador;
  }

  public function adicionarItem($item) {
    $this->itens[] = $item;
  }

  public function removerItem($item) {
    $key = array_search($item, $this->itens);
    if ($key !== false) {
      unset($this->itens[$key]);
    }
  }

  public function calcularPrecoTotal() {
    $precoTotal = 0;
    foreach ($this->itens as $item) {
      $precoTotal += ($item->getPreco() * $item->getQuantidadeDisponivel());
    }
    $taxaEntrega = $precoTotal > 50 ? 0 : 10;
    $precoTotal += $taxaEntrega;
    return $precoTotal;
  }

  public function imprimirPedido() {
    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-<br>";
    echo "Pedido Número: {$this->identificador}<br>";
    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-<br>";
  
    foreach ($this->itens as $item) {
      echo "Item do Pedido: {$item->getId()}<br>";
      echo "Descrição do pedido: {$item->getNome()}<br>";
      echo "Valor: {$item->getPreco()}<br>";
      echo "Quantidade: {$item->getQuantidadeDisponivel()}<br>";
    
      if ($item instanceof Pizza) {
        $ingredientes = is_array($item->getIngredientes()) ? $item->getIngredientes() : [$item->getIngredientes()];
        echo "Ingredientes: " . implode(', ', $ingredientes) . "<br>";
      } elseif ($item instanceof Massa || $item instanceof Salada) {
        echo "Ingredientes: {$item->getIngredientes()}<br>";
      }
    
      echo "-----------------------------------------------<br>";
    }
  
    echo "Preço total: $" . $this->calcularPrecoTotal() . "<br>";
    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-<br>";
  }
}

$pizzaMargherita = new Pizza(1, "Pizza de Margherita", 30, 5, " ", " molho, queijo, manjeiricão", false, " P ");
$espagueteBolonhesa = new Massa(2, "Espaguete à bolonhesa", 25, 10, " ", "espaguete, molho à bolonhesa"," M ");
$saladaCaesar = new Salada(3, "Salada Caesar", 20, 8, " ", "alface, croutons, queijo parmesão", false);

$pedido = new Pedido(1);
$pedido->adicionarItem($pizzaMargherita);
$pedido->adicionarItem($espagueteBolonhesa);
$pedido->adicionarItem($saladaCaesar);
$pedido->imprimirPedido();



?>