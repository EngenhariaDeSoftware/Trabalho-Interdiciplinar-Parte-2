<script type="text/javascript" src="../theme/js/acoesComum.js"></script>
<!-- Search -->
<div class="searchWidget">
    <form action="equipamento/pesquisar" class="form" method="POST">
        <input type="text" name="pesquisa" class="pesquisa" id="pesquisa" placeholder="Pesquisar Equipamentos..." />
        <input type="submit" name="pesquisar" class="pesquisar" value="" />
        <div class="formRow">
            <div class="formRight">
                <input type="radio" name="opcao" checked="checked" id="opcao" value="nome" /><label for="radio1">Nome</label>
                <input type="radio" name="opcao" id="opcao" value="codigoPatrimonio" /><label for="radio2">Código Patrimônio</label>
                <input type="radio" name="opcao" id="opcao" value="descricao" /><label for="radio4">Descrição</label>
            </div><div class="clear"></div>
        </div>
    </form>
</div>

<div class="widget">

    <div class="title"><img src="../theme/images/icons/dark/full2.png" alt="" class="titleIcon" /><h6>Lista de Equipamentos</h6></div>                          
    <table cellpadding="0" cellspacing="0" border="0" class="display dTable">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Codigo Patrimonio</th>
                <th>status</th>
                <th>Descrição</th>
                <td>Ações</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pessoas as $valor): ?>
                <tr class="gradeX">
                    <td><?php echo $valor->nome; ?></td>
                    <td><?php echo $valor->codigoPatrimonio; ?></td>
                    <td><?php echo ( $valor->status == 1 ) ? '<b>Disponível</b>' : 'Em Manutenção'; ?></td>
                    <td><?php echo substr($valor->descricao, 0, 60) . " ..."; ?></td>
                    <td class="actBtns">
                        <a href="<?php echo $valor->idEquipamento; ?>" id="equipamento/formularioEquipamento/" title="Editar" class="tipS editar">
                            <img src="../theme/images/icons/edit.png" alt="" />
                        </a>
                        <a href="<?php echo $valor->idEquipamento; ?>" id="equipamento/deletar/" title="Remover" class="tipS deletar">
                            <img src="../theme/images/icons/remove.png" alt="" />
                        </a>
                        <a href="<?php echo $valor->idEquipamento; ?>" id="equipamento/detalhe/" title="Detalhes" class="tipS detalhe">
                            <img src="../theme/images/icons/grown.png" alt="" />
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>  
</div>
<input type="hidden" class="obter" id="equipamento/obterEquipamento" />
<script>
    oTable = $('.dTable').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "sDom": '<""l>t<"F"fp>'
    });
    $("select, input:checkbox, input:radio, input:file").uniform();
</script>