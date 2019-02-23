		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Widget area in sidebar',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Select widget area and widget area location.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Widget area:',THEME_DOMAIN); ?></span>
					<select name="<?php ThemeHelper::getFormName('widget_area_sidebar_woocommerce'); ?>" id="<?php ThemeHelper::getFormName('widget_area_sidebar_woocommerce'); ?>">
<?php
						foreach($this->data['dictionary']['widgetArea-1'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['widget_area_sidebar_woocommerce'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Location:',THEME_DOMAIN); ?></span>
					<select name="<?php ThemeHelper::getFormName('widget_area_sidebar_location_woocommerce'); ?>" id="<?php ThemeHelper::getFormName('widget_area_sidebar_location_woocommerce'); ?>">
<?php
						foreach($this->data['dictionary']['widgetAreaLocation-1'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['widget_area_sidebar_location_woocommerce'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Widget area in footer',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Select widget area in footer.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('widget_area_footer_woocommerce'); ?>" id="<?php ThemeHelper::getFormName('widget_area_footer_woocommerce'); ?>">
<?php
						foreach($this->data['dictionary']['widgetArea-1'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['widget_area_footer_woocommerce'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Top menu',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Select top menu.',THEME_DOMAIN); ?></span>
				<div class="to-clear-fix">
					<select name="<?php ThemeHelper::getFormName('menu_top_woocommerce'); ?>" id="<?php ThemeHelper::getFormName('menu_top_woocommerce'); ?>">
<?php
						foreach($this->data['dictionary']['menu-1'] as $index=>$value)
							echo '<option value="'.ThemeHelper::esc_attr($index).'" '.(ThemeHelper::selectedIf($this->data['option']['menu_top_woocommerce'],$index,false)).'>'.ThemeHelper::esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>				
		</ul>
		<script type="text/javascript">
			jQuery(document).ready(function($) 
			{
				var element=$('.to').themeOptionElement();;
				element.bindBrowseMedia('#<?php ThemeHelper::getFormName('header_background_image_src_woocommerce_browse'); ?>');
			});
		</script>