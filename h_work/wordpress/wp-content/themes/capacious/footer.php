<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package capacious
 */
 $copyright_text= capacious_get_option( 'capacious_copyright_text_option');
 
 $column_count = 0;
  for ( $i = 1; $i <= 4; $i++ ) {
  
    if ( is_active_sidebar( 'footer-' . $i ) ) {
    
        $column_count++;

    }
  }
?>
 <!-- Footer Section Start Here -->
  <footer id="footer">
    <section class="footer-section">
      <?php 
//Check if there are widgets on any footer sidebar
        if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3')) {
            ?>
      <div class="footer-sidebars">
          <div class="footer-sidebars-bg"></div>
          <div class="over-bg section-padding">
            <div class="container">
              <div class="row">
                 <?php
                
                for ( $i = 1; $i <= 4 ; $i++ ) {
                    
                    if ( is_active_sidebar( 'footer-' . $i ) ) {
                
                    if($column_count == '1'){
                         $size = '12';
                        }
                        elseif($column_count == '2'){
                            $size = '6';
                        }
                        elseif($column_count == '3'){
                            $size = '4';
                        }
                        else{
                            $size = '3';
                        }
                ?>

                  <div class="col-lg-<?php echo esc_attr( $size ); ?> col-md-<?php if($size == '3'): echo esc_attr( '6' ); elseif($size == '4'): 
                     echo esc_attr('4'); else : echo esc_attr( $size ) ; endif ;?> foot-widget text-left wow fadeInUp">
                      <?php dynamic_sidebar( 'footer-' . $i ); ?>
                  </div>
                <?php
                    }
                }
            ?>
              </div>
          </div>
          </div>
        </div>
      <?php } ?>
     <?php 
   if(!empty($copyright_text))
    {
    ?>
      <div class="footer-bottom">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <p class="copyright site-copyright"><?php echo wp_kses_post($copyright_text); ?> </p>
            </div>
            <div class="col-lg-8">
              <div class="powered-text">
                <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'capacious' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'capacious' ), 'WordPress' ); ?></a>
                <span class="sep"> | </span>
                <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'capacious' ), 'Capacious', '<a href="https://www.canyonthemes.com" target="_blank">Canyon Themes</a>' ); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php } ?>

    </section>
  </footer>
  <!-- End footer -->
  <a class="scroll-top fa fa-angle-up" href="javascript:void(0)"></a>

<?php wp_footer(); ?>

</body>
</html>
