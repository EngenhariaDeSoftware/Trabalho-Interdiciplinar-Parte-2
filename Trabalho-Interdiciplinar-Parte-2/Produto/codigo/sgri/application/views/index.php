<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <?php include("application/views/head.php"); ?>
    </head>
    <style>
        .bloqueador{
            position: fixed;
            width: 100%;
            height: 100%;
            background: #000000;
            z-index: 20000;
            -moz-opacity: 0.70;
            filter: alpha(opacity=70); 
            opacity: 0.70;
        }
        .loading{
            margin-left: 50%;
            margin-top: 200px;
            color: #FFFFFF;
        }
    </style>
    <body>
        <!-- Loading -->
        <div class="bloqueador" style="display: none;">
            <div class="loading"><img style='z-index:30000;' src='../theme/images/loaders/loader.gif' border='0' /> Processando...</div>
        </div>

        <!-- Menu da Esquerda -->
        <div id="leftSide">
            <?php
            include("application/views/menuEsquerda.php");
            ?>
        </div>

        <!-- Centro da Pagina -->
        <div id="rightSide">

            <!-- Menu Topo -->
            <div class="topNav">
                <div class="wrapper">
                    <?php
                    include("application/views/menuTopo.php");
                    ?>
                </div>
            </div>

            <!-- Titulo  -->
            <div class="titleArea">
                <div class="wrapper">
                    <div class="pageTitle">
                        <h5>Pagina Inicial</h5>
                        <span>Bem vindo(a) ao SGRI - Sistema de Gestão de Recursos de Infra Estrutura.<br />
                            <h6>Você está na àrea de: <?php echo $this->session->userdata('acessoNome'); ?></h6>
                        </span>
                    </div>
                    <div class="middleNav">
                        <?php
                        include("application/views/menuUsuario.php");
                        ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

            <div class="line"></div>

            <!-- Navegação Rapida -->
            <div class="statsRow">
                <?php
                include("application/views/menuRapido.php");
                ?>
            </div>

            <div class="line"></div>

            <!-- Conteudo Inicial -->

            <div class="wrapper">
                <!--nWarning  nSuccess nFailure mensagem do sistema-->
                <div class="nNote hideit mensagem" style="display: none;">
                    <p class="notificacao"></p>
                </div>
                
                <div class="conteudo">
                    <?php
                        include("application/views/inicial.php");
                    ?>
                </div>
            </div>

            <!-- Rodape -->
            <div id="footer">
                <?php include("application/views/rodape.php"); ?>
            </div>

        </div>
        <div class="clear"></div>

    </body>
</html>