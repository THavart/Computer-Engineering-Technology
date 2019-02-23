
          <div class="profile-content">
            
              <div class="portlet light">
                <div class="portlet-title tabbable-line clearfix">
                    <div class="caption caption-md">
                      <span class="caption-subject"> <?php esc_html_e('Edit Physical Record','epfitness'); ?></span>
                    </div>
					
                  </div>
                                 
                  <div class="portlet-body">
                    <div class="tab-content">
                    
                      <div class="tab-pane active" id="tab_1_1">
					  <?php					
						global $wpdb;
						// Check Max\
						$package_id=get_user_meta($current_user->ID,'ep_fitness_package_id',true);						
						$max=get_post_meta($package_id, 'ep_fitness_package_max_post_no', true);
						$curr_post_id=$_REQUEST['post-id'];
						$current_post = $curr_post_id;
						$post_edit = get_post($curr_post_id); 
						
						$have_edit_access='yes';	
						$title = $post_edit->post_title;
						$content = $post_edit->post_content;
					
					?>					
					 
						<div class="row">
							<div class="col-md-12">	 			
							<form action="" id="edit_post" name="edit_post"  method="POST" role="form">
							
								<div class="upload-content">
									<div class="row">
									
										<div class="col-md-6">
											<div class="form-group ">
												<label for="text" class="control-label"><?php esc_html_e('Current Status Image','epfitness'); ?>  </label>
												
													<div class="image-content" id="post_image_div">
														
														<?php $feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $curr_post_id ), 'thumbnail' ); 
															
															
															if($feature_image[0]!=""){ ?>
															
															<img title="profile image" class="" src="<?php  echo $feature_image[0]; ?>">
															
															<?php												
															}else{ ?>
															<a href="javascript:void(0);" onclick="edit_post_image('post_image_div');"  >									
														<?php  echo '<img src="'. wp_ep_fitness_URLPATH.'assets/images/image-add-icon.png">'; ?>			
														</a>	
															<?php
															}
															$feature_image_id=get_post_thumbnail_id( $curr_post_id );
															?>
																	
																			
													</div>
													
													<input type="hidden" name="feature_image_id" id="feature_image_id" value="<?php echo $feature_image_id; ?>">
													
													<div class="" id="post_image_edit">	
														<button type="button" onclick="edit_post_image('post_image_div');"  class="btn btn-sm green-haze"><?php esc_html_e('Add','epfitness'); ?> </button>
														
													</div>									
											</div>
										</div>

									</div>
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('Week #','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="week" id="week" value="<?php echo  get_post_meta($curr_post_id,'week',true); ?>" placeholder="<?php esc_html_e('Enter Week number','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('Date','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="date" id="date" value="<?php echo  get_post_meta($curr_post_id,'date',true); ?>" placeholder="<?php esc_html_e('Enter date here','epfitness'); ?>">
									</div>																		
								</div>
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('Height','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="height" id="height" value="<?php echo  get_post_meta($curr_post_id,'height',true); ?>" placeholder="<?php esc_html_e('Enter height here','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('Weight','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="weight" id="weight" value="<?php echo  get_post_meta($curr_post_id,'weight',true); ?>" placeholder="<?php esc_html_e('Enter weight here','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('Chest','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="chest" id="chest" value="<?php echo  get_post_meta($curr_post_id,'chest',true); ?>" placeholder="<?php esc_html_e('Enter chest size here','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('Left Arm','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="l-arm" id="l-arm" value="<?php echo  get_post_meta($curr_post_id,'l-arm',true); ?>" placeholder="<?php esc_html_e('Enter l.arm  size here','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('Right Arm','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="r-arm" id="r-arm" value="<?php echo  get_post_meta($curr_post_id,'r-arm',true); ?>" placeholder="<?php esc_html_e('Enter r.arm  size here','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('Waist','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="waist" id="waist" value="<?php echo  get_post_meta($curr_post_id,'waist',true); ?>" placeholder="<?php esc_html_e('Enter waist  size here','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('Abdomen','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="abdomen" id="abdomen" value="<?php echo  get_post_meta($curr_post_id,'abdomen',true); ?>" placeholder="<?php esc_html_e('Enter abdomen size here','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('Hips','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="hips" id="hips" value="<?php echo  get_post_meta($curr_post_id,'hips',true); ?>" placeholder="<?php esc_html_e('Enter hips size here','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('Left Thigh','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="l-thigh" id="l-thigh" value="<?php echo  get_post_meta($curr_post_id,'l-thigh',true); ?>" placeholder="<?php esc_html_e('Enter l.thigh size here','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('Right Thigh','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="r-thigh" id="r-thigh" value="<?php echo  get_post_meta($curr_post_id,'r-thigh',true); ?>" placeholder="<?php esc_html_e('Enter r-thigh size here','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('Left Calf','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="l-calf" id="l-calf" value="<?php echo  get_post_meta($curr_post_id,'l-calf',true); ?>" placeholder="<?php esc_html_e('Enter l-calf size here','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('Right Calf ','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="r-calf" id="r-calf" value="<?php echo  get_post_meta($curr_post_id,'r-calf',true); ?>" placeholder="<?php esc_html_e('Enter r-calf  size here','epfitness'); ?>">
									</div>																		
								</div>
								
								
								
								
				
						
								<div class="margiv-top-10">
								    <div class="" id="update_message"></div>
									<input type="hidden" name="user_post_id" id="user_post_id" value="<?php echo $curr_post_id; ?>">
								    <button type="button" class="btn-new btn-custom"  onclick="iv_update_post();"  class="btn green-haze"><?php esc_html_e('Update Record','epfitness'); ?></button>
		                          
		                        </div>	
									 
							</form>
						  </div>
						</div>
			
					
			

                      
					 </div>
                     
                  </div>
                </div>
              </div>
            </div>
          <!-- END PROFILE CONTENT -->

          
	 <script>				 
function iv_update_post (){
		
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	var loader_image = '<img src="<?php echo wp_ep_fitness_URLPATH. "admin/files/images/loader.gif"; ?>" />';
				jQuery('#update_message').html(loader_image);
				var search_params={
					"action"  : 	"ep_fitness_update_record",	
					"form_data":	jQuery("#edit_post").serialize(), 
				};
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){
						if(response.code=='success'){
								var url = "<?php echo get_permalink(); ?>?&profile=records";  						
								jQuery(location).attr('href',url);	
						}
						//jQuery('#update_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg +'.</div>');
						
					}
				});
	
	}

function  remove_post_image	(profile_image_id){
	jQuery('#'+profile_image_id).html('');
	jQuery('#feature_image_id').val(''); 
	jQuery('#post_image_edit').html('<button type="button" onclick="edit_post_image(\'post_image_div\');"  class="btn btn-xs green-haze">Add</button>');  

}

 function edit_post_image(profile_image_id){	
				var image_gallery_frame;

               // event.preventDefault();
                image_gallery_frame = wp.media.frames.downloadable_file = wp.media({
                    // Set the title of the modal.
                    title: "<?php esc_html_e( 'Set Current Image ', 'epfitness' ); ?>",
                    button: {
                        text: "<?php esc_html_e( 'Set Current Image', 'epfitness' ); ?>",
                    },
                    multiple: false,
                    displayUserSettings: true,
                });                
                image_gallery_frame.on( 'select', function() {
                    var selection = image_gallery_frame.state().get('selection');
                    selection.map( function( attachment ) {
                        attachment = attachment.toJSON();
                        if ( attachment.id ) {
							jQuery('#'+profile_image_id).html('<img  class="img-responsive"  src="'+attachment.sizes.thumbnail.url+'">');
							jQuery('#feature_image_id').val(attachment.id ); 
							jQuery('#post_image_edit').html('<button type="button" onclick="edit_post_image(\'post_image_div\');"  class="btn btn-xs green-haze">Edit</button> &nbsp;<button type="button" onclick="remove_post_image(\'post_image_div\');"  class="btn btn-xs green-haze">Remove</button>');  
						   
						}
					});
                   
                });               
				image_gallery_frame.open(); 
				
	}


 </script>	  
        
