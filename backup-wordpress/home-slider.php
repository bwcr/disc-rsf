<?php
/*
* Homepage Slider 
*/
?>

		
			<!--SLIDER HOME START-->
			<div class="slider-box clearfix">
            	<div class="slider home-slider clearfix" data-auto-play="<?php if ( function_exists( 'ot_get_option' )&& ot_get_option( 'slider_delay' ) ) { echo esc_attr( ot_get_option( 'slider_delay') );} 
                else {echo '6000';}?>">
                
                    
                    <?php
              
                      /* get the slider array */
                      $ridianur_slides = ot_get_option( 'slider_list', array() );
                      
                      if ( ! empty( $ridianur_slides ) ) {
                        foreach( $ridianur_slides as $ridianur_slide ) { ?>
                        
                          
                          <div class="slide img-bg" data-background="<?php echo esc_attr( $ridianur_slide['slider_image'] ); ?>">
                          
                                <div class="slider-mask"></div>
                                
                                <div class="container">
                            	
									<div class="caption-box clearfix">
                                    
                                    	<?php if ( ($ridianur_slide['slider_icon'] != '') ) { ?>
                                            <i class="fa <?php echo esc_attr( $ridianur_slide['slider_icon'] );  ?>"></i>
                                        <?php } ?>
                                        
                                    	<p class="top-slide"><?php echo esc_attr( $ridianur_slide['top_text'] );  ?></p>
										<h3>
                                        <?php $ridianur_slide_title = $ridianur_slide['title'];
                                                echo wp_kses( $ridianur_slide_title, array( 
                                                        'i' => array(
                                                                'class' => array(),
                                                            ),
                                                        'p' => array(),
                                                        'br' => array(),
                                                        'span' => array(),
                                                        'a' => array(
                                                                'href' => array(),
                                                            ),
                                                        'strong' => array(),
                                                    ) ); 
                                        ?>
                                        </h3>
                                        
										<p class="bottom-slide"><?php echo esc_attr( $ridianur_slide['bottom_text'] );  ?></p>
                                        
                                        <?php if ( ($ridianur_slide['slider_link'] != '') && ($ridianur_slide['slider_link_text'] != '') ) { ?>
                                					<a class="spc-btn slide-btn" href="<?php echo esc_url( $ridianur_slide['slider_link']);   ?>">
														<?php echo esc_attr( $ridianur_slide['slider_link_text'] );  ?>
                                                    </a>
                               			<?php } ?>
                                                
									</div><!--/.caption-box-->
                                    
								</div><!--/.container-->
                            
                          </div><!--/.slide-->
                        <?php }
                      } ?>
                </div><!--/.slider-->
                
				
			</div><!--/.slider-box-->
			<!--SLIDER HOME END-->
                        
                <?php if ( is_page_template( 'homepage-youtube.php' ) || is_page_template( 'homepage-custom-layout.php' )&&  function_exists( 'ot_get_option' ) && ot_get_option( 'home_setting') == 'youtube_bg_home') { ?>
                <div class="yt-bg img-bg" data-background='<?php echo esc_url ( ot_get_option( 'yt_img' )) ?>'></div> 
                <!--YOUTUBE BACKGROUND-->
                <div class="bg-youtube" data-property="{
                                                            videoURL:'http://www.youtube.com/watch?v=<?php echo esc_attr( ot_get_option( 'yt_id' )); ?>', 
                                                            opacity:1, 
                                                            autoPlay:true, 
                                                            containment:'#home', 
                                                            <?php if  (  ot_get_option( 'yt_mute' ) == 'on') { echo ' mute:true, '; } ?> 
                                                            optimizeDisplay:true, 
                                                            showControls:false, 
                                                            loop:true, 
                                                            addRaster:false, 
                                                            quality:'<?php if  (  ot_get_option( 'yt_qt' ) == '') { echo 'large'; } ?> ', 
                                                            realfullscreen:'true', 
                                                            ratio:'auto'
                                                        }">
                </div>
                <!--YOUTUBE BACKGROUND END-->
                <?php } else if ( is_page_template( 'homepage-video.php' ) || is_page_template( 'homepage-custom-layout.php' )&&  function_exists( 'ot_get_option' ) && ot_get_option( 'home_setting') == 'video_bg_home') { ?>
                <div class="bg-vid" 
                data-link="<?php if  ( function_exists( 'ot_get_option' ) && ot_get_option( 'video_link' )) { echo esc_url( ot_get_option( 'video_link' )); } ?>" ></div>
                <?php } ?>
				