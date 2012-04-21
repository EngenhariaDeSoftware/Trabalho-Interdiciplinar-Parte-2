<!-- Form -->
<?php foreach($salas as $valor): ?>
<script type="text/javascript" src="../theme/js/formulario.js"></script>
<div class="nNote nWarning">
    <p><strong>Aviso: </strong>Campos marcados com asterisco(*) são obrigatórios.</p>
</div>
<form action="sala/atualizar" id="validate" class="form" method="POST">
    <fieldset>
        <div class="widget">
            <div class="title"><img src="../theme/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Edição Equipamentos</h6></div>
            <div class="formRow">
                <label>Prédio:<span class="req">*</span></label>
                <div class="formRight"><input type="text" class="validate[required]" name="predio" id="predio" value="<?php echo $valor->predio; ?>" /></div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Andar:<span class="req">*</span></label>
                <div class="formRight"><input type="text" class="validate[required]" name="andar" id="andar" value="<?php echo $valor->andar; ?>" /></div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Numero:<span class="req">*</span></label>
                <div class="formRight"><input type="text" class="validate[required]" name="numero" id="numero" value="<?php echo $valor->numero; ?>" /></div>
                <div class="clear"></div>
            </div>
            
            <div class="formRow">
                <label>Capacidade:<span class="req">*</span></label>
                <div class="formRight"><input type="text" class="validate[required]" name="capacidade" id="capacidade" value="<?php echo $valor->capacidade; ?>" /></div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>É um Auditório?:</label>
                <div class="formRight">
                    <?php if( $valor->tipoSala == 0 ): ?>
                        <input type="radio" name="tipoSala" id="tipoSala" value="0" checked="checked" /><label for="radio1">Sala Normal</label>
                        <input type="radio" name="tipoSala" id="tipoSala" value="1" /><label for="radio2">Laboratório</label>
                        <input type="radio" name="tipoSala" id="tipoSala" value="2" /><label for="radio2">Auditório</label>
                        <input type="radio" name="tipoSala" id="tipoSala" value="3" /><label for="radio2">Sala Especial</label>
                    <?php elseif( $valor->tipoSala == 1 ): ?>
                        <input type="radio" name="tipoSala" id="tipoSala" value="1" checked="checked"/><label for="radio1">Laboratorio</label>
                        <input type="radio" name="tipoSala" id="tipoSala" value="0" /><label for="radio1">Sala Normal</label>
                        <input type="radio" name="tipoSala" id="tipoSala" value="2" /><label for="radio2">Auditório</label>
                        <input type="radio" name="tipoSala" id="tipoSala" value="3" /><label for="radio2">Sala Especial</label>
                    <?php elseif( $valor->tipoSala == 2 ): ?>
                        <input type="radio" name="tipoSala" id="tipoSala" value="2" checked="checked"/><label for="radio1">Auditorio</label>
                        <input type="radio" name="tipoSala" id="tipoSala" value="0" /><label for="radio1">Sala Normal</label>
                        <input type="radio" name="tipoSala" id="tipoSala" value="1" /><label for="radio2">Laboratório</label>
                        <input type="radio" name="tipoSala" id="tipoSala" value="3" /><label for="radio2">Sala Especial</label>
                    <?php elseif( $valor->tipoSala == 3 ): ?>
                        <input type="radio" name="tipoSala" id="tipoSala" value="3" checked="checked"/><label for="radio1">Sala Especial</label>
                        <input type="radio" name="tipoSala" id="tipoSala" value="0" /><label for="radio1">Sala Normal</label>
                        <input type="radio" name="tipoSala" id="tipoSala" value="1" /><label for="radio2">Laboratório</label>
                        <input type="radio" name="tipoSala" id="tipoSala" value="2" /><label for="radio2">Auditório</label>
                    <?php endif; ?>                    
                </div><div class="clear"></div>
            </div>
            <div class="formSubmit">
                <input type="hidden" name="id" value="<?php echo $valor->idSala; ?>" />
                <input type="submit" value="Salvar" class="blueB submit" />
                <input type="reset" id="sala/obterSala" value="Voltar" class="redB voltar" />
            </div>
            <div class="clear"></div>
        </div>
    </fieldset>
</form>
<?php endforeach; ?>
<script>
    
    //Uma pra todos
    //<input type="reset" id="equipamento/obterEquipamento" value="Voltar" class="redB voltar" />
    $(".voltar").click(function(){
        var aUrl = $(this).attr("id");
        $.post("../"+aUrl, function(eData){
            $(".conteudo").html(eData);
        });
    });
    $("select, input:checkbox, input:radio, input:file").uniform();
    $("#validate").validationEngine();
</script>