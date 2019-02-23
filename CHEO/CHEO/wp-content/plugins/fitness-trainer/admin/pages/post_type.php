<style>
.bs-callout {
    margin: 20px 0;
    padding: 15px 30px 15px 15px;
    border-left: 5px solid #eee;
}
.bs-callout-info {
    background-color: #E4F1FE;
    border-color: #22A7F0;
}

</style><?php
		
			
			$ii=1;
			
			
			?>
			<div class="bootstrap-wrapper">
				<div class="welcome-panel container-fluid">
					
						<div class="row">
							
							<div class="col-md-12"><h3 class="page-header"><?php _e('Custom Post Type','epfitness'); ?>  <br /><small> &nbsp;</small> </h3>
							</div>
						</div> 
							<div id="success_message">	</div>
							
						<div class="panel panel-info">
							<div class="panel-heading"><h4><?php _e('Custom Post type list','epfitness'); ?>   </h4></div>
						<div class="panel-body">	
							
							
							<form id="dir_post_type" name="dir_post_type" class="form-horizontal" role="form" onsubmit="return false;">	
																									
										<div class="row ">
												<div class="col-sm-5 ">										
													<h4><?php _e('Post Type Name','epfitness'); ?> </h4>
												</div>
												<div class="col-sm-5">
													<h4><?php _e('Display Label','epfitness'); ?></h4>									
												</div>
												<div class="col-sm-2">
													<h4><?php _e('Action','epfitness'); ?></h4>													
												</div>		
																		  
										</div>
										
																 
									
											<div id="custom_field_div">			
														<?php
														
														$default_fields = array();
														$field_set=get_option('_ep_fitness_url_postype' );
															
															
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
														
														$i=1;		
														
														foreach ( $default_fields as $field_key => $field_value ) {												
															
																//echo'<br/>$field_key....'.$field_key.'......$field_values....'.$field_values;
																echo '<div class="row form-group " id="field_'.$i.'"><div class=" col-sm-5"> <input type="text" class="form-control" name="posttype_name[]" id="posttype_name[]" value="'.$field_key . '" placeholder="Enter Post Type Name "> </div>		
																<div  class=" col-sm-5">
																<input type="text" class="form-control" name="posttype_label[]" id="posttype_label[]" value="'.$field_value . '" placeholder="Enter Post Type Label">													
																</div>
																<div  class=" col-sm-2">';
																?>
																<button class="btn btn-danger btn-xs" onclick="return iv_remove_field('<?php echo $i; ?>');">Delete</button>
																<?php																								
																echo '</div></div>';
															
															$i++;	
															
														}	
													?>
														
													
											</div>				  
										<div class="col-xs-12">											
											<button class="btn btn-warning btn-xs" onclick="return iv_add_field();"><?php _e('Add More','epfitness'); ?></button>
									 </div>	
									<input type="hidden" name="dir_name" id="dir_name" value="<?php echo $main_category; ?>">	 
							</form>	
					
									<div class="col-xs-12">					
												<div align="center">
													<div id="loading"></div>
													<button class="btn btn-info btn-lg" onclick="return update_dir_post_type();"><?php _e('Update','epfitness'); ?> </button>
												</div>
												<p>&nbsp;</p>
									</div>
									<div class=" col-md-12  bs-callout bs-callout-info">							
												Do not use Uppercase, Space & Special characters for custom psot type name. Please update your site permalink after update the post type.										
									</div>
						</div>							 
				
				</div>			 	
					
					
						<div class="row">
							
							<div class="col-md-12"><h3 class="page-header"><?php _e('Custom Post Type Page Setting','epfitness'); ?>  <br /><small> &nbsp;</small> </h3>
							</div>
						</div> 
							<div id="success_message2">	</div>
							
						<div class="panel panel-info">
							<div class="panel-heading"><h4><?php _e('Select Your Custom Post Type Single/Detail Page','epfitness'); ?>   </h4></div>
						<div class="panel-body">	
							<?php
							$args = array(
										'child_of'     => 0,
										'sort_order'   => 'ASC',
										'sort_column'  => 'post_title',
										'hierarchical' => 1,															
										'post_type' => 'page'
										);
							?>
							
							<form id="dir_post_type_page" name="dir_post_type_page" class="form-horizontal" role="form" onsubmit="return false;">	
											
											<div id="custom_field_div">			
														<?php
														
														$default_fields = array();
														$field_set=get_option('_ep_fitness_url_postype' );
															
															
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
														$i=1;
														foreach ( $default_fields as $field_key => $field_value ) {																		
																echo'<label  class="col-md-2   control-label">'.$field_value . ' Page</label>';
																?>
																<div class="col-md-10 col-xs-10 col-sm-10">
																		<div class="checkbox col-md-4 ">	
																	<?php
																		$old_select='';
																		$old_select=get_option('cpt_page_'.$field_key);
																		 //update_option('cpt_page_'.$field_key,'');
																		echo "<select id='cpt_page_".$field_key."' name='cpt_page_".$field_key."'class='form-control'>";
																		
																		echo "<option value='training-calendar' ".($old_select=='training-calendar' ? 'selected':'').">Calendar view</option>";
																		echo "<option value='post-list' ".($old_select=='post-list'? 'selected':'').">List View</option>";
																		
																		echo "</select>";
																	
																	?>
																	</div>	
																	</div>
																
																<?php																								
															
															
															$i++;	
															
														}	
													?>
														
													
											</div>				  
									
									
							</form>	
					
									<div class="col-xs-12">					
												<div align="center">
													<div id="loading"></div>
													<button class="btn btn-info btn-lg" onclick="return update_dir_post_type_page();"><?php _e('Update','epfitness'); ?> </button>
												</div>
												<p>&nbsp;</p>
									</div>
									
						</div>							 
				
				</div>			 	
					
		
							
			
									
			  </div>						
		</div>		 


