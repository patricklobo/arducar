<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Relacao
 *
 * @author patricklobo
 */
class Relacao {
    private $id;
    private $usuario;
    private $dipositivo;
    private $criado;
    
    public function getId() {
        return $this->id;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getDipositivo() {
        return $this->dipositivo;
    }

    public function getCriado() {
        return $this->criado;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setDipositivo($dipositivo) {
        $this->dipositivo = $dipositivo;
    }

    public function setCriado($criado) {
        $this->criado = $criado;
    }


}
