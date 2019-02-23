<?php
wp_enqueue_style('all-post-style', wp_ep_fitness_URLPATH. 'admin/files/css/all-post.css', array(), $ver = false, $media = 'all');
?>
          <div class="profile-content">
            
              <div class="portlet light">
                <div class="portlet-title tabbable-line clearfix">
                    <div class="caption caption-md">
                      <span class="caption-subject"> <?php esc_html_e('New Physical Record','epfitness'); ?></span>
                    </div>
					
                  </div>
               
                  
                  
                  <div class="portlet-body">
                    <div class="tab-content">
                    
                      <div class="tab-pane active" id="tab_1_1">					 			
					
						<div class="row">
							<div class="col-md-12">	 						
							 
							<form action="" id="new_post" name="new_post"  method="POST" role="form">															
								
<img src="http://funandfitnutrition.com/wp-content/uploads/2016/09/unnamed.jpg" width="600" height="125" title="Body Measurement" alt="Body Measurement" />

								
							<label for="text" class=" control-label"><?php esc_html_e('Instruction: Fill out the Physical Record every end of the week to track and monitor your Progress.','epfitness'); ?></label>

								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('Week #','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="week" id="week" value="" placeholder="<?php esc_html_e('Enter Week number','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('Date','epfitness'); ?></label>
									<div class="  "> 
										<input type="date" class="" id="date" name='date' size='9' value="" placeholder="<?php esc_html_e('','epfitness'); ?>"> 
 
									</div>																		
								</div>

								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('Height','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="height" id="height" value="" placeholder="<?php esc_html_e('Enter height here in centimeter','epfitness'); ?>">
									</div>																		
								</div>

								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('Weight','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="weight" id="weight" value="" placeholder="<?php esc_html_e('Enter weight here in Kilograms','epfitness'); ?>">
									</div>																		
								</div>
								


								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('1.Chest','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="chest" id="chest" value="" placeholder="<?php esc_html_e('Enter chest size here in centimeters','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('2.Left Arm','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="l-arm" id="l-arm" value="" placeholder="<?php esc_html_e('Enter left arm  size here in centimeters','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('3.Right Arm','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="r-arm" id="r-arm" value="" placeholder="<?php esc_html_e('Enter right arm  size here in centimeters','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('4.Waist','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="waist" id="waist" value="" placeholder="<?php esc_html_e('Enter waist  size here in centimeters','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('5.Abdomen ','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="abdomen" id="abdomen" value="" placeholder="<?php esc_html_e('Enter abdomen size here in centimeters','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('6.Hips','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="hips" id="hips" value="" placeholder="<?php esc_html_e('Enter hips size here in centimeters','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('7.Left Thigh','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="l-thigh" id="l-thigh" value="" placeholder="<?php esc_html_e('Enter left thigh size here in centimeters','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('8.Right Thigh','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="r-thigh" id="r-thigh" value="" placeholder="<?php esc_html_e('Enter right thigh size here in centimeters','epfitness'); ?>">
									</div>																		
								</div>
								
<label for="text" class=" control-label"><?php esc_html_e('*Optional','epfitness'); ?></label>
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('9.Left Calf','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="l-calf" id="l-calf" value="" placeholder="<?php esc_html_e('Enter left calf size here in centimeters','epfitness'); ?>">
									</div>																		
								</div>
								
								<div class=" form-group">
									<label for="text" class=" control-label"><?php esc_html_e('10.Right Calf ','epfitness'); ?></label>
									<div class="  "> 
										<input type="text" class="" name="r-calf" id="r-calf" value="" placeholder="<?php esc_html_e('Enter right calf  size here in centimeters','epfitness'); ?>">
									</div>																		
								</div>
								
								
							
				
						
						
								<div class="margiv-top-10">
								    <div class="" id="update_message"></div>
									<input type="hidden" name="user_post_id" id="user_post_id" value="<?php //echo $curr_post_id; ?>">
								    <button type="button" class="btn-new btn-custom"  onclick="iv_save_post();"  class="btn green-haze"><?php esc_html_e('Save Record','epfitness'); ?></button>
		                          
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

 $(function()
                {
                         $( "#date" ).datepicker();
                         $("#icon").click(function() { $("#date").datepicker( "show" );})
                 });
 











function iv_save_post (){

	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	var loader_image = '<img src="<?php echo wp_ep_fitness_URLPATH. "admin/files/images/loader.gif"; ?>" />';
				jQuery('#update_message').html(loader_image);
				var search_params={
					"action"  : 	"ep_fitness_save_record",	
					"form_data":	jQuery("#new_post").serialize(), 
				};
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){
						if(response.code=='success'){
								var url = "<?php echo get_permalink(); ?>?&profile=all-records";    						
								jQuery(location).attr('href',url);	
						}						
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
                    title: "<?php esc_html_e( 'Set Current Pic', 'epfitness' ); ?>",
                    button: {
                        text: "<?php esc_html_e( 'Set Current Pic', 'epfitness' ); ?>",
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
        
