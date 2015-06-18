 <?php
/*
template Name:blog page template
*/ 
$args = array('post_type' => 'post', );
$loop = new WP_Query( $args );

?>
<?php get_header(); ?>       
    <!-- blog -->

    <div class="resourcecontainer">
      <div class="listing-area">

        <div class="grid">     
          <div class="grid-items-lines">
            <?php   
            if($loop->have_posts()):
            while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <a href="<?php echo bloginfo('url')?>/blog/<?php echo $post->post_name; ?>" class="grid-item-blog">
              <div class="blog-img-small">
                <img src="img/banner.jpeg" alt="">
              </div>
              <div class="blog-img">
                <img src="img/sample.jpg" alt="">
              </div>
              <div class="blog-content">
                <h2><?php echo get_the_title() ?></h2>
                <div class="author">
                  <p>Posted by <?php the_author() ?> on <?php the_date() ?></p>
                </div>
                <p><?php echo get_the_content(); ?></p>
                <div class="meta">
                  <p>Resources > Case Studies</p>
                </div>
                <div class="stats">
                    <ul>
                      <li><?php //if(function_exists('the_views')) { the_views(); } ?><span>Views</span></li>
                      <li><?php echo get_comments_number(); ?><span>Comments</span></li>
                    </ul>
                </div>
              </div> 
            </a>
          <?php 
          endwhile;
          endif; 
          ?>
            <!-- end of grid-item-blog -->
          <div class="bottom-cover"></div>  
          </div>
          <!-- end of grid-items-lines -->
        </div>
        <!-- end of grid -->

      </div>
 
<?php get_sidebar(); ?>

    </div>
 
<?php get_footer(); ?>

<?php 

//comment_form($comments_args); 
// $comments = get_comments('post_id=48');
// foreach($comments as $comment) :
// echo($comment->comment_author . '<br />' . $comment->comment_content);
// endforeach;
?>      