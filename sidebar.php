
<div class="col-md-4 col-sm-12">

<?php
    //Adiciona a barra lateral
    dynamic_sidebar('Barra Lateral')
?>

<div class="card  my-4">
    <h5 class="card-header">
      Notícias
    </h5>
    <div class="card-body">
      <?php 
        include_once(ABSPATH.WPINC."/feed.php");
        $rss = fetch_feed("https://www.jusbrasil.com.br/noticias/rss");
        $maxitems = $rss->get_item_quantity(6);
        $rss_items = $rss->get_items(0, $maxitems);
      ?>
      <ul>
          <?php if ($maxitems == 0) echo"<li>No items.</li>";
          else
          // Loop through each feed item and display each item as a hyperlink.
          foreach ( $rss_items as $item ) : ?> 
            <li>
              <hr>
              <a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a>
            </li>

          <?php endforeach; ?>
        </ul>
    </div>
</div>


</div>
