		<footer class="footer clearfix">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<p>
								<?php $benten_fot_text = ot_get_option( 'fot_text' );
								if  ( function_exists( 'ot_get_option' ) && ot_get_option( 'fot_text' )) { 
								echo wp_kses( $benten_fot_text, array( 
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
									) ); }
								?>
							</p>
						</div><!--/.col-md-6-->
						
						<div class="col-md-6 footer-box">
							<ul class="footer-icon">
								<?php if ( function_exists( 'ot_get_option' ) ) :if (ot_get_option( 'fb_foot')) :  ?>
										<li><a href="<?php  echo ot_get_option( 'fb_foot' ); ?>"><i class="fa fa-facebook"></i></a></li>
									<?php endif ; endif; ?>
									<?php if ( function_exists( 'ot_get_option' ) ) :if (ot_get_option( 'gp_foot')) :  ?>
										<li><a href="<?php  echo ot_get_option( 'gp_foot' ); ?>"><i class="fa fa-google-plus"></i></a></li>
									<?php endif ; endif; ?>
									<?php if ( function_exists( 'ot_get_option' ) ) :if (ot_get_option( 'twit_foot')) :  ?>
										<li><a href="<?php  echo ot_get_option( 'twit_foot' ); ?>"><i class="fa fa-twitter"></i></a></li>
									<?php endif ; endif; ?>
									<?php if ( function_exists( 'ot_get_option' ) ) :if (ot_get_option( 'insta_link')) :  ?>
										<li><a href="<?php  echo ot_get_option( 'insta_link' ); ?>"><i class="fa fa-instagram"></i></a></li>
									<?php endif ; endif; ?>
									<?php if ( function_exists( 'ot_get_option' ) ) :if (ot_get_option( 'pint_foot')) :  ?>
										<li><a href="<?php  echo ot_get_option( 'pint_foot' ); ?>"><i class="fa fa-pinterest"></i></a></li>
									<?php endif ; endif; ?>
									<?php if ( function_exists( 'ot_get_option' ) ) :if (ot_get_option( 'xing_foot')) :  ?>
										<li><a href="<?php  echo ot_get_option( 'xing_foot' ); ?>"><i class="fa fa-xing"></i></a></li>
									<?php endif ; endif; ?>
									<!--ANOTHER SOCIAL ICON LIST-->
									<?php
										if  ( function_exists( 'ot_get_option' )){
										 /* get the icon list */
										 $benten_hsocials = ot_get_option( 'foot_as_icon', array() );
										 
										 if ( ! empty( $benten_hsocials ) ) {
											 foreach( $benten_hsocials as $benten_hsocial ) {
												 echo '
												 <li><a href="' . $benten_hsocial['foot_as_link'] . '"><i class="fa ' . $benten_hsocial['foot_soc_icon'] . '"></i></a></li>
												';
											 }
										 }
										}				
									?>
									<!--ANOTHER SOCIAL ICON LIST END-->
							</ul><!--/.team-icon-->
						</div><!--/.footer-box-->
					</div><!--/.row-->			
				</div><!--/.container-->
		</footer><!--/.footer--> 
	
     	
	<?php wp_footer(); ?>
	</body>
</html>