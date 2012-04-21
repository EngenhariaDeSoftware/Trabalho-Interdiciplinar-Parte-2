<div class="body">
    <div class="widget">
        <div class="title"><img src="../theme/images/icons/dark/users.png" alt="" class="titleIcon" /><h6>Resultado Pesquisa GLOBAL</h6></div>
        <ul class="partners">
            <?php foreach ($dados as $valor): ?>
                <li>
                    <div class="pInfo">
                        <p><strong>Dados Usuarios</strong></p>
                        <strong>Nome: <?php echo $valor->pessoaNome; ?></strong>
                        <i>Email: <?php echo $valor->email; ?></i>
                        <i>Telefone: <?php echo $valor->telefone; ?></i>
                        <i>Celular: <?php echo $valor->celular; ?></i>
                        <i>CPF: <?php echo $valor->cpf; ?></i>
                        <i>Data Nacimento: <?php echo $valor->dataNacimento; ?></i>
                        <i>CEP: <?php echo $valor->cep; ?></i>
                        <i>Cidade: <?php echo $valor->cidadeNome; ?></i>
                        <i>UF: <?php echo $valor->uf; ?></i>
                        <i>Bairro: <?php echo $valor->bairro; ?></i>
                        <i>Endereço: <?php echo $valor->endereco; ?></i>
                        <i>Data de Cadastro: <?php echo $valor->dataCadastro; ?></i>
                        
                        
                        <hr >
                        <p><strong>Dados Usuarios</strong></p>
                        <strong>Usuario: <?php echo $valor->usuario; ?></strong>
                        <i>Tipo de Acesso: <?php echo $valor->acessoNome; ?></i>

                        <hr >
                        <p><strong>Dados Salas</strong></p>
                        <strong>Predio: <?php echo $valor->predio; ?></strong>
                        <i>Andar: <?php echo $valor->andar; ?></i>
                        <i>Numero: <?php echo $valor->numero; ?></i>
                        <i>Tipo Sala: <?php echo ( $valor->tipoSala == 0 ) ? "Sala Normal" : ( $valor->tipoSala == 1 ) ? "Laboratorio" : ( $valor->tipoSala == 2 ) ? "Auditório" : "Sala Especial"; ?></i>
                        
                        <hr >
                        <p><strong>Dados Equipamentos</strong></p>
                        <strong>Nome Equipamento: <?php echo $valor->equipamentoNome; ?></strong>
                        <i>Descrição: <?php echo $valor->descricao; ?></i>

                    </div>
                    <div class="clear"></div>
                </li>

            <?php endforeach; ?>
        </ul>
    </div>                       
</div>