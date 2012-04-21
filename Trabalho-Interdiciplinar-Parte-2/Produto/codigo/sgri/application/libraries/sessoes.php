<?php

//Bloqueia se tetar acessar o arquivo diretamente
if (!defined('BASEPATH'))
    exit('Acesso Negado');

/**
 * Classe: Sessoes
 * Finalidade: Verifica todas as sessoes
 * Autor: Grupo PSI - Diego Rodrigues|Graziella Arca|Leonardo Miyamoto|Marcos Soares
 * Data de Criação: 17/03/2012
 */
class Sessoes {
    /**
     * Libraries: Query
     * Feita para fazer as queryes e conversoes de datas
     */

    /**
     * Seta a query
     * $sql = Query de alguma função
     * @retorna <objeto>
     */
    public function verificaSessao() {
        $CI = & get_instance();
        $session = $CI->session->all_userdata();

        // $session["idPessoa"];
        if (!isset($session["idPessoa"])) {
            echo "<script>window.location.href = '../';</script>";
            exit;
        }
    }

}

?>