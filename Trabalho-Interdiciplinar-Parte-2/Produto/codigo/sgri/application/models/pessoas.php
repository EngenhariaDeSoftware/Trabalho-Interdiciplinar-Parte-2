<?php
//Bloqueia se tetar acessar o arquivo diretamente
if (!defined('BASEPATH'))
    exit('Acesso Negado');

/**
* Classe: Pessoas
* Finalidade: Inserir, atualizar, pesquisar registros das pessoas
* Autor: Grupo PSI - Diego Rodrigues|Graziella Arca|Leonardo Miyamoto|Marcos Soares
* Data de Criação: 17/03/2012
*/
class Pessoas extends CI_Model {

    private $idPessoa      = null;
    private $nome          = null;
    private $email         = null;
    private $telefone      = null;
    private $celular       = null;
    private $cpf           = null;
    private $dataNacimento = null;
    private $cep           = null;
    private $cidade        = null;
    private $bairro        = null;
    private $endereco      = null;
    private $dataCadastro  = null;
    public  $opcao         = "nome";

    /**
    * Insere registros
    * $objeto = dados a serem inseridos
    * @retorna <O ultimo ID do usuario inserido no banco>
    */
    public function inserir($objeto) {
        
        $objeto->dataNacimento = $this->query->dateEua($objeto->dataNacimento);
        
        $sql = "
            INSERT INTO
                pessoas
             values(
                '',
                '$objeto->nome',
                '$objeto->email',
                '$objeto->telefone',
                '$objeto->celular',
                '$objeto->cpf',
                '$objeto->dataNacimento',
                '$objeto->cep',
                '$objeto->cidade',
                '$objeto->bairro',
                '$objeto->endereco',
                '$objeto->dataCadastro'
                )
        ";

        $query     = $this->query->setQuery($sql);
        $resultado = $this->obterIdPessoa();
        return $resultado;
    }

    /**
    * Obtem a ultima pessoa no banco
    * Sem parametros
    * @retorna <objeto>
    */
    public function obterIdPessoa() {
        
        $sql    = "SELECT MAX(idPessoa) AS idPessoa FROM pessoas";
        $query  = $this->query->setQuery($sql);
        return $query;
    }

    /**
    * Verifica se o email é repetido
    * $objeto = dados do email, $campo = o nome do campo
    * @retorna <boleano>
    */
    public function verificaEmailExiste($objeto, $campo) {

        $sql = "
            SELECT *
                FROM
             pessoas, usuarios
                WHERE
             pessoas.email    = '$objeto->email' or
             usuarios.usuario = '$campo'
        ";

        $query     = $this->query->setQuery($sql);
        $resultado = $this->query->numRows($query);
        
        if ( $resultado == '0' ) {
            return true;
        } else {
            return false;
        }
    }

    /**
    * Obtem todas as pessoas
    * Sem parametros
    * @retorna <objeto>
    */
    public function obterPessoas() {
        
        $sql = "
            SELECT 
                *,
                cidades.nome AS cidadeNome,
                pessoas.nome AS pessoaNome
                FROM
             pessoas 
                INNER JOIN
             usuarios
                ON
             pessoas.idPessoa = usuarios.idPessoa
                INNER JOIN
             cidades
                ON
             pessoas.cidade   = cidades.idCidade
        ";

        $query = $this->query->setQuery($sql);
        return $query;
    }

    /**
    * Obtem uma unica pessoa para detalhe
    * $objeto = Objeto com id da pessoa
    * @retorna <objeto>
    */
    public function detalhe($objeto) {
        
        $sql = "
            SELECT 
            *,
            cidades.nome AS cidadeNome,
            pessoas.nome AS pessoaNome
                FROM
            pessoas
                LEFT JOIN
            cidades
                ON
            pessoas.cidade = cidades.idCidade
                WHERE
            idPessoa = '$objeto->idPessoa'
        ";

        $query = $this->query->setQuery($sql);
        return $query;
    }

    /**
    * Deleta um Usuario
    * $objeto = Objeto com id da Pessoa
    * @retorna <objeto>
    */
    public function deletar($objeto) {
        
        $sql = "
            DELETE FROM
                pessoas
            WHERE
             idPessoa = '$objeto->idPessoa'
        ";

        $query = $this->query->setQuery($sql);
        return $query;
    }

