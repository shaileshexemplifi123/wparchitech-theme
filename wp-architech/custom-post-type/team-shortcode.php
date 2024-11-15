<?php 
add_shortcode('TeamsMember', 'team_posts_shortcode');
function team_posts_shortcode($atts){
    
    $atts = shortcode_atts( array( 
		'number_of_team' => '-1',
		),$atts );
	$team_args = array(
		'posts_per_page' => $atts ['number_of_team'], 
		'post_type' 	=> 'team',
		'orderby'       => 'ID',
		'order'         => 'ASC',
	);

    $team = '';
    ob_start();
    $team_query = new WP_Query($team_args);		
?>

            <!-- Project Block -->
            <?php
                if ( $team_query->have_posts() ) {  $i=1; 
                    while($team_query->have_posts()) : $team_query->the_post();
                    $team_img = wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()),'full'); 
                 
                    $team_designation = get_post_meta(get_the_ID(),'team_designation',true );
                    $facebook_link = get_post_meta(get_the_ID(),'facebook_link',true );
                    $twitter_link = get_post_meta(get_the_ID(),'twitter_link',true );
                    $google_link = get_post_meta(get_the_ID(),'google_link',true );
            ?>
             <div class="team-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image-box">
                        <div class="image"><a href="team.html"><img src="<?php echo $team_img; ?>" alt=""></a></div>
                        <ul class="social-links">
                            <li><a href="<?php echo $facebook_link; ?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo $twitter_link; ?>"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo $google_link; ?>"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                        <h3 class="name"><a href="#"><?php echo get_the_title(); ?></a></h3>
                    </div>
                    <span class="designation"><?php echo $team_designation; ?></span>
                </div>
            </div>
            <?php 
            $i++;
        endwhile; 
        wp_reset_postdata();
        } 
    ?>

<?php 
$team = ob_get_clean();
return $team;
} 
?>