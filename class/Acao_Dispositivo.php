<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HistoricoModel
 *
 * @author patricklobo
 */
class Acao_Dispositivo {
   private $id;
   private $acao;
   private $dispositivo;
   private $data;
   
   public function getId() {
       return $this->id;
   }

   public function getAcao() {
       return $this->acao;
   }

   public function getDispositivo() {
       return $this->dispositivo;
   }

   public function getData() {
       return $this->data;
   }

   public function setId($id) {
       $this->id = $id;
   }

   public function setAcao($acao) {
       $this->acao = $acao;
   }

   public function setDispositivo($dispositivo) {
       $this->dispositivo = $dispositivo;
   }

   public function setData($data) {
       $this->data = $data;
   }


}
