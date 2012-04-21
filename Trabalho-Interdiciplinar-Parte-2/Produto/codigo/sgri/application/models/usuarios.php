<?php
//Bloqueia se tetar acessar o arquivo diretamente
if (!defined('BASEPATH'))
    exit('Acesso Negado');

/**
* Classe: Usuarios
* Finalidade: Atualiza, cadastra, deleta, lista Usuarios do sistema
* Autor: Grupo PSI - Diego Rodrigues|Graziella Arca|Leonardo Miyamoto|Marcos Soares
* Data de Criação: 17/03/2012
*/
class Usuarios extends CI_Model {

    private $idUsuario = null;
    private $usuario   = null;
    private $senha     = null;
    private $idPessoa  = null;
    private $idAcesso  = null;

    /**
    * Insere usuarios no banco
    * $objeto = dados do usuario
    * @retorna <objeto>
    */
    public function inserir($objeto) {
        
        $objeto->senha = $this->query->md5($objeto->senha);
        $sql = "
            INSERT INTO
                usuarios
             values(
                '',
                '$objeto->usuario',
                '$objeto->senha',
                '$objeto->idPessoa',
                '$objeto->idAcesso'
                )
        ";
        
        $query = $this->query->setQuery($sql);
        return $query;
    }

    /**
    * Deleta um usuario
    * $objeto = id do usuario a ser deletado
    * @retorna <objeto>
    */
    public function deletar($objeto) {
        
        $sql = "
            DELETE FROM
                usuarios
            WHERE
                idPessoa = '$objeto->idPessoa'
        ";

        $query = $this->query->setQuery($sql);
        return $query;
    }
    
    /**
    * Atualiza registros
    * $objeto = objeto para ser atualizado
    * @retorna <objeto>
    */
    public function atualizar($objeto) {
                
        if( $objeto->senha != "0" ){
            $senha    = $this->query->md5($objeto->senha);
            $rowSenha = "senha = '".$senha."',";
        }else{
            $rowSenha = " ";
        }
        
               
        $sql = "
            UPDATE 
                usuarios
            SET
                usuario       = '$objeto->usuario', $rowSenha                
                idAcesso      = '$objeto->idAcesso'
            WHERE
                idPessoa = '$objeto->idPessoa'
        ";

        $query = $this->query->setQuery($sql);
        return $query;
    }
    
    /**
    * Obtem Valor
    * $campo = nome do campo
    * @retorna <campo>
    */
    public function get($campo) {
        return $this->$campo;
    }

    /**
    * Seta um valor
    * $campo = nome do Campo, $valor = valor do campo
    * @retorna
    */
    public function set($campo, $valor) {
        $this->$campo = $valor;
    }

}

?>