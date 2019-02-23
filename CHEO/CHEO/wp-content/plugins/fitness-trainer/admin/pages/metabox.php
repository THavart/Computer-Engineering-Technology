 <div class="bootstrap-wrapper">
 	<div class="welcome-panel container-fluid">
 		<?php	
		global $wpdb, $post;	
		
		// Save action   ep_fitness_meta_save  
		//*************************	plugin file *********
			
 		
 		 $set_package='';
		 $ep_fitness_current_author= $post->post_author;
		 
		 $current_user = wp_get_current_user();
		 $userId=$current_user->ID;
		 if(isset($current_user->roles[0]) and $current_user->roles[0]=='administrator'){
						
							 
 		?>
 		<div class="row">
			 <script>
				jQuery(document).ready(function() {
					jQuery('input[type=radio][name=post_for]').click(function() {
						if (this.value == 'role') { 
							jQuery("#package_div").show();
							jQuery("#user_div").hide(); 
							jQuery("#Woocommerce").hide(); 
						}
						else if (this.value == 'user') { 
							jQuery("#package_div").hide();
							jQuery("#Woocommerce").hide(); 
							jQuery("#user_div").show(); 
						}else if(this.value =='Woocommerce'){
							jQuery("#package_div").hide();
							jQuery("#user_div").hide(); 
							jQuery("#Woocommerce").show(); 
						
						
						}
					});
				});
			</script>	  	
			
				<div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">					
					 <label>
						  <?php 
							$post_for1='';	
							if(get_post_meta( $post->ID,'_ep_post_for', true )=='role'){
							 $post_for1='checked';							 
							}
							if(get_post_meta( $post->ID,'_ep_post_for', true )==''){
							 $post_for1='checked';							 
							}	
						 ?>
						<input type="radio" name="post_for" id="post_for" value="role" <?php echo $post_for1;?>> <?php _e('Only for the user role','epfitness');?> 
					</label>
				</div>
				<div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">					
					 <label>
						 <?php 
							$post_for2='';	
							if(get_post_meta( $post->ID,'_ep_post_for', true )=='user'){
							 $post_for2='checked';							 
							}
								
						 ?>
						<input type="radio" name="post_for" id="post_for" value="user" <?php echo $post_for2;?>> <?php _e('Only specific users','epfitness');?> 
					</label>
				</div>
				<div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">					
					 <label>
						 <?php 
							$post_for3='';	
							if(get_post_meta( $post->ID,'_ep_post_for', true )=='Woocommerce'){
							 $post_for3='checked';							 
							}
								
						 ?>
						<input type="radio" name="post_for" id="post_for" value="Woocommerce" <?php echo $post_for3;?>> <?php _e('Woocommerce Products','epfitness');?> 
					</label>
				</div>	
								
		<div class="clearfix"></div>
        </div>
          <div class="row" id="package_div" <?php echo ($post_for1=='checked'?'':'style="display: none"' );?>>
			  <div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">	
				 
				 <?php
				 global $wpdb, $post;				
				 $save_ep_postfor_package= get_post_meta( $post->ID,'_ep_postfor_package', true );
						$i=0;
						?>
						<select multiple size="15" class="form-control" id="specific_package[]" name="specific_package[]"> 					
						<?php
						 global $wp_roles;
						$roles = $wp_roles->get_names();
						foreach($roles as $role){
							$selected='';
							if (in_array($role, $save_ep_postfor_package)) {
								$selected='selected';
							}
							echo '<option value="'.$role.'"'. $selected.' >'. $role.' </option>';
						}
						?>
						</select>
					
				  </div>
        </div>
        
 		<div class="row" id="user_div" <?php echo ($post_for2=='checked'?'':'style="display: none"' );?>>
			<div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">	
				 <?php _e( 'Select your specific users :', 'epfitness' );?>
 				<select multiple size="20" class="form-control" id="specific_users[]" name="specific_users[]">
 					<?php
 					
 					$sql="SELECT * FROM $wpdb->users ";		
 					$user_rows = $wpdb->get_results($sql);
 					 $save_ep_users=array();
					 if(get_post_meta( $post->ID,'_ep_postfor_user', true )!=''){
						 $save_ep_users=get_post_meta( $post->ID,'_ep_postfor_user', true );
					 }
 					
 					
 					if(sizeof($user_rows)>0){									
 						foreach ( $user_rows as $row ) 
 						{	$selected='';
							if (in_array($row->ID, $save_ep_users)) {
								$selected='selected';
							}
 							echo '<option value="'.$row->ID.'"'.$selected.' >'. $row->ID.' | '.$row->user_email.' </option>';
 						}
 					}	
 					?>
 					
 				</select>
				</div>
        </div>
        <div class="clearfix"></div>
        	<div class="row" id="Woocommerce" <?php echo ($post_for3=='checked'?'':'style="display: none"' );?>>
			<div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">	
				 <?php _e( 'Select Products, The product buyer will get the content access :', 'epfitness' );
				 $post_4_woo_array=array();
				 if(get_post_meta( $post->ID,'_ep_postfor_woocommerce', true )!=''){
					 $post_4_woo_array=get_post_meta( $post->ID,'_ep_postfor_woocommerce', true );
				 }
				
				 ?>
 				<select multiple size="20" class="form-control" id="Woocommerce_products[]" name="Woocommerce_products[]">
 					<?php 					
 					$sql="SELECT * FROM $wpdb->posts where post_type='product' ";		
 					$product_rows = $wpdb->get_results($sql);	
 					if(sizeof($product_rows)>0){									
 						foreach ( $product_rows as $row ) 
 						{	$selected='';
							if (in_array($row->ID, $post_4_woo_array)) {
								$selected='selected';
							}
 							echo '<option value="'.$row->ID.'"'.$selected.' >'.$row->post_title.' </option>';
 						}
 					}	
 					?>
 					
 				</select>
				</div>
        </div>
        <div class="clearfix"></div>
      
        <hr>
		 
					
			<div class="row" id="daynumber_div"  >
				<div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">	
				<label> <?php _e('Post for the Day','epfitness');?>  </label>	
				<textarea class="form-control" name="day_number" id="day_number"  placeholder="Enter day number  e.g. 1,2,5,8 (If you select calendar view from custom post type setting then day number is required)"><?php echo get_post_meta( $post->ID,'_ep_user_day_number', true );?></textarea>
					
				</div>
			</div>	
		 <hr>
        <?php _e(' Note : You can get more content restriction setting for a specific  user,  ', 'epfitness'); ?><b> <a href="<?php echo get_admin_url(); ?>admin.php?page=wp-iv_user-directory-admin">Here </a>  </b><br/>
        <img width="300px" src="<?php echo wp_ep_fitness_URLPATH. "assets/images/user-setting.png";?>">
               
 		<?php
			}
 		?>
 		<br/>
 	</div>
 </div>		
