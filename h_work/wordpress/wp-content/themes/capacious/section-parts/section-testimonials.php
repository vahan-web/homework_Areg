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
$section_option = capacious_get_option( 'capacious_homepage_testimonials_option');
if( $section_option != 'hide' ) {
    $section_bg_image = capacious_get_option( 'capacious_testimonials_section_image' );
    $testimonial_section_id = capacious_get_option( 'capacious_testimonial_section_id');
     $section_cat_id = capacious_get_option( 'capacious_testimonials_cat_id');
  if(!empty($section_cat_id))
    {

      $category = get_category($section_cat_id);
        $section_cat_id; 
       $counts = $category->category_count;
       if($counts>0)
       {
?>
   <section id="<?php echo esc_attr($testimonial_section_id); ?>" style="background: #f0f0f0 url('<?php echo esc_url($section_bg_image);?>') no-repeat;">
      <div class="over-bg section-padding">
        <!-- Carousel Inner Starts -->
        <div class="testimonial-inner">
          <!-- Container Starts -->
          <div class="container">
            <!-- Row Starts -->
            <div class='row'>
              <div class="carousel slide fadeInDown"  data-bs-ride="carousel" id="testimonial-carousel">
                <!-- Carousel Items / Quotes -->
                <div class="carousel-inner  wow zoomIn" role="listbox">
                     <?php
                      $i=0;
                     
                    if( !empty( $section_cat_id ) ) {
                           
                            $home_testimonials_section = array( 'cat' => $section_cat_id,'posts_per_page' => -1 );
                            $home_testimonials_section_query = new WP_Query( $home_testimonials_section);
                            if( $home_testimonials_section_query->have_posts() ) {
                               while( $home_testimonials_section_query->have_posts() ) {
                                      $home_testimonials_section_query->the_post();
                                        if(has_post_thumbnail()){
                                        $image_id = get_post_thumbnail_id();
                                        $image_path = wp_get_attachment_image_src( $image_id, 'thumbnail', true );
                                      }  
                           ?>
                                <div class="carousel-item item <?php if($i==0){ echo "active"; } ?>">
                                    <blockquote>
									<div class="container">
										<div class="row">
                                    <?php if(!empty($image_path )) { ?>
                                        <div class="col-sm-3 text-center">
                                          <img class="img-circle" src="<?php echo esc_url($image_path[0]) ?>" alt="">
                                        </div>
                                     <?php } ?>
                                      <div class="col-sm-8 wow zoomIn">
                                        <p>
                                          <i class="fa fa-quote-left fa-2x"></i>
                                           <?php the_content(); ?>
                                        </p>
                                        <small>
                                          <span class="name"> - <?php the_title(); ?></span>
                                        </small>
                                      </div>
									  </div>
									  </div>									  
                                    </blockquote>
                                </div>
                       <?php
                         $i++; }
                       }
                       wp_reset_postdata();
                     }    
                  ?>
                </div>
             <?php if($counts>1) { ?>
                <!-- Carousel Buttons Next/Prev -->
				<a class="carousel-control-prev left carousel-control" role="button" type="button" data-bs-target="#testimonial-carousel" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
				</a>
				<a class="carousel-control-next right carousel-control" role="button" type="button" data-bs-target="#testimonial-carousel" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
				</a>	
            <?php } ?>
              </div>
            </div><!-- Row Ends -->
          </div><!-- Container Ends -->
        </div><!-- Testimonial Ends -->
      </div>
    </section>
  <?php } } }?>