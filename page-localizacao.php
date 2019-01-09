<?php /*Template name: Localização */?>
<?php get_header(); ?>
  <div class="row">
    <div class="col-md-8 col-sm-12">
      <?php if(have_posts()) : while(have_posts()) :  the_post(); ?>
        <h3 class="mb-3"> <?php the_title(); ?></h3>
        
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.0424001015876!2d-47.389701485522544!3d-22.352027823928825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c87723b6e80443%3A0x8095f59b89632fcc!2sR.+Bar%C3%A3o+Arary%2C+272+-+Centro%2C+Araras+-+SP%2C+13600-040!5e0!3m2!1spt-BR!2sbr!4v1546561589114" style="border:0" allowfullscreen="allowfullscreen" width="100%" height="50%" frameborder="0"></iframe>

      <?php the_content(); ?>
      <?php endwhile; ?> 
      <?php else : get_404_template(); endif; ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>