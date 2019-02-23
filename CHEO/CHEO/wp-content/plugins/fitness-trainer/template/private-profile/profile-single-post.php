<?php
$post_id='';
if(isset($_REQUEST['id'])){
  $post_id=$_REQUEST['id'];
}

$day_num='';
if(isset($_REQUEST['cday'])){
  $day_num=$_REQUEST['cday'];
}

$current_user = wp_get_current_user();
$roles = $current_user->roles;
$role = array_shift( $roles );
$post_data = get_post( $post_id ); 

$user_content= get_user_meta($current_user->ID, 'iv_user_content_setting', true);
if($user_content==''){$user_content='both_content';}
$have_access='0';

if(get_post_meta( $post_id,'_ep_post_for', true )=='role'){ 
	$package_arr=get_post_meta( $post_id,'_ep_postfor_package', true);
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
if(get_post_meta( $post_id,'_ep_post_for', true )=='user'){ 
	$user_arr=explode(",", get_post_meta( $post_id,'_ep_postfor_user', true )); 	
 if(in_array($current_user->ID, $user_arr)){
								
		if($user_content=='both_content'  OR $user_content=='specific_content'){
		$have_access='1';
	  }else{
		$have_access='0';
	  }	
		
	}				
}
if ( class_exists( 'WooCommerce' ) ) {
	if(get_post_meta( $post_id,'_ep_post_for', true )=='Woocommerce'){ 
		$product_arr=explode(",", get_post_meta( $post_id,'_ep_postfor_woocommerce', true )); 
		if($user_content=='both_content'  OR $user_content=='woocommerce_content'){
			foreach($product_arr as $selected_product){										
				if( wc_customer_bought_product( $current_user->email, $current_user->ID, $selected_product ) ){												
					$have_access='1';
				}
			}	
		}												
	}
}
$user_role= $current_user->roles[0];
if(isset($current_user->roles[0]) and $current_user->roles[0]=='administrator'){
	$have_access='1';
}
?>
<div class="profile-content">
	<!--<h2> <?php echo $post_data->post_title;?></h2> -->
					 
	  <div class="portlet-body">   
		                 
		<?php
		if($have_access=='0'){		  
		   _e('Access Denied', 'epfitness'); 
		 }else{
						 
			echo do_shortcode( str_replace('[day_number]',$day_num,$post_data->post_content) );
			
			?>
			<div class="col-sm-12 " id="training_done" style="margin-top:30px;">
				<?php
				
				$done_status='';
				if($day_num!=''){
					$done_status=get_user_meta($current_user->ID,'_post_done_day_'.$post_id.'_'.$day_num,true);
				}else{
					$done_status=get_user_meta($current_user->ID,'_post_done_'.$post_id,true);
				}
				

				if($done_status=='done'){

					echo _e('You have successfully completed the ','epfitness').str_replace('-',' ',$post_data->post_type).'.';

				}else{ ?>
				<button type="button" onclick="done_iv();" class="btn done-training"><?php echo _e('Done','epfitness'); ?></button> 
				<?php
				}
			?>


		</div>	
			<?php
			include('comments.php');
				
		  }	
		  
		?>
		
	  </div>
</div>
<script>
function done_iv(){

		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		var search_params={
			"action"  		: "iv_training_done",
			"post_id" 		: "<?php echo $post_id;?>",
			"day_num" 		: "<?php echo $day_num;?>",
		};
		jQuery.ajax({					
			url : ajaxurl,					 
			dataType : "json",
			type : "post",
			data : search_params,
			success : function(response){
				if(response.code=='success'){							
					jQuery('#training_done').html('<?php echo _e("You have successfully completed the training.","epfitness"); ?>');
				}
			}
		});

}	
</script>

<!-- END PROFILE CONTENT -->

          
	
