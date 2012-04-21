<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
* Classe: Access_rule
* Finalidade: Extende de Todos os models de permissao
* Autor: Grupo PSI - Diego Rodrigues|Graziella Arca|Leonardo Miyamoto|Marcos Soares
* Data de Criação: 17/03/2012
*/
class Access_rule {

    public function __construct() {
        
    }

    public function has_permission($rule) {

        $rule_array = array();
        $permission = false;


        switch ($rule) {
            case 1:
                $rule_array = array('Infra-Estrutura');
                break;
            case 2:
                $rule_array = array('Infra-Estrutura', 'Cordenador / Diretor Acadêmico');
                break;
            case 3:
                $rule_array = array('Infra-Estrutura', 'Cordenador / Diretor Acadêmico', 'Professor');
                break;
            case 4:
                $rule_array = array('Infra-Estrutura', 'Cordenador / Diretor Acadêmico', 'Professor', 'Recursos Humanos');
                break;
            case 5:
                $rule_array = array('Infra-Estrutura', 'Cordenador / Diretor Acadêmico', 'Professor', 'Recursos Humanos', 'Sistema de Controle Acadêmico');
                break;
        }


        if (count($rule_array) > 0) {

            $CI = & get_instance();

            if (in_array($CI->session->userdata('acessoNome'), $rule_array)) {
                $permission = true;
            }
        }

        return $permission;
    }

    public function no_access() {

        echo '<script type="text/javascript">document.location.href="../";</script>';
        exit('VocÃª nÃ£o tem permisÃ£o para executar essa aÃ§Ã£o');
    }

}