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
.html-active .switch-html, .tmce-active .switch-tmce {
	height: 28px!important;
	}
	.wp-switch-editor {
		height: 28px!important;
	}
</style>	
	

		<h3  class=""><?php _e('Directory Setting','ivdirectories');  ?><small></small>	
		</h3>
	
		<br/>
		<div id="update_message"> </div>		 
					
			<form class="form-horizontal" role="form"  name='directory_settings' id='directory_settings'>											
				
							
					
					<h4><?php _e('Color Options','ivdirectories');  ?> </h4>
					<hr>
					
					
					<?php
					$dir_color=get_option('_dir_color');	
					if($dir_color==""){$dir_color='#0099fe';}
					$dir_color=str_replace('#','',$dir_color);
					?>
					<div class="form-group">
					<label  class="col-md-3 control-label"> <?php _e('Plugin Color','ivdirectories');  ?></label>
					
					<div class="col-md-6">
							<label>												
							<input type="color" name="dir_color" id="dir_color" value='#<?php echo $dir_color;?>' > 
							</label>	
						</div>
						
					</div>
					
							
									
				
					
					
				<div class="form-group">
					<label  class="col-md-3 control-label"> <?php _e('Cron Job URL','ivdirectories');  ?>						 
					
					</label>
					
						<div class="col-md-6">
							<label>												
							 <b> <a href="<?php echo admin_url('admin-ajax.php'); ?>?action=ep_fitness_cron_job"><?php echo admin_url('admin-ajax.php'); ?>?action=ep_fitness_cron_job </a></b>
							
							</label>	
						</div>
						<div class="col-md-3">
							Cron JOB Detail : Hide Listing( Package setting),Subscription Remainder email.
						</div>		
							
					</div>
					
					
				
					<div class="form-group">
					<label  class="col-md-3 control-label"> </label>
					<div class="col-md-8">
						
						<button type="button" onclick="return  iv_update_dir_setting();" class="btn btn-success">Update</button>
					</div>
				</div>
						
			</form>
								

	
<script>

function iv_update_dir_setting(){
var search_params={
		"action"  : 	"iv_update_dir_setting",	
		"form_data":	jQuery("#directory_settings").serialize(), 
	};
	jQuery.ajax({					
		url : ajaxurl,					 
		dataType : "json",
		type : "post",
		data : search_params,
		success : function(response){
			jQuery('#update_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg +'.</div>');
			
		}
	})

}

	

</script>
