		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Widget area in sidebar',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Select widget area and widget area location.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Widget area:',THEME_DOMAIN); ?></span>
					<select name="<?php ThemeHelper::getFormName('widget_area_sidebar'); ?>" id="<?php ThemeHelper::getFormName('widget_area_sidebar'); ?>">
<?php
						foreach($this->data['dictionary']['widgetArea-1'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['widget_area_sidebar'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Location:',THEME_DOMAIN); ?></span>
					<select name="<?php ThemeHelper::getFormName('widget_area_sidebar_location'); ?>" id="<?php ThemeHelper::getFormName('widget_area_sidebar_location'); ?>">
<?php
						foreach($this->data['dictionary']['widgetAreaLocation-1'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['widget_area_sidebar_location'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Widget area in footer',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Select widget area in footer.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('widget_area_footer'); ?>" id="<?php ThemeHelper::getFormName('widget_area_footer'); ?>">
<?php
						foreach($this->data['dictionary']['widgetArea-1'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['widget_area_footer'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Top menu',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Select top menu.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('menu_top'); ?>" id="<?php ThemeHelper::getFormName('menu_top'); ?>">
<?php
						foreach($this->data['dictionary']['menu-1'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['menu_top'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>				
			<li>
				<h5><?php esc_html_e('Enable header',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable header visibility.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('header_enable'); ?>" id="<?php ThemeHelper::getFormName('header_enable_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['header_enable'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('header_enable_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('header_enable'); ?>" id="<?php ThemeHelper::getFormName('header_enable_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['header_enable'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('header_enable_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Header background image',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Select header background image.',THEME_DOMAIN); ?><br/></span>
				<div class="to-clear-fix">
					<input type="text" name="<?php ThemeHelper::getFormName('header_background_image_src'); ?>" id="<?php ThemeHelper::getFormName('header_background_image_src'); ?>" class="to-float-left" value="<?php echo ThemeHelper::esc_attr($this->data['option']['header_background_image_src']); ?>" />
					<input type="button" name="<?php ThemeHelper::getFormName('header_background_image_src_browse'); ?>" id="<?php ThemeHelper::getFormName('header_background_image_src_browse'); ?>" class="to-button-browse to-button" value="<?php esc_attr_e('Browse',THEME_DOMAIN); ?>"/>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Header background image repeat',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Header background image repeat.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('header_background_image_repeat'); ?>" id="<?php ThemeHelper::getFormName('header_background_image_repeat'); ?>">
<?php
						foreach($this->data['dictionary']['backgroundRepeat'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['header_background_image_repeat'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Header background image position',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Header background image position.',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" value="<?php echo ThemeHelper::esc_attr($this->data['option']['header_background_image_position']); ?>" id="<?php ThemeHelper::getFormName('header_background_image_position'); ?>" name="<?php ThemeHelper::getFormName('header_background_image_position'); ?>"/>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Background image size',THEME_DOMAIN); ?></h5>
				<span class="to-legend">
					<?php esc_html_e('Specify the image size. For options "Length" and "Percentage" you have to specify these values in next field.',THEME_DOMAIN); ?><br/>
				</span>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('header_background_image_size_1'); ?>" id="<?php ThemeHelper::getFormName('header_background_image_size_1'); ?>">
<?php
					foreach($this->data['dictionary']['backgroundSize'] as $index=>$value)
						echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['header_background_image_size_1'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>				
			<li>
				<h5><?php esc_html_e('Background image size',THEME_DOMAIN); ?></h5>
				<span class="to-legend">
					<?php esc_html_e('Sets the width and height of the background image.',THEME_DOMAIN); ?><br/>
					<?php esc_html_e('Sets the width and height of the background image in percent of the parent element.',THEME_DOMAIN); ?><br/>
					<?php esc_html_e('The first value sets the width, the second value sets the height. If only one value is given, the second is set to "auto".',THEME_DOMAIN); ?><br/>
				</span>
				<div>
					<input type="text" value="<?php echo ThemeHelper::esc_attr($this->data['option']['header_background_image_size_2']); ?>" id="<?php ThemeHelper::getFormName('header_background_image_size_2'); ?>" name="<?php ThemeHelper::getFormName('header_background_image_size_2'); ?>"/>
				</div>
			</li>				
		</ul>
		<script type="text/javascript">
			jQuery(document).ready(function($) 
			{
				var element=$('.to').themeOptionElement();;
				element.bindBrowseMedia('#<?php ThemeHelper::getFormName('header_background_image_src_browse'); ?>');
			});
		</script>