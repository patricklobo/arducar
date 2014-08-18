<?php

class Usuario{
    
    private $id;
    private $nome;
    private $senha;
    private $criado;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function Salvar(){
        
    }
    
}
