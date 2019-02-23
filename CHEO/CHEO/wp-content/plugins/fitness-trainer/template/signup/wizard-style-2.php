<?php
global $wpdb;

wp_enqueue_style('wp-ep_fitness-style-signup-11', wp_ep_fitness_URLPATH . 'admin/files/css/iv-bootstrap.css');

wp_enqueue_style('profile-signup-style', wp_ep_fitness_URLPATH. 'admin/files/css/profile-registration.css');


wp_enqueue_script('ep_fitness-script-signup-12', wp_ep_fitness_URLPATH . 'admin/files/js/bootstrap.min.js');
wp_enqueue_script('ep_fitness-script-signup-2-15', wp_ep_fitness_URLPATH . 'admin/files/js/jquery.form-validator.js');

require(wp_ep_fitness_DIR .'/admin/files/css/color_style.php');

$api_currency= 'USD';
if( get_option('_ep_fitness_api_currency' )!=FALSE ) {
	$api_currency= get_option('_ep_fitness_api_currency' );
}
if($api_currency==''){$api_currency= 'USD';}
if(isset($_REQUEST['payment_gateway'])){

	$payment_gateway=$_REQUEST['payment_gateway'];
	if($payment_gateway=='paypal'){
			//require_once(wp_ep_fitness_DIR . '/admin/pages/payment-inc/paypal-submit.php');

	}
}

$iv_gateway='paypal-express';
if( get_option( 'ep_fitness_payment_gateway' )!=FALSE ) {
	$iv_gateway = get_option('ep_fitness_payment_gateway');
	if($iv_gateway=='paypal-express'){
		$post_name='ep_fitness_paypal_setting';
		$row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_name = '".$post_name."' ");
		$paypal_id='0';
		if(sizeof($row )>0){
			$paypal_id= $row->ID;
		}
		$api_currency=get_post_meta($paypal_id, 'ep_fitness_paypal_api_currency', true);
	}
}
$package_id='0';
if(isset($_REQUEST['package_id'])){
	$package_id=$_REQUEST['package_id'];

	$recurring= get_post_meta($package_id, 'ep_fitness_package_recurring', true);
	if($recurring == 'on'){
		$package_amount=get_post_meta($package_id, 'ep_fitness_package_recurring_cost_initial', true);
	}else{
		$package_amount=get_post_meta($package_id, 'ep_fitness_package_cost',true);
	}

	if($package_amount=='' || $package_amount=='0' ){$iv_gateway='paypal-express';}

}

$form_meta_data= get_post_meta( $package_id,'ep_fitness_content',true);
$row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE id = '".$package_id."' ");
$package_name='';
$package_amount='';
if(sizeof($row)>0){
	$package_name=$row->post_title;
	$count =get_post_meta($package_id, 'ep_fitness_package_recurring_cycle_count', true);


	$package_name=$package_name;

	$package_amount=get_post_meta($package_id, 'ep_fitness_package_cost',true);
}

$newpost_id='';
$post_name='ep_fitness_stripe_setting';
$row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_name = '".$post_name."' ");
if(sizeof($row )>0){
	$newpost_id= $row->ID;
}
$stripe_mode=get_post_meta( $newpost_id,'ep_fitness_stripe_mode',true);
if($stripe_mode=='test'){
	$stripe_publishable =get_post_meta($newpost_id, 'ep_fitness_stripe_publishable_test',true);
}else{
	$stripe_publishable =get_post_meta($newpost_id, 'ep_fitness_stripe_live_publishable_key',true);
}


?>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>




