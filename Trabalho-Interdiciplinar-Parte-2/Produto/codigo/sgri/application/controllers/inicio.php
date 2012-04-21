<?php
//Bloqueia se tetar acessar o arquivo diretamente
if (!defined('BASEPATH'))
    exit('Acesso Negado');

/**
* Classe: Inicio
* Finalidade: Inicia o sistema aparti do momento que vc esteja dentro
* Autor: Grupo PSI - Diego Rodrigues|Graziella Arca|Leonardo Miyamoto|Marcos Soares
* Data de Criação: 17/03/2012
*/

class Inicio extends CI_Controller {


    /**
    * Nao está aplicada
    * sem parametros
    * @retorna <json>
    */
    public function index() {
        $this->load->view('index');
    }
    
    /**
    * Tela inicial do sistema
    * sem parametros
    * @retorna <array + template>
    */
    function inicial()
    {
       
        $this->sessoes->verificaSessao();
        
        //pessoas
        $this->load->model('pessoas');
        
        $pessoas   = new Pessoas();
        $rowsTotal = $pessoas->obterPessoas();
        $rows      = $pessoas->obterUltimasPessoas();

        $data["pessoas"]      = $rows->result();
        $data["pessoasTotal"] = $rowsTotal->num_rows();

        //equipamentos
        $this->load->model('equipamentos');
        
        $equipamentos        = new Equipamentos();
        $ultimosEquipamentos = $equipamentos->obterUltimosEquipamentos();
        $equipamentoTotal    = $equipamentos->obterEquipamentos();

        $data["equipamentoTotal"]    = $equipamentoTotal->num_rows();
        $data["ultimosEquipamentos"] = $ultimosEquipamentos->result();

        //salas
        $this->load->model('salas');
        
        $salas        = new Salas();
        $ultimasSalas = $salas->obterUltimasSalas();
        $salasTotal   = $salas->obterSalas();

        $data["ultimasSalas"] = $ultimasSalas->result();
        $data["salasTotal"]   = $salasTotal->num_rows();

        $this->load->view('inicial', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */