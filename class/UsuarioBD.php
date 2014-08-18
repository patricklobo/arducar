<?php
//carrega todas as classes do diretorio "class" (apenas os que ainda não foram carregados, utilizando o "require_once") 
foreach (glob("*.php") as $filename) {
    require_once $filename;
}

class UsuarioBD {

    private $conexao;
    private $usuario;
    private $vetUsuario;
    private $sql = null;
    private $msg = null;

    function __construct() {
        $this->conexao = new Conexao ();
        $this->conexao->conectar();
    }

    //retorna um vetor de objetos, contendo todos os objetos usuarios do banco.
    public function getUsuario() {
    }

    //retorna um objeto usuario pelo ID
    public function getUsuarioUni($idusuario) {
    }
    
    //insere, atualiza e deleta um registro no banco.
    public function setUsuario($operacao, $usuario) {
        switch ($operacao) {
            case 'I' :
                
                break;

            case 'A' :


                break;

            case 'D' :


                break;

            default :
                break;
        }
    }

}