<div class="registration-style bootstrap-wrapper">
	<div class="row">

		<div id="iv-form3" class="col-md-12">
			<?php
			if($iv_gateway=='paypal-express'){
				?>

				<form id="ep_fitness_registration" name="ep_fitness_registration" class="form-horizontal" action="<?php  the_permalink() ?>?package_id=<?php echo $package_id; ?>&payment_gateway=paypal&iv-submit-listing=register" method="post" role="form">

					<?php
				}
				if($iv_gateway=='stripe'){?>
				<form id="ep_fitness_registration" name="ep_fitness_registration" class="form-horizontal" action="<?php  the_permalink() ?>?&package_id=<?php echo $package_id; ?>&payment_gateway=stripe&iv-submit-stripe=register" method="post" role="form">

					<input type="hidden" name="payment_gateway" id="payment_gateway" value="stripe">
					<input type="hidden" name="iv-submit-stripe" id="iv-submit-stripe" value="register">
					<?php
				}
				?>

				<div class="content">
					<h3  class="form-title"><?php  esc_html_e('User Information','epfitness');?></h3>

					<div class="form-content">

						<div class="row">


							<div class="col-md-12">
								<?php
								if(isset($_REQUEST['message-error'])){?>
								<div class="row alert alert-info alert-dismissable" id='loading-2'><a class="panel-close close" data-dismiss="alert">x</a> <?php  echo $_REQUEST['message-error']; ?></div>
								<?php
							}
							?>

						<!--
							For Form Validation we used plugins http://formvalidator.net/index.html#reg-form
							This is in line validation so you can add fields easily.
						-->


				
						<div id="selected-column-1" class=" ">
							<div class="text-center" id="loading"> </div>
							<!--<div class="form-group row"  >
								<label  class="col-md-3 control-label"><?php  //esc_html_e('User Name','epfitness');?><span class="chili"></span></label>
								<div class="col-md-9">
									<input type="text"  class="form-control-solid" name="iv_member_user_name"  data-validation="length alphanumeric"
									data-validation-length="4-12" data-validation-error-msg="<?php // esc_html_e(' The user name has to be an alphanumeric value between 4-12 characters','epfitness');?>" class="form-control ctrl-textbox" placeholder="Enter User Name"  >
 
								</div>
							</div>-->
							<div class="form-group row">
								<label  class="col-md-3 control-label" ><?php  esc_html_e('Email Address','epfitness');?><span class="chili"></span></label>
								<div class="col-md-9">
									<input type="email" class="form-control-solid" name="iv_member_email" data-validation="email"  class="form-control ctrl-textbox" placeholder="Enter email address" data-validation-error-msg="<?php  esc_html_e('Please enter a valid email address','epfitness');?> " >
								</div>
							</div>
							<div class="form-group row ">
								<label  class="col-md-3 control-label"><?php  esc_html_e('Password','epfitness');?><span class="chili"></span></label>
								<div class="col-md-9">
									<input type="password" class="form-control-solid" id="iv_member_password" name="iv_member_password"  class="form-control ctrl-textbox" placeholder="">
									<span id='message1' style="width: 100%; float: left; clear:both; color: #E73636 !important; font-style: italic; font-weight: 100;"></span>
									<span id='message2' style="width: 100%; float: left;  clear:both; color: #E73636 !important; font-style: italic; font-weight: 100;"></span>
									<span id='message3' style="width: 100%; float: left;  clear:both; color: #E73636 !important; font-style: italic; font-weight: 100;"></span>
									<span id='message4' style="width: 100%; float: left;  clear:both; color: #E73636 !important; font-style: italic; font-weight: 100;"></span>
								</div>
							</div>
							<div class="form-group row ">
								<label  class="col-md-3 control-label"><?php  esc_html_e('Confirm Password','epfitness');?><span class="chili"></span></label>
								<div class="col-md-9">
									<input type="password" id="iv_member_password_confirm" class="form-control-solid" name="iv_member_password_confirm"  class="form-control ctrl-textbox" placeholder="">
									<span id='message' style="color: #E73636 !important; font-style: italic; font-weight: 100;"></span>
								</div>
							</div> 
							<?php
							   $i=1;
							  $default_fields = array();
							$default_fields=get_option('ep_fitness_profile_fields');
							$sign_up_array=get_option( 'ep_fitness_signup_fields');
							$require_array=get_option( 'ep_fitness_signup_require'); 
							if(is_array($default_fields)){
								 foreach ( $default_fields as $field_key => $field_value ) { 
									 
										$sign_up='no';
										if(isset($sign_up_array[$field_key]) && $sign_up_array[$field_key] == 'yes') {
												$sign_up='yes';
										}																	 
										 $require='no';
										if(isset($require_array[$field_key]) && $require_array[$field_key] == 'yes') {
											  $require='yes';
										 }
									if($sign_up=='yes'){	 
									 ?>
										 <div class="form-group row">
											<label  class="col-md-3 control-label" ><?php echo _e($field_value, 'wp_ep_fitness'); ?><span class="<?php echo($require=='yes'?'chili':''); ?>"></span></label>
											<div class="col-md-9">
												<input type="text" class="form-control-solid" name="<?php echo $field_key;?>" <?php echo($require=='yes'?'data-validation="length" data-validation-length="2-100"':''); ?>  
												class="form-control ctrl-textbox" placeholder="<?php echo 'Enter '.$field_value;?>" >
											</div>
										</div>	
									<?php
									}
								  }
							}	  
								 
								 
							$sql="SELECT * FROM $wpdb->posts WHERE post_type = 'ep_fitness_pack'  and post_status='draft' ";
							$membership_pack = $wpdb->get_results($sql);
							$total_package = count($membership_pack);
							if(sizeof($membership_pack)<1){ ?>
								<input type="hidden" name="reg_error" id="reg_error" value="yes">
								<input type="hidden" name="package_id" id="package_id" value="0">
								<input type="hidden" name="return_page" id="return_page" value="<?php  the_permalink() ?>">
								<div class="row">
									<div class="col-md-3">
									</div>
									<div class="col-md-9 ">

									<div id="paypal-button" class="margin-top-20">							
										
										
									<div id="loading-3" style="display: none;"><img src='<?php echo wp_ep_fitness_URLPATH. 'admin/files/images/loader.gif'; ?>' /></div>
									<button  id="submit_ep_fitness_payment" name="submit_ep_fitness_payment"  type="submit" class="btn-new btn-custom ctrl-btn"  > <?php  _e('Submit','epfitness');?></button>
									</div>

									</div>
								</div>							
							<?php	
							
							}	
						?>
						
						
						</div>
						
					<input type="hidden" name="hidden_form_name" id="hidden_form_name" value="ep_fitness_registration">
					<input type="hidden" name="user_active" id="user_active" value="0">

				</div>
			</div>
			</div>
			</div>

			<?php
			if(sizeof($membership_pack)>0){
			?>

			<div class="content">

				<h3 class="form-title"><?php  esc_html_e('Payment Info','epfitness');?></h3>

				<div class="col-md-12">
					<div class="form-content">
						<?php
						if($iv_gateway=='paypal-express'){
							include(wp_ep_fitness_template.'signup/paypal_form_2.php');
						}

						if($iv_gateway=='stripe'){
							include(wp_ep_fitness_template.'signup/iv_stripe_form_2.php');
						}
						?>
					</div>
				</div>


			</div>
			<?php
			}
			?>
		
		</form>

		<div style="display: none;">
			<img src='<?php echo wp_ep_fitness_URLPATH. 'admin/files/images/loader.gif'; ?>' />
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	var loader_image = '<img src="<?php echo wp_ep_fitness_URLPATH. "admin/files/images/loader.gif"; ?>" />';
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	(function($) {

		var active_payment_gateway='<?php echo $iv_gateway; ?>';

		jQuery(document).ready(function($) {

			jQuery.validate({
				form : '#ep_fitness_registration',
				modules : 'security',

				onSuccess : function() {

					jQuery("#loading-3").show();
					jQuery("#loading").html(loader_image);
					var CapitalizeRegex = new RegExp("(?=.*[A-Z]).*$", "g");
					var LowercaseRegex = new RegExp("(?=.*[a-z]).*$", "g");
					var okRegex = new RegExp("(?=.{6,}).*", "g");
					var numberRegex = new RegExp("(?=.*[0-9]).*", "g");
					if (jQuery('#iv_member_password').val() == jQuery('#iv_member_password_confirm').val()) {
						jQuery('#message').html('').css('color', 'red');
						if(active_payment_gateway=='stripe'){

							Stripe.createToken({
								number: jQuery('#card_number').val(),
								cvc: jQuery('#card_cvc').val(),
								exp_month: jQuery('#card_month').val(),
								exp_year: jQuery('#card_year').val(),
								//name: $('.card-holder-name').val(),
								//address_line1: $('.address').val(),
								//address_city: $('.city').val(),
								//address_zip: $('.zip').val(),
								//address_state: $('.state').val(),
								//address_country: $('.country').val()
							}, stripeResponseHandler);
							
							  
							return false;

						}else{ // Else for paypal

							return true; // false Will stop the submission of the form
						}
					} else {
						jQuery('#message').html("These passwords don't match").css('color', 'red');
						jQuery("#iv_member_password_confirm").css({"border-color": "red"});
						jQuery("#loading-3").hide();
						jQuery("#loading").hide();
						return false;
						
					} 
					

				},

			})

		})


		// this identifies your website in the createToken call below
		if(active_payment_gateway=='stripe'){
			Stripe.setPublishableKey('<?php echo  $stripe_publishable; ?>');

			function stripeResponseHandler(status, response) {
				if (response.error) {
					jQuery("#payment-errors").html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.error.message +'.</div> ');

				} else {
					var form$ = jQuery("#ep_fitness_registration");
					// token contains id, last4, and card type
					var token = response['id'];
					// insert the token into the form so it gets submitted to the server
					form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
					// and submit
					form$.get(0).submit();
				}
			}
		}


	})(jQuery);







	jQuery(document).ready(function() {
		jQuery('#coupon_name').on('keyup change', function() {

			var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
			var search_params={
				"action"  			: "ep_fitness_check_coupon",
				"coupon_code" 		:jQuery("#coupon_name").val(),
				"package_id" 		:jQuery("#package_id").val(),
				"package_amount" 	:'<?php echo $package_amount; ?>',
				"api_currency" 		:'<?php echo $api_currency; ?>',

			};
			jQuery('#coupon-result').html('<img src="<?php echo wp_ep_fitness_URLPATH; ?>admin/files/images/old-loader.gif">');
			jQuery.ajax({
				url : ajaxurl,
				dataType : "json",
				type : "post",
				data : search_params,
				success : function(response){
					if(response.code=='success'){
						jQuery('#coupon-result').html('<img src="<?php echo wp_ep_fitness_URLPATH; ?>admin/files/images/right_icon.png">');

					}else{
						jQuery('#coupon-result').html('<img src="<?php echo wp_ep_fitness_URLPATH; ?>admin/files/images/wrong_16x16.png">');
					}

					jQuery('#total').html('<label class="control-label">'+response.gtotal +'</label>');
					jQuery('#discount').html('<label class="control-label">'+response.dis_amount +'</label>');
				}
			});
		});
});

