<?php

//Bloqueia se tetar acessar o arquivo diretamente
if (!defined('BASEPATH'))
    exit('Acesso Negado');

/**
 * Classe: Login
 * Finalidade: 
 * Autor: Grupo PSI - Diego Rodrigues|Graziella Arca|Leonardo Miyamoto|Marcos Soares
 * Data de Criação: 17/03/2012
 */
class Login extends CI_Model {

    private $usuario = null;
    private $senha   = null;

    /**
     * Valida usuario e senha
     * $objeto = dados do usuario
     * @retorna <boleano>
     */
    public function validar($objeto) {

        $sql = "
            SELECT 
                * 
            FROM  
                pessoas
            INNER JOIN
                usuarios
            ON 
                pessoas.idPessoa = usuarios.idPessoa
            WHERE
                usuarios.usuario = '$objeto->usuario' and
                usuarios.senha   = '$objeto->senha'
                
        ";
        $query = $this->query->setQuery($sql);
        $resultado = $this->query->numRows($query);

        if ($resultado == '0') {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Obtem dados do usuario
     * $objeto = dados de usuario para validação
     * @retorna <objeto>
     */
    public function obterDadosUsuarios($objeto) {

        $sql = "
            SELECT 
                *,
                pessoas.nome AS pessoaNome,
                acessos.nome AS acessoNome
            FROM  
                pessoas
            INNER JOIN
                usuarios
            ON 
                pessoas.idPessoa = usuarios.idPessoa
            INNER JOIN
                acessos
            ON
                usuarios.idAcesso = acessos.idAcesso
            WHERE
                usuarios.usuario = '$objeto->usuario' and
                usuarios.senha   = '$objeto->senha'
                
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