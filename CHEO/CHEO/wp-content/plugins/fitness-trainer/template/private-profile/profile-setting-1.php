<?php
wp_enqueue_style('stylemyaccountsettings', wp_ep_fitness_URLPATH . 'admin/files/css/my-account-settings.css');
?>


<div class="profile-content">

  <div class="portlet row light">
    <div class="portlet-title tabbable-line clearfix">
		  <div class="caption caption-md">
			<span class="caption-subject"><?php  _e('Profile','epfitness');?> </span>
		  </div>
      <ul class="nav nav-tabs">
        <li class="active">
          <a href="#tab_1_1" data-toggle="tab"><?php  _e('Personal Info','epfitness');?> </a>
        </li>
        <li>
          <a href="#tab_1_3" data-toggle="tab"><?php  _e('Change Password','epfitness');?> </a>
        </li>
        <li>
          <a href="#tab_1_5" data-toggle="tab"><?php  _e('Social','epfitness');?> </a>
        </li>
       
      </ul>
    </div>

    <div class="portlet-body">
      <div class="tab-content">

        <div class="tab-pane active" id="tab_1_1">
			
          <form role="form" name="profile_setting_form" id="profile_setting_form" action="#">
			  
			  
			<div class="margiv-top-10"> <label class="control-label"><?php echo _e('Image Gallery', 'wp_ep_fitness'); ?></label>
			<button type="button" onclick="edit_gallery_image('gallery_image_div');"  class="btn btn-xs green-haze"><?php _e('Add Images','ivdirectories'); ?></button>
			<?php
				$gallery_ids=get_user_meta($current_user->ID ,'image_gallery_ids',true);
				$gallery_ids_array = array_filter(explode(",", $gallery_ids));
				?>
			<input type="hidden" name="gallery_image_ids" id="gallery_image_ids" value="<?php echo $gallery_ids; ?>">
			
			<div class="" id="gallery_image_div">
				<?php
					if(sizeof($gallery_ids_array)>0){ 
						foreach($gallery_ids_array as $slide){	
							
					?>
					<div id="gallery_image_div<?php echo $slide;?>" class="col-md-3"><img  class="img-responsive"  src="<?php echo wp_get_attachment_url( $slide ); ?>"><button type="button" onclick="remove_gallery_image('gallery_image_div<?php echo $slide;?>', <?php echo $slide;?>);"  class="btn btn-xs btn-danger">X</button> </div>
					<?php
						}
					 }
					?>
					
			</div>	
			<div class="clearfix"><p></p></div>	
           <?php
           $default_fields = array();
           $field_set=get_option('ep_fitness_profile_fields' );

           if($field_set!=""){
            $default_fields=get_option('ep_fitness_profile_fields' );
          }else{
           $default_fields['first_name']='First Name';
           $default_fields['last_name']='Last Name';
           $default_fields['phone']='Phone Number';
           $default_fields['mobile']='Mobile Number';
           $default_fields['address']='Address';
           $default_fields['occupation']='Occupation';
           $default_fields['description']='About';
           $default_fields['web_site']='Website Url';

         }
         if(sizeof($field_set)<1){
           $default_fields['first_name']='First Name';
           $default_fields['last_name']='Last Name';
           $default_fields['phone']='Phone Number';
           $default_fields['mobile']='Mobile Number';
           $default_fields['address']='Address';
           $default_fields['occupation']='Occupation';
           $default_fields['description']='About';
           $default_fields['web_site']='Website Url';
         }

         $i=1;
         foreach ( $default_fields as $field_key => $field_value ) { ?>
         <div class="form-group">
          <label class="control-label"><?php echo _e($field_value, 'wp_ep_fitness'); ?></label>
          <input type="text" placeholder="<?php echo 'Enter '.$field_value;?>" name="<?php echo $field_key;?>" id="<?php echo $field_key;?>"  class="form-control-solid" value="<?php echo get_user_meta($current_user->ID,$field_key,true); ?>"/>
        </div>

        <?php
      }
      ?>				
						</div>				
                        <div class="margiv-top-10">
                          <div class="" id="update_message"></div>
                          <button type="button" onclick="update_profile_setting();"  class="btn-new btn-custom"><?php  _e('Save Changes','epfitness');?></button>

                        </div>
                      </form>
                    </div>

                    <div class="tab-pane" id="tab_1_3">
                      <form action="" name="pass_word" id="pass_word">
                        <div class="form-group">
                          <label class="control-label"><?php  _e('Current Password','epfitness');?> </label>
                          <input type="password" id="c_pass" name="c_pass" class="form-control-solid"/>
                        </div>
                        <div class="form-group">
                          <label class="control-label"><?php  _e('New Password','epfitness');?> </label>
                          <input type="password" id="n_pass" name="n_pass" class="form-control-solid"/>
                        </div>
                        <div class="form-group">
                          <label class="control-label"><?php  _e('Re-type New Password','epfitness');?> </label>
                          <input type="password" id="r_pass" name="r_pass" class="form-control-solid"/>
                        </div>
                        <div class="margin-top-10">
                          <div class="" id="update_message_pass"></div>
                          <button type="button" onclick="iv_update_password();"  class="btn-new btn-custom"><?php  _e('Change Password','epfitness');?> </button>
                          `
                        </div>
                      </form>
                    </div>

                    <div class="tab-pane" id="tab_1_5">
                      <form action="#" name="setting_fb" id="setting_fb">
                        <div class="form-group">
                          <label class="control-label">FaceBook</label>
                          <input type="text" name="facebook" id="facebook" value="<?php echo get_user_meta($current_user->ID,'facebook',true); ?>" class="form-control-solid"/>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Linkedin</label>
                          <input type="text" name="linkedin" id="linkedin" value="<?php echo get_user_meta($current_user->ID,'linkedin',true); ?>" class="form-control-solid"/>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Twitter</label>
                          <input type="text" name="twitter" id="twitter" value="<?php echo get_user_meta($current_user->ID,'twitter',true); ?>" class="form-control-solid"/>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Google+ </label>
                          <input type="text" name="gplus" id="gplus" value="<?php echo get_user_meta($current_user->ID,'gplus',true); ?>"  class="form-control-solid"/>
                        </div>					
                        <div class="form-group">
                          <label class="control-label">Pinterest </label>
                          <input type="text" name="pinterest" id="pinterest" value="<?php echo get_user_meta($current_user->ID,'pinterest',true); ?>"  class="form-control-solid"/>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Instagram </label>
                          <input type="text" name="Instagram" id="Instagram" value="<?php echo get_user_meta($current_user->ID,'instagram',true); ?>"  class="form-control-solid"/>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Vimeo </label>
                          <input type="text" name="vimeo" id="vimeo" value="<?php echo get_user_meta($current_user->ID,' vimeo',true); ?>"  class="form-control-solid"/>
                        </div>
                        
                         <div class="form-group">
                          <label class="control-label">YouTube </label>
                          <input type="text" name="youtube" id="youtube" value="<?php echo get_user_meta($current_user->ID,' youtube',true); ?>"  class="form-control-solid"/>
                        </div>
                        
                        
						

                        <div class="margin-top-10">
                         <div class="" id="update_message_fb"></div>
                         <button type="button" onclick="iv_update_fb();"  class="btn-new btn-custom"><?php  _e('Save Changes','epfitness');?> </button>                        
                       </div>
                     </form>
                   </div>
                
                    </div>
                  </div>
                </div>
              </div>
              <!-- END PROFILE CONTENT -->
              <script>
               
               function iv_update_fb (){

                 var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
                 var loader_image = '<img src="<?php echo wp_ep_fitness_URLPATH. "admin/files/images/loader.gif"; ?>" />';
                 jQuery('#update_message_fb').html(loader_image);
                 var search_params={
                   "action"  : 	"ep_fitness_update_setting_fb",
                   "form_data":	jQuery("#setting_fb").serialize(),
                 };
                 jQuery.ajax({
                   url : ajaxurl,
                   dataType : "json",
                   type : "post",
                   data : search_params,
                   success : function(response){

                    jQuery('#update_message_fb').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg +'.</div>');

                  }
                });

               }
               function iv_update_password (){

                 var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
                 var loader_image = '<img src="<?php echo wp_ep_fitness_URLPATH. "admin/files/images/loader.gif"; ?>" />';
                 jQuery('#update_message_pass').html(loader_image);
                 var search_params={
                   "action"  : 	"ep_fitness_update_setting_password",
                   "form_data":	jQuery("#pass_word").serialize(),
                 };
                 jQuery.ajax({
                   url : ajaxurl,
                   dataType : "json",
                   type : "post",
                   data : search_params,
                   success : function(response){

                    jQuery('#update_message_pass').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg +'.</div>');

                  }
                });

               }
function edit_gallery_image(profile_image_id){

var image_gallery_frame;
var hidden_field_image_ids = jQuery('#gallery_image_ids').val();
// event.preventDefault();
image_gallery_frame = wp.media.frames.downloadable_file = wp.media({
	// Set the title of the modal.
	title: '<?php _e( 'Gallery Images ', 'ivdirectories' ); ?>',
	button: {
		text: '<?php _e( 'Gallery Images', 'ivdirectories' ); ?>',
	},
	multiple: true,
	displayUserSettings: true,
});                
image_gallery_frame.on( 'select', function() {
	var selection = image_gallery_frame.state().get('selection');
	selection.map( function( attachment ) {
		attachment = attachment.toJSON();
		console.log(attachment);
		if ( attachment.id ) {
			jQuery('#'+profile_image_id).append('<div id="gallery_image_div'+attachment.id+'" class="col-md-3"><img  class="img-responsive"  src="'+attachment.sizes.thumbnail.url+'"><button type="button" onclick="remove_gallery_image(\'gallery_image_div'+attachment.id+'\', '+attachment.id+');"  class="btn btn-xs btn-danger">X</button> </div>');
			
			hidden_field_image_ids=hidden_field_image_ids+','+attachment.id ;
			jQuery('#gallery_image_ids').val(hidden_field_image_ids); 
			
			//jQuery('#gallery_image_edit').html('');  
		   
		}
	});
   
});               
image_gallery_frame.open(); 

 }
 function  remove_gallery_image(img_remove_div,rid){	
	var hidden_field_image_ids = jQuery('#gallery_image_ids').val();	
	hidden_field_image_ids =hidden_field_image_ids.replace(rid, '');	
	jQuery('#'+img_remove_div).remove();
	jQuery('#gallery_image_ids').val(hidden_field_image_ids); 
	//jQuery('#gallery_gallery_edit').html('');  

}
   
</script>

