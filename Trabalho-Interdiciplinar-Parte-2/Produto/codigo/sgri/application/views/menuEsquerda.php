<div class="logo">
    <a href="inicio/inicial"><img src="../theme/images/logo.png" alt="" /></a>
</div>
<div class="sidebarSep mt0"></div>
<!-- Pesquisas -->
<form action="pesquisa/glob" class="sidebarSearch">
    <input type="text" name="pesquisaGlobal" placeholder="pesquisar global..." id="pesquisaGlobal" />
    <input type="submit" value="" />            
</form>
<div class="sidebarSep"></div>
<!-- Menu Esquerça Navegação -->
<ul id="menu" class="nav">
    <li class="dash">
        <a href="inicio/inicial" title="Pagina Inicial" class="active">
            <span>Home</span>
        </a>
    </li>
    <!-- Professor -->
    <?php if($this->session->userdata('idAcesso') == 3): ?>
    <li class="ui">
        <a href="javascript:void(0);" title="Reserva" class="exp">
            <span>Reserva Equipamentos</span><strong>+ 2 Links</strong>
        </a>
        <ul class="sub selected">
            <li><a href="reserva/formularioReserva" title="">Nova Reserva</a></li>
            <li><a href="reserva/obterReserva" title="">Listar Minhas Reservas</a></li>
        </ul>
    </li>
    <?php endif; ?>
    
    <!-- InfraEstrutura -->
    <?php if($this->session->userdata('idAcesso') == 2): ?>
    
    <li class="typo">
        <a href="javascript:void(0);" title="Equipamentos" class="exp">
            <span>Equipamentos</span><strong>+ 2 Links</strong>
        </a>
        <ul class="sub selected">
            <li><a href="equipamento/formularioEquipamento" title="">Novo Equipamento</a></li>
            <li><a href="equipamento/obterEquipamento" title="">Listar Equipamentos</a></li>
        </ul>
    </li>

    <li class="tables">
        <a href="javascript:void(0);" title="Salas" class="exp">
            <span>Salas</span><strong>+ 2 Links</strong>
        </a>
        <ul class="sub selected">
            <li><a href="sala/formularioSala" title="">Cadastrar Sala</a></li>
            <li><a href="sala/obterSala" title="">Listar Salas</a></li>
        </ul>
    </li>

    <?php endif; ?>
</ul>
<script>
    $(".sidebarSearch").submit(function(event){
        event.preventDefault();
        if( $("#pesquisaGlobal").val() == "" )
        {
            var div = "<div/>";
            $( div ).dialog({
                modal: true,
                title:"Alerta",
                width: 400,
                open: function (){
                    $(this).html("<h5>Digite algo para ser pesquisado...</h5>");
                }, 
                buttons: {
                    Fechar: function() {
                        $( this ).dialog( "close" );
                    }
                }
            });
            return false;
        }
        $(".bloqueador, .loading").css({
            "display":"block"
        }); 
        var data = $(".sidebarSearch").serialize();
        var aUrl = $(".sidebarSearch").attr("action");
        
        $.post("../"+aUrl, data, function(eData){
            $(".conteudo").html(eData);
            $(".bloqueador, .loading").css({
                "display":"none"
            }); 
        });
    });
    
    $('#pesquisaGlobal').bind('keyup', function(){
        var data = $(".sidebarSearch").serialize();
        var aUrl = "pesquisa/autoCompletar/"
        $.post("../"+aUrl, data, function(eData){
            var availableTags = eData
            $( "#pesquisaGlobal" ).autocomplete({
                source: eData
            });
        }, "json")
    });

</script>