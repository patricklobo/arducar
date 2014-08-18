<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Localizacao
 *
 * @author patricklobo
 */
class Localizacao {
   private $id;
   private $dispositivo;
   private $longitude;
   private $latitude;
   private $data;
   
   public function getId() {
       return $this->id;
   }

   public function getDispositivo() {
       return $this->dispositivo;
   }

   public function getLongitude() {
       return $this->longitude;
   }

   public function getLatitude() {
       return $this->latitude;
   }

   public function getData() {
       return $this->data;
   }

   public function setId($id) {
       $this->id = $id;
   }

   public function setDispositivo($dispositivo) {
       $this->dispositivo = $dispositivo;
   }

   public function setLongitude($longitude) {
       $this->longitude = $longitude;
   }

   public function setLatitude($latitude) {
       $this->latitude = $latitude;
   }

   public function setData($data) {
       $this->data = $data;
   }


}
