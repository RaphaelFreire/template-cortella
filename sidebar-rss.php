
<div class="col-md-4 col-sm-12">
  <?php
                          $url = "https://www.jusbrasil.com.br/noticias/rss";
                          $feeds = simplexml_load_file($url);
                          $i=0;
                          $site = $feeds->channel->title;
                          $sitelink = $feeds->channel->link;
                          foreach ($feeds->channel->item as $item) {
                            $title = $item->title;
                            $link = $item->link;
                            $description = $item->description;
                            $postDate = $item->pubDate;
                            $pubDate = date('d/m/Y',strtotime($postDate));
                            
                            if($i>=5) break;
                            ?>
                                <div class="card mb-3">
                                  <div class="card-body">
                                  <h5 class="card-title text-uppercase title-my-color-1"><?php echo $title; ?></h5>
                                  <h6 class="card-subtitle mb-2 text-muted"> Publicado em:
                                  <span class="badge badge-my-color-1"><?php echo $pubDate; ?></span></h6>
                                  <a class="btn btn-outline-my-color-1 text-uppercase" href="<?php echo $link; ?>" target="_blank">Leia Mais</a>
                                  </div>
                                </div>

                            <?php
                              $i++;
                            }
                        
                          ?>
<?php
    //Adiciona a barra lateral
    dynamic_sidebar('Barra Lateral')
?>
</div>