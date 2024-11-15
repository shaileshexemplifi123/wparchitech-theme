<?php 
add_shortcode('ProjectSlider', 'project_posts_shortcode');
function project_posts_shortcode($atts){
    
    $atts = shortcode_atts( array( 
		'number_of_project' => '-1',
		),$atts );
	$project_args = array(
		'posts_per_page' => $atts ['number_of_project'], 
		'post_type' 	=> 'project',
		'orderby'       => 'ID',
		'order'         => 'ASC',
	);

    $project = '';
    ob_start();
    $project_query = new WP_Query($project_args);		
?>
<div class="projects-carousel owl-carousel owl-theme">
            <!-- Project Block -->
            <?php
                if ( $project_query->have_posts() ) {  $i=1; 
                    while($project_query->have_posts()) : $project_query->the_post();
                    $project_img = wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()),'full'); 

            ?>
            <div class="project-block">
                <div class="image-box">
                    <figure class="image"><img src="<?php echo $project_img; ?>" alt=""></figure>
                    <div class="overlay-box">
                        <h4><a href="project-detail.html"><?php echo get_the_title(); ?></a></h4>
                        <div class="btn-box">
                            <a href="<?php echo get_stylesheet_directory_uri() ?>/assets/images/gallery/1.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                            <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                        </div>
                        <span class="tag">Architecture</span>
                    </div>
                </div>
            </div>
            <?php 
            $i++;
        endwhile; 
        wp_reset_postdata();
        } 
        
        ?>
</div>
<?php 
$project = ob_get_clean();
return $project;
} 
?>