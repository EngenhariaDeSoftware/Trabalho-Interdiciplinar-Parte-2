<?php

//Bloqueia se tetar acessar o arquivo diretamente
if (!defined('BASEPATH'))
    exit('Acesso Negado');

/**
 * Classe: Sala
 * Finalidade: atualiza, deleta, registra, lista Salas do sistema
 * Autor: Grupo PSI - Diego Rodrigues|Graziella Arca|Leonardo Miyamoto|Marcos Soares
 * Data de Criação: 17/03/2012
 */
class Sala extends CI_Controller {

    function index() {
        
    }

    /**
     * Formulario da Sala
     * Sem parametros
     * @retorna <array + template>
     */
    public function formularioSala() {
        if (!$this->access_rule->has_permission(1))
            $this->access_rule->no_access();

        if (isset($_POST["id"])) {
            $this->load->model('salas');

            $id = $_POST["id"];
            $salas = new Salas();

            $salas->set("idSala", $id);

            $rows = $salas->obterPorSalas($salas);
            $data['salas'] = $rows->result();

            $this->load->view('editarSalas', $data);
            return false;
        }

        $this->load->view('cadastroSalas');
    }

    /**
     * Salva um registro
     * sem parametros
     * @retorna <Funcao>
     */
    public function salvar() {
        if (!$this->access_rule->has_permission(1))
            $this->access_rule->no_access();

        $this->load->model('salas');

        if (isset($_POST["id"])) {
            $this->atualizar($_POST["id"], $_POST);
        } else {
            $this->inserir();
        }
    }

    /**
     * Insere um Registro
     * sem parametros
     * @retorna <json>
     */
    public function inserir() {
        if (!$this->access_rule->has_permission(1))
            $this->access_rule->no_access();

        if ($_POST["predio"] == "" || $_POST["andar"] == "" || $_POST["numero"] == "") {
            $array = array(
                "sucesso" => false,
                "Mensagem" => "<strong>Impossivel: </strong>Campos como Predio, Andar e Numero precisa ser preenchido.",
                "tipo" => "nFailure"
            );

            print_r(json_encode($array));
            return false;
        }

        $this->load->model('salas');

        $salas = new Salas();
        $dataCadastro = date("Y-m-d H:i:s");

        $salas->set("predio", $_POST["predio"]);
        $salas->set("andar", $_POST["andar"]);
        $salas->set("numero", $_POST["numero"]);
        $salas->set("tipoSala", $_POST["tipoSala"]);
        $salas->set("capacidade", $_POST["capacidade"]);
        $salas->set("dataCadastro", $dataCadastro);

        $verdade = $salas->verificaSalas($salas);

        if (!$verdade) {
            $array = array(
                "sucesso" => false,
                "Mensagem" => "<strong>Impossivel: </strong>Ja existe uma Sala com essas caracteristicas com esse nome!!! ",
                "tipo" => "nFailure"
            );
            print_r(json_encode($array));
            return false;
        }

        $salas->inserir($salas);

        $array = array(
            "sucesso" => true,
            "Mensagem" => "<strong>Sucesso: </strong>Registro Cadastrado com sucesso!!! ",
            "tipo" => "nSuccess",
            "redirecionar" => true,
            "url" => "sala/formularioSala"
        );

        print_r(json_encode($array));
    }

    /**
     * Obtem uma sala
     * sem parametros
     * @retorna <array + template>
     */
    public function obterSala() {
        if (!$this->access_rule->has_permission(1))
            $this->access_rule->no_access();

        $this->load->model('salas');

        $salas = new Salas();
        $rows = $salas->obterSalas();
        $data['salas'] = $rows->result();

        $this->load->view('listarSalas', $data);
    }

    /**
     * Deleta um registro
     * sem parametros
     * @retorna <json>
     */
    public function deletar() {
        if (!$this->access_rule->has_permission(1))
            $this->access_rule->no_access();

        $this->load->model('salas');

        $id = $_POST["id"];
        $salas = new Salas();

        $salas->set("idSala", $id);

        $salas->deletar($salas);

        $array = array(
            "sucesso" => true,
            "Mensagem" => "<strong>Sucesso: </strong>Registro Excluido com sucesso!!! ",
            "tipo" => "nSuccess"
        );

        print_r(json_encode($array));
    }

    /**
     * Pesquisa registros
     * sem parametros
     * @retorna <array + template>
     */
    public function pesquisar() {
        if (!$this->access_rule->has_permission(1))
            $this->access_rule->no_access();

        $this->load->model('salas');

        $opcao = $_POST["opcao"];
        $pesquisa = $_POST["pesquisa"];
        $salas = new Salas();

        $salas->set("nome", $pesquisa);
        $salas->set("opcao", $opcao);

        $rows = $salas->pesquisar($salas);
        $data['salas'] = $rows->result();

        $this->load->view('pesquisaSalas', $data);
    }

    /**
     * Atualiza registros
     * sem parametros
     * @retorna <json>
     */
    public function atualizar() {
        if (!$this->access_rule->has_permission(1))
            $this->access_rule->no_access();

        $this->load->model('salas');

        $salas = new Salas();

        $salas->set("idSala", $_POST["id"]);
        $salas->set("predio", $_POST["predio"]);
        $salas->set("andar", $_POST["andar"]);
        $salas->set("numero", $_POST["numero"]);
        $salas->set("tipoSala", $_POST["tipoSala"]);
        $salas->set("capacidade", $_POST["capacidade"]);

        $salas->atualizar($salas);

        $array = array(
            "sucesso" => true,
            "Mensagem" => "<strong>Sucesso: </strong>Registro Atualizado com sucesso!!! ",
            "tipo" => "nSuccess",
            "redirecionar" => true,
            "url" => "sala/obterSala"
        );

        print_r(json_encode($array));
    }

}

?>