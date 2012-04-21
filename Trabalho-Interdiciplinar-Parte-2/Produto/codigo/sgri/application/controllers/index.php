<?php

//Bloqueia se tetar acessar o arquivo diretamente
if (!defined('BASEPATH'))
    exit('Acesso Negado');

/**
 * Classe: Index
 * Finalidade: Classe que chama a pagina inicial
 * Autor: Grupo PSI - Diego Rodrigues|Graziella Arca|Leonardo Miyamoto|Marcos Soares
 * Data de Criação: 17/03/2012
 */
class Index extends CI_Controller {

    /**
     * Pagina Inicial. Carrega varios controllers e Models e Templates na tela inicial
     * sem parametros
     * @retorna <array + template>
     */
    public function HomePage() {
        $this->load->view('login');
    }

    public function login() {

        $session = $this->session->all_userdata();


        if (isset($_POST['usuario'])) {

            $usuario = mysql_escape_string($_POST['usuario']);
            $senha = md5(mysql_escape_string($_POST['senha']));

            $this->load->model('login');

            $login = new Login();
            $login->set("usuario", $usuario);
            $login->set("senha", $senha);
            $logar = $login->validar($login);

            if (!$logar) {
                unset($_POST["usuario"]);
                unset($_POST["senha"]);
                echo "<script>alert('Usuario ou Senha Invalidos!!!');</script>";
                echo "<script>window.location.href = '../';</script>";
                return false;
            }

            $resultado = $login->obterDadosUsuarios($login);

            foreach ($resultado->result() as $valor) {

                $sessao = array(
                    'idPessoa' => $valor->idPessoa,
                    'nome' => $valor->pessoaNome,
                    'email' => $valor->email,
                    'idAcesso' => $valor->idAcesso,
                    'acessoNome' => $valor->acessoNome
                );
            }
            $this->session->set_userdata($sessao);

            $session = $this->session->all_userdata();


            $this->home();
            return false;
        } else {

            echo "<script>window.location.href = '../';</script>";
            return false;
            exit;
        }
    }

    function home() {
        $this->sessoes->verificaSessao();

        $this->load->model('pessoas');

        $pessoas = new Pessoas();
        $rowsTotal = $pessoas->obterPessoas();
        $rows = $pessoas->obterUltimasPessoas();

        $data["pessoas"] = $rows->result();
        $data["pessoasTotal"] = $rowsTotal->num_rows();

        //equipamentos
        $this->load->model('equipamentos');

        $equipamentos = new Equipamentos();
        $ultimosEquipamentos = $equipamentos->obterUltimosEquipamentos();
        $equipamentoTotal = $equipamentos->obterEquipamentos();

        $data["equipamentoTotal"] = $equipamentoTotal->num_rows();
        $data["ultimosEquipamentos"] = $ultimosEquipamentos->result();

        //salas
        $this->load->model('salas');

        $salas = new Salas();
        $ultimasSalas = $salas->obterUltimasSalas();
        $salasTotal = $salas->obterSalas();

        $data["ultimasSalas"] = $ultimasSalas->result();
        $data["salasTotal"] = $salasTotal->num_rows();

        $this->load->view('index', $data);
    }

}