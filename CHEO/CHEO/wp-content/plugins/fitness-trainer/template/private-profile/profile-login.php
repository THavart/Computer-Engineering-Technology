<?php
wp_enqueue_style('wp-ep_fitness-style-11', wp_ep_fitness_URLPATH . 'admin/files/css/iv-bootstrap.css');

wp_enqueue_style('wp-ep_fitness-style-12', wp_ep_fitness_URLPATH . 'admin/files/css/profile-login-sign-up.css');
//wp_enqueue_script('ep_fitness-script-12', wp_ep_fitness_URLPATH . 'admin/files/js/bootstrap.min.js');

require(wp_ep_fitness_DIR .'/admin/files/css/color_style.php');
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,600italic,400,700' rel='stylesheet' type='text/css'>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


<div id="login-2" class="bootstrap-wrapper">
 <div class="menu-toggler sidebar-toggler">
 </div>
 <!-- END SIDEBAR TOGGLER BUTTON -->
 <!-- BEGIN LOGO -->

 <!-- END LOGO --> 
 <!-- BEGIN LOGIN -->
 <div class="content">
  <!-- BEGIN LOGIN FORM -->
  <form id="login_form" class="login-form" action="" method="post">
    <h3 class="form-title"><?php  _e('Sign In','epfitness');?></h3>
    <div class="form-content">
      <div class="display-hide" id="error_message">

      </div>
      <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <div class="row">
          <div class="col-md-3 col-sm-4">
            <label class="control-label visible-ie8 visible-ie9"><?php  _e('Email','epfitness');?></label>
          </div>
          <div class="col-md-9 col-sm-8">
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="username" id="username"/>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-4">
            <label class="control-label visible-ie8 visible-ie9"><?php  _e('Password','epfitness');?></label>
          </div>
          <div class="col-md-9 col-sm-8">
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" id="password"/>
          </div>
        </div>
      </div>
      <div class="form-actions row">
        <div class="col-md-3"></div>
        <div class="col-md-3 col-sm-4 col-xs-4">
          <button type="button" class="btn-new btn-custom" onclick="return chack_login();" ><?php  _e('Login','epfitness');?></button>
        </div>
        <p class="margin-20 para col-md-3 col-sm-4 col-xs-4 text-right">
          <input type="checkbox" id="test2" checked="checked" />
          <label for="test2"><?php  _e('Remember','epfitness');?> </label>
        </p>
        <p class="margin-20 para col-md-3 col-sm-4 col-xs-4 text-right">
          <a href="javascript:;" class="forgot-link"><?php  _e('Forgot Password?','epfitness');?> </a>
        </p>
      </div>

   </div>
   <?php
         if(has_action('oa_social_login')) {
        ?>
		 <div class="form-actions row">
			   <div class="col-md-4"> </div>
			   <div class="col-md-3">  <?php echo do_action('oa_social_login'); ?></div>
			   <div class="col-md-3"> </div>
		</div>	
		<?php
		}
		?>   
   <div class="create-account">
    <p><?php
     $iv_redirect = get_option( '_ep_fitness_price_table');
     $reg_page= get_permalink( $iv_redirect);
     ?>Are you a new user?
     <a  href="<?php echo $reg_page;?>" id="register-btn" class="uppercase"><?php  _e('Create an account','epfitness');?>  </a>
   </p>
 </div>

 </form>
 <!-- END LOGIN FORM -->
 <!-- BEGIN FORGOT PASSWORD FORM -->
 <form id="forget-password" name="forget-password" class="forget-form" action="" method="post" >

  <h3><?php  _e('Forget Password ?','epfitness');?>  </h3>
  <div class="form-content">
    <div class="row">
      <div class="col-md-4 col-sm-4">
        <div id="forget_message">
          <p>
            <?php  _e('Enter your e-mail address','epfitness');?>
          </p>
        </div>
      </div>
      <div class="col-md-8 col-sm-8">
        <div class="form-group">
          <input class="form-control form-control-solid placeholder-no-fix" type="text"  placeholder="Email" name="forget_email" id="forget_email"/>
        </div>

        <div class="">
          <button type="button" id="back-btn" class="btn-new btn-warning margin-b-30"><?php  _e('Back','epfitness');?> </button>
          <button type="button" onclick="return forget_pass();"  class="btn-new btn-custom pull-right margin-b-30"><?php  _e('Submit','epfitness');?> </button>
        </div>

      </div>
    </div>

 </div>
