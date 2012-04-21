$(".detalhe").click(function(event){
    event.preventDefault();
    $(".bloqueador, .loading").css({
        "display":"block"
    }); 
    var aId = $(this).attr("href");
    var aUrl = $(this).attr("id");

    $.post("../"+aUrl, {
        id : aId
    }, function(eData){
            
        var div = "<div/>";
        $( div ).dialog({
            modal: true,
            width: 600,
            title: "Detalhes",
            open: 
            function (){
                $(this).html(eData);
                $(".bloqueador, .loading").css({
                    "display":"none"
                });
            }, 
            buttons: {
                Fechar: function() {
                    $( this ).dialog( "close" );
                }
            }
        });
    });        
});
    
$(".deletar").click(function(event){
    var cUrl = $(this)
    event.preventDefault();
    $(".bloqueador, .loading").css({
        "display":"block"
    }); 
    var aId = $(this).attr("href");
    var aUrl = $(this).attr("id");
        
    var hRef = $(this);
       
    var div = "<div/>";
    $( div ).dialog({
        modal: true,
        title:"Confirmação de Exclusão",
        width: 400,
        open: function (){
            $(this).html("<h5>Tem certeza que deseja excluir???<br /> Essa operação não será desfeita...</h5>");
            $(".bloqueador, .loading").css({
                "display":"none"
            }); 
        }, 
        buttons: {
            Excluir: function() {
                $(".bloqueador, .loading").css({
                    "display":"block"
                }); 
                $( this ).dialog( "close" );
                $.post("../"+aUrl, {
                    id : aId
                }, function(eData){
                    if(eData.sucesso)
                    {
                        var cUrl = $(".obter").attr("id");
                        $.post("../"+cUrl, function(eeData){
                            $(".conteudo").html(eeData)
                        })
                    }
                    $(".bloqueador, .loading").css({
                        "display":"none"
                    }); 
                    $(".mensagem").removeClass("nSuccess");
                    $(".mensagem").removeClass("nFailure");
                    $(".mensagem").addClass(eData.tipo);
                    $(".mensagem").css({
                        "display":"block"
                    });
                    $(".notificacao").html(eData.Mensagem);

                        
                }, "json");
            },
            Cancelar: function() {
                $( this ).dialog( "close" );
            }
        }
    });      
});
    
    
$(".editar").click(function(event){
    event.preventDefault();
    $(".bloqueador, .loading").css({
        "display":"block"
    }); 
    var aId = $(this).attr("href");
    var aUrl = $(this).attr("id");

    $.post("../"+aUrl, {
        id : aId
    }, function(eData){

        $(".conteudo").html(eData);
        $(".bloqueador, .loading").css({
            "display":"none"
        }); 
    });        
});

$(".pesquisar").click(function(event){
    event.preventDefault();

    var aUrl   = $(".form").attr("action");
    //var aValor = $(".pesquisa").val();
    var aValor = $(".form").serialize();

    if(aValor == "")
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
    /*
    $.post("../"+aUrl, {valor : aValor}, function(eData){
        $(".conteudo").html(eData);
    });*/
    $.post("../"+aUrl, aValor, function(eData){
        $(".conteudo").html(eData);
    });
    
    


});


$(".pesquisarPessoas").click(function(event){
    event.preventDefault();
        
    var aUrl   = $(".form").attr("action");
    var data   = $(".form").serialize();
    var aValor = $(".pesquisa").val();

    if(aValor == "")
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
    $.post("../"+aUrl, data, function(eData){
        $(".conteudo").html(eData);
        $(".bloqueador, .loading").css({
            "display":"none"
        }); 
 
    });


});


$(".horControlB ul li a").click(function(event){

    $(".selected").children("li").removeClass("this");
    $(this).parent().addClass("this");
    event.preventDefault();
    var aUrl = $(this).attr("href");
    window.location.hash = aUrl;
       
    if(aUrl == "javascript:void(0);"){
        window.location.hash = "#inicio/inicial";
        return false;
    }
    
    $('html,body').animate({scrollTop: $('html,body').offset().top}, 500);
    $(".bloqueador, .loading").css({
        "display":"block"
    });        
        
    $.post("../"+aUrl, function(eData){
        $(".conteudo").html(eData);
        $(".bloqueador, .loading").css({
            "display":"none"
        }); 
    }).error(function() { 
        var div = "<div/>";
        $( div ).dialog({
            modal: true,
            width: 600,
            title: "Alerta de Informação",
            close: function(){
                window.location.hash = "#inicio/inicial";
                $.post("../inicio/inicial", function(eData){
                    $(".conteudo").html(eData);
                    $(".bloqueador, .loading").css({
                        "display":"none"
                    });
                });
            } ,
            open: 
            function (){
                $(".bloqueador, .loading").css({
                    "display":"none"
                });
                $(this).html("<center><h4 style='color:#FF0000;'>O endereço requisitado não existe!!!</h4></center");
            },
            buttons: {
                Fechar: function() {
                    $( this ).dialog( "close" );
                }
            }
        }); 
    });    
});


$(".relacao").click(function(event){
    event.preventDefault();
    $(".bloqueador, .loading").css({
        "display":"block"
    }); 
    
    var aId  = $(this).attr("id");
    var aUrl = $(this).attr("href");

    $.post("../"+aUrl, {id : aId}, function(eData){
        var div = "<div/>";
        $( div ).dialog({
            modal: true,
            width: 600,
            title: "Relação Professores, Cursos e Disciplinas",
            open: 
            function (){
                $(".bloqueador, .loading").css({
                    "display":"none"
                });
                $(this).html(eData);
            },
            buttons: {
                Fechar: function() {
                    $( this ).dialog( "close" );
                }
            }
        }); 
    });
   
});