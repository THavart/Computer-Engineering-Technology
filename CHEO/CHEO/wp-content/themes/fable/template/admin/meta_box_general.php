		<?php echo $this->data['nonce']; ?>
		<div class="to">
			<ul class="to-form-field-list">
				<li>
					<h5><?php esc_html_e('Sidebar',THEME_DOMAIN); ?></h5>
					<span class="to-legend">
						<?php esc_html_e('Select sidebar and sidebar location.',THEME_DOMAIN); ?><br/>
						<?php esc_html_e('You can choose sidebar only for templates named "Page" and "Blog". Other templates don\'t support sidebars.',THEME_DOMAIN); ?>
					</span>
					<div class="to-clear-fix">
						<span class="to-legend-field"><?php esc_html_e('Sidebar:',THEME_DOMAIN); ?></span>
						<select name="<?php ThemeHelper::getFormName('widget_area_sidebar'); ?>" id="<?php ThemeHelper::getFormName('widget_area_sidebar'); ?>">
<?php
							foreach($this->data['dictionary']['widgetArea'] as $index=>$value)
								echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['widget_area_sidebar'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
						</select>
					</div>
					<div class="to-clear-fix">
						<span class="to-legend-field"><?php esc_html_e('Location:',THEME_DOMAIN); ?></span>
						<select name="<?php ThemeHelper::getFormName('widget_area_sidebar_location',THEME_DOMAIN); ?>" id="<?php ThemeHelper::getFormName('widget_area_sidebar_location'); ?>">
<?php
							foreach($this->data['dictionary']['widgetAreaLocation'] as $index=>$value)
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
							foreach($this->data['dictionary']['widgetArea'] as $index=>$value)
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
						foreach($this->data['dictionary']['menu'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['menu_top'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
						</select>
					</div>
				</li>
				<li>
					<h5><?php esc_html_e('Bottom footer',THEME_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('Enable or disable bottom part of footer.',THEME_DOMAIN); ?></span>
					<div class="to-radio-button">
						<input type="radio" name="<?php ThemeHelper::getFormName('footer_bottom_enable'); ?>" id="<?php ThemeHelper::getFormName('footer_bottom_enable_1'); ?>" value="1" <?php ThemeHelper::checkedIf($this->data['option']['footer_bottom_enable'],1); ?>/>
						<label for="<?php ThemeHelper::getFormName('footer_bottom_enable_1'); ?>"><?php esc_html_e('Enable',THEME_DOMAIN); ?></label>
						<input type="radio" name="<?php ThemeHelper::getFormName('footer_bottom_enable'); ?>" id="<?php ThemeHelper::getFormName('footer_bottom_enable_0'); ?>" value="0" <?php ThemeHelper::checkedIf($this->data['option']['footer_bottom_enable'],0); ?>/>
						<label for="<?php ThemeHelper::getFormName('footer_bottom_enable_0'); ?>"><?php esc_html_e('Disable',THEME_DOMAIN); ?></label>
						<input type="radio" name="<?php ThemeHelper::getFormName('footer_bottom_enable'); ?>" id="<?php ThemeHelper::getFormName('footer_bottom_enable_2'); ?>" value="-1" <?php ThemeHelper::checkedIf($this->data['option']['footer_bottom_enable'],-1); ?>/>
						<label for="<?php ThemeHelper::getFormName('footer_bottom_enable_2'); ?>"><?php esc_html_e('Use global settings',THEME_DOMAIN); ?></label>
					</div>
				</li>
				<li>
					<h5><?php esc_html_e('Page background color',THEME_DOMAIN); ?></h5>
					<span class="to-legend"><?php esc_html_e('Page background color in HEX.',THEME_DOMAIN); ?></span>
					<div>
						<input type="text" class="to-color-picker" value="<?php echo ThemeHelper::esc_attr($this->data['option']['page_background_color']); ?>" id="<?php ThemeHelper::getFormName('page_background_color'); ?>" name="<?php ThemeHelper::getFormName('page_background_color'); ?>" maxlength="11"/>
					</div>
				</li>	
			</ul>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function($)
			{	
				$('.to').themeOptionElement({init:true});
			});
		</script>