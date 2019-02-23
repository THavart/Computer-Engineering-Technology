		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Favicon',THEME_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enter URL of favicon.',THEME_DOMAIN); ?><br/></span>
				<div class="to-clear-fix">
					<input type="text" name="<?php ThemeHelper::getFormName('favicon_url'); ?>" id="<?php ThemeHelper::getFormName('favicon_url'); ?>" class="to-float-left" value="<?php echo ThemeHelper::esc_attr($this->data['option']['favicon_url']); ?>" />
					<input type="button" name="<?php ThemeHelper::getFormName('favicon_url_browse'); ?>" id="<?php ThemeHelper::getFormName('favicon_url_browse'); ?>" class="to-button-browse to-button" value="<?php esc_attr_e('Browse',THEME_DOMAIN); ?>"/>
				</div>
			</li>
		</ul>

		<script type="text/javascript">
			jQuery(document).ready(function($) 
			{
				var element=$('.to').themeOptionElement();;
				element.bindBrowseMedia('#<?php ThemeHelper::getFormName('favicon_url_browse'); ?>');
			});
		</script>