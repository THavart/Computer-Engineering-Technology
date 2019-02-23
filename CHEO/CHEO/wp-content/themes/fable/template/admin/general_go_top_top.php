		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Enable "Go to page top"',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable hash "Go to page top".',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('go_to_page_top_enable'); ?>" id="<?php ThemeHelper::getFormName('go_to_page_top_enable_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['go_to_page_top_enable'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('go_to_page_top_enable_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('go_to_page_top_enable'); ?>" id="<?php ThemeHelper::getFormName('go_to_page_top_enable_2'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['go_to_page_top_enable'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('go_to_page_top_enable_2'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>			
			</li>
			<li>
				<h5><?php esc_html_e('Hash',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Hash',THEME_DOMAIN); ?><br/></span>
				<div class="to-clear-fix">
					<input type="text" name="<?php ThemeHelper::getFormName('go_to_page_top_hash'); ?>" id="<?php ThemeHelper::getFormName('go_to_page_top_hash'); ?>" value="<?php echo ThemeHelper::esc_attr($this->data['option']['go_to_page_top_hash']); ?>" />
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Animation',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable animation during scrolling.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('go_to_page_top_animation_enable'); ?>" id="<?php ThemeHelper::getFormName('go_to_page_top_animation_enable_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['go_to_page_top_animation_enable'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('go_to_page_top_animation_enable_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('go_to_page_top_animation_enable'); ?>" id="<?php ThemeHelper::getFormName('go_to_page_top_animation_enable_2'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['go_to_page_top_animation_enable'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('go_to_page_top_animation_enable_2'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>			
			</li>			
			<li>
				<h5><?php esc_html_e('Duration',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Duration of animation in miliseconds',THEME_DOMAIN); ?><br/></span>
				<div class="to-clear-fix">
					<input type="text" name="<?php ThemeHelper::getFormName('go_to_page_top_animation_duration'); ?>" id="<?php ThemeHelper::getFormName('go_to_page_top_animation_duration'); ?>" value="<?php echo ThemeHelper::esc_attr($this->data['option']['go_to_page_top_animation_duration']); ?>" maxlength="5"/>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Easing',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Easing method of animation.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('go_to_page_top_animation_easing'); ?>" id="<?php ThemeHelper::getFormName('go_to_page_top_animation_easing'); ?>">
<?php
						foreach($this->data['dictionary']['easingType'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['go_to_page_top_animation_easing'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>
		</ul>