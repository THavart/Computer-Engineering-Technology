<?php
wp_enqueue_style('wp-ep_fitness-piblic-11', wp_ep_fitness_URLPATH . 'admin/files/css/iv-bootstrap.css');
wp_enqueue_script('ep_fitness-piblic-12', wp_ep_fitness_URLPATH . 'admin/files/js/bootstrap.min.js');

wp_enqueue_style('ep_fitness-style-64', wp_ep_fitness_URLPATH . 'assets/cube/css/cubeportfolio.min.css');

wp_enqueue_style('user-public-profile-style', wp_ep_fitness_URLPATH .'admin/files/css/user-public-profile.css', array(), $ver = false, $media = 'all');

//wp_enqueue_media();
$display_name='';
$email='';
$user_id=1;
if(isset($_REQUEST['id'])){
  $author_name= $_REQUEST['id'];
  $user = get_user_by( 'slug', $author_name );
  if(isset($user->ID)){
    $user_id=$user->ID;
    $display_name=$user->display_name;
    $email=$user->user_email;
  }
}else{
 global $current_user;

 $user_id=$current_user->ID;
 $display_name=$current_user->display_name;
 $email=$current_user->user_email;
 if($user_id==0){
  $user_id=1;
}
}
  //print_r($current_user);
$iv_profile_pic_url=get_user_meta($user_id, 'iv_profile_pic_url',true);
$default_post_type = array();
	$postkey= array();
	 $post_set=get_option('_ep_fitness_url_postype' );									
		
	if($post_set!=""){ 
			$default_fields=get_option('_ep_fitness_url_postype' );
	}else{															
			$default_fields['training-plans']='Training Plans';
      $default_fields['detox-plans']='Detox Plans';
      $default_fields['diet-plans']='Diet Plans';
      $default_fields['diet-guide']='Diet Guide';
      $default_fields['recipes']='Recipes';														
	}
	if(sizeof($post_set)<1){																
		$default_fields['training-plans']='Training Plans';
    $default_fields['detox-plans']='Detox Plans';
    $default_fields['diet-plans']='Diet Plans';
    $default_fields['diet-guide']='Diet Guide';
    $default_fields['recipes']='Recipes';	
	 }	
	 foreach($default_fields as $key => $value)
		{
		  $postkey[] = $key;
		}
	$post_type = join("','",$postkey);	
	
	$color_setting=get_option('_dir_color');	
if($color_setting==""){$color_setting='#0099fe';}
$color_setting=str_replace('#','',$color_setting);
					
?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<style>
  @media (min-width: 767px) {
  .narrow-width.public-profile-content .col-md-4.col-sm-4,
  .narrow-width.public-profile-content .col-md-8.col-sm-8,
  .narrow-width.public-profile-content .col-md-6 {
    width: 100% !important;
  }
}
#profile-template-5 .active-li{
  border: 1px solid #<?php echo $color_setting; ?>;
  background:#<?php echo $color_setting; ?>
}
</style>

<!-- Bootstrap -->


<div id="profile-template-5" class="bootstrap-wrapper around-separetor public-profile-content">
  <div class="wrapper">
    <div class="row margin-top-10">
      <div class="col-md-4 col-sm-4">
        <div class="profile-sidebar">
          <div class="portlet light profile-sidebar-portlet">
            <!-- SIDEBAR USERPIC -->
            <div class="profile-userpic text-center">
              <?php
              if($iv_profile_pic_url!=''){ ?>
              <img src="<?php echo $iv_profile_pic_url; ?>">
              <?php
            }else{
              echo'	 <img src="'. wp_ep_fitness_URLPATH.'assets/images/Blank-Profile.jpg" class="agent">';
            }
            ?>
          </div>
          <!-- END SIDEBAR USERPIC -->
          <!-- SIDEBAR USER TITLE -->
          <div class="profile-usertitle">
            <div class="profile-usertitle-name">
             <?php
             $name_display=get_user_meta($user_id,'first_name',true).' '.get_user_meta($user_id,'last_name',true);
             echo (trim($name_display)!=""? $name_display : $display_name );?>

           </div>
           <div class="profile-usertitle-job">
            <?php echo get_user_meta($user_id,'occupation',true); ?>
          </div>
        </div>

      </div>
      <!-- END PORTLET MAIN -->
      <!-- PORTLET MAIN -->
      <div class="portlet portlet0 light">
        <!-- STAT -->

        <!-- END STAT -->
        <div>
          <h4 class="profile-desc-title"><?php _e('About','epfitness'); ?>     <?php
           $name_display=get_user_meta($user_id,'first_name',true).' '.get_user_meta($user_id,'last_name',true);
           echo (trim($name_display)!=""? $name_display : $display_name );?>
         </h4>
         <span class="profile-desc-text"> <?php echo get_user_meta($user_id,'description',true); ?> </span>
         <?php
         if( get_user_meta($user_id,'hide_phone',true)==''){ ?>
         <div class="margin-top-20 profile-desc-text">


          <strong class="desc-title"><i class="fa fa-phone"></i><?php esc_html_e('Phone:','epfitness'); ?> </strong><?php echo ''. get_user_meta($user_id,'phone',true); ?>
        </div>
        <?php
      }
      if( get_user_meta($user_id,'hide_mobile',true)==''){ ?>
      <div class="margin-top-20 profile-desc-text">


        <strong class="desc-title"><i class="fa fa-mobile"></i><?php esc_html_e('Mobile:','epfitness'); ?> </strong><?php echo ''. get_user_meta($user_id,'mobile',true); ?>
      </div>
      <?php
    }

    if( get_user_meta($user_id,'hide_email',true)==''){ ?>
        <div class="margin-top-20 profile-desc-text"
        ><strong class="desc-title small-icon"><i class="fa fa-envelope"></i><?php esc_html_e('Email:','epfitness'); ?> </strong>
        <a href="mailto:<?php echo $email; ?>">

          <?php echo $email; ?>
        </a>
      </div>
<?php
}
?>
  <div class="margin-top-20 profile-desc-text"
        ><strong class="desc-title"><i class="fa fa-globe"></i><?php esc_html_e('Website:','epfitness'); ?> </strong>
        <a href="http://<?php  echo get_user_meta($user_id,'web_site',true); ?>">
        <?php  echo get_user_meta($user_id,'web_site',true);  ?>
        </a>
      </div>


