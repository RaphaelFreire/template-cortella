    <div class="w-100 badge-my-color-1 border-top rodape">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4 text-center text-white">
                    <img class="logo-rodape" src="<?php bloginfo('template_url');?>/img/logo-rodape-branco.svg" alt="logo-rodape">
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 text-center text-white">
                    <h5 class="telephone">
                    <img class="icon-telephone" src="<?php bloginfo('template_url');?>/img/telephone.svg" alt="">
                    <?php echo get_theme_mod('footer_title', ' (19) 3352.4850');?>
                    </h5>
                    <p class="enderenço"><?php echo get_theme_mod('footer_text', 'Rua Barão de Arary, 272 - Centro - Araras - SP' );?></p>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 text-center text-white">
                    <a href="https://www.facebook.com/advocaciaCortella">
                        <img class="icon"src="<?php bloginfo('template_url');?>/img/logo-facebook.svg" alt="logo-facebook"></a><a href="https://www.instagram.com/brenocortella/"><img class="icon mx-2"src="<?php bloginfo('template_url');?>/img/logo-insta.svg" alt="logo-instagram"></a><a href="https://api.whatsapp.com/send?phone=5519997391575&text=Envie%20a%20sua%20mensagem!"><img class="icon"src="<?php bloginfo('template_url');?>/img/logo-whats.svg" alt="logo-whatsapp">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid badge-my-color-1 w-100 border-top text-center">
            <div class="row">
                <div class="col credito my-2">
                    Advocacia Cortella - Todos os direitos reservados - <?php echo date('Y'); ?>
                </div>
            </div>
    </div>
    <?php wp_footer();?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php bloginfo('template_url');?>/js/jquery.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/popper.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/bootstrap.js"></script>
  </body>
</html>