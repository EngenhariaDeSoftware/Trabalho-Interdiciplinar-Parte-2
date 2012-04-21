<div class="widgets">
    <div class="oneTwo">
        <div class="widget">
            <div class="title"><img src="../theme/images/icons/dark/users.png" alt="" class="titleIcon" /><h6>Ultimos Usuarios</h6><div class="num"><a href="javascript:void(0);" class="blueNum">Total de <?php echo $pessoasTotal; ?> pessoas</a></div></div>
            <ul class="partners">
                <?php foreach($pessoas as $valor): ?>
                <li>
                    <a href="javascript:void(0);" title="" class="floatL"><img src="../theme/images/usuario.png" alt="" /></a>
                    <div class="pInfo">
                        <strong><?php echo $valor->pessoaNome; ?></strong>
                        <i><?php echo $valor->acessoNome; ?></i>	
                    </div>
          
                    <div class="clear"></div>
                </li>
                <?php endforeach; ?>
      

            </ul>
        </div>                       
    </div>

    <div class="oneTwo">

        <div class="widget">
            <div class="title"><img src="../theme/images/icons/dark/timer.png" alt="" class="titleIcon" /><h6>Ultimos Equipamentos</h6><div class="num"><a href="javascript:void(0);" class="blueNum">Total de <?php echo $equipamentoTotal; ?> equipamentos</a></div></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable taskWidget">
                <thead>
                    <tr>
                        <td width="30">Nome</td>
                        <td width="30">Descrição</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($ultimosEquipamentos as $valor): ?>
                    <tr>
                        <td class="taskPr"><a href="javascript:void(0);" title=""><?php echo substr($valor->nome, 0, 12); ?></a></td>
                        <td><span class="green f11"><?php echo substr($valor->descricao, 0, 10); ?></span></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
        </div>
        <div class="clear"></div>

    </div>
    <div class="clear"></div>
</div>


<div class="widget">
    <div class="title"><img src="../theme/images/icons/dark/full2.png" alt="" class="titleIcon" /><h6>Tabelas de Salas</h6><div class="num"><a href="javascript:void(0);" class="blueNum">Total de <?php echo $salasTotal; ?> salas</a></div></div>                          
    <table cellpadding="0" cellspacing="0" border="0" class="display taskWidget">
        <thead>
            <tr>
                <th>Predio</th>
                <th>Andar</th>
                <th>Numero</th>
                <th>Tipo Sala</th>
                <th>Data Cadastro</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($ultimasSalas as $valor): ?>            
            <tr class="gradeX">
                <td class="center"><?php echo $valor->predio; ?></td>
                <td class="center"><?php echo $valor->andar; ?></td>
                <td class="center"><?php echo $valor->numero; ?></td>
                <td class="center"><?php echo ( $valor->tipoSala == 0 ) ? "Sala Normal" : ( $valor->tipoSala == 1 ) ? "Laboratorio" : ( $valor->tipoSala == 2 ) ? "Auditório" : "Sala Especial"; ?></td>
                <td class="center"><?php echo $valor->dataCadastro; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>  
</div>
