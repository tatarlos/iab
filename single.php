<?php get_header(); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php  if( members_can_current_user_view_post(get_the_ID()) ) : ?>
<div class="postcontainer">
  <div class="article-area">
      <article>
        <p class="type">
          <?php 
          $cat = get_the_category();
          echo $cat[0]->name;
          ?>

        </p>

        <div class="artical-header">
          <div class="artical-header-copy">
            <p class="date"> 
                <?php 
                    the_date();
                ?>
            </p> 
            <h1><?php echo get_the_title(); ?></h1>
          </div>
          <div class="author-info">
            <?php 
            $author_id = get_the_author_meta('ID');
            echo get_avatar( $author_id, 32 ); ?>
            <p class="author">- By <?php echo get_the_author(); ?></p>
          </div>
        </div>
     
      <p>
          <?php echo wpautop(get_the_content()); ?>
      </p>

      </article>
  
  <div class="comments">
    <?php  
    $comments_args = array(
            // change the title of send button 
            'label_submit'=>'Add Comment',
            // change the title of the reply section
            'title_reply'=>'Write a Comment',
            // remove "Text or HTML to be displayed after the set of comment fields"
            'comment_notes_after' => '',
            // redefine your own textarea (the comment body)
            'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
    );    
    ?>         
     
    <?php comment_form($comments_args); ?>

    <ol class="commentlist">
    	<?php
    		//Gather comments for a specific page/post 
    		$comments = get_comments(array(
    			'post_id' => get_the_ID(),
    			'status' => 'approve' //Change this to the type of comments to be displayed
    		));

    		//Display the list of comments
    		wp_list_comments(array(
    			'per_page' => 10, //Allow comment pagination
    			'reverse_top_level' => false //Show the latest comments at the top of the list
    		), $comments);
    	?>
    </ol>

  </div>
  
<?php else:?>
    <?php echo get_the_excerpt(); ?>
    <p>To View Full Atricle Please register</p>
  <?php endif; ?>
  <?php endwhile; else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>

<div class="grid">
  <h2>You May Also Like:</h2>


  <hr>
  <div class="grid-items-lines">
    <a href="javascript:void(0)" class="grid-item">
      <img src="img/banner.jpeg" alt="">
      <h2>Article Title</h2>
      <p>Lorem ipsum dolor sit amet, elit. Rem, illum.</p>
      <div class="meta">
          <p>15th April 2015</p>
          <p>Resources > Case Studies</p>
      </div>
    </a>
    <a href="javascript:void(0)" class="grid-item">
      <img src="img/banner.jpeg" alt="">
      <h2>Article Title</h2>
      <p>Lorem ipsum dolor sit amet, elit. Rem, illum.</p>
      <div class="meta">
          <p>15th April 2015</p>
          <p>Resources > Case Studies</p>
      </div>
    </a>
    <a href="javascript:void(0)" class="grid-item">
      <img src="img/banner.jpeg" alt="">
      <h2>Article Title</h2>
      <p>Lorem ipsum dolor sit amet, elit. Rem, illum.</p>
      <div class="meta">
          <p>15th April 2015</p>
          <p>Resources > Case Studies</p>
      </div>
    </a>
    <div class="right-cover"></div>
    <div class="bottom-cover"></div>
  </div>
</div> <!-- end of You May Also Like -->

</div>


<?php //get_sidebar(); ?>
      <div class="sidebar">
        <div class="outercontainer">
<h2><a href="<?php bloginfo('url')?>/blogs">back to blogs</a></h2>
            <h2>Sidebar Stuff</h2>
            <hr>
            <div class="cards">
              <div class="card"><!-- Disclaimer -->
                      <div class="card-header">
                        Disclaimer
                      </div>
                      <div class="card-copy">
                        <p>The views expressed in these individual blog posts are those of the author. They are not necessarily the views of IAB or the author's company.</p>
                      </div>
                    </div>
                    <!-- end of Disclaimer -->

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
<?php get_footer(); ?>