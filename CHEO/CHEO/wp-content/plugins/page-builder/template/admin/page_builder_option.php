
		<div class="pb">

			<div class="pb-plugin-option">
			
				<form name="pb_plugin_option_form" id="pb_plugin_option_form" method="POST" action="#">

					<div id="pb_plugin_option_notice"></div> 

					<div class="pb-plugin-option-header pb-clear-fix">

						<div class="pb-plugin-option-header-left">

							<div>
								<h3>QuanticaLabs</h3>
								<h6><?php esc_html_e('Plugin Options',PLUGIN_PAGE_BUILDER_DOMAIN); ?></h6>
							</div>

						</div>

						<div class="pb-plugin-option-header-right">

							<div>
								<h3>Page Builder</h3>
								<h6>Wordpress Plugin ver. <?php echo PLUGIN_PAGE_BUILDER_VERSION; ?></h6>&nbsp;&nbsp;
								<a href="http://quanticalabs.com">Author Site</a>
								<a href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs">Envato profile</a>
							</div>

							<a href="http://quanticalabs.com" class="pb-plugin-option-header-right-logo"></a>

						</div>

					</div>

					<div class="pb-plugin-option-content pb-clear-fix">

						<div class="pb-plugin-option-content-left">

							<ul class="pb-plugin-option-menu" id="pb_plugin_option_menu">
								<li>
									<a href="#page_builder_option_general_setting"><?php esc_html_e('General settings',PLUGIN_PAGE_BUILDER_DOMAIN); ?><span></span></a>			
								</li>
							</ul>

						</div>

						<div class="pb-plugin-option-content-right" id="pb_plugin_option_panel">
<?php
		$content=array
		(
			'page_builder_option_general_setting'
		);

		foreach($content as $value)
		{
?>
							<div id="<?php echo $value; ?>">
<?php
			$Template=new PBTemplate($this->data,PLUGIN_PAGE_BUILDER_TEMPLATE_PATH.'admin/'.$value.'.php');
			echo $Template->output(false);
?>
							</div>
<?php
		}
?>
						</div>

					</div>

					<div class="pb-plugin-option-footer pb-clear-fix">

						<div class="pb-plugin-option-footer-left">

							<ul class="pb-plugin-option-social-list">
								<li><a href="http://themeforest.net/user/QuanticaLabs?ref=quanticalabs" class="pb-plugin-option-social-list-envato" title="Envato"></a></li>
								<li><a href="http://www.facebook.com/QuanticaLabs" class="pb-plugin-option-social-list-facebook" title="Facebook"></a></li>
								<li><a href="https://twitter.com/quanticalabs" class="pb-plugin-option-social-list-twitter" title="Twitter"></a></li>
								<li><a href="http://quanticalabs.tumblr.com/" class="pb-plugin-option-social-list-tumblr" title="Tumblr"></a></li>
							</ul>

						</div>

						<div class="pb-plugin-option-footer-right">
							<input type="submit" value="<?php esc_attr_e('Save changes',PLUGIN_PAGE_BUILDER_DOMAIN); ?>" name="<?php PBHelper::getFormName('option_save'); ?>" id="<?php PBHelper::getFormName('option_save'); ?>" class="pb-plugin-option-button"/>
						</div>			

					</div>

					<input type="hidden" name="action" id="action" value="page_builder_option_save" />

					<script type="text/javascript">

						jQuery(document).ready(function($)
						{
							$('#<?php PBHelper::getFormName('option_cache_clear'); ?>').bind('click',function() 
							{
								$('#action').val('page_builder_option_cache_clear');
								$('#pb_plugin_option_form').submit();
								$('#action').val('page_builder_option_save');
							});
							
							$('.pb-plugin-option').pluginOption();
						
							$('.pb-plugin-option').pluginOptionElement({init:true});
						});

					</script>

				</form>
			
			</div>
				
		</div>