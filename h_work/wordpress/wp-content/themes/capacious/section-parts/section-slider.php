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
$section_option = capacious_get_option( 'capacious_homepage_slider_option' );
if( $section_option != 'hide' ) {
	$section_image = capacious_get_option( 'capacious_slider_section_image' );
	$section_cat_id = capacious_get_option('capacious_slider_cat_id');
	$section_cat_slider = capacious_get_option('capacious_homepage_image_slider_option');
	$capacious_slides_data = json_decode( capacious_get_option('capacious_banner_all_sliders'));
  
if(!empty($section_cat_id) && $section_cat_slider == 0)
{

   $category = get_category($section_cat_id);

   $count = $category->category_count;

 if($count>0)
 {
?>
 <section id="banner" class="banner-section">
    <div class="section-padding">
       <div id="carousel-slider" class="carousel slide" data-bs-interval="4000">
      <!-- Indicators -->
      <?php 
	    	if($count>1)
			 {
	    ?> 
        <ol class="carousel-indicators">
            <?php
              $category = get_category($section_cat_id);
              $count = $category->category_count;
             for($i=0;$i<$count;$i++)
             {
               ?>
		          <li data-bs-target="#carousel-slider" data-bs-slide-to="<?php echo absint($i) ; ?>" class=" <?php if($i== 0){ echo 'active' ;} ?>" <?php if($i== 0){ echo 'aria-current="true"' ;} ?> aria-label="Slide <?php echo esc_attr($i+1); ?>">
		          </li>
           <?php } ?>
        </ol>
      <?php } ?>  
        <div class="carousel-inner" role="listbox">
            <?php
                $i=0;
	           	
				if( !empty( $section_cat_id ) ) {
					$home_slider_section =  array( 'cat' => $section_cat_id, 'posts_per_page' => -1 );
					 $home_slider_section_query = new WP_Query( $home_slider_section);
					if( $home_slider_section_query->have_posts() ) {

                 	while( $home_slider_section_query->have_posts() ) {
						$home_slider_section_query->the_post();
						 
                   ?>
			        <div class="carousel-item item <?php if($i== 0){ echo esc_attr("active","capacious"); } ?>" style="background-image: url(<?php echo esc_url($section_image) ?>);">
			            <div class="container">
							<div class="row">
				              <div class="col-md-7 col-sm-12 dest-detail wow fadeInLeft" data-wow-duration="3s">
				                <div class="titles">
				                  <h1><?php the_title() ?></h1>
				                 </div>
				                <p><?php echo esc_html(wp_trim_words(get_the_content(),15 ));  ?> </p>
                           
				                <a href="<?php the_permalink(); ?>" class="btn btn-theme hvr-sweep-to-right"><?php echo esc_html__("Get Started",'capacious');?></a> 
                           
				              </div>
			              <div class="col-md-5 d-none d-md-block  wow fadeInRight" data-wow-duration="3s">
			              		<?php if(has_post_thumbnail()){
					                   $image_id = get_post_thumbnail_id();
					                   $image_url = wp_get_attachment_image_src($image_id,'full',true); ?>
					              		  <img src="<?php echo esc_url($image_url[0]) ?>" alt="" class="img-responsive">
					             <?php } ?>
			              </div>
						  </div>
			            </div>
			        </div>
                 <?php
                	  $i++; 
                	     }
				       }
					wp_reset_postdata();
				}
        ?>
        </div>

	    <?php 
	    	if($count>1)
			 {
	    ?>    
			<a class="carousel-control-prev left carousel-control" role="button" type="button" data-bs-target="#carousel-slider" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
			</a>
			<a class="carousel-control-next right carousel-control" role="button" type="button" data-bs-target="#carousel-slider" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
			</a>	
      <?php } ?>


      </div>
    </div>
  </section>
  <?php } }
  else
  { 
    
     $i=0;
		$slides_other_data = array();
		if( is_array( $capacious_slides_data ) ){
		    foreach ( $capacious_slides_data as $slides_data ){

		           $i++; 
		         
            }
        }

  	?>

    <section id="banner" class="banner-section">
    <div class="section-padding">
      <div id="carousel-slider" class="carousel slide" data-interval="4000">
      <!-- Indicators -->
      
        <ol class="carousel-indicators">
            <?php
            for($j=0;$j<$i;$j++)
             {
               ?>
		          <li data-target="#carousel-slider" data-slide-to="<?php echo absint($j) ; ?>" class=" <?php if($j== 0){ echo 'active' ;} ?>">
		          </li>
           <?php } ?>
        </ol>
     
        <div class="carousel-inner">
            <?php
                  $k = 0;
                   foreach ( $capacious_slides_data as $slides_data ){
						 
                   ?>
			        <div class="item <?php if($k== 0){ echo esc_attr("active","capacious"); } ?>" style="background-image: url(<?php echo esc_url($section_image) ?>);">
			            <div class="container">
				              <div class="col-md-7 col-sm-12 dest-detail wow fadeInLeft" data-wow-duration="3s">
				                <div class="titles">
				                  <h1><?php 
				                  	
				                  echo $slides_data->slider_text ?></h1>
				                 </div>
				                <p><?php //echo esc_html(wp_trim_words(get_the_content(),15 ));  ?> </p>
                           
				                <a href="<?php the_permalink(); ?>" class="btn btn-theme hvr-sweep-to-right"><?php echo $slides_data->button_text ?></a> 
                           
				              </div>
			              <div class="col-md-5 hidden-xs  wow fadeInRight" data-wow-duration="3s">
			              		
					        <img src="<?php echo esc_url($slides_data->slider_image)  ?>" alt="" class="img-responsive">
					             
			              </div>
			            </div>
			        </div>
               <?php $k++; }?>
        
        </div>

	    <?php 
	    	if($i>1)
			 {
	    ?>    
	        <a class="left carousel-control" href="#carousel-slider" role="button" data-slide="prev">
	          <i class="fa fa-chevron-left"></i>
	        </a>
	        <a class="right carousel-control" href="#carousel-slider" role="button" data-slide="next">
	          <i class="fa fa-chevron-right"></i>
	        </a>
      <?php } ?>


      </div>
    </div>
  </section>

<?php
  }



   }?>