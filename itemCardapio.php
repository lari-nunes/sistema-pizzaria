<?php

class ItemCardapio {
  private $id;
  private $nome;
  private $preco;
  private $quantidadeDisponivel;
  private $pedido;

  public function __construct($id, $nome, $preco, $quantidadeDisponivel, $pedido) {
    $this->setId($id);
    $this->setNome($nome);
    $this->setPreco($preco);
    $this->setQuantidadeDisponivel($quantidadeDisponivel);
    $this->setPedido($pedido);
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    if (!is_numeric($id) || $id < 0) {
      throw new InvalidArgumentException('ID inválido.');
    }
    $this->id = $id;
  }

  public function getNome() {
    return $this->nome;
  }

  
  public function setNome($nome) {
    if (strlen($nome) < 3) {
      throw new InvalidArgumentException('Nome inválido.');
    }
    $this->nome = $nome;
  }

  public function getPreco() {
    return $this->preco;
  }

  public function setPreco($preco) {
    if (!is_numeric($preco) || $preco < 0) {
      throw new InvalidArgumentException('Preço inválido.');
    }
    $this->preco = $preco;
  }

  public function getQuantidadeDisponivel() {
    return $this->quantidadeDisponivel;
  }

  public function setQuantidadeDisponivel($quantidadeDisponivel) {
    if (!is_numeric($quantidadeDisponivel) || $quantidadeDisponivel < 0) {
      throw new InvalidArgumentException('Quantidade disponível inválida.');
    }
    $this->quantidadeDisponivel = $quantidadeDisponivel;
  }

  public function getPedido() {
    return $this->pedido;
  }

  public function setPedido($pedido)  {
    $this->pedido = $pedido;
  }

  public function calcularPrecoTotal() {
    return $this->preco * $this->pedido;
  }
}

?>