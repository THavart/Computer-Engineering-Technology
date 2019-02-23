<?php
wp_enqueue_style('wp-ep_fitness-myaccount-style-11', wp_ep_fitness_URLPATH . 'admin/files/css/iv-bootstrap.css');
wp_enqueue_script('ep_fitness-myaccount-style-12', wp_ep_fitness_URLPATH . 'admin/files/js/bootstrap.min.js');
//wp_enqueue_style('add-listing-style', wp_ep_fitness_URLPATH . 'admin/files/css/add-listing.css');
wp_enqueue_style('add-listing-stylemyaccount', wp_ep_fitness_URLPATH . 'admin/files/css/my-account.css');

require(wp_ep_fitness_DIR .'/admin/files/css/color_style.php');

$color_setting=get_option('_dir_color');	
if($color_setting==""){$color_setting='#0099fe';}
$color_setting=str_replace('#','',$color_setting);
					


wp_enqueue_media();
global $current_user;
require(wp_ep_fitness_DIR .'/admin/files/css/color_style.php');
?>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<?php
global $current_user;

$currencies = array();
$currencies['AUD'] ='$';$currencies['CAD'] ='$';
$currencies['EUR'] ='€';$currencies['GBP'] ='£';
$currencies['JPY'] ='¥';$currencies['USD'] ='$';
$currencies['NZD'] ='$';$currencies['CHF'] ='Fr';
$currencies['HKD'] ='$';$currencies['SGD'] ='$';
$currencies['SEK'] ='kr';$currencies['DKK'] ='kr';
$currencies['PLN'] ='zł';$currencies['NOK'] ='kr';
$currencies['HUF'] ='Ft';$currencies['CZK'] ='Kč';
$currencies['ILS'] ='₪';$currencies['MXN'] ='$';
$currencies['BRL'] ='R$';$currencies['PHP'] ='₱';
$currencies['MYR'] ='RM';$currencies['AUD'] ='$';
$currencies['TWD'] ='NT$';$currencies['THB'] ='฿';
$currencies['TRY'] ='TRY';	$currencies['CNY'] ='¥';
$currency= get_option('_ep_fitness_api_currency');

$currency_symbol=(isset($currencies[$currency]) ? $currencies[$currency] :$currency );
?>