    /**
    * Obtem uma unica pessoa
    * $objeto = Objeto com o id da pessoa
    * @retorna <objeto>
    */
    public function obterPorPessoas($objeto) {
        
        $sql = "
            SELECT 
                *,
                pessoas.nome AS pessoaNome,
                cidades.nome AS cidadeNome,
                acessos.nome AS acessoNome
            FROM 
                pessoas
            LEFT JOIN
                cidades
            ON
                pessoas.cidade = cidades.idCidade
            INNER JOIN
                usuarios
            ON
                pessoas.idPessoa = usuarios.idPessoa
            INNER JOIN
                acessos
            ON
                usuarios.idAcesso = acessos.idAcesso
            WHERE 
                pessoas.idPessoa = '$objeto->idPessoa'";

        $query = $this->query->setQuery($sql);
        return $query;
    }

    /**
    * Atualiza registros
    * $objeto = objeto para ser atualizado
    * @retorna <objeto>
    */
    public function atualizar($objeto) {
        
        $objeto->dataNacimento = $this->query->dateEua($objeto->dataNacimento);
        
        $sql = "
            UPDATE 
                pessoas
            SET
                nome          = '$objeto->nome',
                email         = '$objeto->email',
                telefone      = '$objeto->telefone',
                celular       = '$objeto->celular',
                cpf           = '$objeto->cpf',
                dataNacimento = '$objeto->dataNacimento',
                cep           = '$objeto->cep',
                cidade        = '$objeto->cidade',
                bairro        = '$objeto->bairro',
                endereco      = '$objeto->endereco'
            WHERE
                idPessoa = '$objeto->idPessoa'
        ";

        $query = $this->query->setQuery($sql);
        return $query;
    }

    /**
    * Pesquisa pessoas
    * $objeto = dados da pesquisa
    * @retorna <objeto>
    */
    public function pesquisar($objeto) {

        $sql = "
            SELECT 
                *,
                pessoas.nome AS pessoaNome,
                cidades.nome AS cidadeNome,
                acessos.nome AS acessoNome
            FROM 
                pessoas
            LEFT JOIN
                cidades
            ON
                pessoas.cidade    = cidades.idCidade
            INNER JOIN
                usuarios
            ON
                pessoas.idPessoa  = usuarios.idPessoa
            INNER JOIN
                acessos
            ON
                usuarios.idAcesso = acessos.idAcesso
            WHERE 
                $objeto->opcao LIKE '%$objeto->nome%'
        ";

        $query = $this->query->setQuery($sql);
        return $query;
    }

    /**
    * Lista a ultima pessoa cadastrada
    * Sem parametros
    * @retorna <objeto>
    */
    public function obterUltimasPessoas() {
        if (!$this->access_rule->has_permission(5))
            $this->access_rule->no_access();
        
        $sql = "
            SELECT 
                *,
                pessoas.nome AS pessoaNome,
                acessos.nome AS acessoNome
            FROM
                pessoas
            INNER JOIN
                usuarios
            ON
                pessoas.idPessoa = usuarios.idPessoa
            INNER JOIN
                acessos
            ON
                usuarios.idAcesso = acessos.idAcesso
            ORDER BY pessoas.idPessoa DESC
            LIMIT 0 , 4
        ";

        $query = $this->query->setQuery($sql);
        return $query;
    }
    
    /**
    * Lista a ultima pessoa cadastrada
    * Sem parametros
    * @retorna <objeto>
    */
    public function obterProfessor() {
        
        $sql = "
            SELECT 
                *,
                pessoas.nome AS pessoaNome,
                acessos.nome AS acessoNome,
                pessoas.idPessoa AS pessoaIdPessoa
            FROM
                pessoas
            INNER JOIN
                usuarios
            ON
                pessoas.idPessoa = usuarios.idPessoa
            INNER JOIN
                acessos
            ON
                usuarios.idAcesso = acessos.idAcesso
            WHERE
                acessos.idAcesso = '3'
            ORDER BY pessoas.nome ASC
            
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