<?php
/*
template Name:All SubNav template
*/ 
?>
<?php get_header(); ?> 

<?php
  //query parameters
  $params = array( 
      "limit" => -1,
      );
  $permalink = pods_v('last','url');
  //creates pod object and loads data
  $subpod = pods($permalink,$params); 
  $taxonomy = $permalink."_type"; 
    $params = array( 
      "limit" => -1,
      );
  $terms = get_terms($taxonomy, array('orderby' => 'name', 'hide_empty' => 0, 'parent'=>0 ));

?>
<!-- <main> -->
    <!-- articals -->

    <div class="resourcecontainer">
      <div class="listing-area">
      <section class="filter-section">
        <div class="outercontainer">
         
            <div class="filter-header">
              <h2><?php echo (ucwords($permalink)); ?></h2>
            </div>
        
            <ul class="accordion-tabs-minimal">
                <li class="tab-header">
                  <a href="#" data-term="all" data-taxonomy="#" data-post-type="<?php echo $permalink ?>" class="tab-link is-active filtering-links">latest <?php echo $permalink ?></a>
                </li>
              <?php 
                foreach ( $terms as $term ) : ?>  
                <li class="tab-header">
                <a href="#" data-id="<?php echo $term->term_id ?>" data-term="<?php echo $term->slug ?>" data-taxonomy="<?php echo $taxonomy ?>" data-post-type="<?php echo $permalink ?>" class="tab-link filtering-links"><?php echo $term->name; echo $term->term_id?></a>            
                </li>
              <?php endforeach; ?>

            </ul> <!-- end of accordion-tabs-minimal -->

            <div class="navigation-tools">
            </div> <!-- end of navigation-tools -->
        </div> <!-- end of outer-container -->
      </section> <!-- end of filter-section -->

        <div class="grid">
          <?php
            if (isset($_GET['id']) ) {
              $id = $_GET['id'];
            }
            if(isset($_GET['filter'])):
              $filter = $_GET['filter'];
              $index = $_GET['index'];
              
          ?>
          <div class = "filtering" data-id="<?php echo $id ?>" data-index= "<?php echo $index ?>" data-term="<?php echo $filter ?>" data-taxonomy="<?php echo $taxonomy ?>" data-post-type="<?php echo $permalink ?>"></div>
          <?php else: ?>
            <select class = "selection" style ="display:none"></select>
          <div class="grid-items-lines">
            <?php while ($subpod->fetch()): ?>  
              

              <a href="<?php echo $subpod->field('permalink')?>" class="grid-item-big">
                <?php 
                    $postId = $subpod->field('ID');
                    $image_id = get_post_thumbnail_id($postId);
                    $image = wp_get_attachment_image_src($image_id);
                    $image_url = $image[0];             
                ?>
                <img src="<?php echo $image_url; ?>" alt="">

                <h2>
                <?php echo wp_trim_words($subpod->field('title'), 2); ?>
                </h2>
                <p><?php echo wp_trim_words($subpod->field('content'),10); ?></p>
                <div class="meta">
                  <p>
                    <?php 
                          $time =strtotime($subpod->field('created')) ;
                          echo(gmdate('D, d M Y', $time));
                      ?>
                  </p>
                  <p>Resources > Case Studies</p>
                </div>
              </a>
            <?php endwhile;?>   
            
            <div class="right-cover"></div>
            <div class="bottom-cover"></div>
          </div>
           <?php endif; ?>
        </div> <!-- end of grid-items-lines -->  
       
      </div> <!-- end of grid -->
   
      
 <?php 

  get_sidebar();

 ?>

    </div>

<!-- </main> -->
<?php get_footer(); ?> 