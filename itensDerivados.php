<?php

require_once "ItemCardapio.php";

class Pizza extends ItemCardapio {
    private $ingredientes;
    private $quantidadeDisponivel;
    private $tamanho; 
  
    public function __construct($id, $nome, $preco, $quantidadeDisponivel, $pedido, $ingredientes, $tamanho) {
      parent::__construct($id, $nome, $preco, $quantidadeDisponivel, $pedido);
      $this->setIngredientes($ingredientes);
    }
  
    public function getIngredientes() {
      return $this->ingredientes;
    }
  
    public function setIngredientes($ingredientes) {
      $this->ingredientes = $ingredientes;
    }
  
    public function getTamanho() {
      return $this->tamanho;
    }
  
    public function setTamanho($tamanho) {
      $this->tamanho = $tamanho;
    }
  
    public function calcularTaxaEntrega() {
      switch ($this->tamanho) {
        case 'pequena':
          return 5.0;
        case 'media':
          return 7.5;
        case 'grande':
          return 10.0;
        default:
          return 0.0; //
      }
    }
  
    public function precoFinal() {
      return $this->getPreco() + $this->calcularTaxaEntrega();
    }
  }
  
  //CLASSE MASSA
  class Massa extends ItemCardapio {
    private $ingredientes;
    private $tamanho;
  
    public function __construct($id, $nome, $preco, $quantidadeDisponivel, $descricao, $ingredientes, $tamanho) {
      parent::__construct($id, $nome, $preco, $quantidadeDisponivel, $descricao);
      $this->ingredientes = $ingredientes;
    }
  
    public function getIngredientes() {
      return $this->ingredientes;
    }
  
    public function setIngredientes($ingredientes) {
      $this->ingredientes = $ingredientes;
    }
  
    public function getTamanho() {
      return $this->tamanho;
    }
  
    public function setTamanho($tamanho) {
      $this->tamanho = $tamanho;
    }
  
    public function precoFinal() {
      return $this->getPreco();
    }
  }
  
  //CLASSE SALADA
  class Salada extends ItemCardapio {
    private $ingredientes;
    private $temProteina;
    
    public function __construct($id, $nome, $preco, $quantidadeDisponivel, $pedido, $ingredientes, $temProteina) {
      parent::__construct($id, $nome, $preco, $quantidadeDisponivel, $pedido);
      $this->setIngredientes($ingredientes);
      $this->setTemProteina($temProteina);
    }
    
    public function getIngredientes() {
      return $this->ingredientes;
    }
    
    public function setIngredientes($ingredientes) {
      $this->ingredientes = $ingredientes;
    }
    
    public function getTemProteina() {
      return $this->temProteina;
    }
    
    public function setTemProteina($temProteina) {
      $this->temProteina = $temProteina;
    }
    
    public function aplicaDesconto() {
      if (!$this->getTemProteina()) {
        return false;
      }
      return true;
    }
  }

?>