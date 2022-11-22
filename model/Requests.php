<?php

class Requests{

    private $valor_pedido;
    private $forma_pagamento;
    private $data;
    private $id;


    public function setValor_pedido($valor_pedido){
            return $this->valor_pedido = $valor_pedido;
    }
    public function getValor_pedido(){
        return $this->valor_pedido;
    }
    public function setForma_pagamento($forma_pagamento){
        return $this->forma_pagamento = $forma_pagamento;
    }
    public function getForma_pagamento(){
        return $this->forma_pagamento;
    }
    public function setId($id){
        return $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function setData($data){
        return $this->data = $data;
    }
    public function getData(){
        return $this->data;
    }
    
}




?>