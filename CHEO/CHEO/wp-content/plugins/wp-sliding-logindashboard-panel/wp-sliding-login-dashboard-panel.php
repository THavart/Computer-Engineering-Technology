<?php
/*
Plugin Name: WP Sliding Login/Dashboard Panel
Description: Add a sliding login/dashboard or whatever panel to Wordpress Theme
Version: 2.1.1
Author: Fayçal Tirich
*/

// Pre-2.6 compatibility
if ( !defined('WP_CONTENT_URL') ) {
    define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
}
if ( ! defined( 'WP_PLUGIN_URL' ) ) {
      define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
}

$wp_sliding_login_plugin_basename = plugin_basename(dirname(__FILE__));
$wp_sliding_login_plugin_url_path = WP_PLUGIN_URL.'/'.$wp_sliding_login_plugin_basename;
$wp_sliding_login_css_path = $wp_sliding_login_plugin_url_path. '/css/slide.css';
$wp_sliding_login_pngfix_js_path = $wp_sliding_login_plugin_url_path. '/js/pngfix/supersleight-min.js';
$wp_sliding_login_js_path = $wp_sliding_login_plugin_url_path. '/js/slide.js';


function add_wp_sliding_login_form() {
	?>
<!-- Panel -->
<div id="toppanel"> 
<?php 
	global $user_identity, $user_ID;	
	// If user is logged in or registered, show dashboard links in panel
        $wp_sliding_panel_replace_default = get_option('wp_sliding_panel_replace_default');
        $wp_sliding_panel_lo_height = get_option('wp_sliding_panel_lo_height');
        $wp_sliding_panel_lo_content = get_option('wp_sliding_panel_lo_content');
        $wp_sliding_panel_li_height = get_option('wp_sliding_panel_li_height');
        $wp_sliding_panel_li_content = get_option('wp_sliding_panel_li_content');
        $wp_sliding_panel_li_open_label = get_option('wp_sliding_panel_li_open_label');
        $wp_sliding_panel_li_close_label = get_option('wp_sliding_panel_li_close_label');
        $wp_sliding_panel_lo_open_label = get_option('wp_sliding_panel_lo_open_label');
        $wp_sliding_panel_lo_close_label = get_option('wp_sliding_panel_lo_close_label');
	if (is_user_logged_in()) { 
?>
	<div id="panel" <?php  if ($wp_sliding_panel_replace_default) echo 'style="height: '.$wp_sliding_panel_li_height.'px"'; ?>>
		<div class="content clearfix">
                <?php if ($wp_sliding_panel_replace_default) {
                            echo $wp_sliding_panel_li_content ;
                        } else { ?>
			<div class="left border">
				<h1><?php _e('Welcome'); ?> <?php echo $user_identity ?></h1>
				<ul>					
					<li><a href="<?php bloginfo('url') ?>/wp-admin/index.php"><?php _e('Dashboard') ?></a></li>
				</ul>
			</div>
			<div class="left narrow">			
				<h2><?php _e('My Account')?></h2>
				<ul>					
					<li><a href="<?php bloginfo('url') ?>/wp-admin/index.php"><?php _e('Dashboard') ?></a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/profile.php"><?php _e('Profile')?></a></li>
					<?php if ( current_user_can('level_1') ) : ?>
						<li><a href="<?php bloginfo('url') ?>/wp-admin/edit-comments.php"><?php _e('Comments')?></a></li>
					<?php endif ?>
	        		<li><a href="<?php echo wp_logout_url(get_permalink()); ?>" rel="nofollow" title="<?php _e('Log out'); ?>"><?php _e('Log out'); ?></a></li>
				</ul>	
				<?php if ( current_user_can('level_10') ) : ?>		
				<h2><?php _e('Appearance')?></h2>
				<ul>						
					<li><a href="<?php bloginfo('url') ?>/wp-admin/themes.php"><?php _e('Themes')?></a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/widgets.php"><?php _e('Widgets')?></a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/theme-editor.php"><?php _e('Editor')?></a></li>
				</ul>
				<?php endif ?>
			</div>
			<?php if ( current_user_can('level_2') ) : ?>
			<div class="left narrow">			
				<h2><?php _e('Post')?></h2>				
				<ul>					
					<li><a href="<?php bloginfo('url') ?>/wp-admin/post-new.php"><?php _e('New Post')?></a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/edit.php"><?php _e('Edit Posts')?></a></li>
				<?php if ( current_user_can('level_3') ) : ?>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/edit-tags.php"><?php _e('Tags')?></a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/categories.php"><?php _e('Categories')?></a></li>
				<?php endif ?>
				</ul>
				<?php if ( current_user_can('level_10') ) : ?>		
				<h2><?php _e('Plugins')?></h2>				
				<ul>						
					<li><a href="<?php bloginfo('url') ?>/wp-admin/plugins.php"><?php _e('Plugins')?></a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/plugin-install.php"><?php _e('Installed')?></a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/plugin-editor.php"><?php _e('Editor')?></a></li>
				</ul>
				<?php endif ?>
			</div>
			<?php endif ?>
			<?php if ( current_user_can('level_2') ) : ?>
			<div class="left narrow">
				<?php if ( current_user_can('level_3') ) : ?>	
				<h2><?php _e('Pages')?></h2>				
				<ul>		
					<li><a href="<?php bloginfo('url') ?>/wp-admin/post-new.php"><?php _e('New Page')?></a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/edit-pages.php"><?php _e('Edit')?></a></li>
				</ul>
				<?php endif ?>			
				<h2><?php _e('Media')?></h2>				
				<ul>					
					<li><a href="<?php bloginfo('url') ?>/wp-admin/upload.php"><?php _e('Library')?></a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/media-new.php"><?php _e('Add New')?></a></li>
				</ul>
				<?php if ( current_user_can('level_3') ) : ?>		
				<h2><?php _e('Users')?></h2>
				<ul>						
					<li><a href="<?php bloginfo('url') ?>/wp-admin/users.php"><?php _e('Authors &amp; Users')?></a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/user-new.php"><?php _e('Add New')?></a></li>
				</ul>
				<?php endif ?>
			</div>
			<?php endif ?>
			<?php if ( current_user_can('level_10') ) : ?>
			<div class="left narrow">			
				<h2><?php _e('Settings')?></h2>
				<ul>						
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-general.php"><?php _e('General')?></a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-writing.php"><?php _e('Writing')?></a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-reading.php"><?php _e('Reading')?></a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-discussion.php"><?php _e('Discussion')?></a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-media.php"><?php _e('Media')?></a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-privacy.php"><?php _e('Privacy')?></a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-permalink.php"><?php _e('Permalinks')?></a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-misc.php"><?php _e('Miscellaneous')?></a></li>
				</ul>
			</div>
			<?php endif ?>
                <?php } ?>
		</div>
	</div> <!-- /login -->	

    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	    	<!-- Logout -->
	        <li><a href="<?php echo wp_logout_url(get_permalink()); ?>" rel="nofollow" title="<?php _e('Log out'); ?>"><?php _e('Log out'); ?></a></li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#"><?php if ($wp_sliding_panel_replace_default) echo $wp_sliding_panel_li_open_label; else _e('Panel');?></a>
				<a id="close" style="display: none;" class="close" href="#"><?php if ($wp_sliding_panel_replace_default) echo $wp_sliding_panel_li_close_label; _e('Close');?></a>
			</li>
	    	<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
<?php
	// Else if user is not logged in, show login and register forms
	} else {
?>
	<div id="panel" <?php  if ($wp_sliding_panel_replace_default) echo 'style="height: '.$wp_sliding_panel_lo_height.'px"'; ?>>
		<div class="content clearfix">
                    <?php if($wp_sliding_panel_replace_default) {
                        echo $wp_sliding_panel_lo_content;
                    } else {
                        ?>
			<div class="left border">
				<h1><?php bloginfo('name') ?> : <?php _e('Welcome') ?> !</h1>
			</div>
			<div class="left">
				<!-- Login Form -->
				<form class="clearfix" action="<?php bloginfo('url') ?>/wp-login.php" method="post">
					<h1><?php _e('Authorize') ?></h1>
					<label class="grey" for="log"><?php _e('Login Name') ?> :</label>
					<input class="field" type="text" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="23" />
					<label class="grey" for="pwd"><?php _e('Password:') ?></label>
					<input class="field" type="password" name="pwd" id="pwd" size="23" />
	            	<label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" />&nbsp;<?php _e('Remember Me') ?></label>
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Login" class="bt_login" />
					<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
					<a class="lost-pwd" href="<?php bloginfo('url') ?>/wp-login.php?action=lostpassword"><?php _e('Lost Password') ?></a>
				</form>
			</div>
			<div class="left right">
			<?php if (get_option('users_can_register')) : ?>
				<!-- Register Form -->
				<form name="registerform" id="registerform" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
					<h1><?php _e('Register') ?></h1>
					<label class="grey" for="user_login"><?php _e('Username') ?></label>
					<input class="field" type="text" name="user_login" id="user_login" class="input" value="<?php echo attribute_escape(stripslashes($user_login)); ?>" size="20" tabindex="10" />
					<label class="grey" for="user_email"><?php _e('E-mail') ?></label>
					<input class="field" type="text" name="user_email" id="user_email" class="input" value="<?php echo attribute_escape(stripslashes($user_email)); ?>" size="25" tabindex="20" />
					<?php do_action('register_form'); ?>
					<label id="reg_passmail"><?php _e('A password will be e-mailed to you.') ?></label>
					<input type="submit" name="wp-submit" id="wp-submit" value="<?php _e('Register'); ?>" class="bt_register" />
				</form>
			<?php else : ?>
				<h1><?php _e('Register') ?></h1>
				<p><?php _e('Please contact the administrator.') ?></p>
			<?php endif ?>
			</div>
                    <?php } ?>
		</div>
	</div> <!-- /login -->

    <!-- The tab on top -->
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	    	<!-- Login / Register -->
			<li id="toggle">
				<a id="open" class="open" href="#"><?php  if ($wp_sliding_panel_replace_default) echo $wp_sliding_panel_lo_open_label; else _e('Log In'); ?></a>
				<a id="close" style="display: none;" class="close" href="#"><?php  if ($wp_sliding_panel_replace_default) echo $wp_sliding_panel_lo_close_label; else _e('Close'); ?></a>
			</li>
	    	<li class="right">&nbsp;</li>
		</ul>
	</div> <!-- / top -->
<?php } ?>
</div>
<!--END panel -->
  

<?php
}


