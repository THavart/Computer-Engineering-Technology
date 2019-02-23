		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Enable footer',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable footer.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('footer_enable'); ?>" id="<?php ThemeHelper::getFormName('footer_enable_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['footer_enable'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('footer_enable_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('footer_enable'); ?>" id="<?php ThemeHelper::getFormName('footer_enable_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['footer_enable'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('footer_enable_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Enable sticky footer',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable sticky footer.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('footer_sticky_enable'); ?>" id="<?php ThemeHelper::getFormName('footer_sticky_enable_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['footer_sticky_enable'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('footer_sticky_enable_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('footer_sticky_enable'); ?>" id="<?php ThemeHelper::getFormName('footer_sticky_enable_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['footer_sticky_enable'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('footer_sticky_enable_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>			
			<li>
				<h5><?php esc_html_e('Enable top footer',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable top footer (widget area).',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('footer_top_enable'); ?>" id="<?php ThemeHelper::getFormName('footer_top_enable_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['footer_top_enable'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('footer_top_enable_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('footer_top_enable'); ?>" id="<?php ThemeHelper::getFormName('footer_top_enable_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['footer_top_enable'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('footer_top_enable_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Top footer background image',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Select background image.',THEME_DOMAIN); ?><br/></span>
				<div class="to-clear-fix">
					<input type="text" name="<?php ThemeHelper::getFormName('footer_top_background_image_src'); ?>" id="<?php ThemeHelper::getFormName('footer_top_background_image_src'); ?>" class="to-float-left" value="<?php echo ThemeHelper::esc_attr($this->data['option']['footer_top_background_image_src']); ?>" />
					<input type="button" name="<?php ThemeHelper::getFormName('footer_top_background_image_src_browse'); ?>" id="<?php ThemeHelper::getFormName('footer_top_background_image_src_browse'); ?>" class="to-button-browse to-button" value="<?php esc_attr_e('Browse',THEME_DOMAIN); ?>"/>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Top footer background image repeat',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Background image repeat.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('footer_top_background_image_repeat'); ?>" id="<?php ThemeHelper::getFormName('footer_top_background_image_repeat'); ?>">
<?php
						foreach($this->data['dictionary']['backgroundRepeat'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['footer_top_background_image_repeat'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Top footer background image position',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Background image position.',THEME_DOMAIN); ?></span>
				<div>
					<input type="text" value="<?php echo ThemeHelper::esc_attr($this->data['option']['footer_top_background_image_position']); ?>" id="<?php ThemeHelper::getFormName('footer_top_background_image_position'); ?>" name="<?php ThemeHelper::getFormName('footer_top_background_image_position'); ?>"/>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Top footer background image size',THEME_DOMAIN); ?></h5>
				<span class="to-legend">
					<?php esc_html_e('Specify the image size. For options "Length" and "Percentage" you have to specify these values in next field.',THEME_DOMAIN); ?><br/>
				</span>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('footer_top_background_image_size_1'); ?>" id="<?php ThemeHelper::getFormName('footer_top_background_image_size_1'); ?>">
						<option value="-1" <?php echo (ThemeHelper::selectedIf($this->data['option']['footer_top_background_image_size_1'],-1,false)); ?>><?php esc_html_e('[Use global settings]',THEME_DOMAIN); ?></option>
<?php
					foreach($this->data['dictionary']['backgroundSize'] as $index=>$value)
						echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['footer_top_background_image_size_1'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>				
			<li>
				<h5><?php esc_html_e('Top footer background image size',THEME_DOMAIN); ?></h5>
				<span class="to-legend">
					<?php esc_html_e('Sets the width and height of the background image.',THEME_DOMAIN); ?><br/>
					<?php esc_html_e('Sets the width and height of the background image in percent of the parent element.',THEME_DOMAIN); ?><br/>
					<?php esc_html_e('The first value sets the width, the second value sets the height. If only one value is given, the second is set to "auto".',THEME_DOMAIN); ?><br/>
				</span>
				<div>
					<input type="text" value="<?php echo ThemeHelper::esc_attr($this->data['option']['footer_top_background_image_size_2']); ?>" id="<?php ThemeHelper::getFormName('footer_top_background_image_size_2'); ?>" name="<?php ThemeHelper::getFormName('footer_top_background_image_size_2'); ?>"/>
				</div>
			</li>	
			<li>
				<h5><?php esc_html_e('Enable bottom footer',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable bottom part of footer.',THEME_DOMAIN); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php ThemeHelper::getFormName('footer_bottom_enable'); ?>" id="<?php ThemeHelper::getFormName('footer_bottom_enable_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['footer_bottom_enable'],1); ?>/>
					<label for="<?php ThemeHelper::getFormName('footer_bottom_enable_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
					<input type="radio" name="<?php ThemeHelper::getFormName('footer_bottom_enable'); ?>" id="<?php ThemeHelper::getFormName('footer_bottom_enable_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['footer_bottom_enable'],0); ?>/>
					<label for="<?php ThemeHelper::getFormName('footer_bottom_enable_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Bottom footer content',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Bottom footer content.',THEME_DOMAIN); ?></span>
				<div>
					<?php wp_editor($this->data['option']['footer_bottom_content'],ThemeHelper::getFormName('footer_bottom_content',false)); ?>
				</div>
			</li>
		</ul>
		<script type="text/javascript">
			jQuery(document).ready(function($) 
			{
				var element=$('.to').themeOptionElement({init:false});;
				element.bindBrowseMedia('#<?php ThemeHelper::getFormName('footer_top_background_image_src_browse'); ?>');
			});
		</script>