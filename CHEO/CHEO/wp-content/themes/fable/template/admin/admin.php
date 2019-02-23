
		<div class="to to-to">

			<form name="to_form" id="to_form" method="POST" action="#">

				<div id="to_notice"></div> 

				<div class="to-header to-clear-fix">

					<div class="to-header-left">

						<div>
							<h3>QuanticaLabs</h3>
							<h6><?php esc_html_e('Theme Options',THEME_DOMAIN); ?></h6>
						</div>

					</div>

					<div class="to-header-right">

						<div>
							<h3>Fable - Children Kindergarten WordPress Theme</h3>
							<h6>Wordpress Theme ver. 2.9</h6>&nbsp;&nbsp;
							<a href="http://support.quanticalabs.com" target="_blank">Support Forum</a>
							<a href="http://themeforest.net/item/fable-children-kindergarten-wordpress-theme/9294431?ref=QuanticaLabs" target="_blank">Theme site</a>
						</div>

						<a href="http://quanticalabs.com" class="to-header-right-logo"></a>

					</div>

				</div>

				<div class="to-content to-clear-fix">

					<div class="to-content-left">

						<ul class="to-menu" id="to_menu">

							<li>
								<a href="#general_setting"><?php esc_html_e('General settings',THEME_DOMAIN); ?><span></span></a>
								<ul>
									<li><a href="#general_main"><?php esc_html_e('Main',THEME_DOMAIN); ?></a></li>
									<li><a href="#general_blog"><?php esc_html_e('Blog',THEME_DOMAIN); ?></a></li>
									<li><a href="#general_post"><?php esc_html_e('Posts',THEME_DOMAIN); ?></a></li>
									<li><a href="#general_page"><?php esc_html_e('Pages',THEME_DOMAIN); ?></a></li>
									<li><a href="#general_menu"><?php esc_html_e('Menu',THEME_DOMAIN); ?></a></li>
									<li><a href="#general_footer"><?php esc_html_e('Footer',THEME_DOMAIN); ?></a></li>
									<li><a href="#general_favicon"><?php esc_html_e('Favicon',THEME_DOMAIN); ?></a></li>
									<li><a href="#general_comment_list"><?php esc_html_e('Comments list',THEME_DOMAIN); ?></a></li>
									<li><a href="#general_custom_js_code"><?php esc_html_e('Custom JS code',THEME_DOMAIN); ?></a></li>
									<li><a href="#general_content_copying"><?php esc_html_e('Content copying',THEME_DOMAIN); ?></a></li>
									<li><a href="#general_go_top_top"><?php esc_html_e('Go to top of page',THEME_DOMAIN); ?></a></li>
									<li><a href="#general_responsive_mode"><?php esc_html_e('Responsive mode',THEME_DOMAIN); ?></a></li>
								</ul>				
							</li>
							<li>
								<a href="#font_setting" class="to-menu-font"><?php esc_html_e('Fonts settings',THEME_DOMAIN); ?><span></span></a>
								<ul>
									<li><a href="#font_base"><?php esc_html_e('Base font',THEME_DOMAIN); ?></a></li>
									<li><a href="#font_header_h1"><?php esc_html_e('Header H1',THEME_DOMAIN); ?></a></li>
									<li><a href="#font_header_h2"><?php esc_html_e('Header H2',THEME_DOMAIN); ?></a></li>
									<li><a href="#font_header_h3"><?php esc_html_e('Header H3',THEME_DOMAIN); ?></a></li>
									<li><a href="#font_header_h4"><?php esc_html_e('Header H4',THEME_DOMAIN); ?></a></li>
									<li><a href="#font_header_h5"><?php esc_html_e('Header H5',THEME_DOMAIN); ?></a></li>
									<li><a href="#font_header_h6"><?php esc_html_e('Header H6',THEME_DOMAIN); ?></a></li>
									<li><a href="#font_google_font_setting"><?php esc_html_e('Google Fonts settings',THEME_DOMAIN); ?></a></li>
								</ul>
							</li>
							<li>
								<a href="#plugin_setting" class="to-menu-plugin"><?php esc_html_e('Plugins settings',THEME_DOMAIN); ?><span></span></a>
								<ul>
									<li><a href="#plugin_woocommerce"><?php esc_html_e('WooCommerce',THEME_DOMAIN); ?></a></li>
									<li><a href="#plugin_maintenance_mode"><?php esc_html_e('Maintenance mode',THEME_DOMAIN); ?></a></li>
									<li><a href="#plugin_fancybox_video"><?php esc_html_e('Fancybox for videos',THEME_DOMAIN); ?></a></li>
									<li><a href="#plugin_fancybox_image"><?php esc_html_e('Fancybox for images',THEME_DOMAIN); ?></a></li>
								</ul>
							</li>							
							<li>
								<a href="#custom_css" class="to-menu-css"><?php esc_html_e('Custom CSS',THEME_DOMAIN); ?><span></span></a>
							</li>	
						</ul>

					</div>

					<div class="to-content-right" id="to_panel">
<?php
		$content=array
		(
			array('general_main'),
			array('general_blog'),
			array('general_post'),
			array('general_page'),
			array('general_menu'),
			array('general_footer'),
			array('general_favicon'),
			array('general_comment_list'),
			array('general_custom_js_code'),
			array('general_content_copying'),
			array('general_go_top_top'),
			array('general_responsive_mode'),
			array('font_base'),
			array('font_header_h1'),
			array('font_header_h2'),
			array('font_header_h3'),
			array('font_header_h4'),
			array('font_header_h5'),
			array('font_header_h6'),
			array('font_google_font_setting'),
			array('plugin_fancybox_image'),
			array('plugin_fancybox_video'),
			array('plugin_maintenance_mode'),
			array('plugin_woocommerce'),
			array('custom_css')
		);

		foreach($content as $value)
		{
?>
						<div id="<?php echo $value[0]; ?>">
<?php
			$Template=new ThemeTemplate($this->data,THEME_PATH_TEMPLATE.'admin/'.$value[0].'.php');
			echo $Template->output(false);
?>
						</div>
<?php
		}
?>
					</div>

				</div>

				<div class="to-footer to-clear-fix">

					<div class="to-footer-left">

						<ul class="to-social-list">
							<li><a href="http://themeforest.net/user/QuanticaLabs?ref=quanticalabs" class="to-social-list-envato" title="Envato"></a></li>
							<li><a href="http://www.facebook.com/QuanticaLabs" class="to-social-list-facebook" title="Facebook"></a></li>
							<li><a href="https://twitter.com/quanticalabs" class="to-social-list-twitter" title="Twitter"></a></li>
							<li><a href="http://quanticalabs.tumblr.com/" class="to-social-list-tumblr" title="Tumblr"></a></li>
						</ul>

					</div>

					<div class="to-footer-right">
						<input type="submit" value="<?php esc_attr_e('Save changes',THEME_DOMAIN); ?>" name="Submit" id="Submit" class="to-button"/>
					</div>			

				</div>

				<input type="hidden" name="action" id="action" value="theme_admin_option_page_save" />

				<script type="text/javascript">

					jQuery(document).ready(function($)
					{
						$('.to').themeOption();
						$('.to').themeOptionElement({init:true});
					});

				</script>

			</form>
			
		</div>