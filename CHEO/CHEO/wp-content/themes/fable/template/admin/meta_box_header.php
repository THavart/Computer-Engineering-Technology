		<div class="to">
			<ul class="to-form-field-list">
				<li>
					<h5><?php esc_html_e('Enable header',THEME_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('Enable or disable header visibility.',THEME_DOMAIN); ?></span>
					<div class="to-radio-button">
						<input type="radio" name="<?php ThemeHelper::getFormName('header_enable'); ?>" id="<?php ThemeHelper::getFormName('header_enable_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['header_enable'],1); ?>/>
						<label for="<?php ThemeHelper::getFormName('header_enable_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
						<input type="radio" name="<?php ThemeHelper::getFormName('header_enable'); ?>" id="<?php ThemeHelper::getFormName('header_enable_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['header_enable'],0); ?>/>
						<label for="<?php ThemeHelper::getFormName('header_enable_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
						<input type="radio" name="<?php ThemeHelper::getFormName('header_enable'); ?>" id="<?php ThemeHelper::getFormName('header_enable_2'); ?>" value="-1" <?php ThemeHelper::checkedIf($this->data['option']['header_enable'],-1); ?>/>
						<label for="<?php ThemeHelper::getFormName('header_enable_2'); ?>"><?php esc_html_e('Use global settings',THEME_DOMAIN); ?></label>
					</div>
				</li>
				<li>
					<h5><?php esc_html_e('Header text color',THEME_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('Header text color in HEX.',THEME_DOMAIN); ?></span>
					<div>
						<input type="text" class="to-color-picker" value="<?php echo ThemeHelper::esc_attr($this->data['option']['header_text_color']); ?>" id="<?php ThemeHelper::getFormName('header_text_color'); ?>" name="<?php ThemeHelper::getFormName('header_text_color'); ?>" maxlength="11"/>
					</div>
				</li>				
				<li>
					<h5><?php esc_html_e('Header background color',THEME_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('Header background color in HEX.',THEME_DOMAIN); ?></span>
					<div>
						<input type="text" class="to-color-picker" value="<?php echo ThemeHelper::esc_attr($this->data['option']['header_background_color']); ?>" id="<?php ThemeHelper::getFormName('header_background_color'); ?>" name="<?php ThemeHelper::getFormName('header_background_color'); ?>" maxlength="11"/>
					</div>
				</li>	
				<li>
					<h5><?php esc_html_e('Header background image',THEME_DOMAIN); ?></h5>
					<span class="to-legend">
						<?php esc_html_e('Header background image.',THEME_DOMAIN); ?><br/>
						<?php esc_html_e('To disable background image (previously set up in Theme Options) simply enter "-1" or "none".',THEME_DOMAIN); ?>
					</span>
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
							<option value="-1" <?php echo (ThemeHelper::selectedIf($this->data['option']['header_background_image_repeat'],-1,false)); ?>><?php esc_html_e('[Use global settings]',THEME_DOMAIN); ?></option>
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
					<h5><?php esc_html_e('Header background image size',THEME_DOMAIN); ?></h5>
					<span class="to-legend">
						<?php esc_html_e('Specify the image size. For options "Length" and "Percentage" you have to specify these values in next field.',THEME_DOMAIN); ?><br/>
					</span>
					<div class="to-clear-fix">
						<select name="<?php ThemeHelper::getFormName('header_background_image_size_1'); ?>" id="<?php ThemeHelper::getFormName('header_background_image_size_1'); ?>">
							<option value="-1" <?php echo (ThemeHelper::selectedIf($this->data['option']['header_background_image_size_1'],-1,false)); ?>><?php esc_html_e('[Use global settings]',THEME_DOMAIN); ?></option>
<?php
						foreach($this->data['dictionary']['backgroundSize'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['header_background_image_size_1'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
						</select>
					</div>
				</li>				
				<li>
					<h5><?php esc_html_e('Header background image size',THEME_DOMAIN); ?></h5>
					<span class="to-legend">
						<?php esc_html_e('Sets the width and height of the background image.',THEME_DOMAIN); ?><br/>
						<?php esc_html_e('Sets the width and height of the background image in percent of the parent element.',THEME_DOMAIN); ?><br/>
						<?php esc_html_e('The first value sets the width, the second value sets the height. If only one value is given, the second is set to "auto".',THEME_DOMAIN); ?><br/>
					</span>
					<div>
						<input type="text" value="<?php echo ThemeHelper::esc_attr($this->data['option']['header_background_image_size_2']); ?>" id="<?php ThemeHelper::getFormName('header_background_image_size_2'); ?>" name="<?php ThemeHelper::getFormName('header_background_image_size_2'); ?>"/>
					</div>
				</li>				
				<li>
					<h5><?php esc_html_e('Subheader',THEME_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('Subheader text.',THEME_DOMAIN); ?></span>
					<div>
						<input type="text" value="<?php echo ThemeHelper::esc_attr($this->data['option']['header_subheader']); ?>" id="<?php ThemeHelper::getFormName('header_subheader'); ?>" name="<?php ThemeHelper::getFormName('header_subheader'); ?>"/>
					</div>
				</li>
				<li>
					<h5><?php esc_html_e('Subheader text color',THEME_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('Subheader text color in HEX.',THEME_DOMAIN); ?></span>
					<div>
						<input type="text" class="to-color-picker" value="<?php echo ThemeHelper::esc_attr($this->data['option']['header_subheader_text_color']); ?>" id="<?php ThemeHelper::getFormName('header_subheader_text_color'); ?>" name="<?php ThemeHelper::getFormName('header_subheader_text_color'); ?>" maxlength="11"/>
					</div>
				</li>				
			</ul>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function($)
			{	
				var element=$('.to').themeOptionElement({init:false});
				element.bindBrowseMedia('#<?php ThemeHelper::getFormName('header_background_image_src_browse'); ?>');
			});
		</script>