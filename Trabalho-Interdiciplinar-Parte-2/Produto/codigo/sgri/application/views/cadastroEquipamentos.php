<!-- Form -->
<script type="text/javascript" src="../theme/js/formulario.js"></script>
<div class="nNote nWarning">
    <p><strong>Aviso: </strong>Campos marcados com asterisco(*) são obrigatórios.</p>
</div>
<form action="equipamento/salvar" id="validate" class="form" method="POST">
    <fieldset>
        <div class="widget">
            <div class="title"><img src="../theme/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Cadastro Equipamentos</h6></div>
            <div class="formRow">
                <label>Nome:<span class="req">*</span></label>
                <div class="formRight"><input type="text" class="validate[required]" name="nome" id="nome" value="" /></div>
                <div class="clear"></div>
            </div>
            <div class="formRow dnone">
                <label>Codigo + Status:<span class="req">*</span></label>
                <div class="formRight">
                    <span class="oneTwo"><input type="text" class="validate[required] codigoPatrimonio" placeholder="Codigo Patrimonio" name="codigoPatrimonio" id="codigoPatrimonio" value="" /></span>
                    <span class="oneTwo">
                        <label>Status:</label>
                        <div class="formRight">
                            <select name="status" class="chzn-select">
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
                <div class="formRight"><textarea rows="8" cols="" name="descricao" id="descricao"></textarea></div><div class="clear"></div>
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
    $(".codigoPatrimonio").mask("999999");
    $( ".chzn-select" ).chosen();
    $("#validate").validationEngine();
</script>