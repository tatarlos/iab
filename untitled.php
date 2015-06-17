


<?php 
       
$args = array(
  'post_type' => $permalink,
  'tax_query' => array(
    array(
      'taxonomy' => $taxonomy,
      'field'    => 'slug',
      'terms'    => 'insights',
    ),
  ),
);

$loop = new WP_Query( $args );

while ( $loop->have_posts() ) : $loop->the_post();

?>
  <a href="<?php echo the_permalink();?>" class="grid-item-big">
    <?php 
        $postId = get_the_ID();;
        $image_id = get_post_thumbnail_id($postId);
        $image = wp_get_attachment_image_src($image_id);
        $image_url = $image[0];             
    ?>
    <img src="<?php echo $image_url; ?>" alt="">

    <h2>
    <?php echo wp_trim_words(get_the_title(), 2); ?>
    </h2>
    <p><?php echo wp_trim_words(get_the_content(),5); ?></p>
    <div class="meta">
      <p>
        <?php 
              $time =strtotime(get_the_date()) ;
              echo(gmdate('D, d M Y', $time));
          ?>
      </p>
      <p>Resources > Case Studies</p>
    </div>
  </a>
<?php endwhile;?>  
