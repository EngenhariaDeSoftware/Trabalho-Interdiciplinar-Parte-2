<?php

//Bloqueia se tetar acessar o arquivo diretamente
if (!defined('BASEPATH'))
    exit('Acesso Negado');

/**
 * Classe: Acessos
 * Finalidade: Obtem acesso ao Banco Acesso
 * Autor: Grupo PSI - Diego Rodrigues|Graziella Arca|Leonardo Miyamoto|Marcos Soares
 * Data de Criação: 17/03/2012
 */
class Acessos extends CI_Model {

    private $idAcesso = null;
    private $nome = null;

    /**
     * Lista todos acessos
     * Sem parametros
     * @retorna <objeto>
     */
    public function obterAcessos() {

        $sql = "SELECT * FROM  acessos";
        $query = $this->query->setQuery($sql);
        return $query;
    }

}

?>