<h4 class="profile-desc-title margin-top-40"><?php esc_html_e('Social Profile','epfitness'); ?> </h4>

<div class="social-info">
	<?php
	if(get_user_meta($user_id,'twitter',true)!=''){
	?>
    <div class="profile-desc-link">
      <a href="http://www.twitter.com/<?php  echo get_user_meta($user_id,'twitter',true);  ?>/"><i class="fa fa-twitter-square"></i></a>
    </div>
    <?php
	}
    ?>
    <?php
	if(get_user_meta($user_id,'facebook',true)!=''){
	?>
    <div class="profile-desc-link">

      <a href="<?php  echo get_user_meta($user_id,'facebook',true);  ?>"><i class="fa fa-facebook-square"></i><?php  //echo get_user_meta($user_id,'facebook',true);  ?></a>
    </div>
	 <?php
	}
    ?>
    <?php
	if(get_user_meta($user_id,'gplus',true)!=''){
	?>
    <div class="profile-desc-link">

      <a href="<?php  echo get_user_meta($user_id,'gplus',true);  ?>"><i class="fa fa-google-plus-square"></i><?php  //echo get_user_meta($user_id,'gplus',true);  ?></a>
    </div>
     <?php
	}
    ?>
    
    
      <?php
	if(get_user_meta($user_id,'linkedin',true)!=''){
	?>
    <div class="profile-desc-link">

      <a href="<?php  echo get_user_meta($user_id,'linkedin',true);  ?>"><i class="fa fa-linkedin"></i><?php  //echo get_user_meta($user_id,'gplus',true);  ?></a>
    </div>
     <?php
	}
    ?>
    
      <?php
	if(get_user_meta($user_id,'pinterest',true)!=''){
	?>
    <div class="profile-desc-link">

      <a href="<?php  echo get_user_meta($user_id,'pinterest',true);  ?>"><i class="fa fa-pinterest"></i><?php  //echo get_user_meta($user_id,'gplus',true);  ?></a>
    </div>
     <?php
	}
    ?>
    
      <?php
	if(get_user_meta($user_id,'instagram',true)!=''){
	?>
    <div class="profile-desc-link">

      <a href="<?php  echo get_user_meta($user_id,'instagram',true);  ?>"><i class="fa fa-instagram"></i><?php  //echo get_user_meta($user_id,'gplus',true);  ?></a>
    </div>
     <?php
	}
    ?>
    
      <?php
	if(get_user_meta($user_id,'vimeo',true)!=''){
	?>
    <div class="profile-desc-link">

      <a href="<?php  echo get_user_meta($user_id,'vimeo',true);  ?>"><i class="fa fa-vimeo"></i><?php  //echo get_user_meta($user_id,'gplus',true);  ?></a>
    </div>
     <?php
	}
    ?>
       <?php
	if(get_user_meta($user_id,'youtube',true)!=''){
	?>
    <div class="profile-desc-link">

      <a href="<?php  echo get_user_meta($user_id,'youtube',true);  ?>"><i class="fa fa-youtube"></i><?php  //echo get_user_meta($user_id,'gplus',true);  ?></a>
    </div>
     <?php
	}
    ?>
    
    
    
    
  </div>

</div>
</div>
<!-- END PORTLET MAIN -->
</div>

</div>
<div class="col-md-8 col-sm-8">
  <div class="profile-content">
    <div class="portlet-title tabbable-line clearfix">
      <div class="caption caption-md">
        <i class="icon-globe theme-font hide"></i>
        <span class="caption-subject font-blue-madison bold uppercase"><?php _e('Image Gallery','epfitness'); ?> </span>
      </div>
    </div>
    <div class="portlet-body">
     
		<div>
		  <div class="main row padding-left-10 text-center">
			  
			  <?php
					
									//get_template_part( 'content', 'single' );

									$gallery_ids=get_user_meta($user_id ,'image_gallery_ids',true);
									$gallery_ids_array = array_filter(explode(",", $gallery_ids));
									$i=1;
									
									if(sizeof($gallery_ids_array)>0){
										?>
										<div class="cbp-slider">						
										<ul class="cbp-slider-wrap">
												<?php
												foreach($gallery_ids_array as $slide){
														if($slide!=''){ ?>
															
														 <li class="cbp-slider-item">
															<img src="<?php echo wp_get_attachment_url( $slide ); ?> " >
														 </li>
														<?php
														$i++;
														}
													}	
													?>
												</ul>
											</div>											
										<?php	
										}
									
								
								?>
			  
			  
			  	
			</div>
		</div>
  
    
</div>

</div>
</div>
</div>
</div>
</div>

<script type="text/javascript" src="<?php echo wp_ep_fitness_URLPATH; ?>assets/cube/js/jquery.cubeportfolio.min.js"></script>

<script>
	
(function($, window, document, undefined) {
    var slider = $('.cbp-slider');
    slider.find('.cbp-slider-item').addClass('cbp-item');
    slider.cubeportfolio({
        layoutMode: 'slider',
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1,
            cols: 1
        }],
        gapHorizontal: 0,
        gapVertical: 0,
        caption: '',       
    });
})(jQuery, window, document);
</script>

