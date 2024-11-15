<?php 
add_shortcode('Postshowcase', 'news_posts_shortcode');
function news_posts_shortcode($atts){
    
    $atts = shortcode_atts( array( 
		'number_of_post' => '-1',
		),$atts );
	$post_args = array(
		'posts_per_page' => $atts ['number_of_post'], 
		'post_type' 	=> 'post',
		'orderby'       => 'ID',
		'order'         => 'ASC',
	);

    $post = '';
    ob_start();
    $post_query = new WP_Query($post_args);		
?>
     <!-- Project Block -->
            <?php
                if ( $post_query->have_posts() ) {  $i=1; 
                while($post_query->have_posts()) : $post_query->the_post();
                $post_img = wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()),'full'); 
            ?>
              <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><img src="<?php echo $post_img; ?>" alt=""></figure>
                        <div class="overlay-box"><a href="blog-detail.html"><i class="fa fa-link"></i></a></div>
                    </div>
                    <div class="caption-box">
                        <h3><a href="#"><?php echo get_the_title(); ?></a></h3>
                        <ul class="info">
                            <li>06 June 2018,</li>
                            <li>John Smith</li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php 
            $i++;
        endwhile; 
        wp_reset_postdata();
        } 
    ?>

<?php 
$post = ob_get_clean();
return $post;
} 
?>