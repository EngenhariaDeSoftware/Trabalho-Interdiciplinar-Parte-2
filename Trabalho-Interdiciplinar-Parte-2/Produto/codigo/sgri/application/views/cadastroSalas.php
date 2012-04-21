<!-- Form -->
<script type="text/javascript" src="../theme/js/formulario.js"></script>
<div class="nNote nWarning">
    <p><strong>Aviso: </strong>Campos marcados com asterisco(*) são obrigatórios.</p>
</div>
<form action="sala/salvar" id="validate" class="form" method="POST">
    <fieldset>
        <div class="widget">
            <div class="title"><img src="../theme/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Cadastro Salas</h6></div>
            <div class="formRow">
                <label>Prédio:<span class="req">*</span></label>
                <div class="formRight"><input type="text" class="validate[required]" name="predio" id="predio" value="" /></div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Andar:<span class="req">*</span></label>
                <div class="formRight"><input type="text" class="validate[required]" name="andar" id="andar" value="" /></div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Numero:<span class="req">*</span></label>
                <div class="formRight"><input type="text" class="validate[required]" name="numero" id="numero" value="" /></div>
                <div class="clear"></div>
            </div>
            
            <div class="formRow">
                <label>Capacidade:<span class="req">*</span></label>
                <div class="formRight"><input type="text" class="validate[required]" name="capacidade" id="capacidade" value="" /></div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Tipo de Sala?:</label>
                <div class="formRight">
                    <input type="radio" checked="checked" name="tipoSala" id="tipoSala" value="0" /><label for="radio1">Sala Normal</label>
                    <input type="radio" name="tipoSala" id="tipoSala" value="1" /><label for="radio2">Laboratório</label>
                    <input type="radio" name="tipoSala" id="tipoSala" value="2" /><label for="radio2">Auditório</label>
                    <input type="radio" name="tipoSala" id="tipoSala" value="3" /><label for="radio2">Sala Especial</label>
                </div><div class="clear"></div>
            </div>

            <div class="formSubmit">
                <input type="submit" value="Salvar" class="blueB submit" />
                <input type="reset" value="Cancelar" class="redB" />
            </div>
            <div class="clear"></div>
        </div>
    </fieldset>
</form>
<script>
    $("select, input:checkbox, input:radio, input:file").uniform();
    $("#validate").validationEngine();
</script>