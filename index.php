
<?php get_header(); ?>
<?php 


//query parameters
$params = array( 
    "limit" => 3,

);
//creates pod object and loads data
$eventsPod = pods('events',$params);
$newsPod = pods('news', $params);

$params = array( 
    "limit" => 6,
);
$resourcesPod = pods('resources', $params);

?>

<main>
        <div class="banner">

            <div class="banner-area">

                <div class="parallax-window">
                  <div class="parallax-static-content">
                    <h1>IAB's Latest Headlines</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque esse quisquam quas perferendis.</p>
                    <button>Read More</button>
                  </div>

                  <div class="parallax-background"></div>
                </div>


                <div class="parallax-window">
                  <div class="parallax-static-content">
                    <h1>IAB's Latest Headlines 2</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque esse quisquam quas perferendis.</p>
                    <button>Read More</button>
                  </div>

                  <div class="parallax-background"></div>
                </div>


                <div class="parallax-window">
                  <div class="parallax-static-content">
                    <h1>IAB's Latest Headlines 3</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque esse quisquam quas perferendis.</p>
                    <button>Read More</button>
                  </div>

                  <div class="parallax-background"></div>
                </div>

                
            
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
                    <a href="javascript:void(0)" class="js-vertical-tab vertical-tab is-active" rel="tab1">Advertising Agency</a>
                    <a href="javascript:void(0)" class="js-vertical-tab vertical-tab" rel="tab2">Advertiser</a>
                    <a href="javascript:void(0)" class="js-vertical-tab vertical-tab" rel="tab3">Designer / Copywriter</a>
                    <a href="javascript:void(0)" class="js-vertical-tab vertical-tab" rel="tab4">Journalist</a>
                    <a href="javascript:void(0)" class="js-vertical-tab vertical-tab" rel="tab5">Media Buyer</a>
                  </div>

                  <div class="vertical-tab-content-container">
                    <a href="#" class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading is-active" rel="tab1">Advertising Agency</a>
                    <div id="tab1" class="js-vertical-tab-content vertical-tab-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt pellentesque lorem, id suscipit dolor rutrum id. Morbi facilisis porta volutpat. Fusce adipiscing, mauris quis congue tincidunt, sapien purus suscipit odio, quis dictum odio tortor in sem. Ut sit amet libero nec orci mattis fringilla.</p>
                    </div>

                    <a href="#" class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading" rel="tab2">Advertiser</a>
                    <div id="tab2" class="js-vertical-tab-content vertical-tab-content">
                      <p>Ut laoreet augue et neque pretium non sagittis nibh pulvinar. Etiam ornare tincidunt orci quis ultrices. Pellentesque ac sapien ac purus gravida ullamcorper. Duis rhoncus sodales lacus, vitae adipiscing tellus pharetra sed. Praesent bibendum.</p>
                    </div>

                    <a href="#" class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading" rel="tab3">IDesigner / Copywriter</a>
                    <div id="tab3" class="js-vertical-tab-content vertical-tab-content">
                      <p>Donec mattis mauris gravida metus laoreet non rutrum sem viverra. Aenean nibh libero, viverra vel vestibulum in, porttitor ut sapien. Phasellus tempor lorem id justo ornare tincidunt. Nulla faucibus, purus eu placerat fermentum, velit mi iaculis nunc, bibendum tincidunt ipsum justo eu mauris.</p>
                    </div>

                    <a href="#" class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading" rel="tab4">Journalist</a>
                    <div id="tab4" class="js-vertical-tab-content vertical-tab-content">
                      <p>Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus dui urna, mollis vel suscipit in, pharetra at ligula. Pellentesque a est vel est fermentum pellentesque sed sit amet dolor. Nunc in dapibus nibh. Aliquam erat volutpat.</p>
                    </div>

                    <a href="#" class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading" rel="tab5">Media Buyer</a>
                    <div id="tab5" class="js-vertical-tab-content vertical-tab-content">
                      <p>Ut laoreet augue et neque pretium non sagittis nibh pulvinar. Etiam ornare tincidunt orci quis ultrices. Pellentesque ac sapien ac purus gravida ullamcorper. Duis rhoncus sodales lacus, vitae adipiscing tellus pharetra sed. Praesent bibendum.</p>
                    </div>
                  



                  </div>
                </div>
            </div>
            <div class="signup">
                <div class="flex-boxes">
                    <div class="flex-box">
                        <h2 class="flex-title">Signup to our Newsletter</h2>
                        <p>Stay up to date with the IAB by receiving useful information via our newsletter.</p><br>
                        <button>Signup Now</button>
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
                      <p><?php echo wp_trim_words($newsPod->field('content'),10); ?></p>
                    </div>
                    <div class="card-meta">
                        <p> 
                            <?php 
                                $time =strtotime($newsPod->field('created')) ;
                                echo('Last-Modified: '.gmdate('D, d M Y', $time));
                            ?>
                        </p>
                        <p>News > News Tag</p>
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
                                echo('Last-Modified: '.gmdate('D, d M Y', $time));
                            ?>
                        </p>
                        <p>Resources > Resource Tag</p>
                    </div>
                </a>
              <?php endwhile;?>
              <div class="right-cover"></div>
              <div class="bottom-cover"></div>
            </div>
            <a href="<?php echo bloginfo('url')?>/resources">
            <button>More Resources</button>
            </a>
        </div> <!-- end of resources grid -->

        <div class="section-red">
            <div class="social">
                <h1>Social Feed</h1>
                <hr>
                <div class="flex-boxes">
                    <div class="flex-box twitter">
                        <h2 class="flex-title">Twitter Feed</h2>

          

           </p>
            <p class ="twitter-text"></p>
           <br>
                        <button class="twitter-btn">Follow Us on Twitter</button>
                    </div>
                    <div class="flex-box fb">
                        <h2 class="flex-title">Facebook Feed</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad nostrum, libero!</p><br>
                        <button class="fb-btn">Like Us on Facebook</button>
                    </div>
                </div>
            </div>
        </div>    

        <div class="statistics">
            <h1>Statistics</h1>
            <hr>
            <h2>123,456,789 unique users of the internet in 2014</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem esse et veniam velit ut dolorum excepturi ipsam itaque suscipit, dignissimos quae alias placeat unde quasi nam soluta eaque, odio earum!</p>
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
                      <p><?php echo wp_trim_words($eventsPod->field('content'),10); ?></p>
                    </div>
                    <div class="card-meta">
                        <p> 
                            <?php 
                                $time =strtotime($eventsPod->field('created')) ;
                                echo('Last-Modified: '.gmdate('D, d M Y', $time));
                            ?>
                        </p>
                        <p>Events > Events Tag</p>
                    </div>
                     </a>
                  </div>
                <?php endwhile;?>          

                </div>
                 <a href="<?php echo bloginfo('url')?>/events">
                <button class="grey-btn">More Events</button>
                </a>
            </div>
        </div> <!-- end of 3 events -->

        <!-- shopping cart Simple PayPal Shopping Cart -->
   <!--      <?php 
        $itemprice = 12;
        $productname="\"hallo\" ";
        $b = "[wp_cart_button name=";
        $e = "price= \"19.95\" shipping= \"4.99\"]";
      
        echo do_shortcode($b.$productname.$e); ?>
        <?php echo do_shortcode('[show_wp_shopping_cart]'); ?>  -->
    </main>

<?php get_footer(); ?>

