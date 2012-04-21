<?php

//Bloqueia se tetar acessar o arquivo diretamente
if (!defined('BASEPATH'))
    exit('Acesso Negado');

/**
 * Classe: Query
 * Finalidade: Extende de Todos os models e faz conversoes de datas
 * Autor: Grupo PSI - Diego Rodrigues|Graziella Arca|Leonardo Miyamoto|Marcos Soares
 * Data de Criação: 17/03/2012
 */
class Query {
    /**
     * Libraries: Query
     * Feita para fazer as queryes e conversoes de datas
     */

    /**
     * Seta a query
     * $sql = Query de alguma função
     * @retorna <objeto>
     */
    public function setQuery($sql) {
        $CI = & get_instance();
        $query = $CI->db->query("$sql");
        return $query;
    }

    /**
     * Obtem Linhas
     * $query = Query de alguma função
     * @retorna <objeto>
     */
    public function numRows($query) {
        $resultado = $query->num_rows();
        return $resultado;
    }

    /**
     * Obtem Data Padronizada
     * $data = Data em Portugues
     * @retorna <data>
     */
    public function dateEua($data) {
        if ($data != "") {
            $novaData = explode("/", $data);
            $data = $novaData[2] . "-" . $novaData[1] . "-" . $novaData[0];
            return $data;
        } else {
            return "0000-00-00";
        }
    }

    /**
     * Criptografa senha em MD5
     * $senha = senha do usuario
     * @retorna <senha>
     */
    public function md5($senha) {
        return md5($senha);
    }

}
?>