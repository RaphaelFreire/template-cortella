<?php get_header(); ?> 
        <div class="row">
            <div class="col-md-8 col-sm-12">
              <?php
                //Se houver resultados exibe o conteúdo, se não exibe o formulário de busca 
                if(is_search()) : 
                  $total_results = $wp_query -> found_posts;
                  echo '<h3 class="mb-3">' . sprintf(__('%s resultado(s) para "%s"', 'Bootstrap 4 + wordpress'), $total_results, get_search_query()). "</h3>";
                endif;
              ?>
              <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
              <?php get_template_part('content', get_post_format()); ?>
              <?php endwhile; ?>
              <?php else : 
                echo "<p>Sua buca não encontrou resultado, refaça a busca:</p>";
                get_search_form();   
                endif; ?>
            </div>
           <?php get_sidebar(); ?>
        </div>
    </div>
   <?php get_footer();?>