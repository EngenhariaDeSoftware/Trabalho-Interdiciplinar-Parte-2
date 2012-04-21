<?php

//Bloqueia se tetar acessar o arquivo diretamente
if (!defined('BASEPATH'))
    exit('Acesso Negado');

/**
 * Classe: Equipamento
 * Finalidade: 
 * Autor: Grupo PSI - Diego Rodrigues|Graziella Arca|Leonardo Miyamoto|Marcos Soares
 * Data de Criação: 17/03/2012
 */
class Equipamento extends CI_Controller {

    function index() {
        
    }

    /**
     * Formulario de Equipamento
     * sem parametros
     * @retorna <Formulario>
     */
    public function formularioEquipamento() {
        if (!$this->access_rule->has_permission(1))
            $this->access_rule->no_access();

        if (isset($_POST["id"])) {
            $this->load->model('equipamentos');

            $id = $_POST["id"];
            $equipamentos = new Equipamentos();

            $equipamentos->set("idEquipamento", $id);

            $rows = $equipamentos->obterPorEquipamentos($equipamentos);

            $data['equipamentos'] = $rows->result();
            $this->load->view('editarEquipamentos', $data);
            return false;
        }

        $this->load->view('cadastroEquipamentos');
    }

    /**
     * Salva registro
     * sem parametros
     * @retorna <Nada>
     */
    public function salvar() {
        if (!$this->access_rule->has_permission(1))
            $this->access_rule->no_access();

        $this->load->model('equipamentos');

        if (isset($_POST["id"])) {
            $this->atualizar($_POST["id"], $_POST);
        } else {
            $this->inserir();
        }
    }

    /**
     * Insere um registro
     * sem parametros
     * @retorna <json>
     */
    public function inserir() {
        if (!$this->access_rule->has_permission(1))
            $this->access_rule->no_access();

        if ($_POST["nome"] == "" || $_POST["codigoPatrimonio"] == "") {
            $array = array(
                "sucesso" => false,
                "Mensagem" => "<strong>Impossivel: </strong>Campos em brancos precisa ser preenchido.",
                "tipo" => "nFailure"
            );

            print_r(json_encode($array));
            return false;
        }

        $this->load->model('equipamentos');
        $equipamentos = new Equipamentos();

        $dataCadastro = date("Y-m-d H:i:s");

        $equipamentos->set("nome", $_POST["nome"]);
        $equipamentos->set("codigoPatrimonio", $_POST["codigoPatrimonio"]);
        $equipamentos->set("descricao", $_POST["descricao"]);
        $equipamentos->set("status", $_POST["status"]);
        $equipamentos->set("dataCadastro", $dataCadastro);

        $verdade = $equipamentos->verificaNomeEquipamento($equipamentos);

        if (!$verdade) {
            $array = array(
                "sucesso" => false,
                "Mensagem" => "<strong>Impossivel: </strong>Ja existe um equipamento com esse nome!!! ",
                "tipo" => "nFailure"
            );
            print_r(json_encode($array));
            return false;
        }

        $resultado = $equipamentos->inserir($equipamentos);

        $array = array(
            "sucesso" => true,
            "Mensagem" => "<strong>Sucesso: </strong>Registro Cadastrado com sucesso!!! ",
            "tipo" => "nSuccess",
            "redirecionar" => true,
            "url" => "equipamento/formularioEquipamento"
        );

        print_r(json_encode($array));
    }

    /**
     * Obtem um equipamento
     * sem parametros
     * @retorna <Template>
     */
    public function obterEquipamento() {
        if (!$this->access_rule->has_permission(1))
            $this->access_rule->no_access();

        $this->load->model('equipamentos');

        $equipamentos = new Equipamentos();
        $rows = $equipamentos->obterEquipamentos();

        $data['pessoas'] = $rows->result();

        $this->load->view('listarEquipamentos', $data);
    }

    /**
     * Atualiza registro
     * sem parametros
     * @retorna <json>
     */
    public function atualizar() {
        if (!$this->access_rule->has_permission(1))
            $this->access_rule->no_access();

        $this->load->model('equipamentos');

        $equipamentos = new Equipamentos();

        $equipamentos->set("idEquipamento", $_POST["id"]);
        $equipamentos->set("nome", $_POST["nome"]);
        $equipamentos->set("codigoPatrimonio", $_POST["codigoPatrimonio"]);
        $equipamentos->set("descricao", $_POST["descricao"]);
        $equipamentos->set("status", $_POST["status"]);

        $equipamentos->atualizar($equipamentos);

        $array = array(
            "sucesso" => true,
            "Mensagem" => "<strong>Sucesso: </strong>Registro Atualizado com sucesso!!! ",
            "tipo" => "nSuccess",
            "redirecionar" => true,
            "url" => "equipamento/obterEquipamento"
        );

        print_r(json_encode($array));
    }

    /**
     * Deleta um registro
     * sem parametros
     * @retorna <json>
     */
    public function deletar() {
        if (!$this->access_rule->has_permission(1))
            $this->access_rule->no_access();

        $this->load->model('equipamentos');

        $id = $_POST["id"];
        $equipamentos = new Equipamentos();
        $equipamentos->set("idEquipamento", $id);

        $equipamentos->deletar($equipamentos);

        $array = array(
            "sucesso" => true,
            "Mensagem" => "<strong>Sucesso: </strong>Registro Excluido com sucesso!!! ",
            "tipo" => "nSuccess"
        );

        print_r(json_encode($array));
    }

    /**
     * Detalha um registro
     * sem parametros
     * @retorna <Template>
     */
    public function detalhe() {
        if (!$this->access_rule->has_permission(1))
            $this->access_rule->no_access();

        $this->load->model('equipamentos');

        $id = $_POST["id"];
        $equipamentos = new Equipamentos();
        $equipamentos->set("idEquipamento", $id);

        $rows = $equipamentos->detalhe($equipamentos);

        $data['equipamentos'] = $rows->result();
        $this->load->view('detalheEquipamento', $data);
    }

    /**
     * Pesquisa um registro
     * sem parametros
     * @retorna <Template>
     */
    public function pesquisar() {
        if (!$this->access_rule->has_permission(1))
            $this->access_rule->no_access();


        $this->load->model('equipamentos');

        $valor = $_POST["pesquisa"];
        $opcao = $_POST["opcao"];

        $equipamentos = new Equipamentos();

        $equipamentos->set("nome", $valor);
        $equipamentos->set("opcao", $opcao);

        $rows = $equipamentos->pesquisar($equipamentos);

        $data['equipamentos'] = $rows->result();

        $this->load->view('pesquisaEquipamento', $data);
    }

}

?>