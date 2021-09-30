<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package capacious
 */
// retrieving Customizer Value 
$section_option = capacious_get_option( 'capacious_homepage_call_to_option');
if( $section_option != 'hide' ) {
	$call_to_title       = capacious_get_option( 'capacious_call_to_action_section_title' );
	$call_to_description = capacious_get_option( 'capacious_call_to_action_section_description' );
	$call_to_button_text = capacious_get_option( 'capacious_call_to_action_txt');
	$call_to_button_link = capacious_get_option( 'capacious_call_to_action_button_link');
	$call_to_bg_image   =  capacious_get_option( 'capacious_call_to_action_image' );
?>
    <section class="call-action" style="background-image: url('<?php echo esc_url($call_to_bg_image);  ?>')">
	    <div class="container">
	      <div class="content">
	       	
	       	<div class="cta-widget"> 
                
                <?php

                if(!empty($call_to_title))
                {
                ?>
              	<h3 class="widget-title"><?php echo esc_html($call_to_title); ?></h3>
              <?php } 
              if(!empty($call_to_description))
              {
              ?>

				<div class="call-to-action-content">
					<p><?php echo esc_html($call_to_description); ?></p>
				</div>
              <?php
              }
               if(!empty($call_to_button_text))
               {
              ?> 
               <div class="call-to-action-buttons">

				  <a href="<?php echo esc_url($call_to_button_link); ?>" class="btn btn-theme cta-button cta-button-secondary"><?php echo esc_html($call_to_button_text); ?></a>
					
				</div><!-- .call-to-action-buttons -->
           <?php } ?>
			</div> 

	      </div>
	    </div>
    </section>
  <?php } ?>