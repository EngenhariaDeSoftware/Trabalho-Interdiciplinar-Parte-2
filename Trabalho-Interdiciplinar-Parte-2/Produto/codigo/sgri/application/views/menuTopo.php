<div class="welcome">
    <a href="javascript:void(0);" title="Bem vindo ">
        <img src="../theme/images/userPic.png" alt="" />
    </a>
    <span><?php echo $this->session->userdata('nome'); ?></span>
</div>
<div class="userNav">
    <ul>
        <li><a href="#" title=""><img src="../theme/images/icons/topnav/profile.png" alt="" /><span>Perfil</span></a></li>
        <li class="dd"><a title=""><img src="../theme/images/icons/topnav/messages.png" alt="" /><span>Mensagens</span><span class="numberTop">0</span></a>
            <ul class="userDropdown">
                <li><a href="#" title="" class="sAdd">Nova</a></li>
                <li><a href="#" title="" class="sInbox">Entrada</a></li>
                <li><a href="#" title="" class="sOutbox">Saida</a></li>
            </ul>
        </li>
        <li><a href="#" title=""><img src="../theme/images/icons/topnav/settings.png" alt="" /><span>Opções</span></a></li>
        <li><a href="../usuario/sair/" title=""><img src="../theme/images/icons/topnav/logout.png" alt="" /><span>Sair</span></a></li>
    </ul>
</div>
<div class="clear"></div>