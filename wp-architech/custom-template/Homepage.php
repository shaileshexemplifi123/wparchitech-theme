<?php /* Template Name: Homepage*/ ?>
<!-- Bnner Section -->
<?php get_header();
$slider_section = get_field('slider_section');

?>
<section class="banner-section">
    <div class="banner-carousel owl-carousel owl-theme">
        <?php foreach ($slider_section as $sliders) :
            $button_link = $sliders['button_link']; ?>
            <div class="slide-item" style="background-image: url(<?php echo $sliders['image']['url'] ?>);">
                <div class="auto-container">
                    <div class="content-box">
                        <?php if (!empty($sliders['title'])) : ?>
                            <h2><?php echo $sliders['title']; ?></h2>
                        <?php endif;
                        if (!empty($sliders['description'])) :  ?>
                            <div class="text"><?php echo $sliders['description']; ?></div>
                        <?php endif;
                        if ($button_link) :
                            $link_url = $button_link['url'];
                            $link_title = $button_link['title'];
                            $link_target = $button_link['target'] ? $button_link['target'] : '_self';
                        ?>
                            <div class="link-box">
                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="theme-btn btn-style-one"><?php echo esc_html($link_title); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
    $header_number = get_field("phone_number", "option");
    $eamil_address = get_field("eamil_address", "option");
    if (!empty($header_number) ||  !empty($eamil_address)) {
    ?>
        <div class="bottom-box">
            <div class="auto-container clearfix">
                <ul class="contact-info">
                    <li><span>Phone :</span> <?php echo $header_number; ?></li>
                    <li><span>EMAIL :</span> <a href="#"><?php echo $eamil_address; ?></a></li>
                </ul>
            </div>
        </div>
    <?php }  ?>
</section>
<!-- End Bnner Section -->

<!-- About Section -->
<?php $about_section = get_field('about_section'); ?>
<section class="about-section" style="background-image: url(<?php echo $about_section['background_image']['url'] ?>;">
    <div class="auto-container">
        <div class="row no-gutters">
            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="title-box wow fadeInLeft" data-wow-delay='1200ms'>
                        <h2><?php echo $about_section['section_title'];?></h2>
                    </div>
                    <?php if (!empty($about_section['image_one']['url']) || !empty($about_section['image_two']['url'] ) ):  ?>
                    <div class="image-box">
                        <figure class="alphabet-img wow fadeInRight"><img src="<?php echo $about_section['image_one']['url'] ?>" alt=""></figure>
                        <figure class="image wow fadeInRight" data-wow-delay='600ms'><img src="<?php echo $about_section['image_two']['url'] ?>" alt=""></figure>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- Content Column -->
            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInLeft">
                    <div class="content-box">
                      <?php if (!empty($about_section['title'])) : ?>
                        <div class="title">
                            <h2><?php echo $about_section['title'];?></h2>
                        </div>
                        <?php endif; if (!empty($about_section['description'])) : ?>
                        <div class="text"><?php echo $about_section['description'];?></div>
                        <?php endif; ?>
                        <?php
                         $button_link =   $about_section['button_link'];
                        if ($button_link) :
                            $link_url = $button_link['url'];
                            $link_title = $button_link['title'];
                            $link_target = $button_link['target'] ? $button_link['target'] : '_self';
                        ?>
                        <div class="link-box"><a href="<?php echo esc_url($link_url); ?>"  target="<?php echo esc_attr($link_target); ?>" class="theme-btn btn-style-one"><?php echo esc_html($link_title); ?></a></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End About Section -->

<!-- Services Section -->
<?php $specialization_section = get_field('specialization_section'); 
 
 $service_slider = $specialization_section['service_slider'];

?>
<section class="services-section">
    <div class="upper-box" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/background/2.jpg);">
        <div class="auto-container">
            <div class="sec-title text-center light">
                <span class="float-text">Specialization</span>
                <h2><?php echo $specialization_section['section_title']; ?></h2>
            </div>
        </div>
    </div>

    <div class="services-box">
        <div class="auto-container">
            <div class="services-carousel owl-carousel owl-theme">
                <!-- Service Block -->
                <?php foreach ($service_slider as $sliders) : 
                    $button_link = $sliders['button_link'];
                 ?>
                <div class="service-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="<?php echo $sliders['image']['url']; ?>" alt=""></a></figure>
                        </div>
                        <div class="lower-content">
                            <?php if (!empty($sliders['title'])) : ?>
                                 <h3><a href="#"><?php echo $sliders['title']; ?></a></h3>
                            <?php endif;  if (!empty($sliders['description'])) :  ?>
                                 <div class="text"><?php echo $sliders['description']; ?></div>
                            <?php endif; ?>
                            <?php if ($button_link) :
                                $link_url = $button_link['url'];
                                $link_title = $button_link['title'];
                                $link_target = $button_link['target'] ? $button_link['target'] : '_self';
                            ?>
                            <div class="link-box">
                                <a href="<?php echo esc_url($link_url); ?>"  target="<?php echo esc_attr($link_target); ?>"><?php echo esc_attr($link_title); ?><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>                
            </div>
        </div>
    </div>
</section>
<!--End Services Section -->

