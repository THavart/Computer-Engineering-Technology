		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Logo',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enter URL of image',THEME_DOMAIN); ?><br/></span>
				<div class="to-clear-fix">
					<input type="text" name="<?php ThemeHelper::getFormName('menu_logo_src'); ?>" id="<?php ThemeHelper::getFormName('menu_logo_src'); ?>" class="to-float-left" value="<?php echo ThemeHelper::esc_attr($this->data['option']['menu_logo_src']); ?>" />
					<input type="button" name="<?php ThemeHelper::getFormName('menu_logo_src_browse'); ?>" id="<?php ThemeHelper::getFormName('menu_logo_src_browse'); ?>" class="to-button-browse to-button" value="<?php esc_attr_e('Browse',THEME_DOMAIN); ?>"/>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Responsive menu',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable responsive menu when screen width (in px) is less than selected.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
<?php
		$i=0;
		foreach($this->data['dictionary']['responsive'] as $index=>$value)
		{
			$i++;
?>
					<input type="radio" name="<?php ThemeHelper::getFormName('menu_responsive_mode'); ?>" id="<?php ThemeHelper::getFormName('menu_responsive_mode_'.$i); ?>" value="<?php echo esc_attr($index); ?>" <?php ThemeHelper::checkedIf($this->data['option']['menu_responsive_mode'],$index); ?>/>
					<label for="<?php ThemeHelper::getFormName('menu_responsive_mode_'.$i); ?>"><?php echo esc_html($value[0]); ?></label>
<?php
		}
?>
				</div>			
			</li>
			<li>
				<h5><?php esc_html_e('Sticky menu',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable sticky menu.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('menu_sticky_enable'); ?>" id="<?php ThemeHelper::getFormName('menu_sticky_enable_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['menu_sticky_enable'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('menu_sticky_enable_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('menu_sticky_enable'); ?>" id="<?php ThemeHelper::getFormName('menu_sticky_enable_2'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['menu_sticky_enable'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('menu_sticky_enable_2'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>			
			</li>
			<li>
				<h5><?php esc_html_e('Sticky menu hide',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Hide menu when page is scrolled.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('menu_hide_scroll_enable'); ?>" id="<?php ThemeHelper::getFormName('menu_hide_scroll_enable_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['menu_hide_scroll_enable'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('menu_hide_scroll_enable_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('menu_hide_scroll_enable'); ?>" id="<?php ThemeHelper::getFormName('menu_hide_scroll_enable_2'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['menu_hide_scroll_enable'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('menu_hide_scroll_enable_2'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>			
			</li>
			<li>
				<h5><?php esc_html_e('Menu animation',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable menu animation.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('menu_animation_enable'); ?>" id="<?php ThemeHelper::getFormName('menu_animation_enable_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['menu_animation_enable'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('menu_animation_enable_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('menu_animation_enable'); ?>" id="<?php ThemeHelper::getFormName('menu_animation_enable_2'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['menu_animation_enable'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('menu_animation_enable_2'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>			
			</li>	
			<li>
				<h5><?php esc_html_e('Menu opening speed',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Speed of the opening animation in miliseconds',THEME_DOMAIN); ?><br/></span>
				<div class="to-clear-fix">
					<input type="text" name="<?php ThemeHelper::getFormName('menu_animation_speed_open'); ?>" id="<?php ThemeHelper::getFormName('menu_animation_speed_open'); ?>" value="<?php echo ThemeHelper::esc_attr($this->data['option']['menu_animation_speed_open']); ?>" maxlength="5"/>
				</div>
			</li>			
			<li>
				<h5><?php esc_html_e('Menu closing speed',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Speed of the closing animation in miliseconds',THEME_DOMAIN); ?><br/></span>
				<div class="to-clear-fix">
					<input type="text" name="<?php ThemeHelper::getFormName('menu_animation_speed_close'); ?>" id="<?php ThemeHelper::getFormName('menu_animation_speed_close'); ?>" value="<?php echo ThemeHelper::esc_attr($this->data['option']['menu_animation_speed_close']); ?>" maxlength="5"/>
				</div>
			</li>					
			<li>
				<h5><?php esc_html_e('Menu delay',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('The delay in milliseconds that the mouse can remain outside a submenu without it closing.',THEME_DOMAIN); ?><br/></span>
				<div class="to-clear-fix">
					<input type="text" name="<?php ThemeHelper::getFormName('menu_animation_delay'); ?>" id="<?php ThemeHelper::getFormName('menu_animation_delay'); ?>" value="<?php echo ThemeHelper::esc_attr($this->data['option']['menu_animation_delay']); ?>" maxlength="5"/>
				</div>
			</li>			
			<li>
				<h5><?php esc_html_e('Scrolling animation',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable animation during page scrolling (after clicking on menu item).',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('menu_scroll_animation_enable'); ?>" id="<?php ThemeHelper::getFormName('menu_scroll_animation_enable_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['menu_scroll_animation_enable'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('menu_scroll_animation_enable_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('menu_scroll_animation_enable'); ?>" id="<?php ThemeHelper::getFormName('menu_scroll_animation_enable_2'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['menu_scroll_animation_enable'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('menu_scroll_animation_enable_2'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>			
			</li>				
			<li>
				<h5><?php esc_html_e('Scrolling speed',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Speed of the scrolling in miliseconds.',THEME_DOMAIN); ?><br/></span>
				<div class="to-clear-fix">
					<input type="text" name="<?php ThemeHelper::getFormName('menu_scroll_animation_speed'); ?>" id="<?php ThemeHelper::getFormName('menu_scroll_animation_speed'); ?>" value="<?php echo ThemeHelper::esc_attr($this->data['option']['menu_scroll_animation_speed']); ?>" maxlength="5"/>
				</div>
			</li>			
			<li>
				<h5><?php esc_html_e('Scrolling easing',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Type of easing for scrolling animation.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('menu_scroll_animation_easing'); ?>" id="<?php ThemeHelper::getFormName('menu_scroll_animation_easing'); ?>">
<?php
						foreach($this->data['dictionary']['easingType'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['menu_scroll_animation_easing'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>
		</ul>

		<script type="text/javascript">
			jQuery(document).ready(function($) 
			{
				var element=$('.to').themeOptionElement();;
				element.bindBrowseMedia('#<?php ThemeHelper::getFormName('menu_logo_src_browse'); ?>');
			});
		</script>