<?php foreach ($equipamentos as $valor): ?>
    <table cellpadding="0" cellspacing="0" width="100%" class="sTable">
        <thead>
            <tr>
                <td colspan="1">Nome</td>
                <td colspan="1">Codigo Patrimônico</td>
                <td colspan="1">Status</td>
                <td colspan="1">Data Cadastro</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="1"><?php echo $valor->nome; ?></td>
                <td colspan="1"><?php echo $valor->codigoPatrimonio; ?></td>
                <td colspan="1"><?php echo ($valor->status == 1) ? "Disponível" : "Em Manutenção"; ?></td>
                <td colspan="1"><?php echo $valor->dataCadastro; ?></td>
            </tr>
        </tbody>
    </table>

    <table cellpadding="0" cellspacing="0" width="100%" class="sTable">
        <thead>
            <tr>
                <td colspan="4">Nome</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="4"><?php echo $valor->descricao; ?></td>
            </tr>
        </tbody>
    </table>
<?php endforeach; ?>