<script>
	var i=<?php echo $i; ?>;
	var ii=<?php echo $ii; ?>;
	
	
	function update_dir_post_type(){
		
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		var search_params = {
			"action": 		"ep_fitness_update_post_type",
			"form_data":	jQuery("#dir_post_type").serialize(), 	
		};
		jQuery.ajax({
			url: ajaxurl,
			dataType: "json",
			type: "post",
			data: search_params,
			success: function(response) {              		
				//jQuery("#success_message").html('<h4><span style="color: #04B404;"> ' + response.code + '</span></h4>');
				jQuery('#success_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.code +'.</div>');
			}
		});
	}
	function iv_add_field(){	
	
		jQuery('#custom_field_div').append('<div class="row form-group " id="field_'+i+'"><div class=" col-sm-5"> <input type="text" class="form-control" name="posttype_name[]" id="posttype_name[]" value="" placeholder="Enter post type, no space & upper case"> </div>	<div  class=" col-sm-5"><input type="text" class="form-control" name="posttype_label[]" id="posttype_label[]" value="" placeholder="Enter Post Type Label"></div><div  class=" col-sm-2"><button class="btn btn-danger btn-xs" onclick="return iv_remove_field('+i+');">Delete</button>');		
			i=i+1;		
	}
	function iv_remove_field(div_id){		
		jQuery("#field_"+div_id).remove();
	}	
	
	function update_dir_post_type_page(){
		
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		var search_params = {
			"action": 		"ep_fitness_update_post_type_page",
			"form_data":	jQuery("#dir_post_type_page").serialize(), 	
		};
		jQuery.ajax({
			url: ajaxurl,
			dataType: "json",
			type: "post",
			data: search_params,
			success: function(response) {              		
				//jQuery("#success_message").html('<h4><span style="color: #04B404;"> ' + response.code + '</span></h4>');
				jQuery('#success_message2').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.code +'.</div>');
			}
		});
	}
	
	
		
</script>				
			
