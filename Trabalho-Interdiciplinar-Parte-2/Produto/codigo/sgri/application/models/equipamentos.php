<?php
//Bloqueia se tetar acessar o arquivo diretamente
if (!defined('BASEPATH'))
    exit('Acesso Negado');

/**
* Classe: Equipamentos
* Finalidade: Obtem acesso ao Banco Equipamentos
* Autor: Grupo PSI - Diego Rodrigues|Graziella Arca|Leonardo Miyamoto|Marcos Soares
* Data de Criação: 17/03/2012
*/
class Equipamentos extends CI_Model {

    private $idEquipamento    = null;
    private $codigoPatrimonio = null;
    private $nome             = null;
    private $descricao        = null;
    private $status           = null;
    private $opcao            = null;

    /**
    * Insere registros
    * $objeto = valores a serem inseridos
    * @retorna <objeto>
    */
    public function inserir($objeto) {
        
        $sql = "
            INSERT INTO
                equipamentos
             values(
                '',
                '$objeto->codigoPatrimonio',
                '$objeto->nome',
                '$objeto->descricao',
                '$objeto->dataCadastro',
                '$objeto->status'
                )
        ";

        $query = $this->query->setQuery($sql);
        return $query;
        //$this->db->insert('Equipamentos', $objeto); 
    }

    /**
    * Atualiza Registros
    * $objeto = valores a serem atualizados
    * @retorna <objeto>
    */
    public function atualizar($objeto) {
        
        $sql = "
            UPDATE 
                equipamentos
            SET
                nome             = '$objeto->nome',
                codigoPatrimonio = '$objeto->codigoPatrimonio',
                descricao        = '$objeto->descricao',
                status           = '$objeto->status'
            WHERE
                idEquipamento   = '$objeto->idEquipamento'
        ";

        $query = $this->query->setQuery($sql);
        return $query;
    }

    /**
    * Verifica se existe equipamento repetido
    * $objeto = valores a serem verificados
    * @retorna <boleano>
    */
    public function verificaNomeEquipamento($objeto) {

        $sql = "
            SELECT *
                FROM
             equipamentos
                WHERE
             nome             = '$objeto->nome' ||
             codigoPatrimonio = '$objeto->codigoPatrimonio'   
        ";

        $query = $this->query->setQuery($sql);

        $resultado = $this->query->numRows($query);
        
        if ( $resultado == '0' ) {
            return true;
        } else {
            return false;
        }
    }

    /**
    * Obtem todos equipamentos
    * Sem parametros
    * @retorna <objeto>
    */
    public function obterEquipamentos() {
        
        $sql    = "SELECT * FROM equipamentos order by nome ASC";
        $query  = $this->query->setQuery($sql);
        return $query;
    }

    /**
    * Obtem um unico equipamento
    * $objeto = um unico id a ser pesquisado
    * @retorna <objeto>
    */
    public function obterPorEquipamentos($objeto) {
        
        $sql    = "SELECT * FROM equipamentos WHERE idEquipamento = '$objeto->idEquipamento'";
        $query  = $this->query->setQuery($sql);
        return $query;
    }

    /**
    * Obtem um unico equipamento
    * $objeto = objeto contendo o id do equipamento para detalhe
    * @retorna <objeto>
    */
    public function detalhe($objeto) {
        
        $sql = "
            SELECT *
                FROM
             equipamentos
                WHERE
             idEquipamento = '$objeto->idEquipamento'
        ";

        $query = $this->query->setQuery($sql);
        return $query;
    }

    /**
    * Deleta equipamentos
    * $objeto = objeto com os itens a serem deletados
    * @retorna <objeto>
    */
    public function deletar($objeto) {
        
        $sql = "
            DELETE FROM
                equipamentos
            WHERE
             idEquipamento = '$objeto->idEquipamento'
        ";

        $query = $this->query->setQuery($sql);
        return $query;
    }

    /**
    * Pesquisa registros
    * $objeto = Contem dados para pesquisa
    * @retorna <objeto>
    */
    public function pesquisar($objeto) {
        
        $sql = "
            SELECT
                *
            FROM
                equipamentos
            WHERE
                $objeto->opcao LIKE '%$objeto->nome%' order by nome ASC
        ";

        $query = $this->query->setQuery($sql);
        return $query;
    }

    /**
    * Obtem o Ultimo Equipamento
    * Sem parametros
    * @retorna <objeto>
    */
    public function obterUltimosEquipamentos() {
        
        $sql = "
            SELECT 
                *
            FROM
                equipamentos
            ORDER BY nome DESC
            LIMIT 0 , 6
                
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