jQuery(function(){
	jQuery('#package_sel').on('change', function (e) {
		var optionSelected = jQuery("option:selected", this);
		var pack_id = this.value;

		jQuery("#package_id").val(pack_id);

		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		var search_params={
			"action"  			: "ep_fitness_check_package_amount",
			"coupon_code" 		:jQuery("#coupon_name").val(),
			"package_id" 		: pack_id,
			"package_amount" 	:'<?php echo $package_amount; ?>',
			"api_currency" 		:'<?php echo $api_currency; ?>',
		};
		jQuery.ajax({
			url : ajaxurl,
			dataType : "json",
			type : "post",
			data : search_params,
			success : function(response){
				if(response.code=='success'){
					jQuery('#coupon-result').html('<img src="<?php echo wp_ep_fitness_URLPATH; ?>admin/files/images/right_icon.png">');
				}else{
					jQuery('#coupon-result').html('<img src="<?php echo wp_ep_fitness_URLPATH; ?>admin/files/images/wrong_16x16.png">');
				}
				jQuery('#p_amount').html(response.p_amount);
				jQuery('#total').html(response.gtotal);
				jQuery('#discount').html(response.dis_amount);
			}
		});
	});
});


function show_coupon(){
	jQuery("#coupon-div").show();
	jQuery("#show_hide_div").html('<label for="text" class="col-md-3 control-label"></label><div class="col-md-9 " ><button type="button" onclick="hide_coupon();"  class="btn-new btn-custom ctrl-btn center"><?php  _e('Hide Coupon','epfitness');?></button></div>');
}
function hide_coupon(){
	jQuery("#coupon-div").hide();
	jQuery("#show_hide_div").html('<label for="text" class="col-md-3 control-label"></label><div class="col-md-9 " ><button type="button" onclick="show_coupon();"  class="btn-new btn-custom ctrl-btn"><?php  _e('Have a coupon?','epfitness');?></button></div>');
}

