<?php 
class Cart {
    private $tamanho;
    private $quantidade;
    private $valor;
    private $id;
    private $produtosId;

    public function getProdutosId(){
        return $this->produtosId;
    }
    public function setProdutosId($produtosId){
        return $this->produtosId = $produtosId;
    }
    public function getTamanho(){
        return $this->tamanho;
    }
    public function setTamanho($tamanho){
        return $this->tamanho = $tamanho;
    }
    public function getQuantidade(){
        return $this->quantidade;
    }
    public function setQuantidade($quantidade){
        return $this->quantidade = $quantidade;
    }
    public function getValor(){
        return $this->valor;
    }
    public function setValor($valor){
        return $this->valor = $valor;
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        return $this->id = $id;
    }
}
?>