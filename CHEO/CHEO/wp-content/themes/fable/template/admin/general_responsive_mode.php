		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Responsive mode',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable responsive mode.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('responsive_mode_enable'); ?>" id="<?php ThemeHelper::getFormName('responsive_mode_enable_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['responsive_mode_enable'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('responsive_mode_enable_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('responsive_mode_enable'); ?>" id="<?php ThemeHelper::getFormName('responsive_mode_enable_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['responsive_mode_enable'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('responsive_mode_enable_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>
		</ul>