<?php

//Bloqueia se tetar acessar o arquivo diretamente
if (!defined('BASEPATH'))
    exit('Acesso Negado');

/**
 * Classe: Usuario
 * Finalidade: Sem aplicação
 * Autor: Grupo PSI - Diego Rodrigues|Graziella Arca|Leonardo Miyamoto|Marcos Soares
 * Data de Criação: 17/03/2012
 */
class Usuario extends CI_Controller {

    public function __construct() {
        //sem aplicacao
    }

    public function sair() {
        echo "<script>window.location.href='../../'</script>";
    }

}

?>