<?php
//carrega todas as classes do diretorio "class" (apenas os que ainda não foram carregados, utilizando o "require_once") 
foreach (glob("*.php") as $filename) {
    require_once $filename;
}

class PessoaBD {

    private $conexao;
    private $pessoa;
    private $vetPessoa;
    private $sql = null;
    private $msg = null;

    function __construct() {
        $this->conexao = new Conexao ();
        $this->conexao->conectar();
    }

    //retorna um vetor de objetos, contendo todos os objetos pessoas do banco.
    public function getPessoa() {
        $this->vetPessoa = array();
        $this->sql = "SELECT * FROM pessoa ORDER BY idpessoa";
        $this->conexao->execSQL($this->sql);

        while ($row = $this->conexao->listarResultados()) {
            $this->pessoa = new Pessoa ();
            $this->pessoa->setId($row ['idpessoa']);
            $this->pessoa->setNome($row ['nome']);
            $this->pessoa->setEmail($row ['email']);
            $this->pessoa->setTelefone($row ['telefone']);

            array_push($this->vetPessoa, $this->pessoa);
        }
        return $this->vetPessoa;
    }

    //retorna um objeto pessoa pelo ID
    public function getPessoaUni($idpessoa) {
        $this->sql = "SELECT * FROM pessoa WHERE idpessoa = '$idpessoa' ";
        $this->conexao->execSQL($this->sql);

        while ($row = $this->conexao->listarResultados()) {
            $this->pessoa = new Pessoa ();
            $this->pessoa->setId($row ['idpessoa']);
            $this->pessoa->setNome($row ['nome']);
            $this->pessoa->setEmail($row ['email']);
            $this->pessoa->setTelefone($row ['telefone']);
        }
        return $this->pessoa;
    }
    
    //insere, atualiza e deleta um registro no banco.
    public function setPessoa($operacao, $pessoa) {
        $idpessoa = $pessoa->getId();
        $nome = $pessoa->getNome();
        $email = $pessoa->getEmail();
        $telefone = $pessoa->getTelefone();
        switch ($operacao) {
            case 'I' :
                $this->sql = "INSERT INTO `pessoa`(`nome`,`email`,`telefone`)
				 VALUES ('$nome','$email','$telefone')";
                $this->conexao->execSQL($this->sql);
                return $this->conexao->getId();
                
                break;

            case 'A' :

                $this->sql = "UPDATE `pessoa` SET
				 `nome`='$nome',
                                 `telefone`='$telefone',
				 `email`='$email' WHERE idpessoa = '$idpessoa'";
                $this->conexao->execSQL($this->sql);

                break;

            case 'D' :

                $this->sql = "DELETE FROM `pessoa` WHERE idpessoa = '$idpessoa'";
                $this->conexao->execSQL($this->sql);

                break;

            default :
                break;
        }
    }

}