jQuery('#iv_member_password_confirm').on('keyup', function () {
  if (jQuery('#iv_member_password').val() == jQuery('#iv_member_password_confirm').val()) {
		jQuery('#message').html('').css('color', 'red');
		jQuery("#iv_member_password_confirm").css({"border-color": "#cecece"});
  } else {
	  jQuery('#message').html("These passwords don't match").css('color', 'red');
	  jQuery("#iv_member_password_confirm").css({"border-color": "red"});
  }
    
}); 
jQuery('#iv_member_password').on('keyup', function () {
	var CapitalizeRegex = new RegExp("(?=.*[A-Z]).*$", "g");
	var LowercaseRegex = new RegExp("(?=.*[a-z]).*$", "g");
	var okRegex = new RegExp("(?=.{6,}).*", "g");
	var numberRegex = new RegExp("(?=.*[0-9]).*", "g");
	
    if (CapitalizeRegex.test(jQuery(this).val()) === false) {
		jQuery('#message1').html("Capitalize letter").css('color', 'red');
	}else{
		jQuery('#message1').html('').css('color', 'red');
		var kt1 = true;
	}
	if (LowercaseRegex.test(jQuery(this).val()) === false) {
		jQuery('#message2').html("Lowercase letter").css('color', 'red');
	}else{
		jQuery('#message2').html('').css('color', 'red');
		var kt2 = true;
	}
	if (okRegex.test(jQuery(this).val()) === false) {
		jQuery('#message3').html("Password Greater than 6 characters").css('color', 'red');
	}else{
		jQuery('#message3').html('').css('color', 'red');
		var kt3 = true;
	}
	if (numberRegex.test(jQuery(this).val()) === false) {
		jQuery('#message4').html("Password must have a number").css('color', 'red');
	}else{
		jQuery('#message4').html('').css('color', 'red');
		var kt4 = true;
	} 
	if (kt4 == true && kt3 == true && kt2 == true && kt1 == true){		
		jQuery("#iv_member_password").css({"border-color": "#cecece"});
	}else{
		jQuery("#iv_member_password").css({"border-color": "red"});	
	} 
}); 
jQuery( "#ep_fitness_registration" ).submit(function( event ) {
	var CapitalizeRegex = new RegExp("(?=.*[A-Z]).*$", "g");
	var LowercaseRegex = new RegExp("(?=.*[a-z]).*$", "g");
	var okRegex = new RegExp("(?=.{6,}).*", "g");
	var numberRegex = new RegExp("(?=.*[0-9]).*", "g");
	if ((CapitalizeRegex.test(jQuery("#iv_member_password").val()) === false) && LowercaseRegex.test(jQuery("#iv_member_password").val()) === false && okRegex.test(jQuery("#iv_member_password").val()) === false && numberRegex.test(jQuery("#iv_member_password").val()) === false ){
		jQuery("#iv_member_password").css({"border-color": "red"});
		if (CapitalizeRegex.test(jQuery("#iv_member_password").val()) === false) {
			jQuery('#message1').html("Capitalize letter").css('color', 'red');
		}else{
			jQuery('#message1').html('').css('color', 'red'); 
		}
		if (LowercaseRegex.test(jQuery("#iv_member_password").val()) === false) {
			jQuery('#message2').html("Lowercase letter").css('color', 'red');
		}else{
			jQuery('#message2').html('').css('color', 'red');
		}
		if (okRegex.test(jQuery("#iv_member_password").val()) === false) {
			jQuery('#message3').html("Password Greater than 6 characters").css('color', 'red');
		}else{
			jQuery('#message3').html('').css('color', 'red');
		}
		if (numberRegex.test(jQuery("#iv_member_password").val()) === false) {
			jQuery('#message4').html("Password must have a number").css('color', 'red');
		}else{
			jQuery('#message4').html('').css('color', 'red');
		}
		event.preventDefault(); 
	} 
  
});
</script>


