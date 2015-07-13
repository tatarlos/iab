
<?php get_header(); ?>
<?php 
//query parameters
$params = array( 
    "limit" => 3,

);
//creates pod object and loads data
$eventsPod = pods('events',$params);
$newsPod = pods('news', $params);
$bannerPod = pods('banner', $params);
$params = array( 
    "limit" => 6,
);
$resourcesPod = pods('resources', $params);
$params = array( 
    "limit" => -1,
);
$statsPod = pods('statistic', $params);
$signUpPod = pods('sign_up_info', $params);
?>

<body>
    <div id="loader-wrapper">
    <div id="loader" class="loader">
        <img src="<?php bloginfo('template_directory'); ?>/img/iab-logo.png" alt="">
        <div class="loader-inner ball-scale-ripple">
            <div></div>
        </div>
    </div>
</div>

<main>
        <div class="banner">

            <div class="banner-area">
                
                <?php while ($bannerPod->fetch()): ?>  
                
                <div class="parallax-window">
                  <div class="parallax-static-content">
                    <h1><?php echo $bannerPod -> field('name');  ?></h1>
                    <p><?php echo $bannerPod -> field('description');  ?></p>
                    <button>Read More</button>
                  </div>

                  <div class="parallax-background"></div>
                </div>

            <?php endwhile; ?>       
            
            </div>

            <div class="dots">
                    <div class="dotstyle dotstyle-dotstroke">
                        <ul>
                            
                        </ul>
                    </div>
                </div>
                
        </div>        

        <div class="outercontainer">
            <div class="tabbed">
                <h2>Why IAB</h2>
                <div class="vertical-tabs-container">
                  <div class="vertical-tabs">
                    <?php  
                        //query parameters
                        $params = array( 
                            "limit" => -1,

                        );
                        //creates pod object and loads data
                        $whyIABpods = pods('why_iab', $params);
                    $i = 1;
                    ?>
                     <?php while ($whyIABpods->fetch()): ?>  
                    <a href="javascript:void(0)" class="js-vertical-tab vertical-tab starting-tab<?php echo $i; ?>" rel="tab<?php echo $i; ?>"><?php echo $whyIABpods->field('name'); ?></a>
                    <?php $i++;endwhile; ?>
                  </div>

                  <div class="vertical-tab-content-container">

                    <?php  

                        $i = 1;
                        $whyIABpods->reset();
                     
                    ?>
                    
                    <?php while ($whyIABpods->fetch()):?>
                
                    
                    <a href="#" class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading starting-tab<?php echo $i; ?>" rel="tab<?php echo $i; ?>"><?php echo $whyIABpods->field('name'); ?></a>
                    <div id="tab<?php echo $i; ?>" class="js-vertical-tab-content vertical-tab-content">
                      <p><?php echo $whyIABpods -> field('description'); ?></p>
                    </div>          

                    <?php $i++; endwhile; ?>

                  </div>
                </div>
            </div>
            <div class="signup">
                <div class="flex-boxes">
                    <div class="flex-box">
                        <h2 class="flex-title"><?php echo $signUpPod -> field('name'); ?></h2>
                        <p><?php echo $signUpPod -> field('description'); ?></p><br>
                        <a href="<?php echo bloginfo('url')?>/sign-up">
                             <button><?php echo $signUpPod -> field('button_text') ;?></button>
                        </a>
                    </div>
                </div>
            </div>
            
        </div> <!-- end of tabs -->

        <div class="section-red">
            <div class="outercontainer">
                <h1>News</h1>
                <hr>
                <div class="cards">
                  <?php while ($newsPod->fetch()): ?>  
                  <div class="card">
                    <a href="<?php echo $newsPod->field('permalink')?>">
                    <div class="card-header">
                      <?php echo wp_trim_words($newsPod->field('title'), 4); ?>
                    </div>
                    <div class="card-image">
                        <?php 
                            $postId = $newsPod->field('ID');
                            $image_id = get_post_thumbnail_id($postId);
                            $image = wp_get_attachment_image_src($image_id);
                            $image_url = $image[0];             
                        ?>
                        <img src="<?php echo $image_url; ?>" alt="">

                    </div>
                    <div class="card-copy">
                      <p><?php echo wp_trim_words($newsPod->field('content'),12); ?></p>
                    </div>
                    <div class="card-meta">
                        <p> 
                            <?php 
                                $time =strtotime($newsPod->field('created')) ;
                                echo('Last-Modified: '.gmdate('D, d M Y', $time));
                            ?>
                        </p>
                        <p>
                             <a href="<?php echo bloginfo('url')?>/news">News</a> > <a href="#"><?php echo $newsPod->field('news_type.name');?></a> > <a href="<?php echo $newsPod->field('permalink')?>"></a> 
                        </p>
                    </div>
                     </a>
                  </div>
                <?php endwhile;?>          

                </div>
                <a href="<?php echo bloginfo('url')?>/news">
                <button class="grey-btn">More News</button>
                </a>
            </div>
        </div> <!-- end of 3 news -->
        <div class="statistics">
            <h1>Statistics</h1>
            <hr>
            <h2><?php echo $statsPod->field('name');  ?></h2>
            <p><?php  echo $statsPod->field('description'); ?></p>
      
        </div>

        <div class="section-red">
            <div class="outercontainer">
                <h1>Events</h1>
                <hr>
                <div class="cards">
                  <?php while ($eventsPod->fetch()): ?>  
                  <div class="card">
                    <a href="<?php echo $eventsPod->field('permalink')?>">
                    <div class="card-header">
                      <?php echo wp_trim_words($eventsPod->field('title'), 4); ?>
                    </div>
                    <div class="card-image">
                        <?php 
                            $postId = $eventsPod->field('ID');
                            $image_id = get_post_thumbnail_id($postId);
                            $image = wp_get_attachment_image_src($image_id);
                            $image_url = $image[0];             
                        ?>
                        <img src="<?php echo $image_url; ?>" alt="">

                    </div>
                    <div class="card-copy">
                      <p><?php echo wp_trim_words($eventsPod->field('content'),12); ?></p>
                    </div>
                    <div class="card-meta">
                        <p> 
                            <?php 
                                $time =strtotime($eventsPod->field('created')) ;
                                echo('Last-Modified: '.gmdate('D, d M Y', $time));
                            ?>
                        </p>
                        <p><a href="<?php echo bloginfo('url')?>/events">Events</a> > <a href="#"><?php $event = $eventsPod->field('events_type.name'); echo $event[0]?></a> > <a href="<?php echo $eventsPod->field('permalink')?>"> <?php echo $eventsPod->field('title');?> </a> </p>
                    </div>
                     </a>
                  </div>
                <?php endwhile;?>          

                </div>
                 <a href="<?php echo bloginfo('url')?>/events">
                <button class="grey-btn">More Events</button>
                </a>
            </div>
        </div>
        <div class="grid">
            <h1>Resources</h1>
            <hr>
            <div class="grid-items-lines">
                <?php while ($resourcesPod->fetch()): ?>
                <a href="<?php echo $resourcesPod->field('permalink')?>" class="grid-item">
                    <?php 
                            $postId = $resourcesPod->field('ID');
                            $image_id = get_post_thumbnail_id($postId);
                            $image = wp_get_attachment_image_src($image_id);
                            $image_url = $image[0];             
                    ?>
                    <img src="<?php echo $image_url; ?>" alt="">

                    <h2><?php echo wp_trim_words($resourcesPod->field('title'), 10); ?></h2>
                    <p><?php echo wp_trim_words($resourcesPod->field('content'), 10); ?></p>
                    <div class="meta">
                        <p>
                            <?php 
                                $time =strtotime($resourcesPod->field('created')) ;
                                echo(gmdate('D, d M Y', $time));
                            ?>
                        </p>
                        <p>Resources > <?php
                        
                        $cats = $resourcesPod->field('resources_type');
                        if ( is_array($cats) ){
                            $catLen = sizeof($cats)-1;
                            echo $cats[ $catLen]['name'];

                        }else{
                            echo $cats;
                        } 
                        ?>
                      </p>
                    </div>
              </a>
              <?php endwhile;?>
              <div class="right-cover"></div>
              <div class="bottom-cover"></div>
            </div>
            <a href="<?php echo bloginfo('url')?>/resources">
            <button>More Resources</button></a>
            
        </div> <!-- end of resources grid -->

        <div class="section-red">
            <div class="social">
                <h1>Social Feed</h1>
                <hr>
                <div class="flex-boxes">
                    <div class="flex-box twitter">
                        <h2 class="flex-title">Twitter Feed</h2>
                            <p class ="twitter-text">
                                
                                <?php echo do_shortcode('[fts twitter twitter_name=iabnewzealand]'); ?>
                            </p>
                           <br>
                        <button class="twitter-btn">Follow Us on Twitter</button>
                    </div>
                </div>
            </div>
        </div>    

     <div class="statistics">
            <div class="member-rotate">
                <h1>Members</h1>
                <hr>
                <div class="mem-slider-area">
                    <div class="member-logo">1</div>
                    <div class="member-logo">2</div>
                    <div class="member-logo">3</div>
                    <div class="member-logo">4</div>
                    <div class="member-logo">5</div>
                    <div class="member-logo">6</div>
                    <div class="member-logo">7</div>
                    <div class="member-logo">8</div>
                    <div class="member-logo">9</div>
                    <div class="member-logo">10</div>
                    <div class="member-logo">11</div>
                    <div class="member-logo">12</div>
<!--                     <div class="member-logo">13</div>
                    <div class="member-logo">14</div>
                    <div class="member-logo">15</div>
                    <div class="member-logo">16</div>
                                        <div class="member-logo">13</div>
                    <div class="member-logo">14</div>
                    <div class="member-logo">15</div>
                    <div class="member-logo">16</div> -->
                </div>
            </div>
            <p></p>
       <a href="<?php bloginfo('url')?>/members"><button>More Members</button></a>
        </div>    

<?php get_footer(); ?>