<div id="profile-account2" class="bootstrap-wrapper around-separetor">
  <div class="row margin-top-10">
    <div class="col-md-3 col-sm-3 col-xs-12">
      <!-- BEGIN PROFILE SIDEBAR -->

      <div class="profile-sidebar">
        <!-- PORTLET MAIN -->
        <div class="portlet portlet0 light profile-sidebar-portlet">
          <!-- SIDEBAR USERPIC -->
          <div class="profile-userpic text-center" id="profile_image_main">                      
          <?php			
				  	$iv_profile_pic_url=get_user_meta($current_user->ID, 'iv_profile_pic_url',true);
				  	if($iv_profile_pic_url!=''){ ?>
					 <img src="<?php echo $iv_profile_pic_url; ?>">
					<?php
					}else{						
						echo $avatar_img = get_avatar( $current_user->ID, 300 );  												
						preg_match("/src=['\"](.*?)['\"]/i", $avatar_img, $matches);						 						
						if($matches[1]!=''){
							update_user_meta($current_user->ID, 'iv_profile_pic_url',$matches[1]);
						}	
						//echo'	 <img src="'. tiger_IMAGE.'Blank-Profile.jpg'.'">';
					}
				  	?>

        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
          <div class="profile-usertitle-name">
           <?php
           $name_display=get_user_meta($current_user->ID,'first_name',true).' '.get_user_meta($current_user->ID,'last_name',true);
           echo (trim($name_display)!=""? $name_display : $current_user->display_name );?>
         </div>
         <div class="profile-usertitle-job">
           <?php echo get_user_meta($current_user->ID,'occupation',true); ?>
         </div>

       </div>
       <!-- END SIDEBAR USER TITLE -->
       <!-- SIDEBAR BUTTONS -->
       <div class="profile-userbuttons">
        <button type="button" onclick="edit_profile_image('profile_image_main');"  class="btn-new btn-custom btn-circle"><?php _e('Change','epfitness'); ?> </button>
      </div>
      <!-- END SIDEBAR BUTTONS -->
      <!-- SIDEBAR MENU -->
      <div class="profile-usermenu">
       <?php
		$active=(isset($_GET['profile'])?$_GET['profile']:'training-plans');

		if(isset($_GET['profile']) AND $_GET['profile']=='setting' ){
		$active='setting';
		}
		if(isset($_GET['profile']) AND $_GET['profile']=='level' ){
		$active='level';
		}

		if(isset($_GET['profile']) AND $_GET['profile']=='records' ){
			$active='records';
		}
		if(isset($_GET['profile']) AND $_GET['profile']=='add-record' ){
		$active='add-record';
		}
	 
      ?>
		<ul class="nav">
		<li class="<?php echo ($_GET['profile'] == 'myaccount' ? 'active':''); ?>"><a href="<?php echo get_permalink(); ?>?&profile=myaccount">
			<i class="fa fa-user" aria-hidden="true"></i>
			My Account
			</a>
		</li>
        <?php
        $account_menu_check= '';
        if( get_option( '_ep_fitness_mylevel' ) ) {
         $account_menu_check= get_option('_ep_fitness_mylevel');
		}
		if($account_menu_check!='yes'){
         ?>
		<li class="<?php echo ($active=='level'? 'active':''); ?> ">
			<a href="<?php echo get_permalink(); ?>?&profile=level">
			<i class="fa fa-cog"></i>
			<?php _e('Membership Level','epfitness');	 ?> </a>
		</li>
          <?php
        }
        ?>

        <?php
        $account_menu_check= '';
        if( get_option( '_ep_fitness_menusetting' ) ) {
			$account_menu_check= get_option('_ep_fitness_menusetting');
		}
		if($account_menu_check!='yes'){
		?>
			<li class="<?php echo ($active=='setting'? 'active':''); ?> ">
			<a href="<?php echo get_permalink(); ?>?&profile=setting">
			<i class="fa fa-cog"></i>
		<?php _e('Account Settings','epfitness');?> </a>
			</li>
		<?php
		}
        ?>
		
		  <?php
			$account_menu_check= '';
			if( get_option( '_ep_fitness_menurecords' ) ) {
			 $account_menu_check= get_option('_ep_fitness_menurecords');
		   }
		   if($account_menu_check!='yes'){
			 ?>
			 <li class="<?php echo ($active=='records'? 'active':''); ?> ">
			  <a href="<?php echo get_permalink(); ?>?&profile=records">
				<i class="fa fa-list-alt"></i>
				<?php _e('My Records','epfitness');?> </a>
			  </li>
			  <?php
			}
			?>
			  <?php
			$account_menu_check= '';
			if( get_option( '_ep_fitness_menuadd-record' ) ) {
			 $account_menu_check= get_option('_ep_fitness_menuadd-record');
		   }
		   if($account_menu_check!='yes'){
			 ?>
			 <li class="<?php echo ($active=='add-record'? 'active':''); ?> ">
			  <a href="<?php echo get_permalink(); ?>?&profile=add-record">
				<i class="fa fa-list"></i>
				<?php _e('Add Record','epfitness');?> </a>
			  </li>
			  <?php
			}
			?>
		
		
		
		 <?php		$package_id=get_user_meta($current_user->ID,'ep_fitness_package_id',true);
					$training_program= get_post_meta($package_id, 'iv_training_program', true);
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
					

					//$user_role= $current_user->roles[0];
					//if(isset($current_user->roles[0]) and $current_user->roles[0]=='administrator'){
						foreach ( $default_fields as $field_key => $field_value ) {
								
								?>
								 <li class="<?php echo ($active==$field_key? 'active':''); ?> ">
								  <a href="<?php echo get_permalink().'?&profile='.$field_key; ?>".>
									<i class="fa fa-calendar-o"></i>
									<?php _e($field_value,'epfitness');?> </a>
								  </li>
							  <?php
								
						}
					//}
					
				?>
              

        
        
        <?php     $old_custom_menu = array();
        if(get_option('ep_fitness_profile_menu')){
          $old_custom_menu=get_option('ep_fitness_profile_menu' );
        }
        $ii=1;
        if($old_custom_menu!=''){
          foreach ( $old_custom_menu as $field_key => $field_value ) { ?>

          <li class="">
           <a href="<?php echo $field_value; ?>">
            <i class="fa fa-cog"></i>
            <?php echo $field_key;?> </a>
          </li>

          <?php
        }
      }


      ?>
      <li class="<?php echo ($active=='log-out'? 'active':''); ?> ">
        <a href="<?php echo wp_logout_url( home_url() ); ?>" >
          <i class="fa fa-sign-out"></i>
          <?php _e('Sign out','epfitness');?>
        </a>
      </li>


    </ul>
  </div>
  <!-- END MENU -->
