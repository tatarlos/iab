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
              <?php 
               
                foreach ( $terms as $term ) : ?>  
                <li class="tab-header">
                <a href="#" data-term="<?php echo $term->slug ?> "data-taxonomy="<?php echo $taxonomy ?>" data-post-type="<?php echo $permalink ?>" class="tab-link is-active filtering-links"><?php echo $term->name; ?></a>
                </li>
         
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
      
      <div class="sidebar">
        <div class="outercontainer">
            <h2>The Latest</h2>
            <hr>
            <div class="cards">
              <div class="card">
                <div class="card-header">
                  First Interesting Article
                </div>
                <div class="card-image">
                  <img src="img/banner.jpeg" alt="">
                </div>
                <div class="card-copy">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, officiis sunt neque facilis culpa molestiae necessitatibus delectus veniam provident.</p>
                </div>
                <div class="card-meta">
                  <p>15th April 2015</p>
                    <p>Resources > Market Research</p>
                </div>
              </div>

              <div class="card">
                <div class="card-header">
                  Second Interesting Article
                </div>
                <div class="card-image">
                  <img src="img/banner.jpeg" alt="">
                </div>
                <div class="card-copy">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, officiis sunt neque facilis culpa molestiae necessitatibus delectus veniam provident.</p>
                </div>
                <div class="card-meta">
                  <p>15th April 2015</p>
                    <p>Resources > Ad Spend</p>
                </div>
              </div>

              <div class="card">
                <div class="card-header">
                  Last Interesting Article
                </div>
                <div class="card-image">
                  <img src="img/banner.jpeg" alt="">
                </div>
                <div class="card-copy">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, officiis sunt neque facilis culpa molestiae necessitatibus delectus veniam provident.</p>
                </div>
                <div class="card-meta">
                  <p>15th April 2015</p>
                    <p>Resources > Trends</p>
                </div>
              </div>

            </div>
          </div>
      </div>

    </div>

<!-- </main> -->
<?php get_footer(); ?> 