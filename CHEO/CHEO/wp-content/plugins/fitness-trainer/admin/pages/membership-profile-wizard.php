<div class="bootstrap-wrapper">
	<div class="welcome-panel container-fluid">
		
		<div class="row">
			<div class="col-md-12">
				
				<h3 class="page-header" ><?php _e('My Account','epfitness');?> <small>  </small> </h3>
				
				
				
			</div>
		</div>
		
		
		<div class="form-group col-md-12 row">
			
			<div class="row ">
				<label for="text" class="col-md-2 control-label"><?php _e('Short Code','epfitness');?> </label>
				<div class="col-md-4" >
					[ep_fitness_profile_template]
				</div>
				<div class="col-md-4" id="success_message">
				</div>
			</div>
			<div class="row ">
				<label for="text" class="col-md-2 control-label"><?php _e('Php Code','epfitness');?> </label>
				<div class="col-md-10" >
							<p>
										&lt;?php
										echo do_shortcode('[ep_fitness_profile_template]');
										?&gt;</p>	
				</div>
			</div>
			<div class="row ">
				<label for="text" class="col-md-2 control-label"> <?php _e('My Account Page','epfitness');?> </label>
				<div class="col-md-10" >
					<!--
					 get_option('_ep_fitness_registration','73');
					-->
					<?php 
					$form_wizard=get_option('_ep_fitness_profile_page');
							//echo get_the_title( $form_wizard );  ?>
					<a class="btn btn-info btn-xs " href="<?php echo get_permalink( $form_wizard ); ?>" target="blank"><?php _e('View Page','epfitness');?> </a>
				
					
				</div>
			</div>
			<div class="row ">
				<label for="text" class="col-md-2 control-label"> <?php _e('Profile Fields Setting','epfitness');?> </label>
				<div class="col-md-12" >	
					
					<?php
							include ('profile-fields.php');
					?>					
				</div>
				
			</div>
			
			<br/>
			
			
		</div>
		
			
		
	</div>
</div>
<script type="text/javascript">
	 jQuery(document).ready(function () {

		   jQuery("input[type='radio']").click(function(){
				update_profile_template();
		   });

		});
function update_profile_template(){
	
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		var search_params = {
			"action": 			"ep_fitness_update_profile_template",
			"profile-st": jQuery("input[name=option-profile]:checked").val(),	
		};
		jQuery.ajax({
			url: ajaxurl,
			dataType: "json",
			type: "post",
			data: search_params,
			success: function(response) {              		
				jQuery("#success_message").html('<h4><span style="color: #04B404;"> ' + response.code + '</span></h4>');
			}
		});
}
</script>
