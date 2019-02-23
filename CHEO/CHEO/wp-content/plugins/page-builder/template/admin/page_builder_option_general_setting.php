		<ul class="pb-field-list">
<?php
		if($this->data['visualMode']==1)
		{
?>
			<li class="pb-clear-fix">
				<h5 class="pb-group-header"><?php esc_html_e('Enable plugin for new pages',PLUGIN_PAGE_BUILDER_DOMAIN); ?></h5>
				<span class="pb-group-subheader"><?php esc_html_e('Enable plugin by default for all new pages.',PLUGIN_PAGE_BUILDER_DOMAIN); ?></span>
				<div class="pb-clear-fix">
					<div class="pb-clear-fix pb-radio-button">
						<input type="radio" name="<?php PBHelper::getFormName('enable_page'); ?>" id="<?php PBHelper::getFormName('enable_page_1'); ?>" value="1" <?php echo PBHelper::returnIf($this->data['option']['enable_page'],1); ?>/>
						<label for="<?php PBHelper::getFormName('enable_page_1'); ?>"><?php esc_html_e('Enable',PLUGIN_PAGE_BUILDER_DOMAIN); ?></label>
						<input type="radio" name="<?php PBHelper::getFormName('enable_page'); ?>" id="<?php PBHelper::getFormName('enable_page_2'); ?>" value="0" <?php echo PBHelper::returnIf($this->data['option']['enable_page'],0); ?>/>
						<label for="<?php PBHelper::getFormName('enable_page_2'); ?>"><?php esc_html_e('Disable',PLUGIN_PAGE_BUILDER_DOMAIN); ?></label>
					</div>	
				</div>
			</li>
			<li class="pb-clear-fix">
				<h5 class="pb-group-header"><?php esc_html_e('Enable plugin for new posts',PLUGIN_PAGE_BUILDER_DOMAIN); ?></h5>
				<span class="pb-group-subheader"><?php esc_html_e('Enable plugin by default for all new posts.',PLUGIN_PAGE_BUILDER_DOMAIN); ?></span>
				<div class="pb-clear-fix">
					<div class="pb-clear-fix pb-radio-button">
						<input type="radio" name="<?php PBHelper::getFormName('enable_post'); ?>" id="<?php PBHelper::getFormName('enable_post_1'); ?>" value="1" <?php echo PBHelper::returnIf($this->data['option']['enable_post'],1); ?>/>
						<label for="<?php PBHelper::getFormName('enable_post_1'); ?>"><?php esc_html_e('Enable',PLUGIN_PAGE_BUILDER_DOMAIN); ?></label>
						<input type="radio" name="<?php PBHelper::getFormName('enable_post'); ?>" id="<?php PBHelper::getFormName('enable_post_2'); ?>" value="0" <?php echo PBHelper::returnIf($this->data['option']['enable_post'],0); ?>/>
						<label for="<?php PBHelper::getFormName('enable_post_2'); ?>"><?php esc_html_e('Disable',PLUGIN_PAGE_BUILDER_DOMAIN); ?></label>
					</div>	
				</div>
			</li>
<?php
		}
		
		if(PBHelper::isComponent('GoogleMap'))
		{
?>
			<li class="pb-clear-fix">
				<h5 class="pb-group-header"><?php esc_html_e('Google Maps API key',PLUGIN_PAGE_BUILDER_DOMAIN); ?></h5>
				<span class="pb-group-subheader"><?php echo sprintf(__('Google Maps API Key (<a href="%s" target="_blank">more info</a>).'),'https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key'); ?></span>
				<div class="pb-clear-fix">
					<input type="text" name="<?php PBHelper::getFormName('google_map_api_key'); ?>" id="<?php PBHelper::getFormName('google_map_api_key'); ?>" value="<?php echo esc_attr($this->data['option']['google_map_api_key']); ?>" />
				</div>
			</li>			
<?php			
		}
?>
		</ul>