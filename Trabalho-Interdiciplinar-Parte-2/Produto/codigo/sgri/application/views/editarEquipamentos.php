<!-- Form -->
<?php foreach($equipamentos as $valor): ?>
<script type="text/javascript" src="../theme/js/formulario.js"></script>
<div class="nNote nWarning">
    <p><strong>Aviso: </strong>Campos marcados com asterisco(*) são obrigatórios.</p>
</div>
<form action="equipamento/atualizar" id="validate" class="form" method="POST">
    <fieldset>
        <div class="widget">
            <div class="title"><img src="../theme/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Edição Equipamentos</h6></div>
            <div class="formRow">
                <label>Nome:<span class="req">*</span></label>
                <div class="formRight"><input type="text" class="validate[required]" name="nome" id="nome" value="<?php echo $valor->nome; ?>" /></div>
                <div class="clear"></div>
            </div>
            <div class="formRow dnone">
                <label>Codigo + Status:<span class="req">*</span></label>
                <div class="formRight">
                    <span class="oneTwo">
                        <input type="text" disabled="disabled" value="<?php echo $valor->codigoPatrimonio; ?>" />
                        <input type="hidden" class="validate[required] codigoPatrimonio" placeholder="Codigo Patrimonio" name="codigoPatrimonio" id="codigoPatrimonio" value="<?php echo $valor->codigoPatrimonio; ?>" />
                    </span>
                    <span class="oneTwo">
                        <label>Status:</label>
                        <div class="formRight">
                            <select name="status" class="chzn-select">
                                <?php if( $valor->status == 1 ): ?>
                                    <option value="1">Disponível</option>
                                <?php else: ?>
                                    <option value="0">Em Manutenção</option>
                                <?php endif; ?>
                                <option value=""></option>
                                <option value="1">Disponível</option>
                                <option value="0">Em Manutenção</option>
                            </select>           
                        </div>             
                        <div class="clear"></div>
                    </span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Descrição:</label>
                <div class="formRight"><textarea rows="8" cols="" name="descricao" id="descricao"><?php echo $valor->descricao; ?></textarea></div><div class="clear"></div>
            </div>
            <div class="formSubmit">
                <input type="hidden" name="id" value="<?php echo $valor->idEquipamento; ?>" />
                <input type="submit" value="Salvar" class="blueB submit" />
                <input type="reset" id="equipamento/obterEquipamento" value="Voltar" class="redB voltar" />
            </div>
            <div class="clear"></div>
        </div>
    </fieldset>
</form>
<?php endforeach; ?>
<script>
    $(".codigoPatrimonio").mask("999999");
    //Uma pra todos
    //<input type="reset" id="equipamento/obterEquipamento" value="Voltar" class="redB voltar" />
    $(".voltar").click(function(){
        var aUrl = $(this).attr("id");
        $.post("../"+aUrl, function(eData){
            $(".conteudo").html(eData);
        });
    });
    $( ".chzn-select" ).chosen();
    $("#validate").validationEngine();
</script>