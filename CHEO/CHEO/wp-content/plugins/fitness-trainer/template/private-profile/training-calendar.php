<?php
global $wp_roles;
global $product;
$current_user = wp_get_current_user();
$roles = $current_user->roles;
$role = array_shift( $roles );

$default_fields = array();
$field_set=get_option('_ep_fitness_url_postype' );		
$li_data='';
if($field_set!=""){ 
		$default_fields=get_option('_ep_fitness_url_postype' );
}else{															
		$default_fields['training-plans']='Training Plans';
		$default_fields['detox-plans']='Detox Plans';
		$default_fields['diet-plans']='Diet Plans';
		$default_fields['diet-guide']='Diet Guide';
		$default_fields['recipes']='Recipes';																	
}
if(sizeof($field_set)<1){																
		$default_fields['training-plans']='Training Plans';
		$default_fields['detox-plans']='Detox Plans';
		$default_fields['diet-plans']='Diet Plans';
		$default_fields['diet-guide']='Diet Guide';
		$default_fields['recipes']='Recipes';		
 }	
foreach ( $default_fields as $field_key => $field_value ) {
 $f_cpt=$field_key;
 break;
}	

 $profile=(isset($_REQUEST['profile'])?$_REQUEST['profile']:$f_cpt);
$paged='1';

$args = array(
	'post_type' => $profile, // enter your custom post type
	'paged' => $paged,
	'post_status' => 'publish',
	//'fields' => 'all',
	//'orderby' => 'ASC',
	'posts_per_page'=> '30',  // overrides posts per page in theme settings
);


$the_query = new WP_Query( $args );

$user_content= get_user_meta($current_user->ID, 'iv_user_content_setting', true);
if($user_content==''){$user_content='both_content';}

?>    
<div class="profile-content">     
   <div class="row">
    <div class="col-md-12 ">   
	<div class="plan-content">	
		<div class="portlet-title tabbable-line clearfix">
			<div class="caption caption-md">
					  <span class="caption-subject"> 
						  <?php
									echo str_replace('-',' ',$profile);
					?></span>
			</div>						
		  </div>  
		  
		 <ul class="training-calendar"><?php 	 
			$no=365;
			 $ii=1;	
			 for($i=1;$i<=$no;$i++){
					 if ( $the_query->have_posts() ) :
							$li_data='';
							while ( $the_query->have_posts() ) : $the_query->the_post();
									
									
									if ( function_exists('icl_object_id') ) {
										$id = icl_object_id(get_the_ID(),'page',true); 
									}else{
										$id = get_the_ID();	
									}
									$have_access='';				
											
								
									if(get_post_meta( $id,'_ep_post_for', true )=='role'){ 
										$package_arr=get_post_meta( $id,'_ep_postfor_package', true);
										if(is_array($package_arr)){											
										 if(in_array(strtolower($role), array_map('strtolower', $package_arr) )){	
											  if($user_content=='both_content'  OR $user_content=='package_only'){ 
												$have_access='1';
											  }else{
											   $have_access='0';
											  }					
																			
											}	
									  }					
									}
									if(get_post_meta( $id,'_ep_post_for', true )=='user'){ 
										$user_arr= array();
										if(get_post_meta( $id,'_ep_postfor_user', true )!=''){$user_arr=get_post_meta( $id,'_ep_postfor_user', true ); }
										
										if(is_array($user_arr)){		
										 if(in_array($current_user->ID, $user_arr)){
																		
												if($user_content=='both_content'  OR $user_content=='specific_content'){
												$have_access='1';
											  }else{
												$have_access='0';
											  }	
												
											}
										}					
									}
									if ( class_exists( 'WooCommerce' ) ) {
										if(get_post_meta( $id,'_ep_post_for', true )=='Woocommerce'){ 											
											$product_arr= array();
											if(get_post_meta( $id,'_ep_postfor_woocommerce', true )!=''){$product_arr=get_post_meta( $id,'_ep_postfor_woocommerce', true ); }
											if($user_content=='both_content'  OR $user_content=='woocommerce_content'){
												foreach($product_arr as $selected_product){										
													if( wc_customer_bought_product( $current_user->email, $current_user->ID, $selected_product ) ){												
														$have_access='1';
													}
												}	
											}												
										}
									}
																		
									
									
									if($have_access=='1'){
										$day_arr= explode(",",get_post_meta( $id,'_ep_user_day_number', true )); 	
										if(in_array($i, $day_arr)){	
											$done_status='';
											$done_status=get_user_meta($current_user->ID,'_post_done_day_'.$id.'_'.$i,true);
											$done_image='';											
											if($done_status=='done'){
												$done_image='<img style="padding-right:10px;width:30px" src="'.wp_ep_fitness_URLPATH. "assets/images/Done.png".'" />';
												$li_color='done';
											}
											$post_content = get_post($id);
											$li_data=$li_data.' <h4>'.$done_image.'<a href="?&profile=post&id='.$post_content->ID.'&cday='.$i.'">'.substr($post_content->post_title,0,50).'</a></h4>';
											
										}
									}	 
										
																				
							endwhile;
						endif;
						
						if($li_data!=''){
							$li_color=($ii%2==0 ? 'even': 'odd');
							echo '<li class="'.$li_color.'"><h5>'. __('Day', 'epfitness').' '.$i.'</h5>';
							echo $li_data;
							echo'</li>';
						
							$ii=$ii+1;	
						}
				
								
				} 		
				?>
			</ul>	
			<?php
			if($ii==1){
				_e( 'Sorry, no posts matched your criteria.','epfitness' ); 
			}
			  
			?>
			</div>
	    </div>
    </div>


   
</div>
<script>						

			
</script>	        
