<script type="text/javascript" src="../theme/js/acoesComum.js"></script>
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
        <div class="horControlB">
            <ul>
                <li><a href="equipamento/formularioEquipamento" title=""><img src="../theme/images/icons/control/16/database.png" alt="" /><span>Novo</span></a></li>
                <li><a href="equipamento/obterEquipamento" title=""><img src="../theme/images/icons/control/16/order-192.png" alt="" /><span>Listar</span></a></li>
            </ul>
        </div>
    </form>
</div>

<div class="body">
    <div class="widget">
        <div class="title"><img src="../theme/images/icons/dark/users.png" alt="" class="titleIcon" /><h6>Resultado Pesquisa Equipamentos</h6></div>
        <ul class="partners">
            <?php foreach ($equipamentos as $valor): ?>
                <li>
                    <div class="pInfo">
                        <p><strong>Codigo Patrimonio: <?php echo $valor->codigoPatrimonio; ?></strong></p>
                        <i><strong>Nome: <?php echo $valor->nome; ?></strong></i>
                        <i><strong>Data Cadastro: <?php echo $valor->dataCadastro; ?></strong></i>
                        <i><strong>Status: <?php echo ( $valor->status == 1 ) ? '<b>Disponível</b>' : 'Em Manutenção'; ?></strong></i>
                        <i><strong>Descrição: <?php echo $valor->descricao; ?></strong></i>
                        <p>
                            <a href="<?php echo $valor->idEquipamento; ?>" id="equipamento/formularioEquipamento/" title="Editar" class="tipS editar">
                                <img src="../theme/images/icons/edit.png" alt="" />
                            </a>
                            <a href="<?php echo $valor->idEquipamento; ?>" id="equipamento/deletar/" title="Remover" class="tipS deletar">
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
<input type="hidden" class="obter" id="equipamento/obterEquipamento" />
<script>
    
    oTable = $('.dTable').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "sDom": '<""l>t<"F"fp>'
    });
    $("select, input:checkbox, input:radio, input:file").uniform();
</script>

