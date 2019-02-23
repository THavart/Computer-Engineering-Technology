		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Padding',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Space between FancyBox wrapper and content (in px).',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php ThemeHelper::getFormName('fancybox_video_padding'); ?>" id="<?php ThemeHelper::getFormName('fancybox_video_padding'); ?>" value="<?php echo  ThemeHelper::esc_attr($this->data['option']['fancybox_video_padding']); ?>" maxlength="3"/>
				</div>					
			</li>
			<li>
				<h5><?php esc_html_e('Margin',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Space between viewport and FancyBox wrapper (in px).',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php ThemeHelper::getFormName('fancybox_video_margin'); ?>" id="<?php ThemeHelper::getFormName('fancybox_video_margin'); ?>" value="<?php echo  ThemeHelper::esc_attr($this->data['option']['fancybox_video_margin']); ?>" maxlength="3"/>
				</div>					
			</li>
			<li>
				<h5><?php esc_html_e('Minimum width',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Minimum width fancyBox should be allowed to resize to	(in px).',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php ThemeHelper::getFormName('fancybox_video_min_width'); ?>" id="<?php ThemeHelper::getFormName('fancybox_video_min_width'); ?>" value="<?php echo  ThemeHelper::esc_attr($this->data['option']['fancybox_video_min_width']); ?>" maxlength="4"/>
				</div>					
			</li>
			<li>
				<h5><?php esc_html_e('Minimum height',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Minimum height fancyBox should be allowed to resize to (in px).',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php ThemeHelper::getFormName('fancybox_video_min_height'); ?>" id="<?php ThemeHelper::getFormName('fancybox_video_min_height'); ?>" value="<?php echo  ThemeHelper::esc_attr($this->data['option']['fancybox_video_min_height']); ?>" maxlength="4"/>
				</div>					
			</li>
			<li>
				<h5><?php esc_html_e('Maximum width',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Maximum width fancyBox should be allowed to resize to	(in px).',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php ThemeHelper::getFormName('fancybox_video_max_width'); ?>" id="<?php ThemeHelper::getFormName('fancybox_video_max_width'); ?>" value="<?php echo  ThemeHelper::esc_attr($this->data['option']['fancybox_video_max_width']); ?>" maxlength="4"/>
				</div>					
			</li>
			<li>
				<h5><?php esc_html_e('Maximum height',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Maximum height fancyBox should be allowed to resize to (in px).',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php ThemeHelper::getFormName('fancybox_video_max_height'); ?>" id="<?php ThemeHelper::getFormName('fancybox_video_max_height'); ?>" value="<?php echo  ThemeHelper::esc_attr($this->data['option']['fancybox_video_max_height']); ?>" maxlength="4"/>
				</div>					
			</li>
			<li>
				<h5><?php esc_html_e('Auto resize',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('When enabled, the content will be resized after window resize event.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_video_autoresize'); ?>" id="<?php ThemeHelper::getFormName('fancybox_video_autoresize_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_video_autoresize'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_video_autoresize_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_video_autoresize'); ?>" id="<?php ThemeHelper::getFormName('fancybox_video_autoresize_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_video_autoresize'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_video_autoresize_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Auto center',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('When enabled, the content will always be centered.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_video_autocenter'); ?>" id="<?php ThemeHelper::getFormName('fancybox_video_autocenter_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_video_autocenter'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_video_autocenter_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_video_autocenter'); ?>" id="<?php ThemeHelper::getFormName('fancybox_video_autocenter_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_video_autocenter'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_video_autocenter_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Fit to view',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('When enabled, fancyBox is resized to fit inside viewport before opening.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_video_fittoview'); ?>" id="<?php ThemeHelper::getFormName('fancybox_video_fittoview_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_video_fittoview'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_video_fittoview_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_video_fittoview'); ?>" id="<?php ThemeHelper::getFormName('fancybox_video_fittoview_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_video_fittoview'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_video_fittoview_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>			
			<li>
				<h5><?php esc_html_e('Close button',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('When enabled, close button will be displayed.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_video_close_button'); ?>" id="<?php ThemeHelper::getFormName('fancybox_video_close_button_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_video_close_button'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_video_close_button_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_video_close_button'); ?>" id="<?php ThemeHelper::getFormName('fancybox_video_close_button_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_video_close_button'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_video_close_button_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>	
		</ul>