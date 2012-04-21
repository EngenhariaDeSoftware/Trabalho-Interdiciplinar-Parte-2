/*Submit formulario*/
$(".form").submit(function(){
    
    //Ir para o topo
    $('html,body').animate({scrollTop: $('html,body').offset().top}, 500);
    var aUrl = $(".form").attr("action");
    var data = $(".form").serialize();
     
    $(".bloqueador, .loading").css({
        "display":"block"
    });        
    
    $.post( "../"+aUrl, data, function(eData){
        if(eData.sucesso){
            if(eData.redirecionar)
            {
                $.post("../"+eData.url, function(eeData){
                    $(".conteudo").html(eeData);
                });
            }
        }
        
        $(".mensagem").removeClass("nSuccess");
        $(".mensagem").removeClass("nFailure");
        $(".mensagem").addClass(eData.tipo);
        $(".mensagem").css({
            "display":"block"
        });
        $(".notificacao").html(eData.Mensagem);
        $(".bloqueador, .loading").css({
            "display":"none"
        });
        
    }, "json" );
            
    return false;
            
});


$(".back").click(function(event){
    event.preventDefault();
    $('html,body').animate({scrollTop: $('html,body').offset().top}, 500);
     
    $(".bloqueador, .loading").css({
        "display":"block"
    });    
    var aUrl = $(this).attr("id");
    $.post("../"+aUrl, function(eData){
        $(".conteudo").html(eData);
        $(".bloqueador, .loading").css({
            "display":"none"
        });
    });
});