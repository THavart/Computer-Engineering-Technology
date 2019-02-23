		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Maintenance mode',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable maintenance mode.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('maintenance_mode_enable'); ?>" id="<?php ThemeHelper::getFormName('maintenance_mode_enable_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['maintenance_mode_enable'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('maintenance_mode_enable_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('maintenance_mode_enable'); ?>" id="<?php ThemeHelper::getFormName('maintenance_mode_enable_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['maintenance_mode_enable'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('maintenance_mode_enable_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Splash page',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Get settings for splash page from selected page.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('maintenance_mode_post_id'); ?>" id="<?php ThemeHelper::getFormName('maintenance_mode_post_id'); ?>">
<?php
		foreach($this->data['dictionary']['page'] as $value)
			echo '<option value="'.ThemeHelper::esc_attr($value->ID).'" '.(ThemeHelper::selectedIf($this->data['option']['maintenance_mode_post_id'],$value->ID,false)).'>'.ThemeHelper::esc_html($value->post_title).'</option>';
?>
					</select>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Disable maintenance mode for users',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Allow to visit page (in normal mode) selected users:',THEME_DOMAIN); ?></span>
				<div class="to-checkbox-button">
<?php
		$i=0;
		foreach($this->data['dictionary']['user'] as $value)
		{
			$i++;
?>
					<input type="checkbox" name="<?php ThemeHelper::getFormName('maintenance_mode_user_id[]'); ?>" id="<?php ThemeHelper::getFormName('maintenance_mode_user_id_'.$i); ?>" value="<?php echo ThemeHelper::esc_attr($value->data->ID); ?>" <?php ThemeHelper::checkedIf($this->data['option']['maintenance_mode_user_id'],$value->data->ID); ?>/>
					<label for="<?php ThemeHelper::getFormName('maintenance_mode_user_id_'.$i); ?>"><?php echo ThemeHelper::esc_html($value->data->display_name ); ?></label>
<?php
		}
?>
				</div>
			</li>				
			<li>
				<h5><?php esc_html_e('Disable maintenance mode for IP addreses',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Allow to visit page (in normal mode) visitors from selected (seperated by line break) IP addresses:',THEME_DOMAIN); ?></span>
				<div>
					<textarea id="<?php ThemeHelper::getFormName('maintenance_mode_ip_address'); ?>" name="<?php ThemeHelper::getFormName('maintenance_mode_ip_address'); ?>" rows="1" cols="1"><?php echo ThemeHelper::esc_html($this->data['option']['maintenance_mode_ip_address']); ?></textarea>
				</div>						
			</li>
		</ul>