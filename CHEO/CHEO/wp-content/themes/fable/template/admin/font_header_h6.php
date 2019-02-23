		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Google Font',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enter name of Google Font and select it from list.',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" value="<?php echo ThemeHelper::esc_attr($this->data['option']['font_h6_family_google']); ?>" id="<?php ThemeHelper::getFormName('font_h6_family_google'); ?>" name="<?php ThemeHelper::getFormName('font_h6_family_google'); ?>" maxlength="255"/>
				</div>	
			</li>
			<li>
				<h5><?php esc_html_e('System font',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enter name of system font.',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php ThemeHelper::getFormName('font_h6_family_system'); ?>" id="<?php ThemeHelper::getFormName('font_h6_family_system'); ?>" value="<?php echo ThemeHelper::esc_attr($this->data['option']['font_h6_family_system']); ?>" maxlength="255"/>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Font size',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Font size (in px).',THEME_DOMAIN); ?></span>
				<div>
					<div id="<?php ThemeHelper::getFormName('font_h6_size_1_slider'); ?>"></div>
					<input type="text" name="<?php ThemeHelper::getFormName('font_h6_size_1'); ?>" id="<?php ThemeHelper::getFormName('font_h6_size_1'); ?>" class="to-slider-range" readonly/>
					<label class="to-label-1 to-clear-fix"><?php esc_html_e('Default font size.',THEME_DOMAIN); ?></label>
				</div>
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						var element=$('.to').themeOptionElement();;
						element.createSlider('#<?php ThemeHelper::getFormName('font_h6_size_1_slider'); ?>',1,100,<?php echo (int)$this->data['option']['font_h6_size_1']; ?>);
					});
				</script>
<?php
			foreach($this->data['dictionary']['responsiveMedia'] as $index=>$value)
			{
				if($index==1) continue;
?>
				<div> 
					<div id="<?php ThemeHelper::getFormName('font_h6_size_'.$index.'_slider'); ?>"></div>
					<input type="text" name="<?php ThemeHelper::getFormName('font_h6_size_'.$index); ?>" id="<?php ThemeHelper::getFormName('font_h6_size_'.$index); ?>" class="to-slider-range" readonly/>
					<label class="to-label-1 to-clear-fix"><?php echo sprintf(esc_html__('For page width between %dpx and %dpx.',THEME_DOMAIN),$value['min-width'],$value['max-width']); ?></label>
				</div>				
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						var element=$('.to').themeOptionElement();
						element.createSlider('#<?php ThemeHelper::getFormName('font_h6_size_'.$index.'_slider'); ?>',1,100,<?php echo (int)$this->data['option']['font_h6_size_'.$index]; ?>);
					});
				</script>				
<?php
			}
?>
			</li>
			<li>
				<h5><?php esc_html_e('Font style',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Font style.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('font_h6_style'); ?>" id="<?php ThemeHelper::getFormName('font_h6_style'); ?>">
<?php
						foreach($this->data['dictionary']['fontStyle'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['font_h6_style'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Font weight',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Font weight.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('font_h6_weight'); ?>" id="<?php ThemeHelper::getFormName('font_h6_weight'); ?>">
<?php
						foreach($this->data['dictionary']['fontWeight'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['font_h6_weight'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Line height',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Line height with selected unit.',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php ThemeHelper::getFormName('font_h6_line_height'); ?>" id="<?php ThemeHelper::getFormName('font_h6_line_height'); ?>" value="<?php echo ThemeHelper::esc_attr($this->data['option']['font_h6_line_height']); ?>" maxlength="255"/>
				</div>
			</li>
		</ul>

		<script type="text/javascript">
			jQuery(document).ready(function($)
			{
				var element=$('.to').themeOptionElement();;
				element.createGoogleFontAutocomplete('#<?php ThemeHelper::getFormName('font_h6_family_google'); ?>');
				element.createSlider('#<?php ThemeHelper::getFormName('font_h6_size_1_slider'); ?>',1,100,<?php echo (int)$this->data['option']['font_h6_size_1']; ?>);
			});
		</script>