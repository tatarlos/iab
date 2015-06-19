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
                  <a href="#" data-term="e" data-taxonomy="all" data-post-type="<?php echo $permalink ?>" class="tab-link is-active filtering-links">All</a>
                </li>
              <?php 
                foreach ( $terms as $term ) : ?>  
                <li class="tab-header">
                <a href="#" data-term="<?php echo $term->slug ?> "data-taxonomy="<?php echo $taxonomy ?>" data-post-type="<?php echo $permalink ?>" class="tab-link filtering-links"><?php echo $term->name; ?></a>
                
         
              <?php endforeach ?>

            </ul> <!-- end of accordion-tabs-minimal -->

            <div class="navigation-tools">
              <div class="search-bar">
                <?php the_widget( 'WP_Widget_Search' ); ?>
              </div>
            </div> <!-- end of navigation-tools -->
        </div> <!-- end of outer-container -->
      </section> <!-- end of filter-section -->

      
        <div class="grid">     
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
        </div> <!-- end of grid-items-lines -->  
      </div> <!-- end of grid -->
      
 <?php 
// if ($permalink === "events") {
//  get_template_part('events','sidebar');
// }else{
  get_sidebar();
// }


 ?>

    </div>

<!-- </main> -->
<?php get_footer(); ?> 