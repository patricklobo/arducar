<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Historico
 *
 * @author patricklobo
 */

require_once 'Acao_Dispositivo.php';
class Historico {
   private $usuario;
   public function getUsuario() {
       return $this->usuario;
   }

   public function setUsuario($usuario) {
       $this->usuario = $usuario;
   }


}