</form>
</div>
</div>
<script type="text/javascript">
  function  forget_pass(){

   var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
   var loader_image = "<img src='<?php echo wp_ep_fitness_URLPATH. 'admin/files/images/loader.gif'; ?>'/>";
   jQuery('#forget_message').html(loader_image);
   var search_params={
     "action"  : 	"ep_fitness_forget_password",
     "form_data":	jQuery("#forget-password").serialize(),
   };
   var femail = jQuery('#forget_email').val();

   if( femail!="" ){
    jQuery.ajax({
     url : ajaxurl,
     dataType : "json",
     type : "post",
     data : search_params,
     success : function(response){
      if(response.code=='success'){
							// redirect
							jQuery('#forget_message').html('<div class="alert alert-success alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>Password Sent. Please check your email. </div>' );
						}else{
							jQuery('#forget_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg+'</div>' );
						}


					}
				});
  }else{
    jQuery('#forget_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a><?php  _e('Enter Email Address','epfitness');?></div>' );
  }
}
function  chack_login(){

 var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
 var loader_image = "<img src='<?php echo wp_ep_fitness_URLPATH. 'admin/files/images/loader.gif'; ?>'/>";
 jQuery('#error_message').html(loader_image);
 var search_params={
   "action"  : 	"ep_fitness_check_login",
   "form_data":	jQuery("#login_form").serialize(),
 };
 var username = jQuery('#username').val();
 var password = jQuery('#password').val();
 if( password!="" && username!=""){
	jQuery.ajax({
		url : ajaxurl,
		dataType : "json",
		type : "post",
		data : search_params,
		success : function(response){
			if(response.login=='false') {
				jQuery('body').append('<div class="notification-error"><div class="content-notification-error"><a class="panel-close close" data-dismiss="alert">x</a><?php  _e('You have not yet been approved, please wait','epfitness');?></div></div>' );
				jQuery('#error_message').html('');
			}else{
				if(response.code=='success'){
					// redirect
					window.location.href = response.msg;
				}else{
					jQuery('#error_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a><?php  _e('Invalid Username & Password','epfitness');?> </div>' );
				} 		 
			}
		}
	});
}else{
  jQuery('#error_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a><?php  _e('Enter Username & Password','epfitness');?> </div>' );
}
}
(function($){
  $(document).ready(function(){
    $('.forgot-link').on('click',function(){
      $("#login_form").hide();
      $("#forget-password").show();
    });
    $('#back-btn').on('click',function(){
      $("#login_form").show();
      $("#forget-password").hide();
    });
  });
}(jQuery));


jQuery("#password").keypress(function(e) {
  if(e.which == 13) {
   chack_login();

 }
});
jQuery("#forget_email").keypress(function(e) {
  if(e.which == 13) {
    forget_pass();

  }
});
jQuery(document).ready(function () {
  jQuery("#forget-password").submit(function(e){
   e.preventDefault();
 });
});
jQuery(document).on('click', '.notification-error .content-notification-error a', function(){ 
    jQuery(".notification-error").addClass("hidde");
}); 
</script>
<style>
.notification-error{
	position: fixed;
    top: 0px;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    transition: 0.5s;
	display:block;
}
.notification-error .content-notification-error{
	width: 50%;
    margin: 0px auto;
    vertical-align: middle;
    text-align: center;
    position: relative;
    top: 310px;
    background: #fff;
    padding: 50px;
    color: red;
    text-transform: uppercase;
}
.notification-error .content-notification-error a{
    position: absolute;
    top: 10px;
    right: 10px;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    border: 1px solid #000;
    cursor: pointer;
    background: #000;
    color: #fff;
}
.notification-error.hidde{
	display: none;
}
</style>
