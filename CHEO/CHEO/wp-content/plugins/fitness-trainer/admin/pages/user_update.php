<script>
	function update_user_setting() {
	
				// New Block For Ajax*****
				var search_params={
					"action"  : 	"ep_fitness_update_user_settings",	
					"form_data":	jQuery("#user_form_iv").serialize(), 
				};
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){
						var url = "<?php echo wp_ep_fitness_ADMINPATH; ?>admin.php?page=wp-iv_user-directory-admin&message=success";    						
						jQuery(location).attr('href',url);
						
					}
				});
				
	}
		jQuery(function() {
			jQuery( "#exp_date" ).datepicker();
						
		});			


			
</script>	
			<?php
			global $wpdb,$wp_roles;
			$user_id='';
			if(isset($_GET['id'])){ $user_id=$_GET['id'];}
			
			$user = new WP_User( $user_id );
			
			?>
			<div class="bootstrap-wrapper">
				<div class="welcome-panel container-fluid">				
					
					
					<div class="row">
						<div class="col-md-12"><h3 class="">User Settings: Edit </h3>
						
						</div>	
											
						
					</div> 
					
						
						
					<div class="col-md-7 panel panel-info">
						<div class="panel-body">
					
					<!-- /.modal -->
					
					
					<!-- Start Form 101 -->
					
						
						<form id="user_form_iv" name="user_form_iv" class="form-horizontal" role="form" onsubmit="return false;">
							
							 
							 
										
							<div class="form-group">
								<label for="text" class="col-md-3 control-label"></label>
								<div id="iv-loading"></div>
							 </div>	
							  <div class="form-group">
								<label for="inputEmail3" class="col-md-4 control-label">User Name</label>
								<div class="col-md-8">
									
									<label for="inputEmail3" class="control-label"><?php echo $user->user_login; ?></label>
								</div>
							  </div>
							   <div class="form-group">
								<label for="inputEmail3" class="col-md-4 control-label">Email Address</label>
								<div class="col-md-8">									
									<label for="inputEmail3" class="control-label"><?php echo $user->user_email; ?></label>
									
								</div>
							  </div>	
							 
							 <div class="form-group">
								<label for="text" class="col-md-4 control-label">User Role</label>
								<div class="col-md-8">
									<?php
											
											$user_role= $user->roles[0];
										?>
									<select name="user_role" id ="user_role" class="form-control">
										<?php											
													foreach ( $wp_roles->roles as $key=>$value ){
														echo'<option value="'.$key.'"  '.($user_role==$key? " selected" : " ") .' >'.$key.'</option>';	
															
													}

											  ?>	
									</select>	
								
								</div>
							  </div> 
							 
							  <div class="form-group">
								<label for="text" class="col-md-4 control-label">Payment Status</label>
								<div class="col-md-8">
									<?php
									 $payment_status= get_user_meta($user_id, 'ep_fitness_payment_status', true);
									?>
									<select name="payment_status" id ="payment_status" class="form-control">
													<option value="success" <?php echo ($payment_status == 'success' ? 'selected' : '') ?>>Success</option>
													<option value="pending" <?php echo ($payment_status == 'pending' ? 'selected' : '') ?>>Pendinge</option>
													
									</select>	
									
								</div>
							  </div>
							
							 
							  <div class="form-group">
								<label for="inputEmail3" class="col-md-4 control-label">Expiry Date</label>
								<div class="col-md-8">
									<?php
									 $exp_date= get_user_meta($user_id, 'ep_fitness_exprie_date', true);
									?>
								 <input type="text"  name="exp_date"  readonly   id="exp_date" class="form-control ctrl-textbox"  value="<?php echo $exp_date; ?>" placeholder="">

								</div>
							  </div>
							  
							   <div class="form-group">
								<label for="inputEmail3" class="col-md-4 control-label">Content Settings</label>
								<div class="col-md-8">
									<?php
									  $user_content= get_user_meta($user_id, 'iv_user_content_setting', true);
									
									?>
									 <label class="col-md-12">
										<input type="radio" name="content_setting" id="content_setting" value="package_only" <?php echo ($user_content=='package_only'? 'checked':'' );?>> 
										<?php _e('Role Content Only','epfitness');?>
									 </label>
									  <label class="col-md-12">
										<input type="radio" name="content_setting" id="content_setting" value="specific_content" <?php echo ($user_content=='specific_content'? 'checked':'' );?>> 
										<?php _e('Specific Content Only','epfitness');?>
									 </label>
									
									  <label class="col-md-12">
										<input type="radio" name="content_setting" id="woocommerce_content" value="woocommerce_content" <?php if ( $user_content=='woocommerce_content'){ echo 'checked'; }?>> 
										<?php _e('Woocommerce Content','epfitness');?>
									 </label>
									  <label class="col-md-12">
										<input type="radio" name="content_setting" id="content_setting" value="both_content" <?php if ($user_content=='' OR $user_content=='both_content'){ echo 'checked'; }?>> 
										<?php _e('All Content [Role,Specific User, Woocommerce]','epfitness');?>
									 </label>
									 
								</div>
							  </div>
							
							
							
							 <input type="hidden"  name="user_id"     id="user_id"   value="<?php echo $user_id; ?>" >
							  
							 
								
							  
							 
												  
						  
						
					
							<div class="row">					
								<div class="col-md-12">	
									<label for="" class="col-md-4 control-label"></label>
									<div class="col-md-8">
										<button class="btn btn-info " onclick="return update_user_setting();">Update User</button></div>
										<p>&nbsp;</p>
									</div>
								</div>
							</div>	
							
							</form>
							
							
					
						</div>			
					</div>
				</div>		 



			
