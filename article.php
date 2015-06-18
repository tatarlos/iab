<?php
/*
template Name:Single article template
*/ 
$permalink = pods_v('last','url');

$cat = pods_v(-2,'url');

//query parameters
//creates pod object and loads data
$articlePod = pods($cat,$permalink);
$type = $cat."_type.name";
?>


<?php get_header(); ?>


<div class="postcontainer">
        <div class="article-area">
            <article>
                <p class="type">  
                    <?php
                        
                        $cats = $articlePod->field($type);
                        if ( is_array($cats) ){
                            
                            $catLen = sizeof($cats)-1;
                            echo  $cats[ $catLen];
                            
                            // for($i = $catLen; $i >= 0; $i--){
                            //     echo ($cats[$i]." || ");
                            // }

                        }else{
                            echo $cats;
                        } 
                    ?>
                </p>
            <h1><?php echo $articlePod->field('title'); ?></h1>
            <h2>This artice is about something amazing</h2>
            <p class="date"> 
                <?php 
                    $time =strtotime($articlePod->field('created')) ;
                    echo(gmdate('D, d M Y', $time));
                ?>
            </p>
            <p>
                <?php echo wpautop($articlePod->field('content')); ?>
            </p>
       <hr>
   
          <p class="author">- by <?php
                
                $author_id = $articlePod->field('post_author');
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
        
<?php get_sidebar(); ?>

    </div>
 
<?php comment_form(); ?>

       
</main>


	
<?php get_footer(); ?>
