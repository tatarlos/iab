<?php
/*
template Name:about template
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
$type = $permalink."_type.name";
// var_dump($subpod->field($type));

?>

    <main class="wrapper clearfix">
        <div class="section-container">
            <h2 class="section-title">All <?php echo ucwords($permalink); ?></h2>

           
           <?php while ($subpod->fetch()): ?>
            <a href="<?php echo $subpod->field('permalink')?>">
                <div class="event">
                    <h2><?php echo $subpod->field('title'); ?></h2>
                    <p><?php $subpod->field('thumbnail'); ?></p>
                    <p>
                        <?php 

                            $cat = $subpod->field($type);
                            if ( is_array($cat) ){
                                
                                $catLen = sizeof($cat);
                                
                                for($i = $catLen-1; $i >= 0; $i--){
                                    echo ($cat[$i]."<br>");
                                }

                            }else{
                                echo $cat;
                            }

                        ?>
                    </p>

                    <p>
                        
                        <?php 
                            $postId = $subpod->field('ID');
                            $image_id = get_post_thumbnail_id($postId);
                            $image = wp_get_attachment_image_src($image_id);
                            $image_url = $image[0];             
                        ?>
                    <img src="<?php echo $image_url; ?>" alt=""/>
                    </p>
                 
                    <?php echo wp_trim_words($subpod->field('content'),20); ?> 
         
                </div>
            </a>
            <?php endwhile;?>
        </div>
    </main>
<?php get_footer(); ?> 

