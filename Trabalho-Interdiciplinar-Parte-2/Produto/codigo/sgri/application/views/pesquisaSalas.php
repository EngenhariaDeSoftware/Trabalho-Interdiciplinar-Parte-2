<script type="text/javascript" src="../theme/js/acoesComum.js"></script>
<div class="searchWidget">
    <form action="sala/pesquisar" class="form" method="POST">
        <input type="text" name="pesquisa" class="pesquisas" id="pesquisas" placeholder="Pesquisar Salas..." />
        <input type="submit" name="pesquisar" class="pesquisarPessoas" value="" />
        <div class="formRow">
            <div class="formRight">
                <input type="radio" name="opcao" checked="checked" id="opcao" value="predio" /><label for="radio1">Predio</label>
                <input type="radio" name="opcao" id="opcao" value="andar" /><label for="radio2">Andar</label>
                <input type="radio" name="opcao" id="opcao" value="numero" /><label for="radio3">Numero</label>
                <input type="radio" name="opcao" id="opcao" value="tipoSala" /><label for="radio4">Tipo da Sala</label>
                <input type="radio" name="opcao" id="opcao" value="capacidade" /><label for="radio4">Capacidade</label>
            </div><div class="clear"></div>
        </div>
    </form>
</div>

<div class="body">
    <div class="widget">
        <div class="title"><img src="../theme/images/icons/dark/users.png" alt="" class="titleIcon" /><h6>Resultado Pesquisa Salas</h6></div>
        <ul class="partners">
            <?php foreach ($salas as $valor): ?>
                <li>
                    <div class="pInfo">
                        <p><strong>Predio: <?php echo $valor->predio; ?></strong></p>
                        <i><strong>Andar: <?php echo $valor->andar; ?></strong></i>
                        <i><strong>Numero: <?php echo $valor->numero; ?></strong></i>
                        <i><strong>Capacidade: <?php echo $valor->capacidade; ?></strong></i>
                        <i>
                            <strong>
                                Tipo da Sala: 
                                <?php if ($valor->tipoSala == 0): ?>
                                    Sala Normal
                                <?php elseif ($valor->tipoSala == 1): ?>
                                    Laboratório
                                <?php elseif ($valor->tipoSala == 2): ?>
                                    Auditório
                                <?php elseif ($valor->tipoSala == 3): ?>
                                    Sala Especial
                                <?php endif; ?>
                            </strong></i>
                        <i><strong>Data de Cadastro: <?php echo $valor->dataCadastro; ?></strong></i>
                        <p>
                            <a href="<?php echo $valor->idSala; ?>" id="sala/formularioSala/" title="Editar" class="tipS editar">
                                <img src="../theme/images/icons/edit.png" alt="" />
                            </a>
                            <a href="<?php echo $valor->idSala; ?>" id="sala/deletar/" title="Remover" class="tipS deletar">
                                <img src="../theme/images/icons/remove.png" alt="" />
                            </a>
                        </p>	
                    </div>
                    <div class="clear"></div>
                </li>

            <?php endforeach; ?>
        </ul>
    </div>                       
</div>
<input type="hidden" class="obter" id="sala/obterSala" />
<script>
  
    $("select, input:checkbox, input:radio, input:file").uniform();
</script>