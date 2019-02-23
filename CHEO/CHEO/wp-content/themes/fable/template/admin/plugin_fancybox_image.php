		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Padding',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Space between FancyBox wrapper and content (in px).',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php ThemeHelper::getFormName('fancybox_image_padding'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_padding'); ?>" value="<?php echo  ThemeHelper::esc_attr($this->data['option']['fancybox_image_padding']); ?>" maxlength="3"/>
				</div>					
			</li>
			<li>
				<h5><?php esc_html_e('Margin',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Space between viewport and FancyBox wrapper (in px).',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php ThemeHelper::getFormName('fancybox_image_margin'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_margin'); ?>" value="<?php echo  ThemeHelper::esc_attr($this->data['option']['fancybox_image_margin']); ?>" maxlength="3"/>
				</div>					
			</li>
			<li>
				<h5><?php esc_html_e('Minimum width',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Minimum width fancyBox should be allowed to resize to	(in px).',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php ThemeHelper::getFormName('fancybox_image_min_width'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_min_width'); ?>" value="<?php echo  ThemeHelper::esc_attr($this->data['option']['fancybox_image_min_width']); ?>" maxlength="4"/>
				</div>					
			</li>
			<li>
				<h5><?php esc_html_e('Minimum height',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Minimum height fancyBox should be allowed to resize to (in px).',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php ThemeHelper::getFormName('fancybox_image_min_height'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_min_height'); ?>" value="<?php echo  ThemeHelper::esc_attr($this->data['option']['fancybox_image_min_height']); ?>" maxlength="4"/>
				</div>					
			</li>
			<li>
				<h5><?php esc_html_e('Maximum width',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Maximum width fancyBox should be allowed to resize to	(in px).',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php ThemeHelper::getFormName('fancybox_image_max_width'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_max_width'); ?>" value="<?php echo  ThemeHelper::esc_attr($this->data['option']['fancybox_image_max_width']); ?>" maxlength="4"/>
				</div>					
			</li>
			<li>
				<h5><?php esc_html_e('Maximum height',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Maximum height fancyBox should be allowed to resize to (in px).',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php ThemeHelper::getFormName('fancybox_image_max_height'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_max_height'); ?>" value="<?php echo  ThemeHelper::esc_attr($this->data['option']['fancybox_image_max_height']); ?>" maxlength="4"/>
				</div>					
			</li>
			<li>
				<h5><?php esc_html_e('Buttons',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('When enabled, helper buttons will appear over the image.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_helper_button_enable'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_helper_button_enable_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_helper_button_enable'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_helper_button_enable_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_helper_button_enable'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_helper_button_enable_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_helper_button_enable'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_helper_button_enable_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Auto resize',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('When enabled, the content will be resized after window resize event.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_autoresize'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_autoresize_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_autoresize'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_autoresize_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_autoresize'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_autoresize_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_autoresize'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_autoresize_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Auto center',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('When enabled, the content will always be centered.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_autocenter'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_autocenter_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_autocenter'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_autocenter_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_autocenter'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_autocenter_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_autocenter'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_autocenter_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Fit to view',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('When enabled, fancyBox is resized to fit inside viewport before opening.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_fittoview'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_fittoview_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_fittoview'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_fittoview_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_fittoview'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_fittoview_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_fittoview'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_fittoview_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>			
			<li>
				<h5><?php esc_html_e('Arrows',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('When enabled, navigation arrows will be displayed.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_arrow'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_arrow_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_arrow'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_arrow_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_arrow'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_arrow_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_arrow'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_arrow_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>				
			<li>
				<h5><?php esc_html_e('Close button',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('When enabled, close button will be displayed.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_close_button'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_close_button_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_close_button'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_close_button_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_close_button'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_close_button_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_close_button'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_close_button_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>	
			<li>
				<h5><?php esc_html_e('Close on content click',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('When enabled, fancyBox will be closed when user clicks the content.••G•F•X•F•U•L•L•.•N•E•T••',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_close_click'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_close_click_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_close_click'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_close_click_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_close_click'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_close_click_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_close_click'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_close_click_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>	
			<li>
				<h5><?php esc_html_e('Next click',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('When enabled, will navigate to next gallery item when user clicks the content.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_next_click'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_next_click_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_next_click'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_next_click_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_next_click'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_next_click_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_next_click'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_next_click_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>	
			<li>
				<h5><?php esc_html_e('Mouse wheel',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('When enabled, you will be able to navigate gallery using the mouse wheel.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_mouse_wheel'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_mouse_wheel_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_mouse_wheel'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_mouse_wheel_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_mouse_wheel'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_mouse_wheel_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_mouse_wheel'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_mouse_wheel_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>	
			<li>
				<h5><?php esc_html_e('Auto play',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('When enabled, slideshow will start after opening the first gallery item.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_autoplay'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_autoplay_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_autoplay'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_autoplay_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_autoplay'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_autoplay_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_autoplay'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_autoplay_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>	
			<li>
				<h5><?php esc_html_e('Loop',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('When enabled, enables cyclic navigation. This means, if you click \'next\' after you reach the last element, first element will be displayed (and vice versa).',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_loop'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_loop_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_loop'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_loop_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('fancybox_image_loop'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_loop_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['fancybox_image_loop'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('fancybox_image_loop_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>	
			<li>
				<h5><?php esc_html_e('Play speed',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Slideshow speed (in ms).',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php ThemeHelper::getFormName('fancybox_image_playspeed'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_playspeed'); ?>" value="<?php echo  ThemeHelper::esc_attr($this->data['option']['fancybox_image_playspeed']); ?>" maxlength="5"/>
				</div>					
			</li>
			<li>
				<h5><?php esc_html_e('Transition',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Select transition type.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Open:',THEME_DOMAIN); ?></span>
					<select name="<?php ThemeHelper::getFormName('fancybox_image_animation_effect_open'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_animation_effect_open'); ?>">
<?php
						foreach($this->data['dictionary']['fancyboxTransitionType'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['fancybox_image_animation_effect_open'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Close:',THEME_DOMAIN); ?></span>
					<select name="<?php ThemeHelper::getFormName('fancybox_image_animation_effect_close'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_animation_effect_close'); ?>">
<?php
						foreach($this->data['dictionary']['fancyboxTransitionType'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['fancybox_image_animation_effect_close'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Next:',THEME_DOMAIN); ?></span>
					<select name="<?php ThemeHelper::getFormName('fancybox_image_animation_effect_next'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_animation_effect_next'); ?>">
<?php
						foreach($this->data['dictionary']['fancyboxTransitionType'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['fancybox_image_animation_effect_next'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Previous:',THEME_DOMAIN); ?></span>
					<select name="<?php ThemeHelper::getFormName('fancybox_image_animation_effect_previous'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_animation_effect_previous'); ?>">
<?php
						foreach($this->data['dictionary']['fancyboxTransitionType'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['fancybox_image_animation_effect_previous'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Easing',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Easing method for each transition type.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Open:',THEME_DOMAIN); ?></span>
					<select name="<?php ThemeHelper::getFormName('fancybox_image_easing_open'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_easing_open'); ?>">
<?php
						foreach($this->data['dictionary']['easingType'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['fancybox_image_easing_open'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Close:',THEME_DOMAIN); ?></span>
					<select name="<?php ThemeHelper::getFormName('fancybox_image_easing_close'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_easing_close'); ?>">
<?php
						foreach($this->data['dictionary']['easingType'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['fancybox_image_easing_close'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Next:',THEME_DOMAIN); ?></span>
					<select name="<?php ThemeHelper::getFormName('fancybox_image_easing_next'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_easing_next'); ?>">
<?php
						foreach($this->data['dictionary']['easingType'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['fancybox_image_easing_next'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Previous:',THEME_DOMAIN); ?></span>
					<select name="<?php ThemeHelper::getFormName('fancybox_image_easing_previous'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_easing_previous'); ?>">
<?php
						foreach($this->data['dictionary']['easingType'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['fancybox_image_easing_previous'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Speed',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('The time it takes (in ms) to complete transition.',THEME_DOMAIN); ?></span>
				<div>
					<span class="to-legend-field"><?php esc_html_e('Open:',THEME_DOMAIN); ?></span>
					<input type="text" name="<?php ThemeHelper::getFormName('fancybox_image_speed_open'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_speed_open'); ?>" value="<?php echo  ThemeHelper::esc_attr($this->data['option']['fancybox_image_speed_open']); ?>" maxlength="5"/>
				</div>
				<div>
					<span class="to-legend-field"><?php esc_html_e('Close:',THEME_DOMAIN); ?></span>
					<input type="text" name="<?php ThemeHelper::getFormName('fancybox_image_speed_close'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_speed_close'); ?>" value="<?php echo  ThemeHelper::esc_attr($this->data['option']['fancybox_image_speed_close']); ?>" maxlength="5"/>
				</div>			
				<div>
					<span class="to-legend-field"><?php esc_html_e('Next:',THEME_DOMAIN); ?></span>
					<input type="text" name="<?php ThemeHelper::getFormName('fancybox_image_speed_next'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_speed_next'); ?>" value="<?php echo  ThemeHelper::esc_attr($this->data['option']['fancybox_image_speed_next']); ?>" maxlength="5"/>
				</div>			
				<div>
					<span class="to-legend-field"><?php esc_html_e('Previous:',THEME_DOMAIN); ?></span>
					<input type="text" name="<?php ThemeHelper::getFormName('fancybox_image_speed_previous'); ?>" id="<?php ThemeHelper::getFormName('fancybox_image_speed_previous'); ?>" value="<?php echo  ThemeHelper::esc_attr($this->data['option']['fancybox_image_speed_previous']); ?>" maxlength="5"/>
				</div>			
			</li>
		</ul>