<!-- Fun Fact Section -->
<?php  $counter_section = get_field('counter_section');  ?>
<section class="fun-fact-section">
    <div class="outer-box" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/background/3.jpg);">
        <div class="auto-container">
            <div class="fact-counter">
                <div class="row">
                    <!--Column-->
                    <?php if (!empty($counter_section['counter_number_one'])) : ?>
                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="count-box">
                            <div class="count"><span class="count-text" data-speed="5000" data-stop="<?php echo $counter_section['counter_number_one']; ?>">0</span></div>
                            <h4 class="counter-title"><?php echo $counter_section['counter_text_one']; ?></h4>
                        </div>
                    </div>
                    <?php endif; if (!empty($counter_section['counter_number_two'])) : ?>    
                    <!--Column-->
                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                        <div class="count-box">
                            <div class="count"><span class="count-text" data-speed="5000" data-stop="<?php echo $counter_section['counter_number_two']; ?>">0</span></div>
                            <h4 class="counter-title"><?php echo $counter_section['counter_text_two']; ?></h4>
                        </div>
                    </div>

                    <?php endif; if (!empty($counter_section['counter_number_three'])) : ?>    

                    <!--Column-->
                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                        <div class="count-box">
                            <div class="count"><span class="count-text" data-speed="5000" data-stop="<?php echo $counter_section['counter_number_three']; ?>">0</span>K</div>
                            <h4 class="counter-title"><?php echo $counter_section['counter_text_three']; ?></h4>
                        </div>
                    </div>
                    <?php endif; if (!empty($counter_section['counter_number_four'])) : ?>   
                    <!--Column-->
                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="1200ms">
                        <div class="count-box">
                            <div class="count"><span class="count-text" data-speed="5000" data-stop="<?php echo $counter_section['counter_number_four']; ?>">0</span></div>
                            <h4 class="counter-title"><?php echo $counter_section['counter_text_four']; ?></h4>
                        </div>
                    </div>
                    <?php endif;  ?>   
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Fun Fact Section -->

<!-- Project Section -->
<section class="projects-section">
    <div class="auto-container">
        <div class="sec-title text-right">
            <span class="float-text">Project</span>
            <h2>Our Project</h2>
        </div>
    </div>

    <div class="inner-container">
    <?php echo do_shortcode("[ProjectSlider]"); ?>
    </div>
</section>
<!--End Project Section -->

<!-- Team Section -->
<section class="team-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <span class="title">Our Team</span>
            <h2>Profect Expert</h2>
        </div>

        <div class="row clearfix">
            <!-- Team Block -->
            <?php echo do_shortcode("[TeamsMember]"); ?>
        </div>
    </div>
</section>
<!--End Team Section -->

<!-- Testimonial Section -->
<?php  $tesimonial_section = get_field('tesimonial_section');  

$testimonial_slider_section = $tesimonial_section['testimonial_slider_section'];
?>
<section class="testimonial-section">
    <div class="outer-container clearfix">
        <!-- Title Column -->
        <div class="title-column clearfix">
            <div class="inner-column">
                <div class="sec-title">
                    <span class="float-text">testimonial</span>
                    <h2><?php echo $tesimonial_section['section_title']; ?></h2>
                </div>
                <div class="text"><?php echo $tesimonial_section['description']; ?></div>
            </div>
        </div>

        <!-- Testimonial Column -->
        <div class="testimonial-column clearfix" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/background/4.jpg);">
            <div class="inner-column">
                <div class="testimonial-carousel owl-carousel owl-theme">
                    <!-- Testimonial Block -->

                <?php foreach ($testimonial_slider_section as $testimonial_slider) : ?>
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="image-box"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/resource/thumb-1.jpg" alt=""></div>
                            <?php if(!empty($testimonial_slider['description'])): ?>
                            <div class="text"><?php echo $testimonial_slider['description']; ?></div>
                            <?php endif; ?>
                            <div class="info-box">
                            <?php if(!empty($testimonial_slider['title'])): ?>
                                <h4 class="name"><?php echo $testimonial_slider['title'];  ?></h4>
                            <?php endif; if(!empty($testimonial_slider['testimonal_position'])): ?>    
                                <span class="designation"><?php echo $testimonial_slider['testimonal_position']; ?></span>
                            <?php  endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Testimonial Section -->

<!-- News Section -->
<section class="news-section">
    <div class="auto-container">
        <div class="sec-title">
            <span class="float-text">Blogs</span>
            <h2>News & Articals</h2>
        </div>
        <div class="row">
            <?php echo do_shortcode("[Postshowcase]"); ?>
            <!-- News Block -->
        </div>
    </div>
</section>
<!--End News Section -->

<!--Clients Section-->
<section class="clients-section">
    <div class="inner-container">
        <div class="sponsors-outer">
            <!--Sponsors Carousel-->
           
           <?php $client_section = get_field('client_section'); ?>
            <ul class="sponsors-carousel owl-carousel owl-theme">
            <?php foreach ($client_section as $client_logo) : 
                    $logo_link = $client_logo['logo_link'];
                    $link_url = $button_link['url'];
                    $link_title = $button_link['title'];
                    $link_target = $button_link['target'] ? $button_link['target'] : '_self';
                ?>
                <li class="slide-item">
                    <figure class="image-box"><a href="<?php echo $link_url; ?>"><img src="<?php echo $client_logo['image']['url']  ?>" alt=""></a></figure>
                </li>
              <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
<!--End Clients Section-->
<?php get_footer(); ?>