</div>
<!-- END PORTLET MAIN -->
<!-- PORTLET MAIN -->

<!-- END PORTLET MAIN -->
</div>
</div>
<!-- END BEGIN PROFILE SIDEBAR -->
<!-- BEGIN PROFILE CONTENT -->
<?php ?>

<div class="col-md-9 col-sm-9 col-xs-12">
  <?php
 
  $profile=(isset($_GET['profile'])?$_GET['profile']:'');
  $style=(isset($_GET['style'])?$_GET['style']:'');
  
  $file_include='training-calendar.php';

  switch ($profile) {
    case "level":
       $file_include='profile-level-1.php';  
        break;
    case "setting":
       $file_include='profile-setting-1.php';  
        break;  
    case "record-edit":
       $file_include='profile-record-edit.php';  
        break;      
    case "records":
       $file_include='profile-all-record.php';  
        break;          
    case "add-record":
       $file_include='profile-new-record.php';  
        break;      
    case "post":
       $file_include='profile-single-post.php';  
        break; 
	case "myaccount":
		$file_include='post-list.php'; 
		break;
    default:
    $i=1;
     foreach ( $default_fields as $field_key => $field_value ) {
		 		$old_select=get_option('cpt_page_'.$field_key);
		 		if($profile==''){					
					$file_include='training-calendar.php';
					break;
				}	
				if($field_key==$profile){
					if($old_select!=''){								
						$file_include=$old_select.'.php';		
					}else{
						if($i==1){
							$file_include='training-calendar.php';						
						}else{
							$file_include='post-list.php';
						}					
					}						
					break;
				}
		 $i++;	 
		}	
    
      
	}


   include(  wp_ep_fitness_template. 'private-profile/'.$file_include);



 ?>


</div>
</div>
</div>




<script>
  jQuery(document).ready(function($) {
    jQuery('[href^=#tab]').click(function (e) {
      e.preventDefault()
      jQuery(this).tab('show')
    });
  })

  jQuery(document).ready(function($) {
    var getWidth = jQuery('.bootstrap-wrapper').width();
    if (getWidth < 780) {
      jQuery('.bootstrap-wrapper').addClass('narrow-width');
    } else {
      jQuery('.bootstrap-wrapper').removeClass('narrow-width');
    }
  });


  function edit_profile_image(profile_image_id){
    var image_gallery_frame;

               // event.preventDefault();
               image_gallery_frame = wp.media.frames.downloadable_file = wp.media({
                    // Set the title of the modal.
                    title: '<?php _e( 'Profile Image', 'easy-image-gallery' ); ?>',
                    button: {
                      text: '<?php _e( 'Profile Image', 'easy-image-gallery' ); ?>',
                    },
                    multiple: false,
                    displayUserSettings: true,
                  });
               image_gallery_frame.on( 'select', function() {
                var selection = image_gallery_frame.state().get('selection');
                selection.map( function( attachment ) {
                  attachment = attachment.toJSON();
                  if ( attachment.id ) {
							//console.log(attachment.sizes.thumbnail.url);
							var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
							var search_params = {
								"action": 	"ep_fitness_update_profile_pic",
								"attachment_thum": attachment.sizes.thumbnail.url,
								"profile_pic_url_1": attachment.url,
							};
             jQuery.ajax({
              url: ajaxurl,
              dataType: "json",
              type: "post",
              data: search_params,
              success: function(response) {
               if(response=='success'){

                jQuery('#'+profile_image_id).html('<img  class="img-circle img-responsive"  src="'+attachment.sizes.thumbnail.url+'">');


              }

            }
          });

           }
         });

              });
image_gallery_frame.open();

}

function update_profile_setting (){

	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	var loader_image = '<img src="<?php echo wp_ep_fitness_URLPATH. "admin/files/images/loader.gif"; ?>" />';
  jQuery('#update_message').html(loader_image);
  var search_params={
   "action"  : 	"ep_fitness_update_profile_setting",
   "form_data":	jQuery("#profile_setting_form").serialize(),
 };
 jQuery.ajax({
   url : ajaxurl,
   dataType : "json",
   type : "post",
   data : search_params,
   success : function(response){
    jQuery('#update_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg +'.</div>');

  }
});

}


</script>
<style>
.profile-usermenu ul>li{
	background-image: none;
}
</style>