function add_wp_sliding_login_form_css() {
	global $wp_sliding_login_css_path;
        wp_enqueue_style('slide.css',$wp_sliding_login_css_path);
}

function add_jquery_js() {
    wp_enqueue_script('jquery');
}

function add_wp_sliding_login_form_pngfix_js() {
	global $wp_sliding_login_pngfix_js_path;
        wp_enqueue_script('pngfix', $wp_sliding_login_pngfix_js_path);
}

function add_wp_sliding_login_form_js() {
	global $wp_sliding_login_js_path;
        wp_enqueue_script('slide.js', $wp_sliding_login_js_path);
}
 
add_action('wp_print_styles', add_wp_sliding_login_form_css);
add_action('wp_print_scripts', add_jquery_js);
add_action('wp_print_scripts', add_wp_sliding_login_form_pngfix_js);
add_action('wp_print_scripts', add_wp_sliding_login_form_js);
add_action('wp_footer', add_wp_sliding_login_form);

function wp_sliding_panel_user_options() {
    $msg = '';
    $wp_sliding_panel_replace_default = get_option('wp_sliding_panel_replace_default');
    $wp_sliding_panel_lo_height = get_option('wp_sliding_panel_lo_height');
    $wp_sliding_panel_lo_content = get_option('wp_sliding_panel_lo_content');
    $wp_sliding_panel_lo_open_label = get_option('wp_sliding_panel_lo_open_label');
    $wp_sliding_panel_lo_close_label = get_option('wp_sliding_panel_lo_close_label');
    $wp_sliding_panel_same_content = get_option('wp_sliding_panel_same_content');
    $wp_sliding_panel_li_height = get_option('wp_sliding_panel_li_height');
    $wp_sliding_panel_li_content = get_option('wp_sliding_panel_li_content');
    $wp_sliding_panel_li_open_label = get_option('wp_sliding_panel_li_open_label');
    $wp_sliding_panel_li_close_label = get_option('wp_sliding_panel_li_close_label');
    $display_msg = false ;
    if ( isset($_POST['wp_sliding_panel_user_content_submit']) ) {
        if($_POST['wp_sliding_panel_replace_default']!=$wp_sliding_panel_replace_default) {
            $wp_sliding_panel_replace_default = $_POST['wp_sliding_panel_replace_default'];
            update_option('wp_sliding_panel_replace_default', $wp_sliding_panel_replace_default);
            $display_msg = true ;
        }
        if($_POST['wp_sliding_panel_lo_height']!=$wp_sliding_panel_lo_height) {
            $wp_sliding_panel_lo_height = (int) $_POST['wp_sliding_panel_lo_height'];
            update_option('wp_sliding_panel_lo_height',$wp_sliding_panel_lo_height);
            $display_msg = true ;
        }
        if($_POST['wp_sliding_panel_lo_content']!=$wp_sliding_panel_lo_content) {
            $wp_sliding_panel_lo_content = stripslashes_deep($_POST['wp_sliding_panel_lo_content']);
            update_option('wp_sliding_panel_lo_content',$wp_sliding_panel_lo_content);
            $display_msg = true ;
        }
        if($_POST['wp_sliding_panel_lo_open_label']!=$wp_sliding_panel_lo_open_label) {
            $wp_sliding_panel_lo_open_label = $_POST['wp_sliding_panel_lo_open_label'];
            update_option('wp_sliding_panel_lo_open_label',$wp_sliding_panel_lo_open_label);
        }
        if($_POST['wp_sliding_panel_lo_close_label']!=$wp_sliding_panel_lo_close_label) {
            $wp_sliding_panel_lo_close_label = $_POST['wp_sliding_panel_lo_close_label'];
            update_option('wp_sliding_panel_lo_close_label',$wp_sliding_panel_lo_close_label);
        }
        if($_POST['wp_sliding_panel_same_content']!=$wp_sliding_panel_same_content) {
            $wp_sliding_panel_same_content = $_POST['wp_sliding_panel_same_content'] ;
            update_option('wp_sliding_panel_same_content',$wp_sliding_panel_same_content);
            $display_msg = true ;
        }
        $lo_li_same = false ;
        if (isset($_POST['wp_sliding_panel_same_content']) && $_POST['wp_sliding_panel_same_content']=='true') {
            $lo_li_same = true ;
        }
        if($lo_li_same)  {
            if ($wp_sliding_panel_same_content) {
                if($_POST['wp_sliding_panel_li_content']!=$wp_sliding_panel_li_content) {
                    $wp_sliding_panel_li_content = stripslashes_deep($_POST['wp_sliding_panel_lo_content']);
                    update_option('wp_sliding_panel_li_content',$wp_sliding_panel_li_content);
                    $display_msg = true ;
                }
                if($_POST['wp_sliding_panel_li_height']!=$wp_sliding_panel_li_height) {
                    $wp_sliding_panel_li_height = (int) $_POST['wp_sliding_panel_lo_height'];
                    update_option('wp_sliding_panel_li_height',$wp_sliding_panel_li_height);
                    $display_msg = true ;
                }
                if($_POST['wp_sliding_panel_li_open_label']!=$wp_sliding_panel_li_open_label) {
                    $wp_sliding_panel_li_open_label = $_POST['wp_sliding_panel_lo_open_label'];
                    update_option('wp_sliding_panel_li_open_label',$wp_sliding_panel_li_open_label);
                    $display_msg = true ;
                }
                if($_POST['wp_sliding_panel_li_close_label']!=$wp_sliding_panel_li_close_label) {
                    $wp_sliding_panel_li_close_label = $_POST['wp_sliding_panel_lo_close_label'];
                    update_option('wp_sliding_panel_li_close_label',$wp_sliding_panel_li_close_label);
                    $display_msg = true ;
                }
            }
        } else {
            if($_POST['wp_sliding_panel_li_content']!=$wp_sliding_panel_li_content) {
                $wp_sliding_panel_li_content = stripslashes_deep($_POST['wp_sliding_panel_li_content']);
                update_option('wp_sliding_panel_li_content',$wp_sliding_panel_li_content);
            }
            if($_POST['wp_sliding_panel_li_height']!=$wp_sliding_panel_li_height) {
                $wp_sliding_panel_li_height = (int) $_POST['wp_sliding_panel_li_height'];
                update_option('wp_sliding_panel_li_height',$wp_sliding_panel_li_height);
            }
            if($_POST['wp_sliding_panel_li_open_label']!=$wp_sliding_panel_li_open_label) {
                $wp_sliding_panel_li_open_label = $_POST['wp_sliding_panel_li_open_label'];
                update_option('wp_sliding_panel_li_open_label',$wp_sliding_panel_li_open_label);
            }
            if($_POST['wp_sliding_panel_li_close_label']!=$wp_sliding_panel_li_close_label) {
                $wp_sliding_panel_li_close_label = $_POST['wp_sliding_panel_li_close_label'];
                update_option('wp_sliding_panel_li_close_label',$wp_sliding_panel_li_close_label);
            }
        }
        if ($display_msg) {
            $msg= '<span style="color:green">'.__('Options updated').'</span><br />';
        }
    }
    if(!empty($msg)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$msg.'</p></div>'; }
    ?>
<script type="text/javascript">
    jQuery(document).ready(function(){
     if(jQuery('#wp_sliding_panel_replace_default').is(':checked')) {
        jQuery('#options_tables').show("slow");
     } else {
         jQuery('#options_tables').hide();
     }
     jQuery('#wp_sliding_panel_replace_default').click(function () {
        if(jQuery('#wp_sliding_panel_replace_default').is(':checked')) {
            jQuery('#options_tables').show("slow");
        } else {
            jQuery('#options_tables').hide("slow");
        }
    });
     if(jQuery('#wp_sliding_panel_same_content').is(':checked')) {
        jQuery('#options_li_table').hide();
     } 
    jQuery('#wp_sliding_panel_same_content').click(function () {
        if(jQuery('#wp_sliding_panel_same_content').is(':checked')) {
            jQuery('#wp_sliding_panel_li_height').val(jQuery('#wp_sliding_panel_lo_height').val());
            jQuery('#wp_sliding_panel_li_content').val(jQuery('#wp_sliding_panel_lo_content').val());
            jQuery('#wp_sliding_panel_li_open_label').val(jQuery('#wp_sliding_panel_lo_open_label').val());
            jQuery('#wp_sliding_panel_li_close_label').val(jQuery('#wp_sliding_panel_lo_close_label').val());
            jQuery('#options_li_table').hide("slow");
        } else {
            jQuery('#wp_sliding_panel_li_height').val('<?php echo $wp_sliding_panel_li_height; ?>');
            var temp = '<?php echo str_replace(array("\r\n", "\r", "\n"), "<br />",$wp_sliding_panel_li_content); ?>';
            jQuery('#wp_sliding_panel_li_content').val(temp.replace('<br />', '\n'));
            jQuery('#wp_sliding_panel_li_open_label').val('<?php echo $wp_sliding_panel_li_open_label; ?>');
            jQuery('#wp_sliding_panel_li_close_label').val('<?php echo $wp_sliding_panel_li_close_label; ?>');
            jQuery('#options_li_table').show("slow");
        }
    });
 });
</script>
    <div class="wrap">
    <?php screen_icon(); ?>
    <h2>WP Sliding Login/Dashboard Panel</h2>
    <br />
    <?php include 'donate.php';?>
    <br />
    <form method="post" action="">
         <table class="widefat">
            <thead>
                <tr>
                    <th>Replace default content with your own</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox" id="wp_sliding_panel_replace_default" name="wp_sliding_panel_replace_default" value="true" <?php echo ($wp_sliding_panel_replace_default=='true')?'checked="checked"':''; ?> />&nbsp;Yes
                    </td>
                </tr>
            </tbody>
         </table>
        <br /><br />
        <div id="options_tables">
        <table class="widefat" id="lo_table">
            <thead>
                <tr>
                    <th>Content when login out</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p>
                        <label for="wp_sliding_panel_lo_height"><strong>Panel Height</strong></label>
                        <br />
                        <input type="text" size="10" id="wp_sliding_panel_lo_height" name="wp_sliding_panel_lo_height" value="<?php echo $wp_sliding_panel_lo_height; ?>" />&nbsp;px
                        </p>
                        <p>
                            <label for="wp_sliding_panel_lo_content"><strong>Panel HTML content</strong></label>
                            <br />
                            <textarea style="width: 90%; font-size: 12px;" rows="8" cols="60" id="wp_sliding_panel_lo_content" name="wp_sliding_panel_lo_content"><?php echo $wp_sliding_panel_lo_content; ?></textarea>
                        </p>
                        <p>
                        <label for="wp_sliding_panel_lo_open_label"><strong>Toggle Open label</strong></label>
                        <br />
                        <input type="text" size="30" id="wp_sliding_panel_lo_open_label" name="wp_sliding_panel_lo_open_label" value="<?php echo $wp_sliding_panel_lo_open_label; ?>" />
                        </p>
                        <p>
                        <label for="wp_sliding_panel_lo_close_label"><strong>Toggle Close label</strong></label>
                        <br />
                        <input type="text" size="30" id="wp_sliding_panel_lo_close_label" name="wp_sliding_panel_lo_close_label" value="<?php echo $wp_sliding_panel_lo_close_label; ?>" />
                        </p>
                        <p>
                            <input type="checkbox" name="wp_sliding_panel_same_content" id="wp_sliding_panel_same_content" value="true" <?php echo ($wp_sliding_panel_same_content=='true')?'checked="checked"':''; ?> />&nbsp;<strong>Use the same when login in</strong>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <br /><br />
         <div id="options_li_table">
        <table class="widefat" id="li_table">
            <thead>
                <tr>
                    <th>Content when login in</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p>
                        <label for="wp_sliding_panel_li_height"><strong>Panel Height</strong></label>
                        <br />
                        <input type="text" size="10" id="wp_sliding_panel_li_height" name="wp_sliding_panel_li_height" value="<?php echo $wp_sliding_panel_li_height; ?>" />&nbsp;px
                        </p>
                        <p>
                            <label for="wp_sliding_panel_li_content"><strong>Panel HTML content</strong></label>
                            <br />
                            <textarea style="width: 90%; font-size: 12px;" rows="8" cols="60" id="wp_sliding_panel_li_content" name="wp_sliding_panel_li_content"><?php echo $wp_sliding_panel_li_content; ?></textarea>
                        </p>
                        <p>
                        <label for="wp_sliding_panel_li_open_label"><strong>Toggle Open label</strong></label>
                        <br />
                        <input type="text" size="30" id="wp_sliding_panel_li_open_label" name="wp_sliding_panel_li_open_label" value="<?php echo $wp_sliding_panel_li_open_label; ?>" />
                        </p>
                        <p>
                        <label for="wp_sliding_panel_li_close_label"><strong>Toggle Close label</strong></label>
                        <br />
                        <input type="text" size="30" id="wp_sliding_panel_li_close_label" name="wp_sliding_panel_li_close_label" value="<?php echo $wp_sliding_panel_li_close_label; ?>" />
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
         </div>
        </div>
        <p class="submit">
                <input class="button-primary" type="submit" name="wp_sliding_panel_user_content_submit" class="button" value="<?php _e('Save Changes'); ?>" />
        </p>
    </form>
    </div>
<?php
}
function wp_sliding_panel_menu() {
    if (function_exists('add_options_page')) {
        if( current_user_can('manage_options') ) {
            add_options_page(__('WP Sliding Panel'), __('WP Sliding Panel'), 'manage_options', __FILE__, 'wp_sliding_panel_user_options') ;
        }
    }
}

add_action('admin_menu', 'wp_sliding_panel_menu')
?>