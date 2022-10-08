<?php

class Requests{

    private $valor_pedido;
    private $forma_pagamento;
    private $data;


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
    public function setData($data){
        return $this->data = $data;
    }
    public function getData(){
        return $this->data;
    }
    
}




?>