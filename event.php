<?php
/*
template Name:Single Event single template
*/ 
$permalink = pods_var('last','url');
$cat = pods_v(-2,'url');
$type = $cat."_type.name";
//query parameters
//creates pod object and loads data
$eventsPod = pods('events',$permalink);
$postID =$eventsPod->field('ID');
?>


<?php get_header(); ?>


<div class="postcontainer">
        <div class="article-area">
            <article>
                <p class="type">  
                    <?php
                        
                        $cats = $eventsPod->field($type);
                        if ( is_array($cats) ){
                            
                            $catLen = sizeof($cats)-1;
                            echo  $cats[ $catLen];

                        }else{
                            echo $cats;
                        } 
                    ?>
                </p>
            <h1><?php echo $eventsPod->field('title'); ?></h1>
            <h2>This artice is about something amazing</h2>
            <p class="date"> 
                <?php 
                    $time =strtotime($eventsPod->field('created')) ;
                    echo(gmdate('D, d M Y', $time));
                ?>
            </p>
            <p>
                <?php echo wpautop($eventsPod->field('content')); ?>
            </p>
        
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
   
       <hr>
   
          <p class="author">- by <?php
                
                $author_id = $eventsPod->field('post_author');
                $author = get_the_author_meta( 'display_name', $author_id );
                echo $author;
            ?>

        </p>
            </article>

            
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


        
        <?php
        $cost = $eventsPod->field('cost');
        $costs = ($cost == 0)? "Free" : $eventsPod->display('cost')." + GST";

        $hasFinishDate = ($eventsPod->field('finish_date') ==="0000-00-00" )?  "":" to ".$eventsPod->display('finish_date');

        $location = $eventsPod->field('place');
         ?>

        <div class="sidebar">
          <div class="outercontainer">
            <h2>events part</h2>
            <hr>
            <div class="cards">              
                <div class="detail card">
                  <!-- Event details -->
                  <div class="card-header">
                    Event Details
                  </div>
                  <div class="event-detail">
                    <div class="row">
                      <div class="title-column">Cost</div>
                      <div class="detail-column"><?php echo $costs ?></div>
                    </div>
                    <!-- end of a row -->
                    <div class="row">
                      <div class="title-column">Duration</div>
                      <div class="detail-column"><?php echo $eventsPod->display('duration') ?></div>
                    </div>
                    <!-- end of a row -->
                    <div class="row">
                      <div class="title-column">When</div>
                      <div class="detail-column"><?php $date  = $eventsPod->display('start_date').$hasFinishDate; echo $date; ?></div>
                    </div>
                    <!-- end of a row -->
                    <div class="row">
                        <div class="title-column">Location</div>
                        <div class="detail-column">
                            <?php 
                            echo $location['name'].": ";
                            echo $location['no'].", "; 
                            echo $location['address'].", ";
                            echo $eventsPod->display('place.suburb.name').", ";
                            echo $eventsPod->display('place.city.name');
                            ?>
                        </div>
                    </div>
                    <!-- end of a row -->
                    <div class="row">
                      <div class="title-column">Early Bird</div>
                      <div class="detail-column">Save 10% if booked before 12 June 2015</div>
                    </div>
                    <!-- end of a row -->
                    <div class="bottom-cover"></div>
                </div>
                <div class="pay-meta">
                  <button class ="addCart" data-id ="<?php echo $postID ?>" data-cost ="<?php echo $cost ?>" data-date="<?php $date ?>">Add to Cart</button>
                  <button>Pay Now</button>
                </div>
              </div>
            <?php get_template_part('events','sidebar'); ?>
     

    </div>
        
</main>

	
<?php get_footer(); ?>
