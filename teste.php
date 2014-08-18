<?php

/* 
 * Aqui esse diretorio é usado para testes
 * Basta escrever o codigo e acesssar http://localhost/nomedoprojeto/teste/
 */


////ativa o debug, para mostrar os erros
////Não confunda erro com avisos do PHP.

//require_once ("./control/erro.php");

//carrega todas as classes do diretorio "class"
foreach (glob("./class/*.php") as $filename) {
    require_once $filename;
}



//exemplo de teste de uma classe

//estancia um objeto e preenche os atributos
$pessoa = new Pessoa();
$pessoa->setNome("Patrick");
$pessoa->setEmail("contato@patricklobo.com");
$pessoa->setTelefone("3232-1931");

//insere no banco o objeto pessoa 
$pessoaBD = new PessoaBD();

//caso a tabela seja AUTOINCREMENTE o metodo retorna o ID gerado pelo INSERT, salvando na variavel ID.
$idpessoa = $pessoaBD->setPessoa("I", $pessoa);

//Usando o ID gerado, carrega o obejto na memoria novamente, dessa vez usando o o metodo get do Objeto BD, que retorna outro objeto Pessoa

$pessoaNova = new Pessoa();
$pessoaNova = $pessoaBD->getPessoaUni($idpessoa);

echo $pessoaNova->getId()." <br> "; //<br> quebra de linha
echo $pessoaNova->getNome()." <br> "; //<br> quebra de linha
echo $pessoaNova->getEmail()." <br> "; //<br> quebra de linha
echo $pessoaNova->getTelefone()." <br> "; //<br> quebra de linha

//altera o NOME e salva novamente no BANCO


$pessoaNova->setNome("Rodrigo");
echo $pessoaBD->setPessoa("A", $pessoaNova); //Passando "A" de Atualizar como parametro.

//Caso queira deletar o objeto do Banco.
//$pessoaBD->setPessoa("D", $pessoaNova); //Passando D como parametro


