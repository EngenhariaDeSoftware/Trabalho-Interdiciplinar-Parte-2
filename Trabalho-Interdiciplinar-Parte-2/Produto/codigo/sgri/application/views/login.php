<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
        <title>SGRI - Sistema de Gestão de Recursos de Infra Estrutura</title>
        <link href="theme/css/main.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="theme/js/jquery.js"></script>

        <script type="text/javascript" src="theme/js/plugins/spinner/ui.spinner.js"></script>
        <script type="text/javascript" src="theme/js/plugins/spinner/jquery.mousewheel.js"></script>

        <script type="text/javascript" src="theme/js/jqueryui.js"></script>

        <script type="text/javascript" src="theme/js/plugins/charts/excanvas.min.js"></script>
        <script type="text/javascript" src="theme/js/plugins/charts/jquery.flot.js"></script>
        <script type="text/javascript" src="theme/js/plugins/charts/jquery.flot.orderBars.js"></script>
        <script type="text/javascript" src="theme/js/plugins/charts/jquery.flot.pie.js"></script>
        <script type="text/javascript" src="theme/js/plugins/charts/jquery.flot.resize.js"></script>
        <script type="text/javascript" src="theme/js/plugins/charts/jquery.sparkline.min.js"></script>

        <script type="text/javascript" src="theme/js/plugins/forms/uniform.js"></script>
        <script type="text/javascript" src="theme/js/plugins/forms/jquery.cleditor.js"></script>
        <script type="text/javascript" src="theme/js/plugins/forms/jquery.validationEngine-en.js"></script>
        <script type="text/javascript" src="theme/js/plugins/forms/jquery.validationEngine.js"></script>
        <script type="text/javascript" src="theme/js/plugins/forms/jquery.tagsinput.min.js"></script>
        <script type="text/javascript" src="theme/js/plugins/forms/autogrowtextarea.js"></script>
        <script type="text/javascript" src="theme/js/plugins/forms/jquery.maskedinput.min.js"></script>
        <script type="text/javascript" src="theme/js/plugins/forms/jquery.dualListBox.js"></script>
        <script type="text/javascript" src="theme/js/plugins/forms/jquery.inputlimiter.min.js"></script>
        <script type="text/javascript" src="theme/js/plugins/forms/chosen.jquery.min.js"></script>

        <script type="text/javascript" src="theme/js/plugins/wizard/jquery.form.js"></script>
        <script type="text/javascript" src="theme/js/plugins/wizard/jquery.validate.min.js"></script>
        <script type="text/javascript" src="theme/js/plugins/wizard/jquery.form.wizard.js"></script>

        <script type="text/javascript" src="theme/js/plugins/uploader/plupload.js"></script>
        <script type="text/javascript" src="theme/js/plugins/uploader/plupload.html5.js"></script>
        <script type="text/javascript" src="theme/js/plugins/uploader/plupload.html4.js"></script>
        <script type="text/javascript" src="theme/js/plugins/uploader/jquery.plupload.queue.js"></script>

        <script type="text/javascript" src="theme/js/plugins/tables/datatable.js"></script>
        <script type="text/javascript" src="theme/js/plugins/tables/tablesort.min.js"></script>
        <script type="text/javascript" src="theme/js/plugins/tables/resizable.min.js"></script>

        <script type="text/javascript" src="theme/js/plugins/ui/jquery.tipsy.js"></script>
        <script type="text/javascript" src="theme/js/plugins/ui/jquery.collapsible.min.js"></script>
        <script type="text/javascript" src="theme/js/plugins/ui/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="theme/js/plugins/ui/jquery.progress.js"></script>
        <script type="text/javascript" src="theme/js/plugins/ui/jquery.timeentry.min.js"></script>
        <script type="text/javascript" src="theme/js/plugins/ui/jquery.colorpicker.js"></script>
        <script type="text/javascript" src="theme/js/plugins/ui/jquery.jgrowl.js"></script>
        <script type="text/javascript" src="theme/js/plugins/ui/jquery.breadcrumbs.js"></script>
        <script type="text/javascript" src="theme/js/plugins/ui/jquery.sourcerer.js"></script>

        <script type="text/javascript" src="theme/js/plugins/calendar.min.js"></script>
        <script type="text/javascript" src="theme/js/plugins/elfinder.min.js"></script>

        <script type="text/javascript" src="theme/js/charts/chart.js"></script>
    </head>

    <body class="nobg loginPage">

        <div class="topNav">
            <div class="wrapper">
                <div class="userNav">
                    <ul>
                        <li><a href="javascript:void(0);" class="windowse" title=""><img src="theme/images/icons/topnav/profile.png" alt="" /><span>Contato</span></a></li>
                        <li><a href="javascript:void(0);" class="windowse" title=""><img src="theme/images/icons/topnav/messages.png" alt="" /><span>Suporte</span></a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <div class="loginWrapper">
            <div class="loginLogo"><img src="theme/images/loginLogo.png" alt="" /></div>
            <div class="widget">
                <div class="title"><img src="theme/images/icons/dark/files.png" alt="" class="titleIcon" /><h6>Painel de Login</h6></div>
                <form action="index/login" id="validate" class="form" method="POST">
                    <fieldset>
                        <div class="formRow">
                            <label for="login">Usuario:</label>
                            <div class="loginInput"><input type="text" name="usuario" class="validate[required]" id="login" /></div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="pass">Senha:</label>
                            <div class="loginInput"><input type="password" name="senha" class="validate[required]" id="pass" /></div>
                            <div class="clear"></div>
                        </div>

                        <div class="loginControl">
                            <input type="submit" value="Entrar" class="dredB logMeIn" />
                            <div class="clear"></div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>    

        <div id="footer">
            <div class="wrapper">
                SGRI - Trabalho de Sistemas
                <a href="javascript:void(0);" title="SGRI">SGRI</a>
            </div>
        </div>
        <script type="text/javascript">
            
            $(".windowse").click(function(){
                var div = "<div/>";
                $( div ).dialog({
                    modal: true,
                    title:"Projeto de Sistemas de Informação",
                    width: 600,
                    open: function (){
                        $(this).html("<h5>Miyamoto, Diego, Marcos, Grazielle</h5>");
                    }, 
                    buttons: {
                        Fechar: function() {
                            $( this ).dialog( "close" );
                        }
                    }
                });
            })
            
        </script>
    </body>
</html>