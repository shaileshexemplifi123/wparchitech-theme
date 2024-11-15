  <!-- Main Footer -->
  <footer class="main-footer" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/background/5.jpg);">
      <div class="auto-container">
          <!--Widgets Section-->
          <div class="widgets-section">
              <div class="row">
                  <!--Big Column-->
                  <div class="big-column col-xl-7 col-lg-12 col-md-12 col-sm-12">
                      <div class="row">
                          <!--Footer Column-->
                        <?php  
                               // footer_logo
                               $footer_logo = get_field("footer_logo", "option");  
                               $footer_logo_url = wp_get_attachment_image_src($footer_logo, 'full'); 
                               $footer_description = get_field("footer_description", "option");  
                                
                                // Contact text
                               $contact_information = get_field('contact_us', 'option');
                               $address = $contact_information['address'];
                               $contact_us = $contact_information['contact_us'];
                               $email_address = $contact_information['email_address'];

                                // copyright text
                               $copyright_text = get_field("copyright_text", "option");  
                         
                              // Social text
                               $contact_information = get_field('social_link', 'option');
                               $facebook_link = $contact_information['facebook_link'];
                               $twiiter_link = $contact_information['twiiter_link'];
                               $google_link = $contact_information['google_link'];
                               $instagram_link = $contact_information['instagram_link'];
                               
                               ?>
                          <div class="footer-column col-xl-6 col-lg-6 col-md-6 col-sm-12">
                              <div class="footer-widget about-widget">
                                    <?php if(!empty($footer_logo_url)){ ?>
                                  <div class="footer-logo">
                                      <figure>
                                          <a href="index-2.html"><img src="<?php echo $footer_logo_url[0]; ?>" alt=""></a>
                                      </figure>
                                  </div>
                                  <?php } if(!empty($footer_description)){  ?>
                                  <div class="widget-content">
                                      <div class="text"><?php echo $footer_description; ?></div>
                                  </div>
                                  <?php } ?>
                              </div>
                          </div>
                          <?php  ?>                 
                          <!--Footer Column-->
                          <div class="footer-column col-xl-6 col-lg-6 col-md-6 col-sm-12">
                              <div class="footer-widget links-widget quick_link">
                                  <h2 class="widget-title">Quick links</h2>
                                  <div class="widget-content">
                                     
                                  <?php 
                                        wp_nav_menu( array(
                                        'container' => false,
                                        'menu' => 'quick_link',
                                        'menu_class'=> 'list'
                                        ) );
                                ?>
                                    
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  <!--Big Column-->
                  <div class="big-column col-xl-5 col-lg-12 col-md-12 col-sm-12">
                      <div class="row clearfix">
                          <div class="footer-column col-xl-5 col-lg-6 col-md-6 col-sm-12">
                              <div class="footer-widget links-widget">
                                  <h2 class="widget-title">Support links</h2>
                                  <div class="widget-content">
                                  <?php 
                                        wp_nav_menu( array(
                                        'container' => false,
                                        'menu' => 'support_link',
                                        'menu_class'=> 'list'
                                        ) );
                                ?>
                                  </div>
                              </div>
                          </div>
                          <?php 
                          ?>
                          <!--Footer Column-->
                          <div class="footer-column col-xl-7 col-lg-6 col-md-6 col-sm-12">
                              <div class="footer-widget gallery-widget">
                                  <h2 class="widget-title">Contact Us</h2>
                                  <div class="widget-content">
                                      <ul>
                                      <?php if(!empty($address)){ ?>
                                          <li>
                                              <div class="icon">
                                                  <i class="fa fa-home"></i>
                                              </div>
                                             
                                              <div class="cont">
                                                  <p><?php echo $address; ?></p>
                                              </div>
                                           
                                          </li>
                                          <?php } if(!empty($contact_us)){ ?>
                                          <li>
                                              <div class="icon">
                                                  <i class="fa fa-phone"></i>
                                              </div>
                                          
                                              <div class="cont">
                                                  <p><?php echo $contact_us; ?></p>
                                              </div>
                                             
                                          </li>
                                          <?php } if(!empty($email_address)){ ?>
                                          <li>
                                              <div class="icon">
                                                  <i class="fa fa-envelope-o"></i>
                                              </div>
                                              <div class="cont">
                                                  <p><?php echo $email_address ?></p>
                                              </div>
                                          </li>
                                          <?php } ?>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!--Footer Bottom-->
      <div class="footer-bottom">
          <div class="auto-container">
              <div class="inner-container clearfix">
                  <div class="social-links">
                      <ul class="social-icon-two">
                         <?php if(!empty($facebook_link)){ ?>
                          <li><a href="<?php echo $facebook_link; ?>"><i class="fa fa-facebook"></i></a></li>
                          <?php } if(!empty($twiiter_link)){ ?>
                          <li><a href="<?php echo $twiiter_link; ?>"><i class="fa fa-twitter"></i></a></li>
                          <?php } if(!empty($google_link)){ ?>
                          <li><a href="<?php echo $google_link; ?>"><i class="fa fa-google-plus"></i></a></li>
                          <?php } if(!empty($instagram_link)){ ?>
                          <li><a href="<?php echo $instagram_link ?>"><i class="fa fa-instagram"></i></a></li>
                          <?php } ?>
                          <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                      </ul>
                  </div>
                  <?php if(!empty($copyright_text)){ ?>                              
                  <div class="copyright-text">
                      <a href="#" target="_blank"><?php echo $copyright_text; ?></a>
                  </div>
                  <?php } ?>
              </div>
          </div>
      </div>
  </footer>
  <!-- End Main Footer -->

  </div>



  <!--Scroll to top-->
  <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-o-up"></span></div>

  </body>

  <?php wp_footer(); ?>

  </html>