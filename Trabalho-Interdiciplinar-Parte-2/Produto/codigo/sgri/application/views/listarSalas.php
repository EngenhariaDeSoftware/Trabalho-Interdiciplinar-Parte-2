<script type="text/javascript" src="../theme/js/acoesComum.js"></script>
<!-- Search -->
<div class="searchWidget">
    <form action="sala/pesquisar" class="form" method="POST">
        <input type="text" name="pesquisa" class="pesquisa" id="pesquisa" placeholder="Pesquisar Salas..." />
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

<div class="widget">

    <div class="title"><img src="../theme/images/icons/dark/full2.png" alt="" class="titleIcon" /><h6>Lista de Salas</h6></div>                          
    <table cellpadding="0" cellspacing="0" border="0" class="display dTable">
        <thead>
            <tr>
                <th>Predio</th>
                <th>Andar</th>
                <td>Numero</td>
                <td>Tipo de Sala</td>
                <td>Capacidade</td>
                <td>Data Cadastro</td>
                <td>Ações</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salas as $valor): ?>
                <tr class="gradeX">
                    <td><?php echo $valor->predio; ?></td>
                    <td><?php echo $valor->andar; ?></td>
                    <td><?php echo $valor->numero; ?></td>
                    <td>
                        <?php if( $valor->tipoSala == 0 ): ?>
                            Sala Normal
                        <?php elseif( $valor->tipoSala == 1 ): ?>
                            Laboratório
                        <?php elseif( $valor->tipoSala == 2 ): ?>
                            Auditório
                        <?php elseif( $valor->tipoSala == 3 ): ?>
                            Sala Especial
                        <?php endif; ?>
                    </td>
                    <td><?php echo $valor->capacidade; ?></td>
                    <td><?php echo $valor->dataCadastro; ?></td>
                    <td class="actBtns">
                        <a href="<?php echo $valor->idSala; ?>" id="sala/formularioSala/" title="Editar" class="tipS editar">
                            <img src="../theme/images/icons/edit.png" alt="" />
                        </a>
                        <a href="<?php echo $valor->idSala; ?>" id="sala/deletar/" title="Remover" class="tipS deletar">
                            <img src="../theme/images/icons/remove.png" alt="" />
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>  
</div>
<input type="hidden" class="obter" id="sala/obterSala" />
<script>

    oTable = $('.dTable').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "sDom": '<""l>t<"F"fp>'
    });
    $("select, input:checkbox, input:radio, input:file").uniform();
</script>
