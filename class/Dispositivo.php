<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dispositivo
 *
 * @author patricklobo
 */
require_once 'Acao.php';
class Dispositivo {
    private $criado;
    
    public function getCriado() {
        return $this->criado;
    }

    public function setCriado($criado) {
        $this->criado = $criado;
    }


}
