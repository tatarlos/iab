<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="postcontainer">
        <div class="article-area">
            <article>
                <p class="type">  
                </p>
            <h1><?php echo get_the_title(); ?></h1>
            <h2>This artice is about something amazing</h2>
            <p class="date"> 
                <?php 
                    the_date();
                ?>
            </p>
            <p>
                <?php echo get_the_content(); ?>
            </p>
       <hr>
   
          <p class="author">- by <?php the_author(); ?>

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
<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>	
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>