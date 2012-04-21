<?php

//Bloqueia se tetar acessar o arquivo diretamente
if (!defined('BASEPATH'))
    exit('Acesso Negado');

/**
* Classe: Salas
* Finalidade: Atualiza, deleta, registra, visualiza Salas de aula
* Autor: Grupo PSI - Diego Rodrigues|Graziella Arca|Leonardo Miyamoto|Marcos Soares
* Data de Criação: 17/03/2012 $auditorio
*/
class Salas extends CI_Model {

    private $idSala       = null;
    private $predio       = null;
    private $andar        = null;
    private $numero       = null;
    private $tipoSala     = null;
    private $dataCadastro = null;
    private $capacidade   = null;
    private $opcao        = null;

    /**
    * Verifica se uma sala existe
    * $objeto = dados da sala
    * @retorna <objeto>
    */
    public function verificaSalas($objeto) {

        $sql = "
            SELECT *
                FROM
             salas
                WHERE
             predio    = '$objeto->predio'  and 
             andar     = '$objeto->andar'   and 
             numero    = '$objeto->numero'  and 
             tipoSala  = '$objeto->tipoSala'
        ";

        $query     = $this->query->setQuery($sql);
        $resultado = $this->query->numRows($query);

        if ( $resultado == '0' ) {
            return true;
        } else {
            return false;
        }
    }

    /**
    * Registra uma sala
    * $objeto = dados da sala
    * @retorna <objeto>
    */
    public function inserir($objeto) {

        $sql = "
            INSERT INTO
                salas
             values(
                '',
                '$objeto->predio',
                '$objeto->andar',
                '$objeto->numero',
                '$objeto->tipoSala',
                '$objeto->capacidade',
                '$objeto->dataCadastro'
                )
        ";

        $query = $this->query->setQuery($sql);
        return $query;
    }

    /**
    * Obtem Todas as salas
    * Sem parametros
    * @retorna <objeto>
    */
    public function obterSalas() {

        $sql   = "SELECT * FROM salas";
        $query = $this->query->setQuery($sql);

        return $query;
    }

    /**
    * Deleta uma sala
    * $objeto = Id da Sala
    * @retorna <objeto>
    */
    public function deletar($objeto) {
        
        $sql = "
            DELETE FROM
                salas
            WHERE
             idSala = '$objeto->idSala'
        ";

        $query = $this->query->setQuery($sql);
        return $query;
    }

    /**
    * Pesquisa uma sala
    * $objeto = dados da sala
    * @retorna <objeto>
    */
    public function pesquisar($objeto) {
        
         $sql = "
            SELECT
                *
            FROM
                salas
            WHERE
             $objeto->opcao LIKE '%$objeto->nome%'
        ";

        $query = $this->query->setQuery($sql);
        return $query;
    }

    /**
    * Obtem uma unica sala
    * $objeto = id da unica sala
    * @retorna <objeto>
    */
    public function obterPorSalas($objeto) {
        
        $sql   = "SELECT * FROM salas WHERE idSala = '$objeto->idSala'";
        $query = $this->query->setQuery($sql);

        return $query;
    }

    /**
    * Atualiza sala de aula
    * $objeto = dados a serem atualizados
    * @retorna <objeto>
    */
    public function atualizar($objeto) {
        
        $sql = "
            UPDATE 
                salas
            SET
                predio      = '$objeto->predio',
                andar       = '$objeto->andar',
                numero      = '$objeto->numero',
                tipoSala    = '$objeto->tipoSala',
                capacidade  = '$objeto->capacidade'
            WHERE
                idSala      = '$objeto->idSala'
        ";

        $query = $this->query->setQuery($sql);
        return $query;
    }

    /**
    * Obtem as 5 ultimas salas
    * Sem parametros
    * @retorna <objeto>
    */
    public function obterUltimasSalas() {
        
        $sql = "
            SELECT
                *
            FROM
                salas
            ORDER BY idSala DESC
            LIMIT 0 , 5
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